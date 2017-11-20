<?php
namespace GoldenList\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GoldenlistLoyalCustomers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MasterProjects
 *
 * @method \GoldenList\Model\Entity\GoldenlistLoyalCustomer get($primaryKey, $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistLoyalCustomer newEntity($data = null, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistLoyalCustomer[] newEntities(array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistLoyalCustomer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistLoyalCustomer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistLoyalCustomer[] patchEntities($entities, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistLoyalCustomer findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GoldenlistLoyalCustomersTable extends Table
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

        $this->table('goldenlist_loyal_customers');
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
            ->requirePresence('project_name', 'create')
            ->notEmpty('project_name');

        $validator
            ->requirePresence('bodais_result_histogram', 'create')
            ->notEmpty('bodais_result_histogram');

        $validator
            ->requirePresence('bodais_result_decil_chart', 'create')
            ->notEmpty('bodais_result_decil_chart');

        $validator
            ->requirePresence('bodais_result_indicator', 'create')
            ->notEmpty('bodais_result_indicator');

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


    public function findByMasterProjectId($masterProjectId)
    {
        return $this->find()
            ->where(['master_project_id' => $masterProjectId])
            ->order(['modified DESC'])
            ->first();
    }
}
