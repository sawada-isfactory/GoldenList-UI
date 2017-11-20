<?php
namespace GoldenList\Controller;

use Cake\Console\TaskRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use GoldenList\Controller\AppController;

/**
 * GoldenlistLoyalCustomers Controller
 *
 * @property \GoldenList\Model\Table\GoldenlistLoyalCustomersTable $GoldenlistLoyalCustomers
 */
class GoldenlistLoyalCustomersController extends AppController
{

    public $helpers = [
        'GoldenList.Indicator',
        'GoldenList.ReportGraph'
    ];

    /**
     * View method
     *
     * @param string|null $id Goldenlist Loyal Customer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($masterProjectId = null)
    {
        $goldenlistLoyalCustomer = $this->GoldenlistLoyalCustomers->findByMasterProjectId($masterProjectId);
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

        $this->set('goldenlistLoyalCustomer', $goldenlistLoyalCustomer);
        $this->set('graphs', $graphs);
        $this->set('indicator', $indicator);
        $this->set('_serialize', ['goldenlistLoyalCustomer']);
    }

}
