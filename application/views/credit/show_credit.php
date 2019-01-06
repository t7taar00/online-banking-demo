<h2>Kortin saldo</h2>

<table class="table table-bordered table-hover">
  <tr class="table table-info">
    <th>ID</th><th>Saldo</th>
  </tr>
  <?php
  foreach ($credit_card as $rivi) {
    echo '<tr>';
    echo '<td>'.$rivi['KorttiID'].'</td>';
    echo '<td>'.$rivi['Saldo'].'</td>';
    echo '</tr>';
  }
  ?>
</table>
