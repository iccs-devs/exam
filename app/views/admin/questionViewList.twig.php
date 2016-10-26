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
                <td>{{ question.text }}</td>
                <td>{{ question.type }}</td>
                <td>{{ question.answer }}</td>
                <td>
                     <a class="btn btn-danger" type="button" href=" {{ URL.to('/admin/question/delete') }}/{{ question.question_id }}"   onclick="return confirm('Are you sure you want to delete?');">
                    <span class="glyphicon glyphicon-remove-sign">
                    </span>
                    </a> 

                    <a class="btn btn-info" type="button" href="{{ URL.to('/admin/question') }}/{{ question.question_id }}"> Edit
                    </a>                      
                </td>

            </tr>
        {% endfor %}                    
        </tbody>
        </table>

        <a class="btn btn-success" type="submit" name="btnadd" value="Add" href="{{ URL.to('/admin/question/update') }}">Add</a>

        <form>
    </div>
    <div class="col-md-2">            
    </div>

    </div>                 
</div>
