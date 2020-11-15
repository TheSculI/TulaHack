<?
defined('BASEPATH') OR exit('No direct script access allowed');

class favourites extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('recipes');
        $this->load->model('user');
        $this->load->model('Favorit');
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
    }

    public function index()
    {
        $data = array();
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['recipes'] = $this->recipes->get_recipes();
            $data['userId'] = $this->user->getRows($con)['id'];
            $data['favorRecip'] = $this->Favorit->get_favorit();
            $data['title'] = 'Избранные';
            // Pass the user data and load view 
            $this->load->view('templates/header', $data); 
            $this->load->view('favourites/index', $data); 
            $this->load->view('templates/footer'); 
        }else{ 
            redirect('users/login'); 
        }
    }

}