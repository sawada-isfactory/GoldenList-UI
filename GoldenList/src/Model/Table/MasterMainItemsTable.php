<?php
namespace GoldenList\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MasterMainItems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MasterItemGroups
 *
 * @method \GoldenList\Model\Entity\MasterMainItem get($primaryKey, $options = [])
 * @method \GoldenList\Model\Entity\MasterMainItem newEntity($data = null, array $options = [])
 * @method \GoldenList\Model\Entity\MasterMainItem[] newEntities(array $data, array $options = [])
 * @method \GoldenList\Model\Entity\MasterMainItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \GoldenList\Model\Entity\MasterMainItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\MasterMainItem[] patchEntities($entities, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\MasterMainItem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MasterMainItemsTable extends Table
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

        $this->table('master_main_items');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MasterItemGroups', [
            'foreignKey' => 'master_item_group_id',
            'className' => 'GoldenList.MasterItemGroups'
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
            ->requirePresence('call_list_col_name', 'create')
            ->notEmpty('call_list_col_name');

        $validator
            ->requirePresence('call_list_col_num', 'create')
            ->notEmpty('call_list_col_num');

        $validator
            ->allowEmpty('bodais_report_col_num');

        $validator
            ->allowEmpty('unit');

        $validator
            ->requirePresence('field_name', 'create')
            ->notEmpty('field_name');

        $validator
            ->requirePresence('attribute', 'create')
            ->notEmpty('attribute');

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
        $rules->add($rules->existsIn(['master_item_group_id'], 'MasterItemGroups'));

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
