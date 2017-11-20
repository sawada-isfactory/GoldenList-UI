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
            'undefined' => '谺謳・
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
            'model' => [ // 繝｢繝・Ν逕ｨCSV繝・・繧ｿ譬ｼ邏榊・縺ｮ諠・ｱ
                'prepare' => [ // 貅門ｙ繝輔ぃ繧､繝ｫ
                    'path' => TMP . 'csv' . DS . 'models' . DS . 'prepare',
                    'prefix' => 'model_prepare_'
                ],
                'convert' => [ // 螟画鋤蠕後ヵ繧｡繧､繝ｫ
                    'path' => TMP . 'csv' . DS . 'models' . DS . 'convert',
                    'prefix' => 'model_convert_'
                ],
            ],
            'prediction' => [
                'prepare' => [ // 貅門ｙ繝輔ぃ繧､繝ｫ
                    'path' => TMP . 'csv' . DS . 'predictions' . DS . 'prepare',
                    'prefix' => 'prediction_prepare_'
                ],
                'convert' => [ // 螟画鋤蠕後ヵ繧｡繧､繝ｫ
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
                'jp' => '蜊亥燕',
                'en' => 'morning'
            ],
            'pm' => [
                'jp' => '蜊亥ｾ・,
                'en' => 'afternoon'
            ],
            'night' => [
                'jp' => '螟憺俣',
                'en' => 'night'
            ],
        ],
        'LastConnectDayValue' => [
            'wd' => [
                'jp' => '蟷ｳ譌･',
                'en' => 'weekdays'
            ],
            'hd' => [
                'jp' => '莨第律',
                'en' => 'holiday'
            ],
            'purchase' => [
                'jp' => '雉ｼ蜈･',
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
