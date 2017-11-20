<?php
namespace GoldenList\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GoldenlistSidebarProjects Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MasterProjects
 * @property \Cake\ORM\Association\HasMany $GoldenlistSidebarCallLists
 *
 * @method \GoldenList\Model\Entity\GoldenlistSidebarProject get($primaryKey, $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistSidebarProject newEntity($data = null, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistSidebarProject[] newEntities(array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistSidebarProject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistSidebarProject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistSidebarProject[] patchEntities($entities, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistSidebarProject findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GoldenlistSidebarProjectsTable extends Table
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

        $this->table('goldenlist_sidebar_projects');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MasterProjects', [
            'foreignKey' => 'master_project_id',
            'className' => 'GoldenList.MasterProjects'
        ]);
        $this->hasMany('GoldenlistSidebarCallLists', [
            'foreignKey' => 'goldenlist_sidebar_project_id',
            'className' => 'GoldenList.GoldenlistSidebarCallLists'
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
