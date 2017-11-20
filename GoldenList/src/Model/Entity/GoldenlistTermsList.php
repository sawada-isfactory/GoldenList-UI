<?php
namespace GoldenList\Model\Entity;

use Cake\ORM\Entity;

/**
 * GoldenlistTermsList Entity
 *
 * @property int $id
 * @property string $term_value
 * @property string $term_value_short
 * @property string $term_mean
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 */
class GoldenlistTermsList extends Entity
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
