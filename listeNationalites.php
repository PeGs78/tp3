<?php include "header.php";
include "connexionPDO.php";
$req=$monPdo->prepare("select* from nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites=$req->fetchALL();
?>


<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-9"><h2>Liste des nationalités</h2></div>
        <div class="col-3"><a href="FormNationalite.php?action=Ajouter" class='btn btn-secondary'><i class="fa-solid fa-plus"></i> Créer une nationalité</a></div>
    </div>
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
    foreach($lesNationalites as $nationalite){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>$nationalite->num</td>";
        echo "<td class='col-md-8'>$nationalite->libelle</td>";
        echo "<td class='col-md-2'>
            <a href='FormNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-primary'><i class='fa-solid fa-pen'></i></a>
            <a href='supprimerNationalite.php?num=$nationalite->num' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a>
        </td>";
        echo "</tr>";
    }
    ?>
        
    </tbody>
    </table>

</div>
<div class="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <a href="" class="btn btn-primary">Supprimer</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php";

?>


