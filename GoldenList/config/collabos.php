<?php
ini_set('memory_limit', '3G');
return [
    'EnginStatus' => [
        'importCsvData' => [
            'code' => '100',
            'message' => 'import analysis csv data'
        ],
        'convertModel' => [
            'code' => '200',
            'message' => 'convert analysis csv data for model'
        ],
        'createModel' => [
            'code' => '300',
            'message' => 'create model'
        ],
        'createReport' => [
            'code' => '400',
            'message' => 'create report'
        ],
        'convertPredition' => [
            'code' => '500',
            'message' => 'convert analysis csv data for prediction'
        ],
        'createPredition' => [
            'code' => '600',
            'message' => 'create prediction'
        ],
        'createAllocation' => [
            'code' => '700',
            'message' => 'create allocation logic'
        ],
        'complete' => [
            'code' => '9000',
            'message' => 'complete'
        ],
        'error' => [
            'code' => '9999',
            'message' => 'internal error',
        ],
    ],
    'Bodais' => [
        'apiUrl' => 'https://apps.bodais.com/scoring/v2/',
        'jobId' => '4344',
        'apiKey' => 'wleaolufrvhd1t0ayg53pqwj8gwit4fclq2dups',
        'wait' => [
            'interval' => '30',   // second
            'timeout' => '900',  // second
            'retry' => [
                'BodaisStatusModels' => '2',
                'BodaisStatusPredictions' => '0',
            ],
        ],
        'cacheDay' => 7,
        'limit' => [
            'sampling' => 10000,
            'sampling_min' => 100,
            'prediction' => 1000,
            'prediction_min' => 100,
        ],
        'bof' => ROOT . DS . 'config' . DS . 'goldenlist.bof',
        'category' => [
            'undefined' => '欠搁E
        ]
    ],
    'ItemAttribute' => [
        'answer' => [
            'prefix' => 'bodais_answer_'
        ],
        'value' => [
            'field' => 'bodais_value'
        ],
        'import' => [
            'exclude_fields' => [
                'system','report'
            ],
        ],
        'analysis' => [
            'exclude_fields' => [
                'report'
            ],
        ],
    ],
    'Csv' => [
        'Type' => [
            'import' => [
                'str' => 'import'
            ],
            'importGoldenList' => [
                'str' => 'import_golden_list'
            ],
            'model' => [
                'str' => 'model'

            ],
            'convertModel' => [
                'str' => 'convert_model'
            ],
            'convertPrediction' => [
                'str' => 'convert_prediction'
            ]
        ],
        'Export' => [
            'model' => [ // モチE��用CSVチE�Eタ格納�Eの惁E��
                'prepare' => [ // 準備ファイル
                    'path' => TMP . 'csv' . DS . 'models' . DS . 'prepare',
                    'prefix' => 'model_prepare_'
                ],
                'convert' => [ // 変換後ファイル
                    'path' => TMP . 'csv' . DS . 'models' . DS . 'convert',
                    'prefix' => 'model_convert_'
                ],
            ],
            'prediction' => [
                'prepare' => [ // 準備ファイル
                    'path' => TMP . 'csv' . DS . 'predictions' . DS . 'prepare',
                    'prefix' => 'prediction_prepare_'
                ],
                'convert' => [ // 変換後ファイル
                    'path' => TMP . 'csv' . DS . 'predictions' . DS . 'convert',
                    'prefix' => 'prediction_convert_'
                ],
            ]
        ],
        'DeletePrepare' => true
    ],
    'GoldenList' => [
        'LastConnectTimeValue' => [
            'am' => [
                'jp' => '午前',
                'en' => 'morning'
            ],
            'pm' => [
                'jp' => '午征E,
                'en' => 'afternoon'
            ],
            'night' => [
                'jp' => '夜間',
                'en' => 'night'
            ],
        ],
        'LastConnectDayValue' => [
            'wd' => [
                'jp' => '平日',
                'en' => 'weekdays'
            ],
            'hd' => [
                'jp' => '休日',
                'en' => 'holiday'
            ],
            'purchase' => [
                'jp' => '購入',
                'en' => 'purchase'
            ]
        ]
    ],
    'LoyalCustomer' => [
        'Indicator' => [
            'Impact' => [
                'strong' => 10,
                'medium' => 1,
            ]
        ],
    ],
];
