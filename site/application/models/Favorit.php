<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favorit extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_favorit()
    {
        $query = $this->db->get('favorites');
        return $query->result_array();
    }
}