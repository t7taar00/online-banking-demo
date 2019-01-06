<?php
class Account_model extends CI_model
{
  public function get_accounts() {
    $this->db->select('*');
    $this->db->from('tili');
    return $this->db->get()->result_array();
  }

  public function get_owned_accounts() {
    $this->db->select('*');
    $this->db->from('tili');
    $this->db->join('tilioikeudet','tili.TiliID=tilioikeudet.TiliID','left');
    $this->db->where('Pankkitunnus',$_SESSION['user']);
    return $this->db->get()->result_array();
  }

  public function get_account_id() {
    $this->db->select('TiliID');
    $this->db->from('tilioikeudet');
    $this->db->where('Pankkitunnus',$_SESSION['user']);
    return $this->db->get()->row('TiliID');
  }

  public function transfer_to_account($transfer_data) {
    $TiliID_1 = $transfer_data['TiliID_1'];
    $TiliID_2 = $transfer_data['TiliID_2'];
    $Saldo = $transfer_data['Saldo'];
    $success=$this->db->query("CALL account_transfer('$TiliID_2','$TiliID_1','$Saldo')");
    if($success) {
      return true;
    }
    else {
      return false;
    }
  }

  public function new_account($add_data) {
    $this->db->db_debug=false;
    $success=$this->db->insert('tili',$add_data);
    if($success) {
      return true;
    }
    else {
      return false;
    }
  }

  public function get_selected($selected_id) {
    $this->db->select('*');
    $this->db->from('tili');
    $this->db->where('TiliID',$selected_id);
    return $this->db->get()->result_array();
  }

  public function drop_account($delete_id) {
    $this->db->db_debug=false;
    $this->db->where('TiliID',$delete_id);
    $success=$this->db->delete('tili');
    return $success;
  }
  
  public function update_account($update_id,$update_data) {
    $this->db->db_debug=false;
    $this->db->where('TiliID',$update_id);
    $success=$this->db->update('tili',$update_data);
    return $success;
  }
}
