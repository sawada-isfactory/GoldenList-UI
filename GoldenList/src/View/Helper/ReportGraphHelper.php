<?php
namespace GoldenList\View\Helper;

use Cake\Core\Configure;
use Cake\Log\Log;
use Cake\Utility\Hash;
use Cake\View\Helper;
use Cake\View\View;

/**
 * ReportGraph helper
 */
class ReportGraphHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];


    public function flattenGraph($graphs)
    {
       return Hash::extract($graphs, '{n}.graphs.{n}');
    }

    public function getBarChartObj($itemName, $num, $barColor = null)
    {
        if (is_null($barColor)) {
            $barColor = GOLDENLIST_GRAPH_COLORS['barChartColors']['default'];
        }
        return [
            "item" => $itemName,
            "number" => $num,
            "color" => $barColor
        ];
    }

    public function getMixChartObj($itemName, $barNum, $lineNum, $barColor = null)
    {
        if (is_null($barColor)) {
            $barColor =  GOLDENLIST_GRAPH_COLORS['chartColors']['default'];
        }
        return [
            "item" => $itemName,
            "number" => $barNum,
            "rate" => $this->getRate($lineNum),
            "color" => $barColor
        ];
    }

    public function getRate($num)
    {
        return round(($num * 100), 1);
    }

    public function isDisable($id, $data)
    {
        $key = array_search($id, array_column($data, 'master_classification_id'));

        if ($key) {
            if ($data[$key]['bodais_result_histogram'] || $data[$key]['bodais_result_decil_chart']) {
                return false;
            }
        }
        return true;
    }

    public function getDisable($id, $data)
    {
        return ($this->isDisable($id, $data)) ? 'disabled' : '';
    }

    public function getChartData($graphs)
    {
        $chartData = [];
        $data = $this->flattenGraph($graphs);

        foreach ($data as $graph) {
            $serialChart = [];
            $pie = [];
            if (!empty($graph['graph']['histgram'])) {
                $serialChart = $this->getSerialChart($graph['graph']['histgram']);
            }
            if (!empty($graph['graph']['decilChart'])) {
                $pie = $this->getPieChart($graph['graph']['decilChart']);
            }


            $meta = $this->getMeta($graph);

            $keyName = 'graph' . $graph['id'];
            $serialKeyName = 'serialChart' . $graph['id'];
            $pieChartKeyName = 'pieChart' . $graph['id'];
            $chartData[$keyName] = [
                'meta' => $meta,
                $serialKeyName => [
                    'dataProvider' => $serialChart,
                ],
                $pieChartKeyName => [
                    'dataProvider' => $pie,
                ],
            ];
        }
        return $chartData;
    }

    public function getSerialChart($graph)
    {
        $dataProvider = [];
        foreach ($graph->sample_count as $index => $data) {
            $dataProvider[] = [
                'item' => $graph->categories[$index]->str,
                'number' => $data,
                'rate' => $this->getRate($graph->answer_ratio[$index]),
                'color' => $this->getLineChartColor(),
            ];
        }
        return $dataProvider;
    }

    public function getPieChart($graph)
    {
        $sort = [];
        foreach ($graph->data as $index => $data) {
            $sort[] = $data;
            $dataProvider[] = [
                'item' => $graph->categories[$index]->str,
                'litres' => $data,
                'index' => $index,
                ];
        }
        array_multisort($sort, SORT_DESC, $dataProvider);
        // 配列を削除
        //array_splice($dataProvider, 5);
        $sort = [];
        foreach ($dataProvider as $index => $data) {
            $sort[] = $data['index'];
        }
        array_multisort($sort, SORT_ASC, $dataProvider);
        foreach ($dataProvider as $index => $data) {
            $dataProvider[$index]['color'] = $this->getPieChartColor($index);
        }
        return $dataProvider;
    }

    public function getLineChartColor()
    {
        return  GOLDENLIST_GRAPH_COLORS['chartColors']['default'];
    }

    public function getBarChartColor()
    {
        return  GOLDENLIST_GRAPH_COLORS['barChartColors']['default'];
    }

    public function getPieChartColor($index)
    {
        $list = GOLDENLIST_GRAPH_COLORS['pieColors'];
        $colorId = $index % count($list);
        return $list[$colorId];
    }

    public function getMeta($graph, $masterCategories = null)
    {
        return [
            'title' => $graph['name'],
            'unit' => ''
        ];
    }

    public function getNumWithPnSign($val) {
        $sign = ($val >= 0)? '+' : '';
        return $sign . $val;
    }

    public function getGraphCounts($goldenListLoyalCustomersEntity, $demoData = false)
    {
        if ($demoData) {
            $goldenListLoyalCustomersEntity = $demoData;
        }
        if (empty($goldenListLoyalCustomersEntity)) {
            return 0;
        }
        $counts = [
            count(json_decode($goldenListLoyalCustomersEntity->bodais_result_histogram)),
            count(json_decode($goldenListLoyalCustomersEntity->bodais_result_indicator )),
        ];
        return max($counts);
    }

}
