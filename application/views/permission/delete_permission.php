<h2>Poista tilioikeusmerkintä</h2>

<p>Haluatko todella poistaa tilioikeuden [ID <?php echo $selected_permission[0]['TilioikeudetID']; ?>]?</p>
<p>
  <a href="<?php echo site_url('permission/drop_permission/').$selected_permission[0]['TilioikeudetID']; ?>"> <button class="btn btn-danger">Poista</button> </a>
  <a href="<?php echo site_url('permission/show_all_permissions'); ?>"> <button class="btn btn-primary">Peruuta</button> </a>
</p>
