

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
			{{ Form.open({'action': 'examSave', 'class':'form-horizontal'}) }}
                        
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
                        Exam ID
                      </label>
                      <div class="col-sm-9">
                        <input class="form-control" id="example-text-input-horizontal" type="text" name="exam_id" value="{{ exam.exam_id }}">
                        {% if errors.first('exam_id') %}
                        <span class="label label-danger">{{ errors.first('exam_id') }}  </span>
                        {% endif %}                        
                      </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="example-text-input-horizontal">
                            Title
                        </label>
                        <div class="col-sm-9">
                            <input class="form-control" id="example-text-input-horizontal" type="text" name="title" value="{{ exam.title }}">
                            {% if errors.first('title') %}
                            <span class="label label-danger">{{ errors.first('title') }}  </span>
                            {% endif %} 
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label" for="example-text-input-horizontal">
                          Description
                      </label>
                      <div class="col-sm-9">
                          <textarea type="text" placeholder="Type here" name="description">{{ exam.description }}</textarea>
                        {% if errors.first('description') %}
                        <span class="label label-danger">{{ errors.first('description') }}  </span>
                        {% endif %} 

                      </div>
                    </div>
                    
                       <div class="form-group">
                            <label class="col-sm-3 control-label" for="example-text-input-horizontal">
                                Random
                            </label>
                         <div class="col-sm-9">
                                <input class="form-control" id="example-text-input-horizontal" type="text" name="random" value="{{ exam.random }}">
                              {% if errors.first('random') %}
                               <span class="label label-danger">{{ errors.first('random') }}  </span>
                              {% endif %} 

                         </div>
                       </div>
                    
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="example-text-input-horizontal">
                                Pass Percentage
                            </label>
                             <div class="col-sm-9">
                                <input class="form-control" id="example-text-input-horizontal" type="text" name="pass_percentage" value="{{ exam.random }}">
                              {% if errors.first('pass_percentage') %}
                               <span class="label label-danger">{{ errors.first('pass_percentage') }}  </span>
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