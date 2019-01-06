<?php
class Login_model extends CI_model
{
  public function get_account_password($form_account) {
    $this->db->select('Salasana');
    $this->db->from('tilioikeudet');
    $this->db->where('Pankkitunnus',$form_account);

    return $this->db->get()->row('Salasana');
  }

  public function get_credit_password($form_credit_id) {
    $this->db->select('Salasana');
    $this->db->from('kortti');
    $this->db->where('KorttiID',$form_credit_id);

    return $this->db->get()->row('Salasana');
  }
  
  public function get_first_name() {
    $this->db->select('Etunimi');
    $this->db->from('asiakas');
    $this->db->join('tilioikeudet','asiakas.AsiakasID=tilioikeudet.AsiakasID','left');
    $this->db->where('Pankkitunnus',$_SESSION['user']);
    return $this->db->get()->row('Etunimi');
  }
}
