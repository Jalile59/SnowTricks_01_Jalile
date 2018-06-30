function suppPicture(element, event){
    
     event.preventDefault();
    
idpicture = element.getAttribute("idpict");

//idpicture = document.getElementById("pictureP");
id = element.getAttribute("idpicture");
link_noimage = "/SnowTricks_01/web/images/noimge.jpg";


console.log('idpicture ='+idpicture);



    formdatas = $(this).serialize()
                  $.ajax({
                  url: '../delPicture/'+idpicture,
                  type: 'POST',
                  dataType: 'json',
                  data: $(this).serialize(),
                  success: function (data){
                      console.log(data);
                      
                     // $('#pictureP').attr('src', link_noimage);
                      $('#div'+idpicture).remove();
                      alert('photo supprimé');
                      
                  }
                  });
                  ;
    
}