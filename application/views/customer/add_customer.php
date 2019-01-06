<h2>Lisää uusi asiakas</h2>

<form class="" action="<?php echo site_url('customer/new_customer'); ?>" method="post">
  <label for="">Asikkaan ID</label><br>
  <input type="number" name="AsiakasID" value=""><br>

  <label for="">Etunimi</label><br>
  <input type="text" name="Etunimi" value=""><br>

  <label for="">Sukunimi</label><br>
  <input type="text" name="Sukunimi" value=""><br><br>

  <input type="submit" name="" value="Lisää asiakas">
</form>
