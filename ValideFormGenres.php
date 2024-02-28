<?php include "header.php";
include "connexionPDO.php";
$action=$_GET['action'];
$num=$_POST['num'];
$libelle=$_POST['libelle'];

if($action== "Modifier"){
    $req=$monPdo->prepare("update genre set libelle = :libelle where num = :num");
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
}else{
    $req=$monPdo->prepare("insert into genre(libelle) values(:libelle)");
    $req->bindParam(':libelle', $libelle);
}
$nb=$req->execute();
$message=$action == "Modifier" ? "modifiée" : "ajoutée" ;


if($nb == 1){
    $_SESSION['message']=['primary'=>"La nationalité a bien été: " .$action];
}else{
    $_SESSION['message']=['danger' => 'la nationalité n\'a pas été: '.$action];
}
header('location: listeGenres.php');
exit();
?>
</div>
</div>
<a href="listeGenres.php" class="btn btn-primary">Revenir a la liste des genres</a>


<div class="container mt-5">

</div>


<?php include "footer.php";

?>