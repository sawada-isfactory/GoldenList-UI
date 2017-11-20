<?php
namespace GoldenList\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MasterItemGroups Model
 *
 * @property \Cake\ORM\Association\HasMany $MasterMainItems
 *
 * @method \GoldenList\Model\Entity\MasterItemGroup get($primaryKey, $options = [])
 * @method \GoldenList\Model\Entity\MasterItemGroup newEntity($data = null, array $options = [])
 * @method \GoldenList\Model\Entity\MasterItemGroup[] newEntities(array $data, array $options = [])
 * @method \GoldenList\Model\Entity\MasterItemGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \GoldenList\Model\Entity\MasterItemGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\MasterItemGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\MasterItemGroup findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MasterItemGroupsTable extends Table
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

        $this->table('master_item_groups');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('MasterMainItems', [
            'foreignKey' => 'master_item_group_id',
            'className' => 'GoldenList.MasterMainItems'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        return $validator;
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
