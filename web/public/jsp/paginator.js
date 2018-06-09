page=0;
document.getElementById("next").addEventListener("click", increment());


function increment(){
    
    element = document.getElementById('next');
    idarticle = element.getAttribute('idarticle');
    
    page++;
   

    
    console.log(page);
    

    formdatas = $(this).serialize()
                  $.ajax({
                  url: './'+idarticle+'/'+page,
                  type: 'GET',
                  dataType: 'json',
                  data: $(this).serialize(),
                  success: function (data){
                      console.log(data);
                      alert('La description a été mis à jour');
                      
                  }
                  });
                
}

