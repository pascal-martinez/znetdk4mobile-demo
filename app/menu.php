<?php
/**
 * ZnetDK, Starter Web Application for rapid & easy development
 * See official website http://www.znetdk.fr
 * ------------------------------------------------------------
 * Custom navigation menu of the application
 * YOU CAN FREELY CUSTOMIZE THE CONTENT OF THIS FILE
 */
namespace app;
class Menu implements \iMenu {

    static public function initAppMenuItems() {
        // Demo menu items
        \MenuManager::addMenuItem(NULL, 'home', 'Home', 'fa-home');
        \MenuManager::addMenuItem(NULL, '_themes', 'Themes', 'fa-photo');
        \MenuManager::addMenuItem('_themes', 'colors', 'Colors', 'fa-paint-brush');
        \MenuManager::addMenuItem('_themes', 'fonts', 'Fonts', 'fa-font');
        \MenuManager::addMenuItem(NULL, 'persons', 'Persons', 'fa-address-card-o');
        \MenuManager::addMenuItem(NULL, '_features', 'Features', 'fa-gift');
        \MenuManager::addMenuItem('_features', 'form', 'Form', 'fa-keyboard-o');
        \MenuManager::addMenuItem('_features', 'autocomplete', 'Autocomplete', 'fa-i-cursor');
        \MenuManager::addMenuItem('_features', 'messages', 'Messages', 'fa-comment-o');
        \MenuManager::addMenuItem('_features', 'loadcontentinmodal', 'View in modal', 'fa-window-maximize');
        \MenuManager::addMenuItem('_features', 'actionbuttons', 'Action buttons', 'fa-hand-pointer-o');
        \MenuManager::addMenuItem('_features', 'ajaxloader', 'AJAX Loader', 'fa-spinner');
        \MenuManager::addMenuItem('_features', 'upload', 'Upload', 'fa-upload');
        \MenuManager::addMenuItem('_features', 'download', 'Download', 'fa-download');
        \MenuManager::addMenuItem('_features', 'anchors', 'Anchors', 'fa-anchor');
        \MenuManager::addMenuItem(NULL, '_w3css', 'W3CSS demo', 'fa-code');
        \MenuManager::addMenuItem('_w3css', 'demo1', 'My Dashboard', 'fa-dashboard');
        \MenuManager::addMenuItem('_w3css', 'demo2', 'Social Media', 'fa-comment');
        \MenuManager::addMenuItem('_w3css', 'demo3', 'The Apartment', 'fa-building');
        
        // User and Profile management
        \MenuManager::addMenuItem(NULL, '_authorizations', LC_MENU_AUTHORIZATION, 'fa-unlock-alt');
        \MenuManager::addMenuItem('_authorizations', 'z4musers', LC_MENU_AUTHORIZ_USERS, 'fa-user');
        \MenuManager::addMenuItem('_authorizations', 'z4mprofiles', LC_MENU_AUTHORIZ_PROFILES, 'fa-key');
    }

}