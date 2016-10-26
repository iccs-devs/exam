<?php

Route::get('/', 'ApplicantController@showIntro');
Route::get('/end', 'ApplicantController@showEnd');
Route::get('/exam/{id}', 'ApplicantController@showExam');


Route::post('/save', array('as' => 'examSaveItems', 'uses' => 'ExamController@save')); 

Route::get('/admin/question', 'QuestionController@viewList');
Route::get('/admin/question/{id}', 'QuestionController@viewDetail');
Route::get('/admin/question/delete/{id}', 'QuestionController@delete');
Route::get('/admin/question/update/{id}', 'QuestionController@save');
Route::post('/admin/question/update', array('as' => 'questionSave','uses'=>'QuestionController@save'));

Route::get('/admin/option/destroy/{id}', 'QuestionController@destroy');
Route::get('/admin/texter/destroy/{id}', 'QuestionController@destroy');

Route::get('/admin/exam', 'ExamController@viewList');
Route::get('/admin/exam/{id}', 'ExamController@viewDetail');
Route::get('/admin/exam/delete/{id}', 'ExamController@delete');
Route::get('/admin/exam/update/{id}', 'ExamController@save');
Route::post('/admin/exam/update', array('as' => 'examSave','uses'=>'ExamController@save'));


// protected routes
Route::group(['before' => 'auth'], function(){
    Route::get('changepw', 'UserController@showChangePw');
    Route::post('changepw', array('as' => 'changepw', 'uses' => 'UserController@changePw'));    
});

