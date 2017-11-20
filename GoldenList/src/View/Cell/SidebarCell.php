<?php
namespace GoldenList\View\Cell;

use Cake\View\Cell;
use GoldenList\Lib\DemoUtility;
use GoldenList\Model\Entity\MasterProject;

/**
 * Sidebar cell
 */
class SidebarCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {

        $userId = $this->request->session()->read('Auth.User.id');
        $this->loadModel('GoldenList.MasterClients');
        $masterClients = $this->MasterClients->find()->where(['user_id' => $userId])->first();
        $masterClientId = $masterClients->id;

        $this->loadModel('GoldenList.GoldenlistSidebarProjects');
        $sidebar = $this->getSidebar($masterClientId);

        $active =  sprintf("%s_%s_%s", $this->request->controller, $this->request->action,implode('_', $this->request->pass));
        $parentActive = '';
        if (!empty($this->request->pass[0])) {
            $parentActive = sprintf("%s_%s_%s", $this->request->controller, $this->request->action, $this->request->pass[0]);
        }
        $this->set('active', $active);
        $this->set('parentActive', $parentActive);
        $this->set('sidebar', $sidebar);
    }

    private function getSidebar($masterClientId) {
        return $this->GoldenlistSidebarProjects
            ->find()
            ->where(['master_client_id' => $masterClientId])
            ->contain($this->getContain())
            ->order(['GoldenlistSidebarProjects.master_project_id ASC'])->all();
    }

    private function getContain()
    {
        if ($this->isDemo()) {
            return $this->getDemoContain();
        }
        return $this->getNormalContain();
    }

    private function isDemo()
    {
        $DemoUtility = new DemoUtility();

        $groupId = $this->request->session()->read('Auth.User.group_id');
        $isDemo = $DemoUtility->isDemoMode($groupId);
        if ($isDemo) {
            if (!empty($this->request->pass[0]) && $this->request->pass[0] != 'home') {
                $this->loadModel('GoldenList.MasterProjects');
                if ($DemoUtility->isDemoProj($this->MasterProjects->get($this->request->pass[0])->project_name)) {
                    $this->set('isDemo', true);
                }
            }
        }

        return $isDemo;
    }

    private function getDemoContain()
    {
        return [
            'GoldenlistSidebarCallLists' => function ($q) {
                return $q->join([
                    'gl' => [
                        'table' => 'master_call_lists',
                        'type' => 'INNER',
                        'conditions' => [
                            'gl.id = GoldenlistSidebarCallLists.master_call_list_id',
                            'gl.deleted IS' => null,
                        ]
                    ],
                ])->order(['GoldenlistSidebarCallLists.master_call_list_id ASC']);
            }
        ];
    }


    private function getNormalContain()
    {
        return [
            'GoldenlistSidebarCallLists' => function ($q) {
                return $q->join([
                    'gl' => [
                        'table' => 'goldenlist_golden_lists',
                        'type' => 'INNER',
                        'conditions' => [
                            'gl.master_call_list_id = GoldenlistSidebarCallLists.master_call_list_id',
                            'gl.deleted IS' => null,
                        ]
                    ],
                ])->order(['GoldenlistSidebarCallLists.master_call_list_id ASC']);
            }
        ];
    }

}
