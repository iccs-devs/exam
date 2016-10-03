<?php

class ApplicantController extends BaseController {

    protected $theme;
    
    public function __construct()
    {
        $this->initTheme();      
    }  
    
    public function showIntro()
    { 
        return $this->theme->of('examIntro')->render();
    }  
    
    public function showExam($id)
    { 
        return $this->theme->of('exam' . $id, ['dateStart' => date("Y-m-d H:i:s")])->render();
    }

    
    public function showEnd()
    { 
        return $this->theme->of('examComplete')->render();
    }

    public function save()
    { 
        //dd(Input::all());
        
        $datetime1 = new DateTime(Input::get('dateStart'));
        $datetime2 = new DateTime(date("Y-m-d H:i:s"));
        $interval = $datetime1->diff($datetime2);
        $duration = $interval->format('%i minutes, %s seconds');
       
        Mail::send('emails.answers', array('answers' => Input::all(), 'dateEnd' => date("Y-m-d H:i:s"), 'duration' => $duration), function($message)
        {
            $message->to('support@iconceptcontactsolutions.com', 'IT')->subject('TEST');
        }); 

        return Redirect::to('end'); 
        //return $this->theme->of('emails.answers', ['answers' => Input::all(), 'dateEnd' => date("Y-m-d H:i:s"), 'duration' => $duration])->render();
         
         
    }
    

    
    

}
