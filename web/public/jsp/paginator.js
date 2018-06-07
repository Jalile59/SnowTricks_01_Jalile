page=0;
document.getElementById("plus").addEventListener("click", increment);


function increment(){
    
     page+=5;
    
    console.log(page);
    

    formdatas = $(this).serialize()
                  $.ajax({
                  url: './'+page,
                  type: 'GET',
                  dataType: 'json',
                  data: $(this).serialize(),
                  success: function (data){
                      console.log(data);
                      alert('La description a été mis à jour');
                      
                  }
                  });
                
}

