<?php
/**
 * Holds necessary functions
 *
 * @author Namzul Alam <nazmul199512@gmail.com>
 *
 * @since 1.0.0
 */
use crud\Crud;
/**
 * Creates link from
 *
 * @param  [type] $arr
 * @return void
 */
function create_list( $arr ) {
    $el = "<ul>";

    foreach ( $arr as $item ) {
        $el .= "<li><a href='#{$item}' data-id='{$item}'>{$item}</a></li>";
    }

    return "{$el}</ul>";
}

function _var( $name ) {
    return isset( $_POST[$name] ) ? $_POST[$name] : '';
}
