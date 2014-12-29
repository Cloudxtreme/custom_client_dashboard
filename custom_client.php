<?php

/*
Plugin Name: My Client Dashboard Plugin
Description:
Version: 1.0
Author: Frank Corso
Author URI: http://www.mylocalwebstop.com/
Plugin URI: http://www.mylocalwebstop.com/
*/

/* 
Copyright 2014, My Local Webstop (email : fpcorso@mylocalwebstop.com)

Disclaimer of Warranties. 

The plugin is provided "as is". My Local Webstop and its suppliers and licensors hereby disclaim all warranties of any kind, 
express or implied, including, without limitation, the warranties of merchantability, fitness for a particular purpose and non-infringement. 
Neither My Local Webstop nor its suppliers and licensors, makes any warranty that the plugin will be error free or that access thereto will be continuous or uninterrupted.
You understand that you install, operate, and uninstall the plugin at your own discretion and risk.
*/

add_filter('admin_footer_text', 'left_admin_footer_text_output'); //left side
function left_admin_footer_text_output($text) {
    $text = '<a href=\"http://mylocalwebstop.com\">My Local Webstop</a>';
    return $text;
}
 
add_filter('update_footer', 'right_admin_footer_text_output', 11); //right side
function right_admin_footer_text_output($text) {
    $text = '';
    return $text;
}
add_action( 'admin_bar_menu', 'remove_wp_nodes', 999 );

function remove_wp_nodes() 
{
    global $wp_admin_bar;   
    $wp_admin_bar->remove_node( 'new-post' );
    $wp_admin_bar->remove_node( 'new-link' );
    $wp_admin_bar->remove_node( 'new-media' );
	$wp_admin_bar->remove_menu( 'comments' );
	$wp_admin_bar->remove_menu( 'new-content' );
	$wp_admin_bar->remove_menu( 'edit-profile' );
	$wp_admin_bar->remove_menu( 'user-info' );
}

function remove_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', '', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'remove_howdy',25 );

?>
