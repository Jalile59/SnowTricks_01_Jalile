 $(document).ready(function() {
    // On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
    var $container = $('div#dj_viewbundle_figures_picture');
    var $container2 = $('div#dj_viewbundle_figures_videofigure');

    // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
    var index = $container.find(':input').length;
    var index2 = $container2.find(':input').length;

    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $('#add_Pictures').click(function(e) {
      addCategory($container);

      e.preventDefault(); // évite qu'un # apparaisse dans l'URL
      return false;
    });
    
        $('#add_Videos').click(function(e) {
      addCategory2($container2);

      e.preventDefault(); // évite qu'un # apparaisse dans l'URL
      return false;
    });

    // On ajoute un premier champ automatiquement s'il n'en existe pas déjà un (cas d'une nouvelle annonce par exemple).
    if (index == 0) {
      addCategory($container);
    } else {
      // S'il existe déjà des catégories, on ajoute un lien de suppression pour chacune d'entre elles
      $container.children('div').each(function() {
        addDeleteLink($(this));
      });
    }
    
    if (index2 == 0) {
      addCategory2($container2);
    } else {
      // S'il existe déjà des catégories, on ajoute un lien de suppression pour chacune d'entre elles
      $container2.children('div').each(function() {
        addDeleteLink2($(this));
      });
    }

    // La fonction qui ajoute un formulaire CategoryType
    function addCategory($container) {
      // Dans le contenu de l'attribut « data-prototype », on remplace :
      // - le texte "__name__label__" qu'il contient par le label du champ
      // - le texte "__name__" qu'il contient par le numéro du champ
      var template = $container.attr('data-prototype')
        .replace(/__name__label__/g, 'Pictures n°' + (index+1))
        .replace(/__name__/g,        index)
      ;

      // On crée un objet jquery qui contient ce template
      var $prototype = $(template);

      // On ajoute au prototype un lien pour pouvoir supprimer la catégorie
      addDeleteLink($prototype);

      // On ajoute le prototype modifié à la fin de la balise <div>
      $container.append($prototype);

      // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
      index++;
    }
    
        function addCategory2($container2) {
      // Dans le contenu de l'attribut « data-prototype », on remplace :
      // - le texte "__name__label__" qu'il contient par le label du champ
      // - le texte "__name__" qu'il contient par le numéro du champ
      var template2 = $container2.attr('data-prototype')
        .replace(/__name__label__/g, 'Videos n°' + (index2+1))
        .replace(/__name__/g,        index2)
      ;

      // On crée un objet jquery qui contient ce template
      var $prototype2 = $(template2);

      // On ajoute au prototype un lien pour pouvoir supprimer la catégorie
      addDeleteLink2($prototype2);

      // On ajoute le prototype modifié à la fin de la balise <div>
      $container2.append($prototype2);

      // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
      index2++;
    }

    // La fonction qui ajoute un lien de suppression d'une catégorie
    function addDeleteLink($prototype) {
      // Création du lien
      var $deleteLink = $('<a href="#" class="btn btn-danger">Supprimer</a>');

      // Ajout du lien
      $prototype.append($deleteLink);

      // Ajout du listener sur le clic du lien pour effectivement supprimer la catégorie
      $deleteLink.click(function(e) {
        $prototype.remove();

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
      });
    }
    
        function addDeleteLink2($prototype2) {
      // Création du lien
      var $deleteLink2 = $('<a href="#" class="btn btn-danger">Supprimer</a>');

      // Ajout du lien
      $prototype2.append($deleteLink2);

      // Ajout du listener sur le clic du lien pour effectivement supprimer la catégorie
      $deleteLink2.click(function(e) {
        $prototype2.remove();

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
      });
    }
  });