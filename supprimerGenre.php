<?php include "header.php";
include "connexionPDO.php";
$num=$_GET['num'];
$req=$monPdo->prepare("delete from genre where num = :num");
$req->bindParam(':num', $num);
$nb=$req->execute();


echo'<div class="container mt-5">';
echo '<div class="row">
    <div class="col mt-3">';
if($nb == 1){
    echo '<div class="alert alert-primary" role="alert">
        Le genre a bien été supprimée
        </div>';
}else{
    echo '<div class="alert alert-danger" role="alert">
    le genre n\'a pas été supprimée !
    </div>';
}
?>
</div>
</div>
<a href="listeGenres.php" class="btn btn-primary">Revenir a la liste des genres</a>


<div class="container mt-5">

</div>


<?php include "footer.php";

?>