<?php
namespace GoldenList\Model\Entity;

use Cake\ORM\Entity;

/**
 * MasterProject Entity
 *
 * @property int $id
 * @property int $clients_master_id
 * @property int $project_id
 * @property string $project_name
 * @property int $analysis_setting_files_master_id
 * @property int $customize_flag
 * @property \Cake\I18n\Time $start_time_am
 * @property \Cake\I18n\Time $start_time_pm
 * @property \Cake\I18n\Time $start_time_night
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 *
 * @property \GoldenList\Model\Entity\ClientsMaster $clients_master
 * @property \GoldenList\Model\Entity\Project $project
 * @property \GoldenList\Model\Entity\AnalysisSettingFilesMaster $analysis_setting_files_master
 * @property \GoldenList\Model\Entity\BodaisStatusModel[] $bodais_status_models
 * @property \GoldenList\Model\Entity\BodaisStatusPrediction[] $bodais_status_predictions
 * @property \GoldenList\Model\Entity\GoldenlistLoyalCustomerIndicator[] $goldenlist_loyal_customer_indicators
 * @property \GoldenList\Model\Entity\GoldenlistLoyalCustomer[] $goldenlist_loyal_customers
 * @property \GoldenList\Model\Entity\GoldenlistProjectOverview[] $goldenlist_project_overviews
 * @property \GoldenList\Model\Entity\GoldenlistSidebarCallList[] $goldenlist_sidebar_call_lists
 * @property \GoldenList\Model\Entity\GoldenlistSidebarProject $goldenlist_sidebar_project
 * @property \GoldenList\Model\Entity\MasterCallList[] $master_call_lists
 */
class MasterProject extends Entity
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
