<h2>Muokkaa oikeusmerkkinnän tietoja</h2>

<form class="" action="<?php echo site_url('permission/update_permission'); ?>" method="post">
  <input type="hidden" name="TilioikeudetID" value="<?php echo $selected_permission[0]['TilioikeudetID']; ?>">

  <label for="">Asiakkaan ID</label><br>
  <input type="number" name="AsiakasID" value="<?php echo $selected_permission[0]['AsiakasID']; ?>"><br>

  <label for="">Tilin ID</label><br>
  <input type="number" name="TiliID" value="<?php echo $selected_permission[0]['TiliID']; ?>"><br>

  <label for="">Pankkitunnus</label><br>
  <input type="text" name="Pankkitunnus" value="<?php echo $selected_permission[0]['Pankkitunnus']; ?>"><br>

  <input type="hidden" name="Salasana" value="<?php echo $selected_permission[0]['Salasana']; ?>"><br><br>

  <input class="btn btn-primary" type="submit" name="" value="Tallenna">
  <a class="btn btn-primary" href="<?php echo site_url('permission/show_all_permissions'); ?>">Peruuta</a>
</form>
