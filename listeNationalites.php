<?php include "header.php";
include "connexionPDO.php";
$libelle="";
$continentSel="Tous";
$texteReq="select n.num, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num";
  if(!empty($_GET)){
      $libelle=$_GET['libelle'];
      var_dump($libelle);
      $continentSel=$_GET['continent'];
      if($libelle !=""){$texteReq.=" and n.libelle like '%" .$libelle. "%'";}
      if($continentSel !="Tous"){$texteReq.=" and c.num = " .$continentSel;}
  }

  $texteReq.=" order by n.libelle";  
  var_dump($texteReq);

$req=$monPdo->prepare($texteReq);
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites=$req->fetchAll();

$reqContinent=$monPdo->prepare("select * from continent");
$reqContinent->setFetchMode(PDO::FETCH_OBJ);
$reqContinent->execute();
$lesContinents=$reqContinent->fetchAll(); 


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
    <div class="col-9"><h2>Liste des nationalités</h2></div>
    <div class="col-3"><a href="FormNationalite.php?action=Ajouter" class='btn btn-secondary'><i class="fa-solid fa-plus"></i> Créer une nationalité</a></div>
  </div>


  
  <form action="" method="get" class="border border-primary rounded p-3 mt-3 mb-3">
    <div class="row">
      <div class="col">
        <input type="text" class='form-control' id='libelle' placeholder='saisir le libellé' name='libelle' value="<?php echo $libelle ?>">
      </div>
      <div class="col">
      <select name='continent' class='form-control'>
                  <?php
                  echo "<option value='Tous'>tous les continents</option>";
                  foreach($lesContinents as $continent){
                      $selection=$continent->num == $continentSel ? 'selected' :'';
                     echo "<option value='$continent->num' $selection>$continent->libelle</option>";
                  }
                  ?>
      </select>
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
        <th scope="col" class="col-md-5">Libellé</th>
        <th scope="col" class="col-md-3">Continent</th>
        <th scope="col" class="col-md-2">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($lesNationalites as $nationalite){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>$nationalite->num</td>";
        echo "<td class='col-md-5'>$nationalite->libNation</td>";
        echo "<td class='col-md-3'>$nationalite->libContinent</td>";
        echo "<td class='col-md-2'>
            <a href='FormNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-primary'><i class='fa-solid fa-pen'></i></a>
            <a href='#modalSup'  class='btn btn-danger' data-toggle='modal' data-message='Voulez vous vraiment supprimer cette nationalité ?' data-sup='supprimerNationalite.php?num=$nationalite->num'?>
            <i class='fa-solid fa-trash'></i></a>
        </td>";
        echo "</tr>";
    }
    // supprimerNationalite.php?num=$nationalite->num
    ?>

    </tbody>
    </table>

</div>


<?php include "footer.php";

?>


