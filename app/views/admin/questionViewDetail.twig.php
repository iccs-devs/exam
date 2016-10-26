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
        
          <div class="form-group" >
             
                <label class="col-sm-3 control-label" for="example-text-input-horizontal">
                    Option ID
                </label>
             <div class="col-sm-3">
                   <input class="form-control" id="example-text-input-horizontal" type="text" name="option_id" value="">
                   
                  {% if errors.first('option') %}
                   <span class="label label-danger">{{ errors.first('option') }}  </span>
                  {% endif %} 
                  
             </div>
          
             <div class="col-sm-4">
                    
                    <input class="form-control" id="example-text-input-horizontal" type="text" name="option_text" value=""> 
                         {% if errors.first('option') %}
                   <span class="label label-danger"> {{ errors.first('option') }}  </span>
                  {% endif %} 
                  
             </div>
                    <input class="btn btn-success" type="submit" name="btnadd" value="Add">
               <br/>
                    {% for option in options %}
                   <br/>
           <div class="form-group">
               <table>
                   <tr>
                   <a href="{{ URL.to('/admin/option') }}/{{ option.option_id }}"> 
                    <label class="col-sm-10 control-label" for="example-text-input-horizontal">
                    {{ option.option_id }} 
                    {{ option.option_text }} 
                      </label>
                   </a>
                      <a class="btn btn-danger" type="button" href=" {{ URL.to('/admin/option/destroy') }}/{{ option.option_id }}"   onclick="return confirm('Are you sure you want to delete?');">
                        <span class="glyphicon glyphicon-remove-sign">
                        </span>
                      </a> 
                   </tr>
                   {% endfor%}
              </table> 
           </div>
           <div class="form-group">
                <label class="col-sm-3 control-label" for="example-text-input-horizontal">
                    Answer
                </label>
             <div class="col-sm-8">
                    <input class="form-control" id="example-text-input-horizontal" type="text" name="answer" value="{{ question.answer }}">

                  {% if errors.first('answer') %}
                   <span class="label label-danger">{{ errors.first('answer') }}  </span>
                  {% endif %} 

             </div>
           </div>

        <input class="btn btn-success" type="submit" name="btnadd" value="Save">

        </form>
        <div class="col-md-3">            
        </div>

     </div>                 
          </div>
        </div>
    </div>
</div>


