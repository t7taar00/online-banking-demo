<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller
{
  function __construct() {
    parent::__construct();
    $this->load->model('Account_model');
  }

  public function check_admin_permission() {
    if(isset($_SESSION['admin_log_in'])) {
      //ei tehdä mitään
    }
    else {
      redirect('frontpage/main_page');
    }
  }

  public function check_customer_permission() {
    if(isset($_SESSION['customer_log_in'])) {
      //ei tehdä mitään
    }
    else {
      redirect('frontpage/main_page');
    }
  }

  public function show_all_accounts() {
    $this->check_admin_permission();
    $data['accounts']=$this->Account_model->get_accounts();
    $data['page']='account/show_all_accounts';
    $this->load->view('menu/page_content',$data);
  }

  public function show_account() {
    $this->check_customer_permission();
    $data['account']=$this->Account_model->get_owned_accounts();
    $data['page']='account/show_account';
    $this->load->view('menu/page_content',$data);
  }

  public function transfer_account() {
    $this->check_customer_permission();
    //$data['account_id']=$this->Account_model->get_account_id();
    $data['page']='account/transfer_account';
    $this->load->view('menu/page_content',$data);
  }

  public function add_account() {
    $this->check_admin_permission();
    $data['page']='account/add_account';
    $this->load->view('menu/page_content',$data);
  }

  public function new_account() {
    $this->check_admin_permission();
    $add_data=array(
      'TiliID'=>$this->input->post('TiliID'),
      'Saldo'=>$this->input->post('Saldo')
    );
    $success=$this->Account_model->new_account($add_data);
    if($success) {
      $data['message']='Tilin luominen onnistui.';
    }
    else {
      $data['message']='Tilin luominen epäonnistui. Tarkista ID.';
    }
    $data['page']='message/message';
    $this->load->view('menu/page_content',$data);
  }

  public function transfer_to_account() {
    $this->check_customer_permission();
    $transfer_data=array(
      'TiliID_1'=>$this->Account_model->get_account_id(),
      'TiliID_2'=>$this->input->post('TiliID_2'),
      'Saldo'=>$this->input->post('Saldo')
    );
    $success=$this->Account_model->transfer_to_account($transfer_data);
    if($success) {
      $data['message']='Tilisiirto onnistui.';
    }
    else {
      $data['message']='Tilisiirto epäonnistui. Tarkista tilinumero ja saldo.';
    }
    $data['page']='message/message';
    $this->load->view('menu/page_content',$data);
  }

  public function delete_account($delete_id) {
    $this->check_admin_permission();
    $data['selected_account']=$this->Account_model->get_selected($delete_id);
    $data['page']='account/delete_account';
    $this->load->view('menu/page_content',$data);
  }

  public function drop_account($delete_id) {
    $this->check_admin_permission();
    $success=$this->Account_model->drop_account($delete_id);
    if($success) {
      $data['message']='Tilin poisto onnistui.';
    }
    else {
      $data['message']='Tilin poisto epäonnistui. Tarkista oikeudet.';
    }
    $data['page']='message/message';
    $this->load->view('menu/page_content',$data);
  }

  public function edit_account($edit_id) {
    $this->check_admin_permission();
    $data['selected_account']=$this->Account_model->get_selected($edit_id);
    $data['page']='account/edit_account';
    $this->load->view('menu/page_content',$data);
  }

  public function update_account() {
    $this->check_admin_permission();
    //print_r($this->input->post());
    $update_id=$this->input->post('TiliID');
    $update_data=array(
      'Saldo'=>$this->input->post('Saldo')
    );
    $this->load->model('Account_model');
    $success=$this->Account_model->update_account($update_id, $update_data);
    if($success) {
      $data['message']='Tilitietojen päivitys onnistui.';
    }
    else {
      $data['message']='Tilitietojen päivitys epäonnistui.';
    }
    $data['page']='message/message';
    $this->load->view('menu/page_content',$data);
  }
}
