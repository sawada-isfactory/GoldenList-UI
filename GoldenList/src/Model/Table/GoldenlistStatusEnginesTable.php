<?php
namespace GoldenList\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GoldenlistStatusEngines Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MasterCallLists
 *
 * @method \GoldenList\Model\Entity\GoldenlistStatusEngine get($primaryKey, $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistStatusEngine newEntity($data = null, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistStatusEngine[] newEntities(array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistStatusEngine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistStatusEngine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistStatusEngine[] patchEntities($entities, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistStatusEngine findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GoldenlistStatusEnginesTable extends Table
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

        $this->table('goldenlist_status_engines');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MasterCallLists', [
            'foreignKey' => 'master_call_list_id',
            'joinType' => 'INNER',
            'className' => 'GoldenList.MasterCallLists'
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
            ->allowEmpty('upload_file_name');

        $validator
            ->integer('engine_finish_flag')
            ->allowEmpty('engine_finish_flag');

        $validator
            ->allowEmpty('status');

        $validator
            ->integer('progress_step')
            ->allowEmpty('progress_step');

        $validator
            ->allowEmpty('message');

        $validator
            ->dateTime('start_time_datetime')
            ->allowEmpty('start_time_datetime');

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
