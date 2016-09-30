

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
			{{ Form.open({'action': 'questionSave', 'class':'form-horizontal'}) }}
                        
		<div class="col-md-3">    
                       
                </div>
                <div class="col-md-6">
                    {% if message %}
                    <div class="alert alert-dismissible alert-success">
                        <button class="close" data-dismiss="alert" type="button">×</button>
                        {{ message }}
                    </div>
                    {% endif %}         
                    <div class="form-group">
                      <label class="col-sm-3 control-label" for="example-text-input-horizontal">
                        Question ID
                      </label>
                      <div class="col-sm-9">
                        <input class="form-control" id="example-text-input-horizontal" type="text" name="question_id" value="{{ Input.old('question_id') }}">
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
                        <input class="form-control" id="example-text-input-horizontal" type="text" name="exam_id" value="{{ Input.old('exam_id') }}">
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
                          <textarea type="text" placeholder="Type here" name="text">{{ Input.old('text') }}</textarea>
                        {% if errors.first('text') %}
                        <span class="label label-danger">{{ errors.first('text') }}  </span>
                        {% endif %} 

                      </div>
                    </div>


                      <div class="form-group">
                        <label class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-4">
                          <select class="form-control" name="type">
                            <option>Text</option>
                            <option>Radio Button</option>
                            <option>Select</option>
                          </select>
                        </div>
                              </div>
                               <input class="btn btn-success" type="submit" name="btnadd" value="Add">

                                </form>
                               <div class="col-md-3">            
                              </div>
             
                 </div>                 
        </div>
    </div>
</div>
