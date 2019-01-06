<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Verkkopankki</title>
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar" style="background-color:#eee">
      <?php
        if(isset($_SESSION['admin_log_in']) && $_SESSION['admin_log_in']==true) {
          echo '<h5>Tervetuloa '.$_SESSION['user'].'</h5>';
          echo '<h5><a href=" '.site_url('customer/show_all_customers').' ">Asiakastiedot</a></h5>';
          echo '<h5><a href=" '.site_url('account/show_all_accounts').' ">Tilitiedot</a></h5>';
          echo '<h5><a href=" '.site_url('permission/show_all_permissions').' ">Tilioikeustiedot</a></h5>';
          echo '<h5><a href=" '.site_url('login/logout').' ">Kirjaudu ulos</a></h5>';
        }
        else if(isset($_SESSION['customer_log_in']) && $_SESSION['customer_log_in']==true) {
          echo '<h5>Tervetuloa '.$_SESSION['firstname'].'</h5>';
          echo '<h5><a href=" '.site_url('account/show_account').' ">Oma tili</a></h5>';
          echo '<h5><a href=" '.site_url('account/transfer_account').' ">Uusi tilisiirto</a></h5>';
          echo '<h5><a href=" '.site_url('login/logout').' ">Kirjaudu ulos</a></h5>';
        }
        else if(isset($_SESSION['credit_log_in']) && $_SESSION['credit_log_in']==true) {
          echo '<h5>Tervetuloa pankkiautomaattiin</h5>';
          echo '<h5><a href=" '.site_url('credit/show_credit').' ">Kortin saldo</a></h5>';
          echo '<h5><a href=" '.site_url('credit/transfer_credit').' ">Rahan nosto</a></h5>';
          echo '<h5><a href=" '.site_url('login/logout').' ">Kirjaudu ulos</a></h5>';
        }
        else {
          echo '<h5>Verkkopankki</h5>';
          echo '<h5><a href=" '.site_url('frontpage/main_page').' ">Etusivu</a></h5>';
          echo '<h5><a href=" '.site_url('frontpage/info_page').' ">Tietoja</a></h5>';
          echo '<h5><a href=" '.site_url('frontpage/account_page').' ">Tunnukset</a></h5>';
          echo '<ul>';
          echo '<h5>Kirjaudu sisään</h5>';
          echo '<li><a href=" '.site_url('login/admin_login').' ">Pankkivirkailijana</a></li>';
          echo '<li><a href=" '.site_url('login/customer_login').' ">Pankkitunnuksilla</a></li>';
          echo '<li><a href=" '.site_url('login/credit_login').' ">Pankkikortilla</a></li>';
          echo '</ul>';
        }
      ?>
    </nav><br><br>
    <div class="container">
