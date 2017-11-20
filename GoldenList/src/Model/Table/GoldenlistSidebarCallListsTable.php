<?php
namespace GoldenList\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GoldenlistSidebarCallLists Model
 *
 * @property \Cake\ORM\Association\BelongsTo $GoldenlistSidebarProjects
 * @property \Cake\ORM\Association\BelongsTo $MasterCallLists
 *
 * @method \GoldenList\Model\Entity\GoldenlistSidebarCallList get($primaryKey, $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistSidebarCallList newEntity($data = null, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistSidebarCallList[] newEntities(array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistSidebarCallList|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistSidebarCallList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistSidebarCallList[] patchEntities($entities, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistSidebarCallList findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GoldenlistSidebarCallListsTable extends Table
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

        $this->table('goldenlist_sidebar_call_lists');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('GoldenlistSidebarProjects', [
            'foreignKey' => 'goldenlist_sidebar_project_id',
            'joinType' => 'INNER',
            'className' => 'GoldenList.GoldenlistSidebarProjects'
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
            ->requirePresence('call_list_name', 'create')
            ->notEmpty('call_list_name');

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
        $rules->add($rules->existsIn(['goldenlist_sidebar_project_id'], 'GoldenlistSidebarProjects'));
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
