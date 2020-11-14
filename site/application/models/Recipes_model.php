<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recipes_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_recipes($code = FALSE)
    {
        if ($code === FALSE)
        {
                $query = $this->db->get('recipes');
                return $query->result_array();
        }
        /*
        $query = $this->db->query("SELECT * FROM `recipes`,`favorites` WHERE `recipes`.`code` = '".$code."' AND `recipes`.`id` = `favorites`.`idRecipes` ");
        $result = [];
        foreach ($query->result() as $row){
            $result = $row;
        }*/
        $query = $this->db->get_where('recipes', array('code' => $code));
        return $query->row_array();
        //return $result;
    }

}