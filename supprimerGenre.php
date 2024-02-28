<?php include "header.php";
include "connexionPDO.php";
$num=$_GET['num'];
$req=$monPdo->prepare("delete from genre where num = :num");
$req->bindParam(':num', $num);
$nb=$req->execute();

if($nb == 1){
    $_SESSION['message']=['primary'=>"Le genre a bien été supprimée"];
}else{
    $_SESSION['message']=['danger' => 'le genre n\'a pas étè supprimée'];
}
header('location: listeGenres.php');
exit();

?>