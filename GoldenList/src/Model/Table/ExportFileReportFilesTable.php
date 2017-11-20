<?php
namespace GoldenList\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExportFileReportFiles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MasterProjects
 *
 * @method \GoldenList\Model\Entity\ExportFileReportFile get($primaryKey, $options = [])
 * @method \GoldenList\Model\Entity\ExportFileReportFile newEntity($data = null, array $options = [])
 * @method \GoldenList\Model\Entity\ExportFileReportFile[] newEntities(array $data, array $options = [])
 * @method \GoldenList\Model\Entity\ExportFileReportFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \GoldenList\Model\Entity\ExportFileReportFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\ExportFileReportFile[] patchEntities($entities, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\ExportFileReportFile findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExportFileReportFilesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('export_file_report_files');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MasterProjects', [
            'foreignKey' => 'master_project_id',
            'joinType' => 'INNER',
            'className' => 'GoldenList.MasterProjects'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('filename', 'create')
            ->notEmpty('filename');

        $validator
            ->requirePresence('data', 'create')
            ->notEmpty('data');

        $validator
            ->requirePresence('content_kind', 'create')
            ->notEmpty('content_kind');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['master_project_id'], 'MasterProjects'));

        return $rules;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'GoldenList';
    }
}
