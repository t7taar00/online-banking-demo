<h2>Poista asiakas</h2>

<p>Haluatko todella poistaa asiakkaan [ID <?php echo $selected_customer[0]['AsiakasID']; ?>]?</p>
<p>
  <a href="<?php echo site_url('customer/drop_customer/').$selected_customer[0]['AsiakasID']; ?>"> <button class="btn btn-danger">Poista</button> </a>
  <a href="<?php echo site_url('customer/show_all_customers'); ?>"> <button class="btn btn-primary">Peruuta</button> </a>
</p>
