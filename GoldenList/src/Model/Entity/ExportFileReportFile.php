<?php
namespace GoldenList\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExportFileReportFile Entity
 *
 * @property int $id
 * @property int $master_project_id
 * @property string $filename
 * @property string|resource $data
 * @property string $content_kind
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 *
 * @property \GoldenList\Model\Entity\MasterProject $master_project
 */
class ExportFileReportFile extends Entity
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
