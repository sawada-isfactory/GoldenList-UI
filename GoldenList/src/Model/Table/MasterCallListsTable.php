<?php
namespace GoldenList\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Hash;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;

/**
 * MasterCallLists Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MasterProjects
 * @property \Cake\ORM\Association\HasMany $AnalysisMainItems
 * @property \Cake\ORM\Association\HasMany $BodaisStatusModels
 * @property \Cake\ORM\Association\HasMany $BodaisStatusPredictions
 * @property \Cake\ORM\Association\HasMany $CsvFiles
 * @property \Cake\ORM\Association\HasMany $EngineStatus
 * @property \Cake\ORM\Association\HasMany $GoldenlistGoldenLists
 * @property \Cake\ORM\Association\HasMany $GoldenlistProjectOverviews
 * @property \Cake\ORM\Association\HasOne $GoldenlistSidebarCallLists
 * @property \Cake\ORM\Association\HasOne ExportFileCallListFiles
 *
 * @method \GoldenList\Model\Entity\MasterCallList get($primaryKey, $options = [])
 * @method \GoldenList\Model\Entity\MasterCallList newEntity($data = null, array $options = [])
 * @method \GoldenList\Model\Entity\MasterCallList[] newEntities(array $data, array $options = [])
 * @method \GoldenList\Model\Entity\MasterCallList|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \GoldenList\Model\Entity\MasterCallList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\MasterCallList[] patchEntities($entities, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\MasterCallList findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MasterCallListsTable extends Table
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

        $this->table('master_call_lists');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->belongsTo('MasterProjects', [
            'foreignKey' => 'master_project_id',
            'joinType' => 'INNER',
            'className' => 'GoldenList.MasterProjects'
        ]);
        $this->hasMany('EngineStatus', [
            'foreignKey' => 'master_call_list_id',
            'className' => 'GoldenList.EngineStatus',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('GoldenlistGoldenLists', [
            'foreignKey' => 'master_call_list_id',
            'className' => 'GoldenList.GoldenlistGoldenLists',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('GoldenlistProjectOverviews', [
            'foreignKey' => 'master_call_list_id',
            'className' => 'GoldenList.GoldenlistProjectOverviews',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasOne('GoldenlistSidebarCallLists', [
            'foreignKey' => 'master_call_list_id',
            'className' => 'GoldenList.GoldenlistSidebarCallLists',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasOne('GoldenlistStatusEngines', [
            'foreignKey' => 'master_call_list_id',
            'className' => 'GoldenList.GoldenlistStatusEngines',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->hasOne('ExportFileCallListFiles', [
            'foreignKey' => 'master_call_list_id',
            'className' => 'GoldenList.ExportFileCallListFiles',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->hasMany('ExportFileReportDatas', [
            'foreignKey' => 'master_call_list_id',
            'className' => 'GoldenList.ExportFileReportDatas',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        
        $this->hasOne('ExportFileReportGoldenListFiles', [
            'foreignKey' => 'master_call_list_id',
            'className' => 'GoldenList.ExportFileReportGoldenListFiles',
            'dependent' => true,
            'cascadeCallbacks' => true,
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
            ->allowEmpty('call_list_unique_name');

        $validator
            ->requirePresence('call_list_name', 'create')
            ->notEmpty('call_list_name');

        $validator
            ->integer('cv_target_number')
            ->requirePresence('cv_target_number', 'create')
            ->notEmpty('cv_target_number');

        $validator
            ->integer('cap_wd_am')
            ->allowEmpty('cap_wd_am')
            ->notEmpty('cap_wd_am', __d('golden__list', 'This field cannot be left empty'), function ($context) {
                return !empty($context['data']['cap_enable']);
            });

        $validator
            ->integer('cap_wd_pm')
            ->allowEmpty('cap_wd_pm')
            ->notEmpty('cap_wd_pm', __d('golden__list', 'This field cannot be left empty'), function ($context) {
                return !empty($context['data']['cap_enable']);
            });

        $validator
            ->integer('cap_wd_night')
            ->allowEmpty('cap_wd_night')
            ->notEmpty('cap_wd_night',__d('golden__list', 'This field cannot be left empty'), function ($context) {
                return !empty($context['data']['cap_enable']);
            });

        $validator
            ->integer('cap_hd_am')
            ->allowEmpty('cap_hd_am')
            ->notEmpty('cap_hd_am', __d('golden__list', 'This field cannot be left empty'), function ($context) {
                return !empty($context['data']['cap_enable']);
            });
        $validator
            ->integer('cap_hd_pm')
            ->allowEmpty('cap_hd_pm')
            ->notEmpty('cap_hd_pm', __d('golden__list', 'This field cannot be left empty'), function ($context) {
                return !empty($context['data']['cap_enable']);
            });

        $validator
            ->integer('cap_hd_night')
            ->allowEmpty('cap_hd_night')
            ->notEmpty('cap_hd_night', __d('golden__list', 'This field cannot be left empty'), function ($context) {
                return !empty($context['data']['cap_enable']);
            });

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

    public function afterSave($event, $entity, $options)
    {
        $this->query()->update()
            ->set(['call_list_id' => $entity->id])
            ->where(['id' => $entity->id])
            ->execute();

        $this->GoldenlistProjectOverviews->query()->update()
            ->set(['call_list_name' => $entity->call_list_name])
            ->where(['master_call_list_id' => $entity->id])
            ->execute();

        $this->GoldenlistGoldenLists->query()->update()
            ->set(['call_list_name' => $entity->call_list_name])
            ->where(['master_call_list_id' => $entity->id])
            ->execute();
    }

    public function findProjectBy($masterProjectId, $id, $opt = [])
    {
        $conditions = [
            'MasterCallLists.id' => $id,
            'MasterCallLists.master_project_id' => $masterProjectId
        ];
        $opt = Hash::merge($opt, compact('conditions'));
        return $this->find('all', $opt)->first();
    }

}
