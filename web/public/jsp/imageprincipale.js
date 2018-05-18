

function tes(test){
    
    var imgpricipale = document.getElementById("imagePincipale");
    parentel = imgpricipale.childNodes[1];
    parentel2 = imgpricipale.childNodes[2];
    console.log(parentel);
    console.log(parentel2);
    console.log(parentel2.id)
    id = '#' + test.id;
    
    if (parentel2.id){
        
       supp= imgpricipale.removeChild(parentel2);
 
    }
    
    classe = test.getAttribute('class');
    
    if(classe != 'video'){
        
        console.log("c'est une image");
        console.log(classe);
        
        createelementIMG(test)
    }else{
        console.log("c'est une video");
        console.log(classe);
        
        createelementvideo(test);
    }
    
    

}


function createelementIMG(test){
    
    t= test.id;
    link = test.src;
    link2 ="https://www.youtube.com/embed/TYbUYI6KN_E";
    console.log(t);
    
    newelement = document.createElement("img");
    newelement.setAttribute("id", "picture");
    //newelement.setAttribute("width", "600");
    //newelement.setAttribute("height", "500");
    newelement.setAttribute("src", link);
    newelement.setAttribute("class", "img-responsive displayed");
    
    supp= imgpricipale.removeChild(parentel);
    console.log(supp);
    imgpricipale.appendChild(newelement);
    
    //(parentel).replaceWith($(newelement));
    
    
}

function createelementVIDEO(test){
    
    t= test.id;
    link = test.src;
    link2 ="https://www.youtube.com/embed/TYbUYI6KN_E";
    console.log(t);
    
    newelement = document.createElement("iframe");
    newelement.setAttribute("id", "screen");
    newelement.setAttribute("width", "600");
    newelement.setAttribute("height", "500");
    newelement.setAttribute("src", link);
    
    supp= imgpricipale.removeChild(parentel);
    console.log(supp);
    imgpricipale.appendChild(newelement);
    
    //(parentel).replaceWith($(newelement));
    
    
}


function imageview(element){
    
    console.log(element);
    
   var link = element.getAttribute('src');
    
    //console.log(link);
    
    imagepricipale = document.getElementById("imagePincipale").setAttribute("src",link);
    
}

function videosize(){
    
    var m = document.querySelectorAll("iframe");
    
    //console.log(m);
    
    for (i=0; i<m.length; i++){
        //console.log(m[i].getAttribute("height"));
        m[i].setAttribute("height", '100');
        m[i].setAttribute("width", '130');
    }
    
}

function im(){
    console.log("ok");
}

function videolives(thiselement){
    
    var nelement = document.querySelector("#imgprincipale");
    
    console.log(nelement);
    
    parentt = document.getElementById("principale");
    test = parentt.removeChild(nelement);
    
    console.log(thiselement);
    
   // var chilf = nelement.childNodes;
    console.log(test);
    
    
}

videosize();

var video = document.getElementsByClassName("video");
var imgpricipale = document.getElementById("imagePincipale");
parentel = imgpricipale.childNodes[1];

console.log(parentel);

var nw = document.getElementById("videoprincipale");

console.log(video);

//console.log($('#imagePincipale::nth-child(1)'))

video.addEventListener("mouseenter", function(){
    
   t= this.id;
    
    id = '#' + this.id;
    //id = '#auteur';
    
    
    $(parentel).replaceWith($(id));
    

    console.log(id);
    
} );
    

console.log('ici');

