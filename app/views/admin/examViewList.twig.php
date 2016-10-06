

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
                     <php 
                     
                    <tr>
                        <td><a href="{{ URL.to('/admin/exam') }}/{{ exam.exam_id }}"> {{ exam.exam_id }}</a></td>
                        <td> {{ exam.title }}</td>
                        <td> {{ exam.description }}</td>
                        <td> {{ exam.random }}</td>
                        <td> {{ exam.pass_percentage }}</td>
                        <td>  
                            
                            <a class="btn btn-default" type="button" href=" {{ URL.to('/admin/exam/delete') }}/{{ exam.exam_id }}"   onclick="return confirm('Are you sure you want to delete?');">
                            <span class="glyphicon glyphicon-remove-sign">
                            </span>
                            </a> 
                            
                            {{ Form.open(['method' , 'delete', 'route' , 'exam.examViewList'] ) }}
                            {{ Form.hidden('id', 'exam_id') }}
                        </td>
                        
                         </tr>  

                
                {% endfor %}                    
                  
                </tbody>
            </table>

            

            <a class="btn btn-success" type="submit" name="btnadd" value="Add" href="{{ URL.to('/admin/exam/add') }}">Add</a>
           

            <form>
        </div>
        <div class="col-md-2">            
        </div>

         </div>                 

    </div>


