$('#envoi').click(function(e){
    e.preventDefault(); // on empêche le bouton d'envoyer le formulaire

    var pseudo = $('#pseudo').val() ; // on sécurise les données
    var message =$('#message').val() ;

    if(pseudo != "" && message != ""){ // on vérifie que les variables ne sont pas vides
        $.ajax({
            url : "index.php?page=sondage&c="+ "&u="+"", // on donne l'URL du fichier de traitement
            method : "POST", // la requête est de type POST
            data : "pseudo=" + pseudo + "&message=" + message // et on envoie nos données
        });

       $('#messages').append("<p>" + pseudo + " dit : " + message + "</p>"); // on ajoute le message dans la zone prévue
    }
});

function charger(){


    var premierID = $('#messages p:first').attr('id'); // on récupère l'id le plus récent

    $.ajax({
        url : "charger.php?id=" + premierID, // on passe l'id le plus récent au fichier de chargement
        dataType:"json",
        method: "POST",
        success : function(html){
            $('#messages').html('');
            html.forEach(tchat => {
                
                $('#messages').append('<li>'+ tchat.tchat_auteur +' a dit : '+ tchat.tchat_message +'</li>');
            });
        }
    });

}
charger();
const interval = window.setInterval(charger, 3000);
