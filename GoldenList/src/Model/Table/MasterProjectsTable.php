<?php
namespace GoldenList\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;

/**
 * MasterProjects Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ClientsMasters
 * @property \Cake\ORM\Association\BelongsTo $Projects
 * @property \Cake\ORM\Association\BelongsTo $AnalysisSettingFilesMasters
 * @property \Cake\ORM\Association\HasMany $BodaisStatusModels
 * @property \Cake\ORM\Association\HasMany $BodaisStatusPredictions
 * @property \Cake\ORM\Association\HasMany $GoldenlistLoyalCustomerIndicators
 * @property \Cake\ORM\Association\HasMany $GoldenlistLoyalCustomers
 * @property \Cake\ORM\Association\HasMany $GoldenlistProjectOverviews
 * @property \Cake\ORM\Association\HasMany $GoldenlistSidebarCallLists
 * @property \Cake\ORM\Association\HasMany $GoldenlistSidebarProjects
 * @property \Cake\ORM\Association\HasMany $MasterCallLists
 * @property \Cake\ORM\Association\HasMany $ResultRawDecilChartsData
 * @property \Cake\ORM\Association\HasMany $ResultRawHistogramsData
 * @property \Cake\ORM\Association\HasMany $ResultRawIndicatorsLists
 *
 * @method \GoldenList\Model\Entity\MasterProject get($primaryKey, $options = [])
 * @method \GoldenList\Model\Entity\MasterProject newEntity($data = null, array $options = [])
 * @method \GoldenList\Model\Entity\MasterProject[] newEntities(array $data, array $options = [])
 * @method \GoldenList\Model\Entity\MasterProject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \GoldenList\Model\Entity\MasterProject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\MasterProject[] patchEntities($entities, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\MasterProject findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MasterProjectsTable extends Table
{
    use SoftDeleteTrait;

    protected $softDeleteField = 'deleted';

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('master_projects');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('BodaisStatusModels', [
            'foreignKey' => 'master_project_id',
            'className' => 'GoldenList.BodaisStatusModels'
        ]);
        $this->hasMany('BodaisStatusPredictions', [
            'foreignKey' => 'master_project_id',
            'className' => 'GoldenList.BodaisStatusPredictions'
        ]);
        $this->hasOne('GoldenlistLoyalCustomers', [
            'foreignKey' => 'master_project_id',
            'className' => 'GoldenList.GoldenlistLoyalCustomers'
        ]);
        $this->hasOne('GoldenlistProjectOverviews', [
            'foreignKey' => 'master_project_id',
            'className' => 'GoldenList.GoldenlistProjectOverviews'
        ]);
        $this->hasMany('GoldenlistSidebarCallLists', [
            'foreignKey' => 'master_project_id',
            'className' => 'GoldenList.GoldenlistSidebarCallLists'
        ]);
        $this->hasOne('GoldenlistSidebarProjects', [
            'foreignKey' => 'master_project_id',
            'className' => 'GoldenList.GoldenlistSidebarProjects',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->hasOne('ExportFileReportFiles', [
            'foreignKey' => 'master_project_id',
            'className' => 'GoldenList.ExportFileReportFiles',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->hasMany('MasterCallLists', [
            'foreignKey' => 'master_project_id',
            'className' => 'GoldenList.MasterCallLists'
        ]);

        $this->belongsTo('MasterClients', [
            'foreignKey' => 'clients_master_id',
            'joinType' => 'INNER',
            'className' => 'GoldenList.MasterClients'
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
            ->integer('customize_flag')
            ->allowEmpty('customize_flag');

        $validator
            ->time('start_time_am')
            ->requirePresence('start_time_am', 'create')
            ->notEmpty('start_time_am');

        $validator
            ->time('start_time_pm')
            ->requirePresence('start_time_pm', 'create')
            ->notEmpty('start_time_pm');

        $validator
            ->time('start_time_night')
            ->requirePresence('start_time_night', 'create')
            ->notEmpty('start_time_night');

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

    public function afterSave($event, $entity, $options)
    {
        $this->query()->update()
            ->set(['project_id' =>  $entity->id])
            ->where(['id' => $entity->id])
            ->execute();

        $this->GoldenlistProjectOverviews->query()->update()
            ->set(['project_name' => $entity->project_name])
            ->where(['master_project_id' => $entity->id])
            ->execute();

        $this->GoldenlistLoyalCustomers->query()->update()
            ->set(['project_name' => $entity->project_name])
            ->where(['master_project_id' => $entity->id])
            ->execute();
    }

}
