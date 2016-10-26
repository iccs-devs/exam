<?php

class ExamController extends BaseController {

    protected $theme;
    
    public function __construct()
    {
        $this->initTheme();      
    }  
    
    public function showIntro()
    { 
        return $this->theme->of('examIntro')->render();
    }  
    
    public function start1()
    { 
        return $this->theme->of('exam1', ['dateStart' => date("Y-m-d H:i:s")])->render();
    }
    
    public function start2()
    { 
        return $this->theme->of('exam2', ['dateStart' => date("Y-m-d H:i:s")])->render();
    }
    
    public function showEnd()
    { 
        return $this->theme->of('examComplete')->render();
    }
    
    public function viewList()
   {

       $exams = Exams::All();
       $data = ['exams' => $exams,
            'message' => Session::get('message')
        ];
        return $this->theme->of('admin.examViewList', $data)->render();
        
        
   }
    public function viewDetail($id)
   { 
       
       $data = ['exam' => exams::find($id),
                'questions_table' => Questions::all(),
           'message' => Session::get('message')
       ];    

       return $this->theme->of('admin.examViewDetail', $data)->render();
   } 

        public function delete($id)
   {

       $Delete = DB::table('questions')              
              ->where('questions.text', $id)
              ->delete();  

        return Redirect::to('admin/exam')->with(['message' => 'Exam deleted']);
   }    

       public function save()     

   { 
       //dd(Input::all());
       $id = Input::get('exam_id');
       $texter = Input::get('text');
       //$update = new Exams();
       $validation = Validator::make(Input::all(),array
        (
           'exam_id' => 'required',
           'title' => 'required',
           'description' => 'required',
           'random' => 'required',
           'pass_percentage' => 'required',
         ));  

       if ($validation->fails()) {
           return Redirect::to('admin/exam/' . $id )->withErrors($validation->messages());
       } else {

       if (Exams::find($id) == null) {
           Exams::insert(['exam_id' => Input::get('exam_id'),
                          'title' => Input::get('title'),                                    
                          'description' => Input::get('description'),
                          'random' => Input::get('random'),
                          'pass_percentage' => Input::get('pass_percentage')]
                        );
       } else {                
           $update = Exams::find($id);
           $update->exam_id = $id;
           $update->title=Input::get('title');
           $update->description=Input::get('description');
           $update->random=Input::get('random');
           $update->pass_percentage=Input::get('pass_percentage');
           $update->save();

       // redirect

              }
       return Redirect::to('/admin/exam')->with(['message' => 'Exam Saved']); 
       
       if ($validation->fails()) {
            return Redirect::to('admin/exam/')->withErrors($validation->messages());
        } else {
            
        }
            if (Questions::find('text') == null) { 
            Questions::insert(['text' => Input::get('text'),]
                               );   
             } else { 
                 
                $update = Questions::find('text');
                $update->text = Input::get('text');
                $update->save();
             }
            
                     
            return Redirect::to('admin/exam')->with(['message' => 'Question Saved']);           
        }

       //return $this->theme->of('emails.answers', ['answers' => Input::all(), 'dateEnd' => date("Y-m-d H:i:s"), 'duration' => $duration])->render();


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
