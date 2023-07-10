<html>
    <head>
        <style>
            body{
                font-size: 24px;
            }
        </style>
    </head>
</html>

<?php

const B = '<br>';
const H = '<hr>';
//traitement erreurs
$err = 0;

$nom = '';
$prenom = '';
$choix_sexe = '';
$status = '';
$mdp = '';
$passion = '';
$passes_temps = [];

//message d'erreur

$nomerr = '';
$prenomerr = '';
$choix_sexeerr = '';
$statuserr = '';
$mdperr = '';
$passionerr = '';
$passes_tempserr = '';

if(isset($_GET['nom'])){
    $nom = filter_var($_GET['nom']);
    if($nom == ''){
    $nomerr = "le nom est obligatoire";
    $err = 1;
}
};

if(isset($_GET['prenom'])){
    $prenom = filter_var($_GET['prenom']);
    if($prenom == ''){
    $prenomerr = "le prenom est obligatoire";
    $err = 1;
}    
};

if(isset($_GET['choix_sexe'])){
    $choix_sexe = filter_var($_GET['choix_sexe']);
    if($choix_sexe == ''){
    $choix_sexeerr = "le choix est obligatoire";
    $err = 1;
    }
};

if(isset($_GET['statut_marital'])){
    $status = filter_var($_GET['statut_marital']);
    if($status == ''){
    $statuserr = "le status est obligatoire";
    $err = 1;
    }else {
        $status = 'non-marié';
    }
}

if(isset($_GET['mot_de_passe'])){
    $mdp = filter_var($_GET['mot_de_passe']);
    if($mdp == ''){
    $mdperr = "le mot de passe est obligatoire";
    $err = 1;
}}
if(isset($_GET['passion_pref'])){
    $passion = filter_var($_GET['passion_pref']);
    if($passion == ''){
    $passionerr = "la choix est obligatoire";
    $err = 1;}
}

if(isset($_GET['passes_temps'])){
    $passes_temps = filter_var_array($_GET['passes_temps']);
    if($passes_temps == []){
    $passes_tempserr = "le choix est obligatoire";
    $err = 1;
}
}


if($err == 1){
    echo "ERREUR :".B.B;
    if($nomerr != '') echo $nomerr.B;
    if($prenomerr != '') echo $prenomerr.B;
    if($choix_sexeerr != '') echo $choix_sexeerr.B;
    if($statuserr != '') echo $statuserr.B;
    if($mdperr != '') echo $mdperr.B;
    if($passionerr != '') echo $passionerr.B;
    if($passes_tempserr != '') echo $passes_tempserr.B;
}

echo B.B.H;
echo 'Info saisies (DEBUG):'.B.B;
echo "nom : $nom" .B;
echo "prenom : $prenom" .B;
echo "choix_sexe : $choix_sexe" .B;
echo "MDP : $mdp" .B;
echo "passion : $passion" .B;
echo "passes temps : " .B;
    foreach($passes_temps as $value){
        echo" - $value" .B;
    }

if($err == '' ) {
    echo B. '<a  href= "javascript:hitory.back()">Erreurs : retour page precedente...</a>';
}else{
    $str = '';
    $str .= 'nom='.$nom;
    $str .= '&prenom='.$prenom;
    $str .= '&txt_sex=' .$choix_sexe;
    $str .= '&txt_st_marital=' .$status;
    $str .= '&mot_de_passe=' .$mdp;
    $str .= '&passion_pref=' .$passion;

    $tmp = '<ul>';
    foreach($passes_temps as $val) {
        $tmp .= "<li>$val</li>";
    }
    $tmp .= '</ul>';
    $str .= '&txt_passes_temps='. $tmp;

    echo $str;

    header('location: affichage.php?' .$str);
}


?>