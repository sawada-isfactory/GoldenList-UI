<?php
namespace GoldenList\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\I18n\Time;
use GoldenList\Model\Entity\MasterProject;
use Cake\Network\Exception\InternalErrorException;
use Cake\ORM\TableRegistry;
use GoldenList\Lib\DemoUtility;

/**
 * Demo component
 */
class DemoComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    private $masterProjectEntity = [];
    private $demoDataPath = __DIR__ . '/../../../tmp/demo';
    public $isDemo = false;

    public function initialize(array $config)
    {
        $DemoUtility = new DemoUtility();

        $this->Controller = $this->_registry->getController();
        $actionName = $this->request->action . $this->request->controller;
        $this->Controller->log('actionName=' . $actionName . ' gid=' . $this->_config['auth']['group_id'], 'debug');

        if ($DemoUtility->isDemoMode($this->_config['auth']['group_id']) && method_exists($this, $actionName)) {
            // プロジェクトに紐づかないページはデモ対象外
            if (!($masterProjectId = $this->Controller->getMasterProjectIdByPass())) {
                return;
            }
            // デモ用プロジェクトかの確認
            $this->masterProjectEntity = $this->Controller->getMyProjectEntity($masterProjectId);
            if (!$DemoUtility->isDemoProj($this->masterProjectEntity->project_name)) {
                return;
            }
            $this->isDemo = true;
            $this->Controller->set('isDemoMode', true);
            call_user_func([$this, $actionName]);

        }

    }


    private function uploadStep1MasterCallLists()
    {
        // ステップの更新
        $this->updateStep(1);
    }

    private function uploadStep4MasterCallLists()
    {
        // toDo ステップを更新する
        // ステップの更新
        $this->updateStep(4);
    }

    private function updateCapsMasterCallLists()
    {
        // ステップの更新
        $this->updateStep(2);
    }

    private function downloadMasterCallLists()
    {
        if ($this->request->is('ajax')) {
            // ステップの更新
            $this->updateStep(3);

        } else {
            $zip = file_get_contents($this->demoDataPath . DS . 'demo_call_list.zip');
            $filename = 'demo_call_list.zip';
            header("Content-Type: application/zip");
            header("Content-Disposition: attachment; filename=$filename");
            echo $zip;
            exit;
        }
    }

    private function downloadMasterProjects()
    {
        if ($this->request->is('ajax')) {
            header('content-type: application/json; charset=utf-8');
            echo json_encode(['result' => 'OK']);
            exit;

        } else {
            $zip = file_get_contents($this->demoDataPath . DS . 'demo_report.zip');
            $filename = 'demo_report.zip';
            header("Content-Disposition: attachment; filename=$filename");
            echo $zip;
            exit;
        }
    }

    private function downloadGoldenListsMasterProjects()
    {
        if ($this->request->is('ajax')) {
            header('content-type: application/json; charset=utf-8');
            echo json_encode(['result' => 'OK']);
            exit;

        } else {
            $zip = file_get_contents($this->demoDataPath . DS . 'demo_golden_list.zip');
            $filename = 'demo_golden_list.zip';
            header("Content-Type: application/zip");
            header("Content-Disposition: attachment; filename=$filename");
            echo $zip;
            exit;
        }
    }


    private function editMasterProjects()
    {
        $this->Controller->set('demoData', $this->getLoyalCustomerData());
    }

    private function editMasterCallLists()
    {
    }

    private function checkStatusMasterCallLists()
    {
        header('content-type: application/json; charset=utf-8');
        echo json_encode(['result' => 'OK']);
        exit;
    }

    private function updateStep($step)
    {
        $id = $this->request->pass[1];
        //ステップを更新
        $masterCallList = $this->Controller->MasterCallLists->findProjectBy($this->masterProjectEntity->id, $id, [
            'contain' => ['MasterProjects', 'GoldenlistStatusEngines']
        ]);

        if (empty($masterCallList->goldenlist_status_engine)) {
            $masterCallList->goldenlist_status_engine = $this->Controller->MasterCallLists->GoldenListStatusEngines->newEntity();
            $masterCallList->goldenlist_status_engine->master_call_list_id = $id;
        }
        $masterCallList->goldenlist_status_engine->progress_step = $step;
        $masterCallList->goldenlist_status_engine->upload_file_name = 'test.csv';

        if ($this->Controller->MasterCallLists->GoldenListStatusEngines->save($masterCallList->goldenlist_status_engine)) {
            header('content-type: application/json; charset=utf-8');
            echo json_encode(['result' => $step]);
            exit;
        } else {
            throw new InternalErrorException();
        }
    }

    /**
     * プロジェクト概況デモ
     *
     * デモプロジェクトに紐づくプロジェクト概況を表示
     */
    private function viewGoldenlistProjectOverviews()
    {
        $masterProjectId = $this->masterProjectEntity->id;
        $masterProject = $this->Controller->GoldenlistProjectOverviews->MasterProjects->get($masterProjectId);

        $masterCallLists = $this->Controller->GoldenlistProjectOverviews->MasterCallLists->find()->where(['master_project_id' => $masterProjectId])->toArray();
        $json = file_get_contents($this->demoDataPath . DS . 'project_overview.json');
        $goldenlistProjectOverview = [];

        $data = json_decode($json);
        foreach ($data as $key => $item) {
            if (empty($masterCallLists[$key])) {
                if (!$item->master_call_list) {
                    $masterCallLists[$key] = new \stdClass();
                    $masterCallLists[$key]->call_list_name = '[サンプル]ゴールデンリスト' . ($key + 1);
                }
            } else {
                $item->master_call_list = $masterCallLists[$key];
            }
            $goldenlistProjectOverview[] = $item;
        }

        if (empty($goldenlistProjectOverview)) {
            $this->render('GoldenList.Error/creating');
            return;
        }
        $this->Controller->set('masterProject', $masterProject);
        $this->Controller->set('goldenlistProjectOverview', $goldenlistProjectOverview);
        $this->Controller->set('_serialize', ['goldenlistProjectOverview']);
        $this->Controller->render();
    }

    private function viewGoldenlistLoyalCustomers()
    {
        //$goldenlistLoyalCustomer = $this->Controller->GoldenlistLoyalCustomers->findByMasterProjectId($masterProjectId);

        $goldenlistLoyalCustomer = $this->getLoyalCustomerData();

        // プロジェクト名を上書き
        $goldenlistLoyalCustomer->project_name = $this->masterProjectEntity->project_name;
        if (empty($goldenlistLoyalCustomer)) {
            $this->render('GoldenList.Error/creating');
            return;
        }

        $indicator = json_decode($goldenlistLoyalCustomer->bodais_result_indicator);
        $histgrams = json_decode($goldenlistLoyalCustomer->bodais_result_histogram);
        $decilCharts = json_decode($goldenlistLoyalCustomer->bodais_result_decil_chart);

        $MasterItemGroups = TableRegistry::get('GoldenList.MasterItemGroups');
        $itemGroups = $MasterItemGroups->find()->contain('MasterMainItems')->all();
        $graphs = [];
        $graphCount = 0;
        foreach ($itemGroups as $itemGroup) {
            $graphs[$itemGroup->id]['name'] = $itemGroup->name;
            foreach ($itemGroup->master_main_items as $mainItem) {
                $item = [
                    'name' => $mainItem->call_list_col_name,
                    'id' => $mainItem->bodais_report_col_num,
                ];
                $graph = [];
                foreach ($histgrams as $histgram) {
                    if ($histgram->column->id == $mainItem->bodais_report_col_num) {
                        $graph['histgram'] = $histgram;
                        $graphCount = $graphCount + 0.5;
                    }
                }
                foreach ($decilCharts as $decilChart) {
                    if ($decilChart->column->id == $mainItem->bodais_report_col_num) {
                        $graph['decilChart'] = $decilChart;
                        $graphCount = $graphCount + 0.5;
                    }
                }

                $item['graph'] = $graph;
                $graphs[$itemGroup->id]['graphs'][] = $item;
            }
        }
        $this->Controller->set('goldenlistLoyalCustomer', $goldenlistLoyalCustomer);
        $this->Controller->set('graphs', $graphs);
        $this->Controller->set('indicator', $indicator);
        $this->Controller->set('_serialize', ['goldenlistLoyalCustomer']);
    }

    private function viewGoldenlistGoldenLists()
    {
        $masterProjectId = $this->masterProjectEntity->id;
        $masterCallListId = $this->request->pass[1];

        $masterCallList = $this->Controller->GoldenlistGoldenLists->masterCallLists->findProjectBy($masterProjectId, $masterCallListId, ['contain' => ['MasterProjects']]);

        $json = file_get_contents($this->demoDataPath . DS . 'goldenlist.json');
        $goldenlistGoldenList = json_decode($json);
        $goldenlistGoldenList->overview_create_date_time = new Time($goldenlistGoldenList->overview_create_date_time);
        //$goldenlistGoldenList = $this->Controller->GoldenlistGoldenLists->findByMasterCallListId($masterCallListId);

        if (empty($goldenlistGoldenList)) {
            $this->render('GoldenList.Error/creating');
            return;
        }
        $dummy = false;

        if ($goldenlistGoldenList->call_program_expected_cv_rate_reached_all == 0) {
            $dummy = true;
        }
        $this->Controller->set('dummy', $dummy);
        $this->Controller->set('masterCallList', $masterCallList);
        $this->Controller->set('goldenlistGoldenList', $goldenlistGoldenList);
        $this->Controller->set('_serialize', ['goldenlistGoldenList']);
    }

    private function getLoyalCustomerData()
    {

        $data = new \stdClass();
        $data->bodais_result_indicator = file_get_contents($this->demoDataPath . DS . 'indicator.json');
        $data->bodais_result_histogram = file_get_contents($this->demoDataPath . DS . 'histogram.json');
        $data->bodais_result_decil_chart = file_get_contents($this->demoDataPath . DS . 'decil_chart.json');

        return $data;
    }
}
