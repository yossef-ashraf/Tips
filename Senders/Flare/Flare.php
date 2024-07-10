//Laravel 

https://flareapp.io/projects

composer: composer require spatie/laravel-ignition --no-interaction
Env : FLARE_KEY=

config/logging.php:
        'flare' => [
            'driver' => 'flare',
        ],

        'stack' => [
            'driver' => 'stack',
            'channels' => ['daily', 'flare'],
            'ignore_exceptions' => false,
        ],


Terminal: php artisan flare:test

