<?php

namespace crud;

/**
 * Hanlde CRUD operation functions
 *
 *
 * @author Namzul Alam <nazmul199512@gmail.com>
 *
 * @since 1.0.0
 */
class Crud {
    /**
     * Input fields list|sceham for later use
     *
     * Used for simplify CRUD process in functions
     */
    public $var;

    const countries = [
        'Bangladesh',
        'Pakistan',
        'India',
        'Serbia',
        'Lithuania',
        'United States',
        'Sri Lanka',
        'Russia',
        'Canada',
        'Australia',
        'Norway',
    ];

    function __construct() {
        $this->db = Db::db();
    }

    /**
     * Inserts a new country record into database
     *
     * @return void
     */
    public function save() {
        $current_name = _var( 'current-name' );
        $new_name     = _var( 'new-name' );

        if ( empty( $current_name ) || empty( $new_name ) ) {
            exit;
        }

        $existed = $this->db->query( "SELECT * FROM countries WHERE country_name='{$current_name}'" );

        if ( $existed->num_rows > 0 ) {
            exit;
        }

        $p = $this->db->prepare(
            "INSERT INTO countries (country_name, current_name) VALUES (?, ?)"
        );

        if ( $p ) {
            $p->bind_param( 'ss',
                $current_name,
                $new_name
            );

            $p->execute();
        }

        if ( $p !== false ) {
            echo "<li><a  data-current-name='{$new_name}' data-country-name='{$current_name}' data-id='{$p->insert_id}' href='#{$new_name}'>{$new_name}</a></li>";
        }
    }

    /**
     * Updates a country record
     *
     * @return void
     */
    public function update() {
        $current_name = _var( 'current-name' );
        $new_name     = _var( 'new-name' );

        if ( empty( $current_name ) || empty( $new_name ) ) {
            exit;
        }

        $p = $this->db->prepare(
            "UPDATE countries SET current_name=? WHERE country_name=?"
        );

        $p->bind_param( 'ss',
            $new_name,
            $current_name
        );

        $p->execute();

        if ( $p !== false ) {
            echo "<a data-current-name='{$new_name}' data-country-name='{$current_name}' data data-id='{$p->insert_id}' href='#{$new_name}'>{$new_name}</a>";
        }
    }

    /**
     * Deletes a country record
     *
     * @return void
     */
    public function delete() {
        $current_name = _var( 'current-name' );
        $p            = $this->db->prepare(
            "DELETE FROM countries WHERE country_name=?"
        );
        $p->bind_param( 's', $current_name );
        $p->execute();
    }

    /**
     * Retrieves country list
     *
     * @return void
     */
    public function retrieve() {
        $countries = $this->db->query( "SELECT * FROM countries" );

        if ( $countries->num_rows ) {
            $el = '';
            while ( $li = $countries->fetch_object() ) {
                $el .= "<li><a data-current-name='{$li->current_name}' data-country-name='{$li->country_name}' data-id='{$li->id}' href='#{$li->current_name}'>{$li->current_name}</a></li>";
            }
            return $el;
        }
    }

}