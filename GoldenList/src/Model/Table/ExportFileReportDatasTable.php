<?php
namespace GoldenList\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExportFileReportDatas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MasterCallLists
 * @property \Cake\ORM\Association\BelongsTo $CallLists
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $TimeBoxes
 * @property \Cake\ORM\Association\HasMany $ExportFileReportConfigs
 *
 * @method \GoldenList\Model\Entity\ExportFileReportData get($primaryKey, $options = [])
 * @method \GoldenList\Model\Entity\ExportFileReportData newEntity($data = null, array $options = [])
 * @method \GoldenList\Model\Entity\ExportFileReportData[] newEntities(array $data, array $options = [])
 * @method \GoldenList\Model\Entity\ExportFileReportData|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \GoldenList\Model\Entity\ExportFileReportData patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\ExportFileReportData[] patchEntities($entities, array $data, array $options = [])
 * @method \GoldenList\Model\Entity\ExportFileReportData findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExportFileReportDatasTable extends Table
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

        $this->table('export_file_report_datas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MasterCallLists', [
            'foreignKey' => 'master_call_list_id',
            'joinType' => 'INNER',
            'className' => 'GoldenList.MasterCallLists'
        ]);

        $this->hasMany('ExportFileReportConfigs', [
            'foreignKey' => 'export_file_report_data_id',
            'className' => 'GoldenList.ExportFileReportConfigs'
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
            ->integer('age')
            ->allowEmpty('age');

        $validator
            ->allowEmpty('gender');

        $validator
            ->allowEmpty('prefecture_name');

        $validator
            ->allowEmpty('post_code');

        $validator
            ->allowEmpty('income');

        $validator
            ->allowEmpty('telephone_code');

        $validator
            ->integer('call_count')
            ->allowEmpty('call_count');

        $validator
            ->numeric('call_interval')
            ->allowEmpty('call_interval');

        $validator
            ->integer('connect_count')
            ->allowEmpty('connect_count');

        $validator
            ->numeric('mean_connect_time')
            ->allowEmpty('mean_connect_time');

        $validator
            ->numeric('total_talk_time')
            ->allowEmpty('total_talk_time');

        $validator
            ->numeric('max_connect_time')
            ->allowEmpty('max_connect_time');

        $validator
            ->numeric('min_connect_time')
            ->allowEmpty('min_connect_time');

        $validator
            ->numeric('diff_max_min_connect_time')
            ->allowEmpty('diff_max_min_connect_time');

        $validator
            ->numeric('talk_time_standard_deviation')
            ->allowEmpty('talk_time_standard_deviation');

        $validator
            ->integer('positive_word_count')
            ->allowEmpty('positive_word_count');

        $validator
            ->integer('positive_word_kind_count')
            ->allowEmpty('positive_word_kind_count');

        $validator
            ->integer('negative_word_count')
            ->allowEmpty('negative_word_count');

        $validator
            ->integer('negative_word_kind_count')
            ->allowEmpty('negative_word_kind_count');

        $validator
            ->integer('neutral_word_count')
            ->allowEmpty('neutral_word_count');

        $validator
            ->integer('neutral_word_kind_count')
            ->allowEmpty('neutral_word_kind_count');

        $validator
            ->integer('is_feature_word_top1')
            ->allowEmpty('is_feature_word_top1');

        $validator
            ->integer('is_feature_word_top2')
            ->allowEmpty('is_feature_word_top2');

        $validator
            ->integer('is_feature_word_top3')
            ->allowEmpty('is_feature_word_top3');

        $validator
            ->integer('is_frequency_word_top1')
            ->allowEmpty('is_frequency_word_top1');

        $validator
            ->integer('is_frequency_word_top2')
            ->allowEmpty('is_frequency_word_top2');

        $validator
            ->integer('is_frequency_word_top3')
            ->allowEmpty('is_frequency_word_top3');

        $validator
            ->allowEmpty('last_connect_day_adayoftheweek');

        $validator
            ->allowEmpty('last_connect_day_wd_hd');

        $validator
            ->integer('last_connect_time_15minutes')
            ->allowEmpty('last_connect_time_15minutes');

        $validator
            ->allowEmpty('last_connect_time_am_pm_night');

        $validator
            ->integer('is_fixed_term_purchase')
            ->allowEmpty('is_fixed_term_purchase');

        $validator
            ->integer('is_sample')
            ->allowEmpty('is_sample');

        $validator
            ->integer('is_not_fixed_term_purchase')
            ->allowEmpty('is_not_fixed_term_purchase');

        $validator
            ->integer('from_sample_to_purchae_days')
            ->allowEmpty('from_sample_to_purchae_days');

        $validator
            ->integer('from_newest_purchase_date_to_now_days')
            ->allowEmpty('from_newest_purchase_date_to_now_days');

        $validator
            ->integer('purchase_count')
            ->allowEmpty('purchase_count');

        $validator
            ->integer('cumulative_purchase_amount')
            ->allowEmpty('cumulative_purchase_amount');

        $validator
            ->integer('purchase_item_category_1')
            ->allowEmpty('purchase_item_category_1');

        $validator
            ->integer('purchase_item_category_2')
            ->allowEmpty('purchase_item_category_2');

        $validator
            ->integer('purchase_item_category_3')
            ->allowEmpty('purchase_item_category_3');

        $validator
            ->integer('purchase_item_category_4')
            ->allowEmpty('purchase_item_category_4');

        $validator
            ->integer('purchase_item_category_5')
            ->allowEmpty('purchase_item_category_5');

        $validator
            ->integer('purchase_item_category_6')
            ->allowEmpty('purchase_item_category_6');

        $validator
            ->integer('purchase_item_category_7')
            ->allowEmpty('purchase_item_category_7');

        $validator
            ->integer('purchase_item_category_8')
            ->allowEmpty('purchase_item_category_8');

        $validator
            ->integer('purchase_item_category_9')
            ->allowEmpty('purchase_item_category_9');

        $validator
            ->integer('purchase_item_category_10')
            ->allowEmpty('purchase_item_category_10');

        $validator
            ->integer('is_anounce_appear_term_item_purchase')
            ->allowEmpty('is_anounce_appear_term_item_purchase');

        $validator
            ->integer('is_anounce_appear_item_purchase')
            ->allowEmpty('is_anounce_appear_item_purchase');

        $validator
            ->integer('is_campaign_term_purchase')
            ->allowEmpty('is_campaign_term_purchase');

        $validator
            ->integer('is_web_access')
            ->allowEmpty('is_web_access');

        $validator
            ->numeric('answer_connect_weekdays_morning')
            ->allowEmpty('answer_connect_weekdays_morning');

        $validator
            ->numeric('answer_connect_weekdays_afternoon')
            ->allowEmpty('answer_connect_weekdays_afternoon');

        $validator
            ->numeric('answer_connect_weekdays_night')
            ->allowEmpty('answer_connect_weekdays_night');

        $validator
            ->numeric('answer_connect_holiday_morning')
            ->allowEmpty('answer_connect_holiday_morning');

        $validator
            ->numeric('answer_connect_holiday_afternoon')
            ->allowEmpty('answer_connect_holiday_afternoon');

        $validator
            ->numeric('answer_connect_holiday_night')
            ->allowEmpty('answer_connect_holiday_night');

        $validator
            ->numeric('answer_purchase')
            ->allowEmpty('answer_purchase');

        $validator
            ->allowEmpty('delivery_day_adayoftheweek');

        $validator
            ->allowEmpty('delivery_day_wd_hd');

        $validator
            ->allowEmpty('delivery_time_15minutes');

        $validator
            ->allowEmpty('deleivery_time_am_pm_night');

        $validator
            ->allowEmpty('supplement_1');

        $validator
            ->allowEmpty('supplement_2');

        $validator
            ->allowEmpty('supplement_3');

        $validator
            ->allowEmpty('supplement_4');

        $validator
            ->allowEmpty('supplement_5');

        $validator
            ->allowEmpty('supplement_6');

        $validator
            ->allowEmpty('supplement_7');

        $validator
            ->allowEmpty('supplement_8');

        $validator
            ->allowEmpty('supplement_9');

        $validator
            ->allowEmpty('supplement_10');

        $validator
            ->numeric('score_wd_am')
            ->requirePresence('score_wd_am', 'create')
            ->notEmpty('score_wd_am');

        $validator
            ->numeric('score_wd_pm')
            ->requirePresence('score_wd_pm', 'create')
            ->notEmpty('score_wd_pm');

        $validator
            ->numeric('score_wd_night')
            ->requirePresence('score_wd_night', 'create')
            ->notEmpty('score_wd_night');

        $validator
            ->numeric('score_hd_am')
            ->requirePresence('score_hd_am', 'create')
            ->notEmpty('score_hd_am');

        $validator
            ->numeric('score_hd_pm')
            ->requirePresence('score_hd_pm', 'create')
            ->notEmpty('score_hd_pm');

        $validator
            ->numeric('score_hd_night')
            ->requirePresence('score_hd_night', 'create')
            ->notEmpty('score_hd_night');

        $validator
            ->numeric('score_purchase')
            ->allowEmpty('score_purchase');

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
}
