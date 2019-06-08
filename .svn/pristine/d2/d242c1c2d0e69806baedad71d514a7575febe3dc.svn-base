<?php

require_once CORE . 'zebra_database/Zebra_Database.php';

/**
 * User: Werneck
 * Date: 21/10/12
 * Time: 10:32
 * To change this template use File | Settings | File Templates.
 */
class Database extends Zebra_Database
{
    static $instance    = NULL;		//instancia do banco de dadsa

    public $host       = BD_CONFIG_HOST;	// Database Host / IP
    public $user       = BD_CONFIG_USER;	// Username
    public $password   = BD_CONFIG_PASS;	// Password
    public $name       = BD_CONFIG_DB;	    // Database

    public $debug      = DEBUG_DB;


    /**
     * Function to be used to reach the database class for proper configuration
     *
     * @return Database $db instância do bd
     */
    static function getDB()
    {
        if( !self::$db )
        {
            self::$db = new Database();

            // connect to the MySQL server and select the database
            self::$db->connect(
                self::$db->host,	    // host
                self::$db->user,	    // user name
                self::$db->password,	// password
                self::$db->name	        // database
            );
        }

        if ( !is_object(self::$db) )
        {
            trigger_error('Não foi possível instanciar a classe de banco de dados!', E_USER_ERROR);
        }

        return self::$db;
    }
}
