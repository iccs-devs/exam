<?php

class OptionController extends BaseController {

    protected $theme;
    
    public function __construct()
    {
        $this->initTheme();      
    }
    
   public function viewList()
    { 
       $questions = DB::table('questions')
                    ->select('*')
                    ->join('answers_correct', 'answers_correct.question_id', '=', 'questions.question_id')
                    ->join('question_options', 'question_options.question_id', '=', 'questions.question_id')
                    ->select('*', DB::raw('GROUP_CONCAT(answers_correct.answer) as ans')) 
                    ->groupBy('answers_correct.question_id')
                    
                    ->get(); 
        //dd($questions);
        $data = ['questions' => $questions,
                'message' => Session::get('message')
                ];

        return $this->theme->of('admin.questionViewList', $data)->render();
    }    
    
     public function viewDetail($id)
    { 
        $question = DB::table('questions')
                     ->join('question_options', 'question_options.question_id', '=', 'questions.question_id')
                     ->where('questions.question_id', $id)
                     ->first();        
         //dd($question);
         $data = ['question' => $question,
                  'message' => Session::get('message')
                 ];


         return $this->theme->of('admin.questionViewDetail', $data)->render();
    }     
    
    public function delete($id)
    {
        $Delete = DB::table('question_options')  
                    ->where('question_options.question_id', $id)
                    ->delete();  

         return Redirect::to('admin/question')->with(['message' => 'Question deleted']);
     }
     
    /* public function add($id)
         
     {
         $Add = DB::table('question_options')
                 ->where ('question_options.question_id', $id)
                 
         
         
         
         
     }*/

     public function destroy() {
         
         $Delete = DB::table('question_option')
         
         
     }
     
    public function save() {

        //dd(Input::All());
        $id = Input::get('option_id'); 
       //$update = new Options();
        $validation = Validator::make(Input::all(),array
        (
            'question_id' => 'required',
            'exam_id' => 'required',
            'text' => 'required',
            'type' => 'required',
            'option_id' => 'required',
            'option_text' => 'required', 
            'answer' => 'required',           
        ));           

        if ($validation->fails()) {
            return Redirect::to('admin/question/' . $id )->withErrors($validation->messages());
        } else {
            // store

            //dd(Questions::find($id));

            if (Options::find($id) == null) {
          
                Options::insert(['question_id' => Input::get('question_id'),
                                 'option_id' => Input::get('option_id'),
                                 'option_text' => Input::get('option_text'),]
                               );    
               
            } else {                
               

                $update = Options::find($id);
                $update->option_id = Input::get('option_id');
                $update->option_text = Input::get('option_text');
                $update->save();
                
               
                
            // redirect
                    }
            return Redirect::to('admin/question')->with(['message' => 'Question Saved']);           
        }         
    }

        //return $this->theme->of('emails.answers', ['answers' => Input::all(), 'dateEnd' => date("Y-m-d H:i:s"), 'duration' => $duration])->render();
}
