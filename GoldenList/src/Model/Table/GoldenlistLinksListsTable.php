<?php
namespace GoldenList\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GoldenlistLinksLists Model
 *
 * @method \GoldenList\Model\Entity\GoldenlistLinksList get($primaryKey, $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistLinksList newEntity($data = null, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistLinksList[] newEntities(array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistLinksList|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistLinksList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistLinksList[] patchEntities($entities, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\GoldenlistLinksList findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GoldenlistLinksListsTable extends Table
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

        $this->table('goldenlist_links_lists');
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
            ->requirePresence('link_title', 'create')
            ->notEmpty('link_title');

        $validator
            ->requirePresence('link_url', 'create')
            ->notEmpty('link_url');

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
