<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Credit extends CI_Controller
{
  function __construct() {
    parent::__construct();
    $this->load->model('Credit_model');
    $this->check_credit_permission();
  }

  public function check_credit_permission() {
    if(isset($_SESSION['credit_log_in'])) {
      //ei tehdä mitään
    }
    else {
      redirect('frontpage/main_page');
    }
  }

  public function show_credit() {
    $data['credit_card']=$this->Credit_model->get_owned_credit();
    $data['page']='credit/show_credit';
    $this->load->view('menu/page_content',$data);
  }

  public function transfer_credit() {
    $data['page']='credit/transfer_credit';
    $this->load->view('menu/page_content',$data);
  }
  
  public function transfer_to_credit() {
    $transfer_data=array(
      'KorttiID'=>$this->Credit_model->get_credit_id(),
      'Saldo'=>$this->input->post('Saldo')
    );
    $success=$this->Credit_model->transfer_to_credit($transfer_data);
    if($success) {
      $data['message']='Rahan nosto onnistui.';
    }
    else {
      $data['message']='Rahan nosto epäonnistui. Tarkista saldo.';
    }
    $data['page']='message/message';
    $this->load->view('menu/page_content',$data);
  }
}
