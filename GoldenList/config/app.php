<?php
date_default_timezone_set('Asia/Tokyo');
use Cake\Core\Configure;

Configure::write('Config.language', 'ja');
Configure::write('debug', false);

ini_set('intl.default_locale', 'ja_JP');

try {
    Configure::load('GoldenList.color', 'default', false);
} catch (\Exception $e) {
    exit($e->getMessage() . "\n");
}

// 実行継続時間を設定
set_time_limit(TIMEOUT);
ini_set('max_execution_time', GOLDENLIST_TIMEOUT);

return [
    'Datasources' => [
        'GoldenList' => [
            'className' => 'Cake\Database\Connection',
            'driver' => 'Cake\Database\Driver\Mysql',
            'persistent' => false,
            'host' => 'goldenlist-prod.cptxwnz9ptyc.ap-northeast-1.rds.amazonaws.com',
            
            /**
             * CakePHP will use the default DB port based on the driver selected
             * MySQL on MAMP uses port 8889, MAMP users will want to uncomment
             * the following line and set the port accordingly
             */
            //'port' => 'non_standard_port_number',
            'username' => 'goldenlist',
            'password' => 'ywf7wycmH79hqb1T',
            'database' => 'goldenlist',
            'encoding' => 'utf8',
            'timezone' => 'UTC',
            'flags' => [],
            'cacheMetadata' => true,
            'log' => false,

            /**
             * Set identifier quoting to true if you are using reserved words or
             * special characters in your table or column names. Enabling this
             * setting will result in queries built using the Query Builder having
             * identifiers quoted when creating SQL. It should be noted that this
             * decreases performance because each query needs to be traversed and
             * manipulated before being executed.
             */
            'quoteIdentifiers' => false,

            /**
             * During development, if using MySQL < 5.6, uncommenting the
             * following line could boost the speed at which schema metadata is
             * fetched from the database. It can also be set directly with the
             * mysql configuration directive 'innodb_stats_on_metadata = 0'
             * which is the recommended value in production environments
             */
            //'init' => ['SET GLOBAL innodb_stats_on_metadata = 0'],

            'url' => env('DATABASE_URL', null),
        ],
    ]
];
