<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller
{
  function __construct() {
    parent::__construct();
    $this->load->model('Customer_model');
    $this->check_admin_permission();
  }

  public function check_admin_permission() {
    if(isset($_SESSION['admin_log_in'])) {
      //ei tehdä mitään
    }
    else {
      redirect('frontpage/main_page');
    }
  }

  public function show_all_customers() {
    $data['customers']=$this->Customer_model->get_customers();
    $data['page']='customer/show_all_customers';
    $this->load->view('menu/page_content',$data);
  }

  public function add_customer() {
    $data['page']='customer/add_customer';
    $this->load->view('menu/page_content',$data);
  }

  public function new_customer() {
    $add_data=array(
      'AsiakasID'=>$this->input->post('AsiakasID'),
      'Etunimi'=>$this->input->post('Etunimi'),
      'Sukunimi'=>$this->input->post('Sukunimi')
    );
    $success=$this->Customer_model->new_customer($add_data);
    if($success) {
      $data['message']='Asiakkaan lisäys onnistui.';
    }
    else {
      $data['message']='Asiakkaan lisäys epäonnistui. Tarkista ID.';
    }
    $data['page']='message/message';
    $this->load->view('menu/page_content',$data);
  }

  public function delete_customer($delete_id) {
    $data['selected_customer']=$this->Customer_model->get_selected($delete_id);
    $data['page']='customer/delete_customer';
    $this->load->view('menu/page_content',$data);
  }

  public function drop_customer($delete_id) {
    $success=$this->Customer_model->drop_customer($delete_id);
    if($success) {
      $data['message']='Asiakkaan poisto onnistui.';
    }
    else {
      $data['message']='Asiakkaan poisto epäonnistui. Tarkista tilit ja oikeudet.';
    }
    $data['page']='message/message';
    $this->load->view('menu/page_content',$data);
  }

  public function edit_customer($edit_id) {
    $data['selected_customer']=$this->Customer_model->get_selected($edit_id);
    $data['page']='customer/edit_customer';
    $this->load->view('menu/page_content',$data);
  }

  public function update_customer() {
    //print_r($this->input->post());
    $update_id=$this->input->post('AsiakasID');
    $update_data=array(
      'Etunimi'=>$this->input->post('Etunimi'),
      'Sukunimi'=>$this->input->post('Sukunimi')
    );
    $this->load->model('Customer_model');
    $success=$this->Customer_model->update_customer($update_id, $update_data);
    if($success) {
      $data['message']='Asiakastietojen päivitys onnistui.';
    }
    else {
      $data['message']='Asiakastietojen päivitys epäonnistui.';
    }
    $data['page']='message/message';
    $this->load->view('menu/page_content',$data);
  }
}
