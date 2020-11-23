var i = 3;
function ajout(){
    document.getElementById('reponses').innerHTML += 
    '<div class="reponse">'+
    '<label for="">Réponse ' + i + '</label>'+
    '<input type="text" name="reponse'+i+'">'+
    '</div>';

    i++;
}
$