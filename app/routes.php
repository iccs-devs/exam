<?php

Route::get('/', 'ExamController@showIntro');
Route::get('/end', 'ExamController@showEnd');
Route::get('/exam1', 'ExamController@start1');
Route::get('/exam2', 'ExamController@start2');
Route::post('/save', array('as' => 'examSaveItems', 'uses' => 'ExamController@save')); 


Route::get('/admin/question/add', 'QuestionController@add');
Route::post('/admin/question/save', array('as' => 'questionSave', 'uses' => 'QuestionController@save')); 

// protected routes
Route::group(['before' => 'auth'], function(){
    Route::get('changepw', 'UserController@showChangePw');
    Route::post('changepw', array('as' => 'changepw', 'uses' => 'UserController@changePw'));    
});


