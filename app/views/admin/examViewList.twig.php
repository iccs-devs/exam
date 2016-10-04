

<div class="container-fluid">
    <div class="row">
  
        {{ Form.open({'action': 'examSave', 'class':'form-horizontal'}) }}
                        
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
                        <th>Exam ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Random</th>
                        <th>Pass Percentage</th>
                        <th>Action</th>
                    </tr>
                </thead>
            
                <tbody>
                     {% for exam in exams %}
                    <tr>
                        <td><a href="{{ URL.to('/admin/exam') }}/{{ exam.exam_id }}">{{ exam.exam_id }}</a></td>
                        <td>{{ exam.title }}</td>
                        <td>{{ exam.description }}</td>
                        <td>{{ exam.random }}</td>
                        <td>{{ exam.pass_percentage }}</td>
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
