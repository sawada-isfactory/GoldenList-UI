<?php
namespace GoldenList\View\Helper;

use Cake\Core\Configure;
use Cake\View\Helper;
use Cake\View\View;

/**
 * Indicator helper
 */
class IndicatorHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function getFactorList($loyalList)
    {
        $indicatorList = $this->getFactorBase();
        foreach ($loyalList as $indicator) {
            $score = $indicator->factor_analysis_inner_rank;
            $impact = $this->getFactorImpact($score);
            $bipolar = $this->getPositiveOrNegative($score);
            $indicatorList[$impact][$bipolar][] = $this->getFactorStr($indicator, $score);
        }
        return $indicatorList;
    }

    public function getFactorBase()
    {
        $arr = $this->getFactorAnalysisImpactList();
        $bipolars = [
            GOLDENLIST_POSITIVE,
            GOLDENLIST_NEGATIVE
        ];
        $factorBase = [];
        foreach ($arr as $key => $val) {
            foreach ($bipolars as $bipolar) {
                $factorBase[$key][$bipolar] = [];
            }
        }
        return $factorBase;
    }

    public function getFactorStr($indicator, $score)
    {
        $updown = ($this->isPositive($score))? '上がります' : '下がります';
        return sprintf("%sが%sだとスコアが%s",
            $indicator->factor_analysis_classification_name,
            $indicator->factor_analysis_category_name,
            $updown
        );
    }

    public function getFactorImpact($value)
    {
        $impactList = $this->getFactorAnalysisImpactList();
        switch (true) {
            case ($impactList['strong'] <= $value):
                return 'strong';
            case ($impactList['medium'] <= $value):
                return 'medium';
            default:
                return 'thin';
        }
    }

    public function isPositive($score)
    {
        return $score >= 0;
    }
    public function getPositiveOrNegative($score)
    {
        return $this->isPositive($score)? GOLDENLIST_POSITIVE : GOLDENLIST_NEGATIVE;
    }

    public function getFactorAnalysisImpactList()
    {
        return GOLDENLIST_FACTOR_ANALYSYS_IMPACT;
    }

    public function getFactorTitle($str)
    {
        return GOLDENLIST_FACTOR_ANALYSYS_IMPACT_STRS[$str];
    }

    public function getBipolarStyle($bipolar)
    {
        return GOLDENLIST_BIPOLAR_COLOR[$bipolar];
    }

    public function getAcordionClass($index)
    {
        $arr = [
            '1' => [
                'id' => 11,
                'str' => 'One'
            ],
            '2' => [
                'id' => 12,
                'str' => 'Two'
            ],
            '3' => [
                'id' => 13,
                'str' => 'Three'
            ]
        ];
        return $arr[$index];
    }
}
