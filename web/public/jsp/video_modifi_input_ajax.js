function modifvideo (element){
    
inputelement = document.getElementById("inputsub");
    
    if(inputelement){
            element = document.getElementById('inputsub');
    element.style.display ="contents";
    }else{
        
    

//element = document.querySelector('#mvideo');
id = '#subm'+element.getAttribute("idvideo");
idlink = element.getAttribute("idvideo");




$('<div id=inputsub><form id=form method="post"  ><textarea id="ninput" type="text" name="link" placeholder="coller nouvelle balise"></textarea> <input type="submit"   /></form></div>').appendTo(id);
    
$('#form').submit(function(event){
    event.preventDefault();
    formdata = $(this).serialize()
                  $.ajax({
                  url: '../test/'+idlink,
                  type: 'POST',
                  dataType: 'json',
                  data: $(this).serialize(),
                  success: function (data){
                      console.log(data['link']);
                      sucessjava(idlink,formdata,data['link']);
                      
                  }
                  });
                  });
    
    function sucessjava(id,formdata, link){
    
    videoelement = "video"+id;    
        
    element = document.getElementById('inputsub');
    element.style.display ="none";
    
    video = document.getElementById(videoelement);    
    //video.setAttribute("src", link);
        $('#video'+idlink).html(link);
        videosize();
    
    console.log(video);
    
    
}}
}




                  
