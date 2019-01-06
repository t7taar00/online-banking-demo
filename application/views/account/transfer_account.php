<h2>Uusi tilisiirto</h2>

<form class="" action="<?php echo site_url('account/transfer_to_account'); ?>" method="post">
  
  <label for="">Tilinumero jolle siirretään</label><br>
  <input type="number" name="TiliID_2" value=""><br>

  <label for="">Siirrettävä saldo</label><br>
  <input type="number" name="Saldo" value=""><br><br>

  <input type="submit" name="" value="Vahvista">
</form>
