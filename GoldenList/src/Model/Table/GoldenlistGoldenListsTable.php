<?php
namespace GoldenList\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GoldenlistGoldenLists Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MasterCallLists
 *
 * @method \GoldenList\Model\Entity\GoldenlistGoldenList get($primaryKey, $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistGoldenList newEntity($data = null, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistGoldenList[] newEntities(array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistGoldenList|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistGoldenList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistGoldenList[] patchEntities($entities, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistGoldenList findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GoldenlistGoldenListsTable extends Table
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

        $this->table('goldenlist_golden_lists');
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
            ->requirePresence('call_list_name', 'create')
            ->notEmpty('call_list_name');

        $validator
            ->dateTime('overview_create_date_time')
            ->requirePresence('overview_create_date_time', 'create')
            ->notEmpty('overview_create_date_time');

        $validator
            ->integer('overview_list_number')
            ->requirePresence('overview_list_number', 'create')
            ->notEmpty('overview_list_number');

        $validator
            ->integer('overview_expected_reach_number')
            ->requirePresence('overview_expected_reach_number', 'create')
            ->notEmpty('overview_expected_reach_number');

        $validator
            ->integer('overview_list_potential')
            ->requirePresence('overview_list_potential', 'create')
            ->notEmpty('overview_list_potential');

        $validator
            ->integer('cv_target_number')
            ->requirePresence('cv_target_number', 'create')
            ->notEmpty('cv_target_number');

        $validator
            ->integer('overview_sufficient_reach_number')
            ->requirePresence('overview_sufficient_reach_number', 'create')
            ->notEmpty('overview_sufficient_reach_number');

        $validator
            ->integer('overview_sufficient_call_number')
            ->requirePresence('overview_sufficient_call_number', 'create')
            ->notEmpty('overview_sufficient_call_number');

        $validator
            ->integer('call_program_list_number_all')
            ->requirePresence('call_program_list_number_all', 'create')
            ->notEmpty('call_program_list_number_all');

        $validator
            ->integer('call_program_list_number_wd_am')
            ->requirePresence('call_program_list_number_wd_am', 'create')
            ->notEmpty('call_program_list_number_wd_am');

        $validator
            ->integer('call_program_list_number_wd_pm')
            ->requirePresence('call_program_list_number_wd_pm', 'create')
            ->notEmpty('call_program_list_number_wd_pm');

        $validator
            ->integer('call_program_list_number_wd_night')
            ->requirePresence('call_program_list_number_wd_night', 'create')
            ->notEmpty('call_program_list_number_wd_night');

        $validator
            ->integer('call_program_list_number_hd_am')
            ->requirePresence('call_program_list_number_hd_am', 'create')
            ->notEmpty('call_program_list_number_hd_am');

        $validator
            ->integer('call_program_list_number_hd_pm')
            ->requirePresence('call_program_list_number_hd_pm', 'create')
            ->notEmpty('call_program_list_number_hd_pm');

        $validator
            ->integer('call_program_list_number_hd_night')
            ->requirePresence('call_program_list_number_hd_night', 'create')
            ->notEmpty('call_program_list_number_hd_night');

        $validator
            ->numeric('call_program_reach_rate_all')
            ->requirePresence('call_program_reach_rate_all', 'create')
            ->notEmpty('call_program_reach_rate_all');

        $validator
            ->numeric('call_program_reach_rate_wd_am')
            ->requirePresence('call_program_reach_rate_wd_am', 'create')
            ->notEmpty('call_program_reach_rate_wd_am');

        $validator
            ->numeric('call_program_reach_rate_wd_pm')
            ->requirePresence('call_program_reach_rate_wd_pm', 'create')
            ->notEmpty('call_program_reach_rate_wd_pm');

        $validator
            ->numeric('call_program_reach_rate_wd_night')
            ->requirePresence('call_program_reach_rate_wd_night', 'create')
            ->notEmpty('call_program_reach_rate_wd_night');

        $validator
            ->numeric('call_program_reach_rate_hd_am')
            ->requirePresence('call_program_reach_rate_hd_am', 'create')
            ->notEmpty('call_program_reach_rate_hd_am');

        $validator
            ->numeric('call_program_reach_rate_hd_pm')
            ->requirePresence('call_program_reach_rate_hd_pm', 'create')
            ->notEmpty('call_program_reach_rate_hd_pm');

        $validator
            ->numeric('call_program_reach_rate_hd_night')
            ->requirePresence('call_program_reach_rate_hd_night', 'create')
            ->notEmpty('call_program_reach_rate_hd_night');

        $validator
            ->integer('call_program_expected_reach_number_all')
            ->requirePresence('call_program_expected_reach_number_all', 'create')
            ->notEmpty('call_program_expected_reach_number_all');

        $validator
            ->integer('call_program_expected_reach_number_wd_am')
            ->requirePresence('call_program_expected_reach_number_wd_am', 'create')
            ->notEmpty('call_program_expected_reach_number_wd_am');

        $validator
            ->integer('call_program_expected_reach_number_wd_pm')
            ->requirePresence('call_program_expected_reach_number_wd_pm', 'create')
            ->notEmpty('call_program_expected_reach_number_wd_pm');

        $validator
            ->integer('call_program_expected_reach_number_wd_night')
            ->requirePresence('call_program_expected_reach_number_wd_night', 'create')
            ->notEmpty('call_program_expected_reach_number_wd_night');

        $validator
            ->integer('call_program_expected_reach_number_hd_am')
            ->requirePresence('call_program_expected_reach_number_hd_am', 'create')
            ->notEmpty('call_program_expected_reach_number_hd_am');

        $validator
            ->integer('call_program_expected_reach_number_hd_pm')
            ->requirePresence('call_program_expected_reach_number_hd_pm', 'create')
            ->notEmpty('call_program_expected_reach_number_hd_pm');

        $validator
            ->integer('call_program_expected_reach_number_hd_night')
            ->requirePresence('call_program_expected_reach_number_hd_night', 'create')
            ->notEmpty('call_program_expected_reach_number_hd_night');

        $validator
            ->numeric('call_program_expected_cv_rate_reached_all')
            ->requirePresence('call_program_expected_cv_rate_reached_all', 'create')
            ->notEmpty('call_program_expected_cv_rate_reached_all');

        $validator
            ->numeric('call_program_expected_cv_rate_reached_wd_am')
            ->requirePresence('call_program_expected_cv_rate_reached_wd_am', 'create')
            ->notEmpty('call_program_expected_cv_rate_reached_wd_am');

        $validator
            ->numeric('call_program_expected_cv_rate_reached_wd_pm')
            ->requirePresence('call_program_expected_cv_rate_reached_wd_pm', 'create')
            ->notEmpty('call_program_expected_cv_rate_reached_wd_pm');

        $validator
            ->numeric('call_program_expected_cv_rate_reached_wd_night')
            ->requirePresence('call_program_expected_cv_rate_reached_wd_night', 'create')
            ->notEmpty('call_program_expected_cv_rate_reached_wd_night');

        $validator
            ->numeric('call_program_expected_cv_rate_reached_hd_am')
            ->requirePresence('call_program_expected_cv_rate_reached_hd_am', 'create')
            ->notEmpty('call_program_expected_cv_rate_reached_hd_am');

        $validator
            ->numeric('call_program_expected_cv_rate_reached_hd_pm')
            ->requirePresence('call_program_expected_cv_rate_reached_hd_pm', 'create')
            ->notEmpty('call_program_expected_cv_rate_reached_hd_pm');

        $validator
            ->numeric('call_program_expected_cv_rate_reached_hd_night')
            ->requirePresence('call_program_expected_cv_rate_reached_hd_night', 'create')
            ->notEmpty('call_program_expected_cv_rate_reached_hd_night');

        $validator
            ->integer('call_program_expected_cv_number_all')
            ->requirePresence('call_program_expected_cv_number_all', 'create')
            ->notEmpty('call_program_expected_cv_number_all');

        $validator
            ->integer('call_program_expected_cv_number_wd_am')
            ->requirePresence('call_program_expected_cv_number_wd_am', 'create')
            ->notEmpty('call_program_expected_cv_number_wd_am');

        $validator
            ->integer('call_program_expected_cv_number_wd_pm')
            ->requirePresence('call_program_expected_cv_number_wd_pm', 'create')
            ->notEmpty('call_program_expected_cv_number_wd_pm');

        $validator
            ->integer('call_program_expected_cv_number_wd_night')
            ->requirePresence('call_program_expected_cv_number_wd_night', 'create')
            ->notEmpty('call_program_expected_cv_number_wd_night');

        $validator
            ->integer('call_program_expected_cv_number_hd_am')
            ->requirePresence('call_program_expected_cv_number_hd_am', 'create')
            ->notEmpty('call_program_expected_cv_number_hd_am');

        $validator
            ->integer('call_program_expected_cv_number_hd_pm')
            ->requirePresence('call_program_expected_cv_number_hd_pm', 'create')
            ->notEmpty('call_program_expected_cv_number_hd_pm');

        $validator
            ->integer('call_program_expected_cv_number_hd_night')
            ->requirePresence('call_program_expected_cv_number_hd_night', 'create')
            ->notEmpty('call_program_expected_cv_number_hd_night');

        $validator
            ->numeric('call_program_expected_cv_rate_all')
            ->requirePresence('call_program_expected_cv_rate_all', 'create')
            ->notEmpty('call_program_expected_cv_rate_all');

        $validator
            ->numeric('call_program_expected_cv_rate_wd_am')
            ->requirePresence('call_program_expected_cv_rate_wd_am', 'create')
            ->notEmpty('call_program_expected_cv_rate_wd_am');

        $validator
            ->numeric('call_program_expected_cv_rate_wd_pm')
            ->requirePresence('call_program_expected_cv_rate_wd_pm', 'create')
            ->notEmpty('call_program_expected_cv_rate_wd_pm');

        $validator
            ->numeric('call_program_expected_cv_rate_wd_night')
            ->requirePresence('call_program_expected_cv_rate_wd_night', 'create')
            ->notEmpty('call_program_expected_cv_rate_wd_night');

        $validator
            ->numeric('call_program_expected_cv_rate_hd_am')
            ->requirePresence('call_program_expected_cv_rate_hd_am', 'create')
            ->notEmpty('call_program_expected_cv_rate_hd_am');

        $validator
            ->numeric('call_program_expected_cv_rate_hd_pm')
            ->requirePresence('call_program_expected_cv_rate_hd_pm', 'create')
            ->notEmpty('call_program_expected_cv_rate_hd_pm');

        $validator
            ->numeric('call_program_expected_cv_rate_hd_night')
            ->requirePresence('call_program_expected_cv_rate_hd_night', 'create')
            ->notEmpty('call_program_expected_cv_rate_hd_night');

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

    public function findByMasterCallListId($masterCallListId)
    {
        return $this->find()
            ->where(['master_call_list_id' => $masterCallListId])
            ->order(['modified DESC'])
            ->first();
    }

}
