function modifvideo (element){
    
inputelement = document.getElementById("inputsub");
    
    if(inputelement){
            element = document.getElementById('inputsub');
    element.style.display ="contents";
    }else{
        
    

//element = document.querySelector('#mvideo');
id = '#subm'+element.getAttribute("idvideo");
idlink = element.getAttribute("idvideo");




$('<div id=inputsub><form id=form method="post"  ><textarea id="ninput" type="text" name="link" value="" placeholder="coller nouvelle balise"/> <input type="submit"   /></form></div>').appendTo(id);
    
$('#form').submit(function(event){
    event.preventDefault();
    formdata = $(this).serialize()
                  $.ajax({
                  url: '../test/'+idlink,
                  type: 'POST',
                  dataType: 'json',
                  data: $(this).serialize(),
                  success: function (data){
                      console.log(data);
                      sucessjava(id,formdata);
                      
                  }
                  });
                  });
    
    function sucessjava(id,formdata){
    
    element = document.getElementById('inputsub');
    element.style.display ="none";
    console.log('dans la fucntion');
    
    
}}
}




                  
