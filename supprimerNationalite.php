<?php include "header.php";
include "connexionPDO.php";
$num=$_GET['num'];
$req=$monPdo->prepare("delete from nationalite where num = :num");
$req->bindParam(':num', $num);
$nb=$req->execute();

if($nb == 1){
    $_SESSION['message']=['primary'=>"La nationalité a bien été supprimée"];
}else{
    $_SESSION['message']=['danger' => 'la nationalité n\'a pas étè supprimée'];
}
header('location: listeNationalites.php');
exit();

?>