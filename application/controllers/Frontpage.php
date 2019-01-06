<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontpage extends CI_Controller
{
  public function main_page() {
    $data['page']='frontpage/main_page';
    $this->load->view('menu/page_content',$data);
  }

  public function info_page() {
    $data['page']='frontpage/info_page';
    $this->load->view('menu/page_content',$data);
  }
  
  public function account_page() {
    $data['page']='frontpage/account_page';
    $this->load->view('menu/page_content',$data);
  }
}
