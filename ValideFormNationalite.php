<?php include "header.php";
include "connexionPDO.php";
$action=$_GET['action'];
$num=$_POST['num'];
$libelle=$_POST['libelle'];
$continent=$_POST['continent'];

if($action== "Modifier"){
    $req=$monPdo->prepare("update nationalite set libelle = :libelle, numContinent= :continent where num = :num");
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
    $req->bindParam(':continent', $continent);
}else{
    $req=$monPdo->prepare("insert into nationalite(libelle, numContinent) values(:libelle, :continent)");
    $req->bindParam(':libelle', $libelle);
    $req->bindParam(':continent', $continent);
}
$nb=$req->execute();
$message=$action == "Modifier" ? "modifiée" : "ajoutée" ;


if($nb == 1){
    $_SESSION['message']=['primary'=>"La nationalité a bien été: " .$action];
}else{
    $_SESSION['message']=['danger' => 'la nationalité n\'a pas étè: ' .$action];
}
header('location: listeNationalites.php');
exit();
?>
</div>
</div>
<a href="listeNationalites.php" class="btn btn-primary">Revenir a la liste des nationalités</a>


<div class="container mt-5">

</div>


<?php include "footer.php";

?>