<?php
namespace GoldenList\Model\Entity;

use Cake\ORM\Entity;

/**
 * GoldenlistSidebarCallList Entity
 *
 * @property int $id
 * @property int $goldenlist_sidebar_project_id
 * @property int $master_call_list_id
 * @property string $call_list_name
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 *
 * @property \GoldenList\Model\Entity\GoldenlistSidebarProject $goldenlist_sidebar_project
 * @property \GoldenList\Model\Entity\MasterCallList $master_call_list
 */
class GoldenlistSidebarCallList extends Entity
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
