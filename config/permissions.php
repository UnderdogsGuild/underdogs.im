<?php
return [
    /*
     * Permission mapping to Laravel Controller methods
     */

    'App\Http\Controllers\HomeController@index' => 'home_controller_at_index',
    /*
     * Administration Permissions
     */
    'App\Http\Controllers\AdministrationController@index' => 'administration_controller_at_index',
    'App\Http\Controllers\Admin\EventsController@index' => 'admin_events_controller_at_index',
    'App\Http\Controllers\Admin\EventsController@indexActive' => 'admin_events_controller_at_index_active',
    'App\Http\Controllers\Admin\EventsController@indexUnpublished' => 'admin_events_controller_at_index_unpublished',
    'App\Http\Controllers\Admin\EventsController@indexDeleted' => 'admin_events_controller_at_index_deleted',

];