<?php

namespace crud;

use crud\Templates\Templates;

/**
 * Crud handler class
 *
 * Root of all classes
 *
 * @author Namzul Alam <nazmul199512@gmail.com>
 *
 * @since 1.0.0
 */
class Main {
    /**
     * Contains application root information
     */
    const root = [
        'site_url' => 'https://nazmul.rafalotech.com/logic-software-ltd',
        'title'    => 'LOGIC SOFTWARE LTD.',
        'version'  => '1.0.0',
    ];

    function __construct() {
        $this->define_constants();
        $this->init();
    }

    /**
     * Defines necessary contants
     *
     * @return void
     */
    public function define_constants() {
        // Root information
        define( 'SITE_URL', self::root['site_url'] );
        define( 'VERSION', self::root['version'] );
        define( 'TITLE', self::root['title'] );
        define( 'PATH', __DIR__ );
        define( 'URL', SITE_URL );
    }

    /**
     * Initializes the included classes
     *
     * @return void
     */
    public function init() {
        $crud      = new Crud();
        $this->crud      = $crud;
    }
}