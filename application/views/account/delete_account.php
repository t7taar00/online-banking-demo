<h2>Poista tili</h2>

<p>Haluatko todella poistaa tilin [ID <?php echo $selected_account[0]['TiliID']; ?>]?</p>
<p>
  <a href="<?php echo site_url('account/drop_account/').$selected_account[0]['TiliID']; ?>"> <button class="btn btn-danger">Poista</button> </a>
  <a href="<?php echo site_url('account/show_all_accounts'); ?>"> <button class="btn btn-primary">Peruuta</button> </a>
</p>
