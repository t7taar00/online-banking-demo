<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Controller
{
  function __construct() {
    parent::__construct();
    $this->load->model('Permission_model');
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

  public function show_all_permissions() {
    $data['permissions']=$this->Permission_model->get_permissions();
    $data['page']='permission/show_all_permissions';
    $this->load->view('menu/page_content',$data);
  }

  public function add_permission() {
    $data['page']='permission/add_permission';
    $this->load->view('menu/page_content',$data);
  }

  public function new_permission() {
    $clear_password=$this->input->post('Salasana');
    $encrypted_password=password_hash($clear_password,PASSWORD_DEFAULT);
    $add_data=array(
      'TilioikeudetID'=>$this->input->post('TilioikeudetID'),
      'AsiakasID'=>$this->input->post('AsiakasID'),
      'TiliID'=>$this->input->post('TiliID'),
      'Pankkitunnus'=>$this->input->post('Pankkitunnus'),
      'Salasana'=>$encrypted_password
    );
    $success=$this->Permission_model->new_permission($add_data);
    if($success) {
      $data['message']='Tilioikeuden luominen onnistui.';
    }
    else {
      $data['message']='Tilioikeuden luominen epäonnistui. Tarkista ID.';
    }
    $data['page']='message/message';
    $this->load->view('menu/page_content',$data);
  }

  public function delete_permission($delete_id) {
    $data['selected_permission']=$this->Permission_model->get_selected($delete_id);
    $data['page']='permission/delete_permission';
    $this->load->view('menu/page_content',$data);
  }

  public function drop_permission($delete_id) {
    $success=$this->Permission_model->drop_permission($delete_id);
    if($success) {
      $data['message']='Tilioikeuden poisto onnistui.';
    }
    else {
      $data['message']='Tilioikeuden poisto epäonnistui. Tarkista oikeudet.';
    }
    $data['page']='message/message';
    $this->load->view('menu/page_content',$data);
  }

  public function edit_permission($edit_id) {
    $data['selected_permission']=$this->Permission_model->get_selected($edit_id);
    $data['page']='permission/edit_permission';
    $this->load->view('menu/page_content',$data);
  }

  public function update_permission() {
    //print_r($this->input->post());
    $update_id=$this->input->post('TilioikeudetID');
    $update_data=array(
      'AsiakasID'=>$this->input->post('AsiakasID'),
      'TiliID'=>$this->input->post('TiliID'),
      'Pankkitunnus'=>$this->input->post('Pankkitunnus'),
      'Salasana'=>$this->input->post('Salasana')
    );
    $this->load->model('Permission_model');
    $success=$this->Permission_model->update_permission($update_id, $update_data);
    if($success) {
      $data['message']='Tilioikeuden päivitys onnistui.';
    }
    else {
      $data['message']='Tilioikeuden päivitys epäonnistui.';
    }
    $data['page']='message/message';
    $this->load->view('menu/page_content',$data);
  }
}
