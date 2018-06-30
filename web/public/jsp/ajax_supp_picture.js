function suppPicture(element, event){
    
    event.preventDefault();
    media = 'picture';

    idpicture = element.getAttribute("idpict");

    //idpicture = document.getElementById("pictureP");
    id = element.getAttribute("idpicture");
    link_noimage = "/SnowTricks_01/web/images/noimge.jpg";


    console.log('idpicture ='+idpicture);



    formdatas = $(this).serialize()
                  $.ajax({
                  url: '../delPicture/'+media+'/'+idpicture,
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



function suppVideo(element, event){
    
    event.preventDefault();
    
    media = 'video';
    
    idmedia = element.getAttribute("idvideo");

    


    link_noimage = "/SnowTricks_01/web/images/noimge.jpg";


    console.log('idmediaVideo ='+idmedia);



    formdatas = $(this).serialize()
                  $.ajax({
                  url: '../delPicture/'+media+'/'+idmedia,
                  type: 'POST',
                  dataType: 'json',
                  data: $(this).serialize(),
                  success: function (data){
                      console.log(data);
                      
                     // $('#pictureP').attr('src', link_noimage);
                      $('#div'+idmedia).remove();
                      alert('video supprimé');
                      
                  }
                  });
                  ;
    
}