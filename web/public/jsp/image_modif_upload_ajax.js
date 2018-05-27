    elements = document.querySelectorAll("#fileuploader");


$(document).ready(function()
{       
   
    for (i=0; i<elements.length; i++){ 
        
     var id= elements[i].getAttribute('idphoto');
    $(elements[i]).uploadFile({
    
    
    url:"../ajaxpicture/"+id, // ma varible dans l'url vaut null.
    fileName:"myfile",
    dragDrop:false,
    showDownload: false,
    showDone:false,
    showPreview:false,
    showFileSize:false,
    showFileCounter:false,
    allowedTypes: 'jpg,png' ,
    onSuccess:function(files,data,xhr,pd)
        {
            //files: list of files
            //data: response from server
            //xhr : jquer xhr object
            console.log(files);
            console.log(data);
           
           newsrc(data['image'],data['id']);
            
        }

    })
      }
      
      
        
});

    function newsrc(src,id){
        

        element = document.getElementById(id);
        url = '/SnowTricks_01/web/images/'+src
        element.setAttribute('src', url);
        sansup = element.getAttribute('src');
        console.log(id);
        console.log(url);
        console.log('Veridi apres modif = '+sansup);
        
    }