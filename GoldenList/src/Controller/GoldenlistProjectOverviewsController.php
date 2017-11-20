<?php
namespace GoldenList\Controller;

use Cake\Network\Exception\NotFoundException;
use GoldenList\Controller\AppController;

/**
 * GoldenlistProjectOverviews Controller
 *
 * @property \GoldenList\Model\Table\GoldenlistProjectOverviewsTable $GoldenlistProjectOverviews
 */
class GoldenlistProjectOverviewsController extends AppController
{

    /**
     * View method
     *
     * @param string|null $id Goldenlist Project Overview id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($masterProjectId = null)
    {
        if (!empty($this->DemoComponent->isDemo)) return;

        $masterProject = $this->GoldenlistProjectOverviews->MasterProjects->get($masterProjectId);
        $goldenlistProjectOverview = $this->GoldenlistProjectOverviews->findByMasterProjectId($masterProjectId);
        if (empty($goldenlistProjectOverview->count())) {
            $this->render('GoldenList.Error/creating');
            return;
        }
        $this->set('masterProject', $masterProject);
        $this->set('goldenlistProjectOverview', $goldenlistProjectOverview);
        $this->set('_serialize', ['goldenlistProjectOverview']);
    }


}
