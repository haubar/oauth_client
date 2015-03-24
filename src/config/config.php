<?php

use Illuminate\Support\Facades\Config;

return array(

    /*
     |--------------------------------------------------------------------------
     | Package Settings
     |--------------------------------------------------------------------------
     |
     | Debugbar is enabled by default, when debug is set to true in app.php.
     |
     */

    'enabled' => Config::get('app.debug'),

    /*
     |--------------------------------------------------------------------------
     | DataCollectors
     |--------------------------------------------------------------------------
     |
     | Enable/disable DataCollectors
     |
     */

    'collectors' => array(
        'phpinfo'         => true,  // Php version
        'messages'        => true,  // Messages
        'time'            => true,  // Time Datalogger
        'memory'          => true,  // Memory usage
        'exceptions'      => true,  // Exception displayer
        'log'             => true,  // Logs from Monolog (merged in messages if enabled)
        'db'              => true,  // Show database (PDO) queries and bindings
        'views'           => true,  // Views with their data
        'route'           => true,  // Current route information
        'laravel'         => false, // Laravel version and environment
        'events'          => false, // All events fired
        'default_request' => false, // Regular or special Symfony request logger
        'symfony_request' => true,  // Only one can be enabled..
        'mail'            => true,  // Catch mail messages
        'logs'            => false, // Add the latest log messages
        'files'           => false, // Show the included files
        'config'          => false, // Display config settings
        'auth'            => false, // Display Laravel authentication status
        'session'         => false, // Display session data in a separate tab
    ),

    /*
     |--------------------------------------------------------------------------
     | Extra options
     |--------------------------------------------------------------------------
     |
     | Configure some DataCollectors
     |
     */

    'options' => array(
        'auth' => array(
            'show_name' => false,   // Also show the users name/email in the debugbar
        ),
        'db' => array(
            'with_params'       => true,   // Render SQL with the parameters substituted
            'timeline'          => false,  // Add the queries to the timeline
            'backtrace'         => false,  // EXPERIMENTAL: Use a backtrace to find the origin of the query in your files.
            'explain' => array(            // EXPERIMENTAL: Show EXPLAIN output on queries
                'enabled' => false,
                'types' => array('SELECT'), // array('SELECT', 'INSERT', 'UPDATE', 'DELETE'); for MySQL 5.6.3+
            ),
            'hints'             => true,    // Show hints for common mistakes
        ),
        'mail' => array(
            'full_log' => false
        ),
        'views' => array(
            'data' => false,    //Note: Can slow down the application, because the data can be quite large..
        ),
        'route' => array(
            'label' => true  // show complete route on bar
        ),
        'logs' => array(
            'file' => null
        ),
    ),

);
