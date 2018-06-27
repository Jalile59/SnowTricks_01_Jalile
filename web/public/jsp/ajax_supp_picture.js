

idpicture = document.getElementById("videos");
id = idpicture.getAttribute("idpicture");
link_noimage = "/SnowTricks_01/web/images/noimge.jpg";


console.log('linknoimage ='+link_noimage);


$('#supppicture').click(function(event){
    event.preventDefault();
    formdatas = $(this).serialize()
                  $.ajax({
                  url: '../delPicture/'+id,
                  type: 'POST',
                  dataType: 'json',
                  data: $(this).serialize(),
                  success: function (data){
                      console.log(data);
                      
                      $('#videos').attr('src', link_noimage);
                      
                      alert('photo supprimé');
                      
                  }
                  });
                  });