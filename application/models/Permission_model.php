<?php
class Permission_model extends CI_model
{
  public function get_permissions() {
    $this->db->select('*');
    $this->db->from('tilioikeudet');
    return $this->db->get()->result_array();
  }

  public function new_permission($add_data) {
    $this->db->db_debug=false;
    $success=$this->db->insert('tilioikeudet',$add_data);
    if($success) {
      return true;
    }
    else {
      return false;
    }
  }

  public function get_selected($selected_id) {
    $this->db->select('*');
    $this->db->from('tilioikeudet');
    $this->db->where('TilioikeudetID',$selected_id);
    return $this->db->get()->result_array();
  }

  public function drop_permission($delete_id) {
    $this->db->db_debug=false;
    $this->db->where('TilioikeudetID',$delete_id);
    $success=$this->db->delete('tilioikeudet');
    return $success;
  }
  
  public function update_permission($update_id,$update_data) {
    $this->db->db_debug=false;
    $this->db->where('TilioikeudetID',$update_id);
    $success=$this->db->update('tilioikeudet',$update_data);
    return $success;
  }
}
