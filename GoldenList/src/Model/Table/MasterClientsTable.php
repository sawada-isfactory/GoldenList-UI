<?php
namespace GoldenList\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MasterClients Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Groups
 * @property \Cake\ORM\Association\HasMany $GoldenlistSidebarProjects
 *
 * @method \GoldenList\Model\Entity\MasterClient get($primaryKey, $options = [])
 * @method \GoldenList\Model\Entity\MasterClient newEntity($data = null, array $options = [])
 * @method \GoldenList\Model\Entity\MasterClient[] newEntities(array $data, array $options = [])
 * @method \GoldenList\Model\Entity\MasterClient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \GoldenList\Model\Entity\MasterClient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\MasterClient[] patchEntities($entities, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\MasterClient findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MasterClientsTable extends Table
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

        $this->table('master_clients');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->requirePresence('client_name', 'create')
            ->notEmpty('client_name');

        $validator
            ->integer('projects_number')
            ->allowEmpty('projects_number');

        $validator
            ->integer('cutomized_projects_number')
            ->allowEmpty('cutomized_projects_number');

        $validator
            ->integer('call_lists_number')
            ->allowEmpty('call_lists_number');

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
