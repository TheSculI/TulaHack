<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       // $this->load->model('recipes');
    }

 
    function index(){
        //print_r($_REQUEST);
        $this->load->database();

        if($_REQUEST["cur_step"] > 0 and $_REQUEST["recipe_id"] ){
            
            $query = $this->db->query('SELECT COUNT(*) FROM cooksteps WHERE `recipe_id`= '.$_REQUEST["recipe_id"].' ');
            $cnt = 0;
            foreach ($query->result_array() as $cnt){
                $cnt = $cnt['COUNT(*)'];
            }
            if($cnt > 0):
                $data["not_ready"] = "N";
                if($cnt == $_REQUEST["cur_step"]){
                    $data["last_step"] = "Y";
                }else{
                    $data["last_step"] = "N";
                }

                $query = $this->db->query('SELECT * FROM cooksteps WHERE `recipe_id`= '.$_REQUEST["recipe_id"].' AND `sort`='.($_REQUEST["cur_step"]    *100).' LIMIT 1 ');

                foreach ($query->result_array() as $row)
                {
                    $data["data"] = $row; 
                    $date_time2 = new DateTime($row["time"]); // works great!
                    //var_dump($date_time2 );
                }
                $data["next_step"] = $_REQUEST["cur_step"] +1; 
                 
                
            else:
                $data["not_ready"] = "Y";
            endif;
        }
        
        $data["request"] = $_REQUEST; 
        $this->load->view('api/index', $data);
    }


    public function view()
	{
        $data = [];
        //print_r($_REQUEST["recipe_id"]);
        //print_r($_SESSION["userId"]);
        if($_REQUEST["recipe_id"]>0 && $_REQUEST["method"] == "getUserFavouriteist"):

            $this->load->database();
            $ar = [];

            echo json_encode ($ar);

        endif;

        if($_REQUEST["recipe_id"]>0 && $_REQUEST["method"] == "addToFavourite"):
            $this->load->database();

            $query = $this->db->query("SELECT * FROM `favorites` WHERE `idRecipes`=".$_REQUEST["recipe_id"]." AND `idUser`=".$_SESSION["userId"]." ");
            $cnt = 0 ;
            foreach ($query->result() as $row){
                $cnt++;
            }
            $res = ""; 
            
            if($cnt<1):   
                $sql = "INSERT INTO favorites (id, idRecipes, idUser) VALUES ( NULL, ".$this->db->escape($_REQUEST["recipe_id"]).", ".$this->db->escape  ($_SESSION    ["userId"]).")";
                $this->db->query($sql);
                $res = "add";
            else:
                $sql = "DELETE FROM favorites  WHERE `idRecipes`=".$_REQUEST["recipe_id"]." AND `idUser`=".$_SESSION["userId"]." ";
                $this->db->query($sql);
                $res = "remove";
            endif;
                echo $res;
        endif;
        

        //$this->load->view('api/view', $data);
    }
 
}