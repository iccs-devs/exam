<?php

Route::get('/', 'ApplicantController@showIntro');
Route::get('/end', 'ApplicantController@showEnd');
Route::get('/exam/{id}', 'ApplicantController@showExam');

Route::post('/save', array('as' => 'examSaveItems', 'uses' => 'ExamController@save')); 

Route::get('/admin/question', 'QuestionController@viewList');
Route::get('/admin/question/{id}', 'QuestionController@viewDetail');
Route::get('/admin/question/add', 'QuestionController@add');
Route::post('/admin/question/save', array('as' => 'questionSave', 'uses' => 'QuestionController@save')); 
Route::get('/admin/exam/add', 'ExamController@add');
Route::post('/admin/exam/save', array('as' => 'examSave', 'uses' => 'ExamController@save')); 
Route::get('/admin/exam', 'ExamController@viewList');
Route::get('/admin/exam/{id}', 'ExamController@viewDetail');

// protected routes
Route::group(['before' => 'auth'], function(){
    Route::get('changepw', 'UserController@showChangePw');
    Route::post('changepw', array('as' => 'changepw', 'uses' => 'UserController@changePw'));    
});

