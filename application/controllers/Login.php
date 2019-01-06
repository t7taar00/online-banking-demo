<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
  function __construct() {
    parent::__construct();
    $this->load->model('Login_model');
  }

  public function admin_login() {
    $data['page']='login/admin_login';
    $this->load->view('menu/page_content',$data);
  }

  public function customer_login() {
    $data['page']='login/customer_login';
    $this->load->view('menu/page_content',$data);
  }

  public function credit_login() {
    $data['page']='login/credit_login';
    $this->load->view('menu/page_content',$data);
  }

  public function admin_log_in() {
    //print_r($this->input->post());
    $form_username=$this->input->post('username');
    $form_password=$this->input->post('password');
    if($form_username=='admin' && $form_password=='admin') {
      $_SESSION['admin_log_in']=true;
      $_SESSION['user']=$form_username;
      $data['message']='Kirjautuminen onnistui.';
      $data['page']='message/message';
      $this->load->view('menu/page_content',$data);
    }
    else {
        $_SESSION['admin_log_in']=false;
        $data['message']='Käyttäjätunnus tai salasana ei täsmää.';
        $data['page']='message/message';
        $this->load->view('menu/page_content',$data);
    }
  }

  public function customer_log_in() {
    //print_r($this->input->post());
    $form_account=$this->input->post('Pankkitunnus');
    $form_password=$this->input->post('Salasana');
    $database_password=$this->Login_model->get_account_password($form_account);
    if(password_verify($form_password,$database_password)) {
      $_SESSION['customer_log_in']=true;
      $_SESSION['user']=$form_account;
      $_SESSION['firstname']=$this->Login_model->get_first_name();
      $data['message']='Kirjautuminen onnistui.';
      $data['page']='message/message';
      $this->load->view('menu/page_content',$data);
    }
    else {
        $_SESSION['customer_log_in']=false;
        $data['message']='Pankkitunnus tai salasana ei täsmää.';
        $data['page']='message/message';
        $this->load->view('menu/page_content',$data);
    }
  }

  public function credit_log_in() {
    //print_r($this->input->post());
    $form_credit_id=$this->input->post('KorttiID');
    $form_password=$this->input->post('Salasana');
    $database_password=$this->Login_model->get_credit_password($form_credit_id);
    if($form_password == $database_password) {
      $_SESSION['credit_log_in']=true;
      $_SESSION['user']=$form_credit_id;
      $data['message']='Kirjautuminen onnistui.';
      $data['page']='message/message';
      $this->load->view('menu/page_content',$data);
    }
    else {
        $_SESSION['credit_log_in']=false;
        $data['message']='Kortin numero tai salasana ei täsmää.';
        $data['page']='message/message';
        $this->load->view('menu/page_content',$data);
    }
  }

  public function logout() {
    $_SESSION['admin_log_in']=false;
    $_SESSION['customer_log_in']=false;
    $_SESSION['credit_log_in']=false;
    session_destroy();
    $data['message']='Olet kirjautunut ulos.';
    $data['page']='message/message';
    $this->load->view('menu/page_content',$data);
  }
}
