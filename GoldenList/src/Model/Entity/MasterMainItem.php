<?php
namespace GoldenList\Model\Entity;

use Cake\ORM\Entity;

/**
 * MasterMainItem Entity
 *
 * @property int $id
 * @property string $call_list_col_name
 * @property int $call_list_col_num
 * @property int $bodais_report_col_num
 * @property int $master_item_group_id
 * @property string $unit
 * @property string $field_name
 * @property string $attribute
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 *
 * @property \GoldenList\Model\Entity\MasterItemGroup $master_item_group
 */
class MasterMainItem extends Entity
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
