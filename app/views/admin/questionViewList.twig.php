

<div class="container-fluid">
    <div class="row">
  
        {{ Form.open({'action': 'questionSave', 'class':'form-horizontal'}) }}
                        
        <div class="col-md-2">    

        </div>
        <div class="col-md-8">
            {% if message %}
            <div class="alert alert-dismissible alert-success">
                <button class="close" data-dismiss="alert" type="button">x</button>
                {{ message }}
            </div>
            {% endif %}         

            <table class="table table-bordered">
              
                <thead>
                    <tr>
                        <th>Question ID</th>
                        <th>Exam ID</th>
                        <th>Text</th>
                        <th>Type</th>
                        <th>Answer</th>
                        <th>Action</th>
                    </tr>
                </thead>
            
                <tbody>
                {% for question in questions %}
                    <tr>
                        <td><a href="{{ URL.to('/admin/question') }}/{{ question.question_id }}">{{ question.question_id }}</a></td>
                        <td>{{ question.exam_id }}</td>
                        <td>{{ question.text }}</td>
                        <td>{{ question.type }}</td>
                        <td>{{ question.ans }}</td>
                        <td>
                            <button ><span class="glyphicon glyphicon-check"></span></button>                            
                        </td>
                        
                    </tr>
                {% endfor %}                    
                </tbody>
            </table>






            <input class="btn btn-success" type="submit" name="btnadd" value="Add">

            <form>
        </div>
        <div class="col-md-2">            
        </div>

         </div>                 

    </div>
</div>
