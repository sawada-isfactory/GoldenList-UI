<?php
namespace GoldenList\Model\Entity;

use Cake\ORM\Entity;

/**
 * MasterClient Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $group_id
 * @property string $client_name
 * @property int $projects_number
 * @property int $cutomized_projects_number
 * @property int $call_lists_number
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 *
 * @property \GoldenList\Model\Entity\User $user
 * @property \GoldenList\Model\Entity\Group $group
 * @property \GoldenList\Model\Entity\GoldenlistSidebarProject[] $goldenlist_sidebar_projects
 */
class MasterClient extends Entity
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
