<h2>Lisää uudet tilioikeudet</h2>

<form class="" action="<?php echo site_url('permission/new_permission'); ?>" method="post">
  <label for="">Oikeusmerkinnän ID</label><br>
  <input type="number" name="TilioikeudetID" value=""><br>

  <label for="">Asiakkaan ID</label><br>
  <input type="number" name="AsiakasID" value=""><br>

  <label for="">Tilin ID</label><br>
  <input type="number" name="TiliID" value=""><br>

  <label for="">Pankkitunnus</label><br>
  <input type="text" name="Pankkitunnus" value=""><br>

  <label for="">Salasana</label><br>
  <input type="text" name="Salasana" value=""><br><br>

  <input class="btn btn-primary" type="submit" name="" value="Lisää"><br>
</form>
