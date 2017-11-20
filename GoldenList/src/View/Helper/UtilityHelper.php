<?php
namespace GoldenList\View\Helper;

use Cake\Log\Log;
use Cake\View\Helper;
use Cake\View\View;
use Cake\View\Helper\HtmlHelper;

/**
 * Utility helper
 */
class UtilityHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public $helpers = ['Html', 'Url'];

    public function getHourList()
    {
        $hours = [];
        foreach (range(0, 23) as $num) {
            $hour = sprintf("%02d:00", $num);
            $hours[$hour] = $hour;
        }
        return $hours;
    }

    public function getSidebarActive($checkStr, $controller, $action, $pass = [])
    {
        $needle = sprintf("%s_%s_%s", $controller, $action, implode('_', $pass));

        if ($needle == $checkStr) {
            return 'active';
        }
        return '';
    }

    public function getContentUrl($controller, $action, $pass = [])
    {
        $plugin = $this->getPluginName();
        return $this->Url->build(array_merge(compact('plugin', 'controller', 'action'), $pass));
    }

    public function getUpdateUrls($actionList = [])
    {
        $plugin = $this->getPluginName();
        $controller = $this->request->controller;
        $action = $this->request->action;
        $pass = empty($this->request->pass) ? [] : $this->request->pass;

        $cb = $this->getContentUrl($controller,'index');
        if ($controller == 'MasterCallLists' && $action == 'edit') {
            $cb = $this->getContentUrl('MasterProjects','edit', [$this->request->pass[0]]);
        }
        $contentList = [
            'here' => $this->getContentUrl($controller,$action,$pass),
            'delete' => $this->getContentUrl($controller,'delete',$pass),
            'cb' =>  $cb,
            'deleteCallList' =>  $this->getContentUrl('MasterCallLists','delete',$pass),
            'copyCallList' => $this->getContentUrl('MasterCallLists','copy',$pass),
        ];
        foreach ($actionList as $otherAction) {
            $contentList[$otherAction] =  $this->getContentUrl($controller,$otherAction,$pass);
        }

        return $contentList;
    }

    public function getProjectEditUrl()
    {
        $token = $this->request->session()->read('Goldenlist.token');
        return sprintf('%s?%s', $this->Url->build(), http_build_query(compact('token')));
    }

    public function getPluginName()
    {
        return 'GoldenList';
    }

    public function getEngineStatusStep($statusEngineEntitie, $step)
    {
        $progress_step = 0;
        if (!empty($statusEngineEntitie)) {
            $progress_step = $statusEngineEntitie->progress_step;
        }
        //if (!empty($progress_step)) {
            if ($progress_step >= $step) {
                return "completed";
            } elseif ($progress_step + 1 == $step) {
                return "active";
            }
        //}
        return "";
    }

    public function getErrorStr($key, $arr) {
        if (empty($arr[$key])) {
            return '';
        }
        $errors = array_map(function($val){ return __($val); }, array_values($arr[$key]));
        return implode('<br>', array_values($arr[$key]));
    }

}
