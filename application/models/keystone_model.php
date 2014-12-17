<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class keystone_model extends CI_Model
{

    #SET YOUR TIMEZONE MANUALLY
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set(SYSTEM_TIMEZONE);
    }

    public function get_user($username)
    {
      /*
       * This is for getting the user id from DB and add this in API v3
       */
      $result = "";

      $this->db->where("name",$username);
      $q = $this->db->get("user");

      foreach( $q->result() as $r => $v ){
        $result = $v->id;
      }

      return $result;
    }

}

/* End of file keystone_model.php */
/* Location: ./application/models/keystone_model.php */
