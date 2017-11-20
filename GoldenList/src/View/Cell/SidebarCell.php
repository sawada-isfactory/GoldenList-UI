<?php
namespace GoldenList\View\Cell;

use Cake\View\Cell;

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
        $sidebar = $this->GoldenlistSidebarProjects
            ->find()
            ->where(['master_client_id' => $masterClientId])
            ->contain([
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
            ])
            ->order(['GoldenlistSidebarProjects.master_project_id ASC'])->all();
        $active =  sprintf("%s_%s_%s", $this->request->controller, $this->request->action,implode('_', $this->request->pass));
        $parentActive = '';
        if (!empty($this->request->pass[0])) {
            $parentActive = sprintf("%s_%s_%s", $this->request->controller, $this->request->action, $this->request->pass[0]);
        }
        $this->set('active', $active);
        $this->set('parentActive', $parentActive);
        $this->set('sidebar', $sidebar);
    }
}
