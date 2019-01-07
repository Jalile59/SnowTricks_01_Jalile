


idarticle = document.getElementById("auteur");
id = idarticle.getAttribute("idarticle");

console.log('idarticle ='+id);

$('#formdescription').click(function(event){
    event.preventDefault();
    var ed = tinyMCE.get('desciption').getContent();
   console.log(ed);
    formdatas = $(this).serialize()
                  $.ajax({
                  url: '../updatedescription/'+id,
                  type: 'POST',
                  dataType: 'json',
                  data: 'description=' + ed,
                  success: function (data){
                      console.log(data);
                      alert('La description a été mis à jour');
                      
                  }
                  });
                  });