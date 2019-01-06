<h2>Kirjatut tilioikeudet</h2>

<table class="table table-bordered table-hover">
  <tr class="table table-info">
    <th>ID</th><th>Asiakkaan ID</th><th>Tilin ID</th><th>Pankkitunnus</th><th>Salasana (Hash)</th><th>Muokkaa</th><th>Poista</th>
  </tr>
  <?php
  foreach ($permissions as $rivi) {
    echo '<tr>';
    echo '<td>'.$rivi['TilioikeudetID'].'</td>';
    echo '<td>'.$rivi['AsiakasID'].'</td>';
    echo '<td>'.$rivi['TiliID'].'</td>';
    echo '<td>'.$rivi['Pankkitunnus'].'</td>';
    echo '<td>'.$rivi['Salasana'].'</td>';
    echo '<td> <a href="'.site_url('permission/edit_permission/').$rivi['TilioikeudetID'].'"><button class="btn btn-primary">Muokkaa</button></a> </td>';
    echo '<td> <a href="'.site_url('permission/delete_permission/').$rivi['TilioikeudetID'].'"><button class="btn btn-danger">Poista</button></a> </td>';
    echo '</tr>';
  }
  ?>
</table>
<a href="<?php echo site_url('permission/add_permission');?>"><button class="btn btn-primary">Lisää uusi merkintä</button></a>
