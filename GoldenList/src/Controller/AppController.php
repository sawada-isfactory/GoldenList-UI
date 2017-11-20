<?php

namespace GoldenList\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;
use Cake\Network\Exception\ForbiddenException;
use Cake\ORM\TableRegistry;

class AppController extends BaseController
{
    public $helpers = [
        'GoldenList.Utility',
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->customAuthorized();
    }

    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
        $this->viewBuilder()->layout('GoldenList.default');

    }

    /**
     * 別アカウントのプロジェクトの参照を禁止する処理
     * @return bool
     */
    public function customAuthorized()
    {
        if (empty($this->Auth->user())) {
            return true;
        }


        if (empty($this->request->pass)) {
            return true;
        }

        if ($this->request->pass[0] == 'home') {
            return true;
        }

        $id = $this->request->pass[0];
        $MasterProject = TableRegistry::get('GoldenList.MasterProjects');
        $myProject = $MasterProject->get($id, ['contain' => 'MasterClients']);
        if ($this->Auth->user('id') != $myProject->master_client->user_id) {
            throw new ForbiddenException();
        }
        return true;
    }
}
