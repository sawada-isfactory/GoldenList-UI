<?php
namespace GoldenList\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EngineStatus Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MasterCallLists
 * @property \Cake\ORM\Association\BelongsTo $CallLists
 * @property \Cake\ORM\Association\BelongsTo $CsvFiles
 *
 * @method \GoldenList\Model\Entity\EngineStatus get($primaryKey, $options = [])
 * @method \GoldenList\Model\Entity\EngineStatus newEntity($data = null, array $options = [])
 * @method \GoldenList\Model\Entity\EngineStatus[] newEntities(array $data, array $options = [])
 * @method \GoldenList\Model\Entity\EngineStatus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \GoldenList\Model\Entity\EngineStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\EngineStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\EngineStatus findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EngineStatusTable extends Table
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

        $this->table('engine_status');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MasterCallLists', [
            'foreignKey' => 'master_call_list_id',
            'joinType' => 'INNER',
            'className' => 'GoldenList.MasterCallLists'
        ]);
        $this->belongsTo('CallLists', [
            'foreignKey' => 'call_list_id',
            'className' => 'GoldenList.CallLists'
        ]);
        $this->belongsTo('CsvFiles', [
            'foreignKey' => 'csv_file_id',
            'className' => 'GoldenList.CsvFiles'
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
            ->allowEmpty('model_name');

        $validator
            ->integer('engine_finish_flag')
            ->requirePresence('engine_finish_flag', 'create')
            ->notEmpty('engine_finish_flag');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->integer('is_error')
            ->requirePresence('is_error', 'create')
            ->notEmpty('is_error');

        $validator
            ->allowEmpty('error_message');

        $validator
            ->requirePresence('message', 'create')
            ->notEmpty('message');

        $validator
            ->dateTime('start_time_datetime')
            ->requirePresence('start_time_datetime', 'create')
            ->notEmpty('start_time_datetime');

        $validator
            ->dateTime('end_time_datetime')
            ->allowEmpty('end_time_datetime');

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
        $rules->add($rules->existsIn(['master_call_list_id'], 'MasterCallLists'));
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
