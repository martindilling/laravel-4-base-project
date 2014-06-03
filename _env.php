<?php

/**
 * Environment variables
 * In production make a copy of this file and name it ".env.php".
 * For other environments, create files named ".env.*.php" where * is the name of the environment.
 *
 * http://laravel.com/docs/configuration#protecting-sensitive-configuration
 */
return array(

    /**
     * Environment
     */
    'APP_ENV' => 'production',

    /**
     * Encryption Key
     */
    'APP_KEY' => 'YourSecretKey!!!',

    /**
     * Analytics
     */
    'ANALYTICS_ID'     => '',
    'ANALYTICS_DOMAIN' => '',

    /**
     * Database
     */
    'DB_HOST'     => 'localhost',
    'DB_DATABASE' => 'laravel_base',
    'DB_USERNAME' => 'root',
    'DB_PASSWORD' => '',

    /**
     * MAIL
     */
    'MANDRILL_SECRET' => '',

);
