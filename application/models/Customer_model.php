<?php
class Customer_model extends CI_model
{
  public function get_customers() {
    $this->db->select('*');
    $this->db->from('asiakas');
    return $this->db->get()->result_array();
  }

  public function new_customer($add_data) {
    $this->db->db_debug=false;
    $success=$this->db->insert('asiakas',$add_data);
    if($success) {
      return true;
    }
    else {
      return false;
    }
  }

  public function get_selected($selected_id) {
    $this->db->select('*');
    $this->db->from('asiakas');
    $this->db->where('AsiakasID',$selected_id);
    return $this->db->get()->result_array();
  }

  public function drop_customer($delete_id) {
    $this->db->db_debug=false;
    $this->db->where('AsiakasID',$delete_id);
    $success=$this->db->delete('asiakas');
    return $success;
  }
  
  public function update_customer($update_id,$update_data) {
    $this->db->db_debug=false;
    $this->db->where('AsiakasID',$update_id);
    $success=$this->db->update('asiakas',$update_data);
    return $success;
  }
}
