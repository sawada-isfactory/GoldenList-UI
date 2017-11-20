<?php
namespace GoldenList\Model\Entity;

use Cake\ORM\Entity;

/**
 * EngineStatus Entity
 *
 * @property int $id
 * @property int $master_call_list_id
 * @property string $model_name
 * @property int $call_list_id
 * @property int $engine_finish_flag
 * @property int $csv_file_id
 * @property string $status
 * @property int $is_error
 * @property string $error_message
 * @property string $message
 * @property \Cake\I18n\Time $start_time_datetime
 * @property \Cake\I18n\Time $end_time_datetime
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 *
 * @property \GoldenList\Model\Entity\MasterCallList $master_call_list
 * @property \GoldenList\Model\Entity\CallList $call_list
 * @property \GoldenList\Model\Entity\CsvFile $csv_file
 */
class EngineStatus extends Entity
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
