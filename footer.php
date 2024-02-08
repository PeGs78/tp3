<div  id="modalSup" class="modal" class='modal fade' role='dialog'>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation de suppression </h5>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <a href="" id="btnSup" class="btn btn-primary">Supprimer</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
      </div>
    </div>
  </div>
</div>

<footer class="container">
  <p>&copy; Company 2017-2022</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c55b4c0456.js" crossorigin="anonymous"></script>     
<script type="text/javascript">

  $("a[data-sup]").click(function(){
      var lien = $(this).attr("data-sup");// on récupère le lien du bouton "poubelle"
      var message = $(this).attr("data-message");
      $("#btnSup").attr("href",lien);// on écrit ce lien sur le bouton "supprimer"
      $(".modal-body").text(message);

  });
</script>  
</body>
</html>