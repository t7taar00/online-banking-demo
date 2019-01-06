<h2>Muokkaa tilin tietoja</h2>

<form class="" action="<?php echo site_url('account/update_account'); ?>" method="post">
  <input type="hidden" name="TiliID" value="<?php echo $selected_account[0]['TiliID']; ?>">

  <label for="">Saldo</label><br>
  <input type="number" name="Saldo" value="<?php echo $selected_account[0]['Saldo']; ?>"><br><br>

  <input class="btn btn-primary" type="submit" name="" value="Tallenna">
  <a class="btn btn-primary" href="<?php echo site_url('account/show_all_accounts'); ?>">Peruuta</a>
</form>
