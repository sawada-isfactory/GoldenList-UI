<?php
namespace GoldenList\Model\Entity;

use Cake\ORM\Entity;

/**
 * MasterCallList Entity
 *
 * @property int $id
 * @property int $master_project_id
 * @property int $call_list_id
 * @property string $call_list_unique_name
 * @property string $call_list_name
 * @property int $cv_target_number
 * @property int $cap_wd_am
 * @property int $cap_wd_pm
 * @property int $cap_wd_night
 * @property int $cap_hd_am
 * @property int $cap_hd_pm
 * @property int $cap_hd_night
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 *
 * @property \GoldenList\Model\Entity\MasterProject $master_project
 * @property \GoldenList\Model\Entity\CallList $call_list
 * @property \GoldenList\Model\Entity\AnalysisMainItem[] $analysis_main_items
 * @property \GoldenList\Model\Entity\BodaisStatusModel[] $bodais_status_models
 * @property \GoldenList\Model\Entity\BodaisStatusPrediction[] $bodais_status_predictions
 * @property \GoldenList\Model\Entity\CsvFile[] $csv_files
 * @property \GoldenList\Model\Entity\EngineStatus[] $engine_status
 * @property \GoldenList\Model\Entity\GoldenlistGoldenList[] $goldenlist_golden_lists
 * @property \GoldenList\Model\Entity\GoldenlistProjectOverview[] $goldenlist_project_overviews
 * @property \GoldenList\Model\Entity\GoldenlistSidebarCallList[] $goldenlist_sidebar_call_lists
 * @property \GoldenList\Model\Entity\ResultCompTimeBoxFlag[] $result_comp_time_box_flags
 * @property \GoldenList\Model\Entity\ResultRawScoresList[] $result_raw_scores_lists
 */
class MasterCallList extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
