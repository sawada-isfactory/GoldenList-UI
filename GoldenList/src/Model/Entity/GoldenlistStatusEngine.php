<?php
namespace GoldenList\Model\Entity;

use Cake\ORM\Entity;

/**
 * GoldenlistStatusEngine Entity
 *
 * @property int $id
 * @property int $master_call_list_id
 * @property string $upload_file_name
 * @property int $engine_finish_flag
 * @property string $status
 * @property int $progress_step
 * @property string $message
 * @property \Cake\I18n\Time $start_time_datetime
 * @property \Cake\I18n\Time $end_time_datetime
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 */
class GoldenlistStatusEngine extends Entity
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
