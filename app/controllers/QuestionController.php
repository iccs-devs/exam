<?php

class QuestionController extends BaseController {

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
                     ->join('answers_correct', 'answers_correct.question_id', '=', 'questions.question_id')
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
        $Delete = DB::table('questions')              
                    ->where('questions.question_id', $id)
                    ->delete();  

         return Redirect::to('admin/question')->with(['message' => 'Question deleted']);
     }

    public function save() {

        //dd(Input::All());
        $id = Input::get('question_id'); 
        //$update = new Questions();
        $validation = Validator::make(Input::all(),array
        (
            'question_id' => 'required',
            'exam_id' => 'required',
            'text' => 'required',
            'type' => 'required',
            'answer' => 'required',           
        ));           

        if ($validation->fails()) {
            return Redirect::to('admin/question/' . $id )->withErrors($validation->messages());
        } else {
            // store

            //dd(Questions::find($id));

            if (Questions::find($id) == null) {
                Questions::insert(['question_id' => Input::get('question_id'),
                                    'exam_id' => Input::get('exam_id'),                                    
                                    'text' => Input::get('text'),
                                    'type' => Input::get('type')]
                                 );

                Answers::insert(['question_id' => Input::get('question_id'),
                                 'answer' => Input::get('answer')]
                               );                    
            } else {                
                $update = Questions::find($id);
                $update->question_id = $id;
                $update->exam_id=Input::get('exam_id');
                $update->text=Input::get('text');
                $update->type=Input::get('type');
                $update->save();

                $update = Answers::find($id);
                $update->question_id = $id;
                $update->answer = Input::get('answer');
                $update->save();
            // redirect
                    }
            return Redirect::to('admin/question')->with(['message' => 'Question Saved']);           
        }         
    }

        //return $this->theme->of('emails.answers', ['answers' => Input::all(), 'dateEnd' => date("Y-m-d H:i:s"), 'duration' => $duration])->render();
}
