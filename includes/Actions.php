<?php

namespace crud;

use crud\Templates\Templates;

/**
 * Calls functions based on requested action from client side
 *
 *
 *
 * @author Namzul Alam <nazmul199512@gmail.com>
 *
 * @since 1.0.0
 */
class Actions {
    function __construct() {
        $this->crud  = new Crud();

        $method = isset( $_SERVER['REQUEST_METHOD'] ) ? $_SERVER['REQUEST_METHOD'] : '';
        if ( $method === 'POST' && isset( $_POST['action'] ) ) {
            $this->handover_post( $_POST['action'] );
        } elseif ( $method === 'GET' && isset( $_GET['action'] ) ) {
            $this->handover_get( $_GET['action'] );
        }
    }

    /**
     * Handovers the action from GET request
     *
     * @param  [type] $action
     * @return void
     */
    public function handover_get( $action ) {
        switch ( $action ) {
            case 'db_migrate':
                Db::create_table();                
                break;
            default:break;
        }
    }

    /**
     * Handovers the action from POST request
     *
     * @param  string $action
     * @return void
     */
    public function handover_post( $action ) {
        switch ( $action ) {
            case 'save':
                $this->crud->save();
                break;
            case 'update':
                $this->crud->update();
                break;
            case 'delete':
                $this->crud->delete();
                break;
            default:break;
        }
    }
}