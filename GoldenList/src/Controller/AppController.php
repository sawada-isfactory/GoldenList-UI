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

    protected $DemoComponent;
    public function initialize()
    {
        parent::initialize();
        $this->customAuthorized();

        $this->loadComponent('RequestHandler');

        $this->DemoComponent = $this->loadComponent('GoldenList.Demo',[
            'auth' => $this->Auth->user()
        ]);

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

        if (!($id = $this->getMasterProjectIdByPass())) {
            return true;
        }

        $myProject = $this->getMyProjectEntity($id);

        if ($this->Auth->user('id') != $myProject->master_client->user_id) {
            throw new ForbiddenException();
        }
        return true;
    }

    public function getMyProjectEntity($id)
    {
        $MasterProject = TableRegistry::get('GoldenList.MasterProjects');
        return $MasterProject->get($id, ['contain' => 'MasterClients']);
    }

    public function getMasterProjectIdByPass()
    {
        if (empty($this->request->pass)) {
            return null;
        }

        if ($this->request->pass[0] == 'home') {
            return null;
        }

        return $this->request->pass[0];
    }
}
