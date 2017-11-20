<?php
namespace GoldenList\Model\Entity;

use Cake\ORM\Entity;

/**
 * GoldenlistProjectOverview Entity
 *
 * @property int $id
 * @property string $project_name
 * @property int $master_project_id
 * @property int $master_call_list_id
 * @property string $call_list_name
 * @property int $project_overview_list_number
 * @property int $project_overview_call_number
 * @property float $project_overview_reach_rate
 * @property int $project_overview_reach_number
 * @property float $project_overview_cv_rate_reached
 * @property int $project_overview_cv_number
 * @property float $project_overview_cv_rate
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 *
 * @property \GoldenList\Model\Entity\MasterProject $master_project
 * @property \GoldenList\Model\Entity\MasterCallList $master_call_list
 */
class GoldenlistProjectOverview extends Entity
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
