function popdeleted(element){
    
    
    var rep = confirm("Vous voulez vraiment effacer cette figure ??");
    
    if (rep === true){
         alert("Votre figure a bien été supprimé !")
    }else{
        
        element.setAttribute("href","#");
    }
    
    
    
}

function affichefig(){
    
    var element = document.getElementById("figuredisplay");
    
    element.style.display ="block";
    
 $('html,body').animate({scrollTop: $("#figuredisplay").offset().top}, 'slow'      );
}