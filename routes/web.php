<?php

use Encore\ApiBackup\Http\Controllers\ApiBackupController;


Route::group(['prefix'=>'backup'],function(){
    Route::get('apibackup', ApiBackupController::class.'@index');
    Route::any('db_list_ajax', ApiBackupController::class.'@dbListAjax');
    Route::any('db_list', ApiBackupController::class.'@dbList');
    Route::get('db_add', ApiBackupController::class.'@dbAdd');
    Route::post('db_add', ApiBackupController::class.'@dbAddPost');
    Route::get('db_edit', ApiBackupController::class.'@dbEdit');
    Route::post('db_edit', ApiBackupController::class.'@dbEditPost');
    Route::any('db_down_list', ApiBackupController::class.'@dbDownList');

    Route::any('tables_list', ApiBackupController::class.'@tablesList');
    Route::get('tables_add', ApiBackupController::class.'@tablesAdd');
    Route::post('tables_add', ApiBackupController::class.'@tablesAddPost');
    Route::post('tables_db',ApiBackupController::class.'@tablesDb');
    Route::get('tables_edit', ApiBackupController::class.'@tablesEdit');
    Route::post('tables_edit', ApiBackupController::class.'@tablesEditPost');
    Route::any('tables_down_list', ApiBackupController::class.'@tablesDownList');

    Route::any('down', ApiBackupController::class.'@down');
    Route::any('getDownList', ApiBackupController::class.'@getDownList');
    
});