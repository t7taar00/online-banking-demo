<?php
class Credit_model extends CI_model
{
  public function get_owned_credit() {
    $this->db->select('KorttiID,Saldo');
    $this->db->from('tili');
    $this->db->join('kortti','tili.TiliID=kortti.TiliID','left');
    $this->db->where('KorttiID',$_SESSION['user']);
    return $this->db->get()->result_array();
  }

  public function get_credit_id() {
    $this->db->select('TiliID');
    $this->db->from('kortti');
    $this->db->where('KorttiID',$_SESSION['user']);
    return $this->db->get()->row('TiliID');
  }

  public function transfer_to_credit($transfer_data) {
    $KorttiID = $transfer_data['KorttiID'];
    $Saldo = $transfer_data['Saldo'];
    $success=$this->db->query("CALL credit_transfer('$KorttiID','$Saldo')");
    if($success) {
      return true;
    }
    else {
      return false;
    }
  }
}
