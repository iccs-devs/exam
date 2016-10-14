<?php
class Answers extends Eloquent {

    protected $table = 'answers_correct';
    protected $primaryKey = 'question_id';
    public $timestamps = false;

}
