<?php

class QuestionController extends BaseController {

    protected $theme;
    
    public function __construct()
    {
        $this->initTheme();      
    }  
    
    public function add()
    { 
        return $this->theme->of('questionAdd', ['message' => Session::get('message')])->render();
    }

    public function save()
    { 
        //dd(Input::all());
        
        $validation = Validator::make(
                Input::all(), 
                [
                    'question_id' => 'required',
                    'exam_id' => 'required',
                    'text' => 'required',
                    'answer' => 'required',
                ]
        );  
        
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());                           
        } else {
            Questions::insert(['question_id' => Input::get('question_id'),
                                'exam_id' => Input::get('exam_id'),                                    
                                'text' => Input::get('text'),
                                'type' => Input::get('type')]
                    );
            
           Answers::insert(['question_id' => Input::get('question_id'),
                                'answer' => Input::get('answer')]
                    );  

        }
        return Redirect::to('/admin/question/add')->with(['message' => 'Question Saved']); 
        //return $this->theme->of('emails.answers', ['answers' => Input::all(), 'dateEnd' => date("Y-m-d H:i:s"), 'duration' => $duration])->render();
         
         
    }
    
    
    
    

}
