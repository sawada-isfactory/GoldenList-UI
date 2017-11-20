<?php
namespace GoldenList\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExportFileReportData Entity
 *
 * @property int $id
 * @property int $master_call_list_id
 * @property int $call_list_id
 * @property int $customer_id
 * @property int $age
 * @property string $gender
 * @property string $prefecture_name
 * @property string $post_code
 * @property string $income
 * @property string $telephone_code
 * @property int $call_count
 * @property float $call_interval
 * @property int $connect_count
 * @property float $mean_connect_time
 * @property float $total_talk_time
 * @property float $max_connect_time
 * @property float $min_connect_time
 * @property float $diff_max_min_connect_time
 * @property float $talk_time_standard_deviation
 * @property int $positive_word_count
 * @property int $positive_word_kind_count
 * @property int $negative_word_count
 * @property int $negative_word_kind_count
 * @property int $neutral_word_count
 * @property int $neutral_word_kind_count
 * @property int $is_feature_word_top1
 * @property int $is_feature_word_top2
 * @property int $is_feature_word_top3
 * @property int $is_frequency_word_top1
 * @property int $is_frequency_word_top2
 * @property int $is_frequency_word_top3
 * @property string $last_connect_day_adayoftheweek
 * @property string $last_connect_day_wd_hd
 * @property int $last_connect_time_15minutes
 * @property string $last_connect_time_am_pm_night
 * @property int $is_fixed_term_purchase
 * @property int $is_sample
 * @property int $is_not_fixed_term_purchase
 * @property int $from_sample_to_purchae_days
 * @property int $from_newest_purchase_date_to_now_days
 * @property int $purchase_count
 * @property int $cumulative_purchase_amount
 * @property int $purchase_item_category_1
 * @property int $purchase_item_category_2
 * @property int $purchase_item_category_3
 * @property int $purchase_item_category_4
 * @property int $purchase_item_category_5
 * @property int $purchase_item_category_6
 * @property int $purchase_item_category_7
 * @property int $purchase_item_category_8
 * @property int $purchase_item_category_9
 * @property int $purchase_item_category_10
 * @property int $is_anounce_appear_term_item_purchase
 * @property int $is_anounce_appear_item_purchase
 * @property int $is_campaign_term_purchase
 * @property int $is_web_access
 * @property float $answer_connect_weekdays_morning
 * @property float $answer_connect_weekdays_afternoon
 * @property float $answer_connect_weekdays_night
 * @property float $answer_connect_holiday_morning
 * @property float $answer_connect_holiday_afternoon
 * @property float $answer_connect_holiday_night
 * @property float $answer_purchase
 * @property string $delivery_day_adayoftheweek
 * @property string $delivery_day_wd_hd
 * @property string $delivery_time_15minutes
 * @property string $deleivery_time_am_pm_night
 * @property string $supplement_1
 * @property string $supplement_2
 * @property string $supplement_3
 * @property string $supplement_4
 * @property string $supplement_5
 * @property string $supplement_6
 * @property string $supplement_7
 * @property string $supplement_8
 * @property string $supplement_9
 * @property string $supplement_10
 * @property float $score_wd_am
 * @property float $score_wd_pm
 * @property float $score_wd_night
 * @property float $score_hd_am
 * @property float $score_hd_pm
 * @property float $score_hd_night
 * @property float $score_purchase
 * @property string $time_box_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 *
 * @property \GoldenList\Model\Entity\MasterCallList $master_call_list
 * @property \GoldenList\Model\Entity\CallList $call_list
 * @property \GoldenList\Model\Entity\Customer $customer
 * @property \GoldenList\Model\Entity\TimeBox $time_box
 * @property \GoldenList\Model\Entity\ExportFileReportConfig[] $export_file_report_configs
 */
class ExportFileReportData extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
