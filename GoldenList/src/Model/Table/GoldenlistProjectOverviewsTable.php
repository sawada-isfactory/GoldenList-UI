<?php
namespace GoldenList\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GoldenlistProjectOverviews Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MasterProjects
 * @property \Cake\ORM\Association\BelongsTo $MasterCallLists
 *
 * @method \GoldenList\Model\Entity\GoldenlistProjectOverview get($primaryKey, $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistProjectOverview newEntity($data = null, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistProjectOverview[] newEntities(array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistProjectOverview|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistProjectOverview patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistProjectOverview[] patchEntities($entities, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistProjectOverview findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GoldenlistProjectOverviewsTable extends Table
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

        $this->table('goldenlist_project_overviews');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MasterProjects', [
            'foreignKey' => 'master_project_id',
            'className' => 'GoldenList.MasterProjects'
        ]);
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
            ->requirePresence('project_name', 'create')
            ->notEmpty('project_name');

        $validator
            ->requirePresence('call_list_name', 'create')
            ->notEmpty('call_list_name');

        $validator
            ->integer('project_overview_list_number')
            ->requirePresence('project_overview_list_number', 'create')
            ->notEmpty('project_overview_list_number');

        $validator
            ->integer('project_overview_call_number')
            ->requirePresence('project_overview_call_number', 'create')
            ->notEmpty('project_overview_call_number');

        $validator
            ->numeric('project_overview_reach_rate')
            ->requirePresence('project_overview_reach_rate', 'create')
            ->notEmpty('project_overview_reach_rate');

        $validator
            ->integer('project_overview_reach_number')
            ->requirePresence('project_overview_reach_number', 'create')
            ->notEmpty('project_overview_reach_number');

        $validator
            ->numeric('project_overview_cv_rate_reached')
            ->requirePresence('project_overview_cv_rate_reached', 'create')
            ->notEmpty('project_overview_cv_rate_reached');

        $validator
            ->integer('project_overview_cv_number')
            ->requirePresence('project_overview_cv_number', 'create')
            ->notEmpty('project_overview_cv_number');

        $validator
            ->numeric('project_overview_cv_rate')
            ->requirePresence('project_overview_cv_rate', 'create')
            ->notEmpty('project_overview_cv_rate');

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

    public function findByMasterProjectId($masterProjectId)
    {
        return $this->find()
            ->where(['GoldenlistProjectOverviews.master_project_id' => $masterProjectId])
            ->contain(['MasterCallLists'])
            ->order(['MasterCallLists.created ASC'])
            ->all();
    }

}
