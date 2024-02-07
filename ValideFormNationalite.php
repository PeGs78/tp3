<?php include "header.php";
include "connexionPDO.php";
$action=$_GET['action'];
$num=$_POST['num'];
$libelle=$_POST['libelle'];

if($action== "Modifier"){
    $req=$monPdo->prepare("update nationalite set libelle = :libelle where num = :num");
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
}else{
    $req=$monPdo->prepare("insert into nationalite(libelle) values(:libelle)");
    $req->bindParam(':libelle', $libelle);
}
$nb=$req->execute();
$message=$action == "Modifier" ? "modifiée" : "ajoutée" ;


echo'<div class="container mt-5">';
echo '<div class="row">
    <div class="col mt-3">';
if($nb == 1){
    echo '<div class="alert alert-primary" role="alert">
        La nationalité a bien été ' .$message. '
        </div>';
}else{
    echo '<div class="alert alert-danger" role="alert">
    La nationalité n\'a pas été '.$message.' !
    </div>';
}
?>
</div>
</div>
<a href="listeNationalites.php" class="btn btn-primary">Revenir a la liste des nationalités</a>


<div class="container mt-5">

</div>


<?php include "footer.php";

?>