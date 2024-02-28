<?php include "header.php";
include "connexionPDO.php";
$libelle="";
$textReq="select * from genre";  
if(!empty($_GET)){
    $libelle = $_GET['libelle'];
    if( $libelle != "") {$textReq.= " where libelle like '%".$libelle."%'";}
}
$textReq.=" order by genre.libelle";  
var_dump($textReq);
$req=$monPdo->prepare($textReq);
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesGenres=$req->fetchALL();


if(!empty($_SESSION['message'])){
    $mesMessages=$_SESSION['message'];
    foreach($mesMessages as $key=>$message ){
      echo'<div class="container pt-5">
      <div class="alert alert-'.$key.' alert-dismissible fade show" role="alert">'.$message.'
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div> 
    </div>';
      
    }
    $_SESSION['message']=[];
  }
?>


<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-9"><h2>Liste des genres</h2></div>
        <div class="col-3"><a href="FormGenres.php?action=Ajouter" class='btn btn-secondary'><i class="fa-solid fa-plus"></i> Créer un genre</a></div>
    </div>

    <form action="" method="get" class="border border-primary rounded p-3 mt-3 mb-3">
    <div class="row">
      <div class="col">
        <input type="text" class='form-control' id='libelle' placeholder='saisir le libellé' name='libelle' value="<?php echo $libelle ?>">
      </div>
      <div class="col">
      </div>
      <div class="col">
        <button type="submit" class='btn btn-sucess btn-block'>Rechercher</button>
      </div>
    </div>
  </form>


    <table class="table table-hover table-striped table-dark">
    <thead>
        <tr class="d-flex">
        <th scope="col" class="col-md-2">Numéro</th>
        <th scope="col" class="col-md-8">Libellé</th>
        <th scope="col" class="col-md-2">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($lesGenres as $genre){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>$genre->num</td>";
        echo "<td class='col-md-8'>$genre->libelle</td>";
        echo "<td class='col-md-2'>
            <a href='FormGenres.php?action=Modifier&num=$genre->num' class='btn btn-primary'><i class='fa-solid fa-pen'></i></a>
            <a href='#modalSup' class='btn btn-danger' data-toggle='modal' data-message='Voulez vous vraiment supprimer ce genres ?' data-sup='supprimerGenre.php?num=$genre->num'?><i class='fa-solid fa-trash'></i></a>
        </td>";
        echo "</tr>";
    }
    ?>
        
    </tbody>
    </table>

</div>


<?php include "footer.php";

?>


