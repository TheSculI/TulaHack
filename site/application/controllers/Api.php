<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       // $this->load->model('recipes');
    }

 
    function index(){
        ///print_r($_REQUEST);
        $data["request"] = $_REQUEST; 
        $this->load->view('api/index', $data);
    }
 
}