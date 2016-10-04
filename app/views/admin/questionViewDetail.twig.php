

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
			{{ Form.open({'action': 'questionSave', 'class':'form-horizontal'}) }}
                        
		<div class="col-md-4">    

                </div>
                <div class="col-md-4">
                    {% if message %}
                    <div class="alert alert-dismissible alert-success">
                        <button class="close" data-dismiss="alert" type="button">x</button>
                        {{ message }}
                    </div>
                    {% endif %}         
                    <div class="form-group">
                      <label class="col-sm-3 control-label" for="example-text-input-horizontal">
                        Question ID
                      </label>
                      <div class="col-sm-9">
                        <input class="form-control" id="example-text-input-horizontal" type="text" name="question_id" value="{{ question.question_id }}">
                        {% if errors.first('question_id') %}
                        <span class="label label-danger">{{ errors.first('question_id') }}  </span>
                        {% endif %}                        
                      </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="example-text-input-horizontal">
                          Exam ID
                        </label>
                        <div class="col-sm-9">
                            <input class="form-control" id="example-text-input-horizontal" type="text" name="exam_id" value="{{ question.exam_id }}">
                            {% if errors.first('exam_id') %}
                            <span class="label label-danger">{{ errors.first('exam_id') }}  </span>
                            {% endif %} 
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label" for="example-text-input-horizontal">
                          Text
                      </label>
                      <div class="col-sm-9">
                          <textarea type="text" placeholder="Type here" name="text">{{ question.text }}</textarea>
                        {% if errors.first('text') %}
                        <span class="label label-danger">{{ errors.first('text') }}  </span>
                        {% endif %} 

                      </div>
                    </div>
                    

                      <div class="form-group">
                            <label class="col-sm-3 control-label">Type</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="type">                                        
                                        <option>{{ question.type }}</option>
                                        <option>Text</option>
                                        <option>Radio Button</option>
                                        <option>Select</option>
                                      </select>
                                 </div>
                      </div>
                    
                       <div class="form-group">
                            <label class="col-sm-3 control-label" for="example-text-input-horizontal">
                                Answer
                            </label>
                         <div class="col-sm-9">
                                <input class="form-control" id="example-text-input-horizontal" type="text" name="answer" value="{{ question.answer }}">
                          
                              {% if errors.first('answer') %}
                               <span class="label label-danger">{{ errors.first('answer') }}  </span>
                              {% endif %} 

                         </div>
                       </div>
                               <input class="btn btn-success" type="submit" name="btnadd" value="Add">

                                </form>
                          <div class="col-md-4">            
                          </div>
             
                 </div>                 
        </div>
    </div>
</div>