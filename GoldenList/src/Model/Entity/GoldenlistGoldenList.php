<?php
namespace GoldenList\Model\Entity;

use Cake\ORM\Entity;

/**
 * GoldenlistGoldenList Entity
 *
 * @property int $id
 * @property int $master_call_list_id
 * @property string $call_list_name
 * @property \Cake\I18n\Time $overview_create_date_time
 * @property int $overview_list_number
 * @property int $overview_expected_reach_number
 * @property int $overview_list_potential
 * @property int $cv_target_number
 * @property int $overview_sufficient_reach_number
 * @property int $overview_sufficient_call_number
 * @property int $call_program_list_number_all
 * @property int $call_program_list_number_wd_am
 * @property int $call_program_list_number_wd_pm
 * @property int $call_program_list_number_wd_night
 * @property int $call_program_list_number_hd_am
 * @property int $call_program_list_number_hd_pm
 * @property int $call_program_list_number_hd_night
 * @property float $call_program_reach_rate_all
 * @property float $call_program_reach_rate_wd_am
 * @property float $call_program_reach_rate_wd_pm
 * @property float $call_program_reach_rate_wd_night
 * @property float $call_program_reach_rate_hd_am
 * @property float $call_program_reach_rate_hd_pm
 * @property float $call_program_reach_rate_hd_night
 * @property int $call_program_expected_reach_number_all
 * @property int $call_program_expected_reach_number_wd_am
 * @property int $call_program_expected_reach_number_wd_pm
 * @property int $call_program_expected_reach_number_wd_night
 * @property int $call_program_expected_reach_number_hd_am
 * @property int $call_program_expected_reach_number_hd_pm
 * @property int $call_program_expected_reach_number_hd_night
 * @property float $call_program_expected_cv_rate_reached_all
 * @property float $call_program_expected_cv_rate_reached_wd_am
 * @property float $call_program_expected_cv_rate_reached_wd_pm
 * @property float $call_program_expected_cv_rate_reached_wd_night
 * @property float $call_program_expected_cv_rate_reached_hd_am
 * @property float $call_program_expected_cv_rate_reached_hd_pm
 * @property float $call_program_expected_cv_rate_reached_hd_night
 * @property int $call_program_expected_cv_number_all
 * @property int $call_program_expected_cv_number_wd_am
 * @property int $call_program_expected_cv_number_wd_pm
 * @property int $call_program_expected_cv_number_wd_night
 * @property int $call_program_expected_cv_number_hd_am
 * @property int $call_program_expected_cv_number_hd_pm
 * @property int $call_program_expected_cv_number_hd_night
 * @property float $call_program_expected_cv_rate_all
 * @property float $call_program_expected_cv_rate_wd_am
 * @property float $call_program_expected_cv_rate_wd_pm
 * @property float $call_program_expected_cv_rate_wd_night
 * @property float $call_program_expected_cv_rate_hd_am
 * @property float $call_program_expected_cv_rate_hd_pm
 * @property float $call_program_expected_cv_rate_hd_night
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 *
 * @property \GoldenList\Model\Entity\MasterCallList $master_call_list
 */
class GoldenlistGoldenList extends Entity
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
