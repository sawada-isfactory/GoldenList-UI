<?php
namespace GoldenList\Controller;

use Cake\Network\Exception\NotFoundException;
use GoldenList\Controller\AppController;

/**
 * GoldenlistGoldenLists Controller
 *
 * @property \GoldenList\Model\Table\GoldenlistGoldenListsTable $GoldenlistGoldenLists
 */
class GoldenlistGoldenListsController extends AppController
{

    /**
     * View method
     *
     * @param string|null $id Goldenlist Golden List id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($masterProjectId, $masterCallListId = null)
    {
        if (!empty($this->DemoComponent->isDemo)) return;

        $masterCallList = $this->GoldenlistGoldenLists->masterCallLists->findProjectBy($masterProjectId, $masterCallListId, ['contain' => ['MasterProjects']]);

        $goldenlistGoldenList = $this->GoldenlistGoldenLists->findByMasterCallListId($masterCallListId);

        if (empty($goldenlistGoldenList)) {
            $this->render('GoldenList.Error/creating');
            return;
        }
        $dummy = false;
        if ($goldenlistGoldenList->call_program_expected_cv_rate_reached_all == 0)
        {
            $dummy = true;
        }
        $this->set('dummy', $dummy);
        $this->set('masterCallList', $masterCallList);
        $this->set('goldenlistGoldenList', $goldenlistGoldenList);
        $this->set('_serialize', ['goldenlistGoldenList']);
    }


}
