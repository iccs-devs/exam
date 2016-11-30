<div class="container-fluid">
    
    <br>
    
    <div class="row">
        <div class="col-md-3">            
        </div>  
        <div class="col-md-6">

            <table border="3px"> 
                <tr> 
                    <td>a</td>
                    <td>b</td>
                    <td>c</td>
                </tr>
                <tr> 
                    <td>a</td>
                    <td>b</td>
                    <td>c</td>
                </tr>
                <tr> 
                    <td>a</td>
                    <td>b</td>
                    <td>c</td>
                </tr>    
            
            </table>
            <br>
             <table border="3px"> 
                  {% set c = 2 %}
                  {% for a in 1..10 %}
                 
                    <tr> 
                        {% for b in 1..20 %}
                            <td><a href="localhost/{{ a }}">{{ c }}</td>
                        {% set c  = c+2 %}
                        
                        {% endfor %}
                       
                    </tr>
                 
            {% endfor %}
            </table>  
            
            <br>
             <table border="3px"> 
                  
                {% for part in pcParts %}                 
                    <tr>   
                        
                         <td><a href="localhost/{{ part.brand }}">{{ part.brand }}</td>
                         <td><a href="localhost/{{ part.id }}">{{ part.id }}</td>
                         <td><a href="localhost/{{ part.model }}">{{ part.model }}</td>
                         <td><a class='btn btn-danger' href="localhost/{{ part.id }}">DELETE</td>
                    </tr>
                 
                {% endfor %}
            </table>             
            
        </div>  
        <div class="col-md-3">            
        </div>       
 
    </div>
</div>

<script>
    
    
    
    
    
    
</script>