<h2>Kirjatut asiakkaat</h2>

<table class="table table-bordered table-hover">
  <tr class="table table-info">
    <th>ID</th><th>Etunimi</th><th>Sukunimi</th><th>Muokkaa</th><th>Poista</th>
  </tr>
  <?php
  foreach ($customers as $rivi) {
    echo '<tr>';
    echo '<td>'.$rivi['AsiakasID'].'</td>';
    echo '<td>'.$rivi['Etunimi'].'</td>';
    echo '<td>'.$rivi['Sukunimi'].'</td>';
    echo '<td> <a href="'.site_url('customer/edit_customer/').$rivi['AsiakasID'].'"><button class="btn btn-primary">Muokkaa</button></a> </td>';
    echo '<td> <a href="'.site_url('customer/delete_customer/').$rivi['AsiakasID'].'"><button class="btn btn-danger">Poista</button></a> </td>';
    echo '</tr>';
  }
  ?>
</table>
<a href="<?php echo site_url('customer/add_customer');?>"><button class="btn btn-primary">Lisää uusi merkintä</button></a>
