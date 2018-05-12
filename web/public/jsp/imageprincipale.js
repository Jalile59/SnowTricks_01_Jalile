


function imageview(element){
    
    console.log(element);
    
   var link = element.getAttribute('src');
    
    console.log(link);
    
    imagepricipale = document.getElementById("imagePincipale").setAttribute("src",link);
    
}

function videoview(){
    
    var m = document.querySelectorAll("iframe");
    
    console.log(m);
    
    for (i=0; i<m.length; i++){
        console.log(m[i].getAttribute("height"));
        m[i].setAttribute("height", '100');
        m[i].setAttribute("width", '130');
    }
    
}

videoview();