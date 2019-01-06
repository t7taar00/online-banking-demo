<h2>Muokkaa asiakkaan tietoja</h2>

<form class="" action="<?php echo site_url('customer/update_customer'); ?>" method="post">
  <input type="hidden" name="AsiakasID" value="<?php echo $selected_customer[0]['AsiakasID']; ?>">

  <label for="">Etunimi</label><br>
  <input type="text" name="Etunimi" value="<?php echo $selected_customer[0]['Etunimi']; ?>"><br>

  <label for="">Sukunimi</label><br>
  <input type="text" name="Sukunimi" value="<?php echo $selected_customer[0]['Sukunimi']; ?>"><br><br>

  <input class="btn btn-primary" type="submit" name="" value="Tallenna">
  <a class="btn btn-primary" href="<?php echo site_url('customer/show_all_customers'); ?>">Peruuta</a>
</form>
