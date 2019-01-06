<h2>Oma tili</h2>

<table class="table table-bordered table-hover">
  <tr class="table table-info">
    <th>Tilinumero / ID</th><th>Saldo</th>
  </tr>
  <?php
  foreach ($account as $rivi) {
    echo '<tr>';
    echo '<td>'.$rivi['TiliID'].'</td>';
    echo '<td>'.$rivi['Saldo'].'</td>';
    echo '</tr>';
  }
  ?>
</table>
