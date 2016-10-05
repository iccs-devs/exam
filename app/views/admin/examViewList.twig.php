

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
                        <td><a href="{{ URL.to('/admin/exam') }}/{{ exam.title }}"> {{ exam.title }}</a></td>
                        <td><a href="{{ URL.to('/admin/exam') }}/{{ exam.description }}"> {{ exam.description }}</a></td>
                        <td><a href="{{ URL.to('/admin/exam') }}/{{ exam.random }}"> {{ exam.random }}</a></td>
                        <td><a href="{{ URL.to('/admin/exam') }}/{{ exam.pass_percentage }}"> {{ exam.pass_percentage }}</a></td>
                        <td>  
                            
                            <a class="btn btn-default" type="button" href=" {{ URL.to('/admin/exam/delete') }}/{{ exam.exam_id }}" method="DELETE"  onsubmit="return confirm('Are you sure you want to submit?');">
                            <span class="glyphicon glyphicon-check">
                            </span>
                            </a>
                            
                            {{ Form.open(['method' , 'delete', 'route' , 'exam.examViewList'] ) }}
                            {{ Form.hidden('id', 'exam_id') }}
                            

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


