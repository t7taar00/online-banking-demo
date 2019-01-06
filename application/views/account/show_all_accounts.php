<h2>Kirjatut tilit</h2>

<table class="table table-bordered table-hover">
  <tr class="table table-info">
    <th>Tilinumero / ID</th><th>Saldo</th><th>Muokkaa</th><th>Poista</th>
  </tr>
  <?php
  foreach ($accounts as $rivi) {
    echo '<tr>';
    echo '<td>'.$rivi['TiliID'].'</td>';
    echo '<td>'.$rivi['Saldo'].'</td>';
    echo '<td> <a href="'.site_url('account/edit_account/').$rivi['TiliID'].'"><button class="btn btn-primary">Muokkaa</button></a> </td>';
    echo '<td> <a href="'.site_url('account/delete_account/').$rivi['TiliID'].'"><button class="btn btn-danger">Poista</button></a> </td>';
    echo '</tr>';
  }
  ?>
</table>
<a href="<?php echo site_url('account/add_account');?>"><button class="btn btn-primary">Lisää uusi merkintä</button></a>
