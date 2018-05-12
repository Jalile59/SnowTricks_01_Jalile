function popdeleted(element){
    
    console.log(element);
    
    var rep = confirm("Vous voulez vraiment effacer cette figure ??");
    
    if (rep === true){
         alert("Votre figure a bien été supprimé !")
    }else{
        
        element.setAttribute("href","#");
        console.log(element);
    }
    
    
    
}