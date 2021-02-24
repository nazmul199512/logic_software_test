<?php

namespace crud;

use mysqli;

/**
 * Handles database functions and queries
 *
 *
 * @author Namzul Alam <nazmul199512@gmail.com>
 *
 * @since 1.0.0
 */
class Db {
    const info = [
        'host'     => 'localhost',
        'user'     => 'rafalote_nazmul',
        'password' => 'o44dQI&8R99O',
        'name'     => 'rafalote_nazmul_logic_crud',
    ];

    function __construct() {
        $this->db = self::db();
    }

    /**
     * Return database connection | connection object
     *
     * @return mixed|object
     */
    public static function db() {
        $db = false;

        if ( ! $db ) {
            $db = new mysqli(
                self::info['host'],
                self::info['user'],
                self::info['password'],
                self::info['name']
            );
        }

        return $db;
    }

    /**
     * Return database connection
     *
     * @param  string         $qry
     * @return mixed|object
     */
    public static function qry( $qry ) {
        return self::db()->query( $qry );
    }

    /**
     * Creates table inside database
     *
     * @return void
     */
    public static function create_table() {
        $schema = "CREATE TABLE IF NOT EXISTS `countries` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `country_name` longtext DEFAULT NULL,
                `current_name` longtext DEFAULT NULL,
                PRIMARY KEY (`id`)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

        self::qry( $schema );
    }
}