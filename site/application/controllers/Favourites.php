<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Favourites extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('recipes');
    }

    public function index()
        {
                //$data['news'] = $this->news_model->get_news();
                $data['title'] = 'favourites ';
               // $data['recipes'] = $this->recipes->get_recipes();

                $this->load->view('templates/header', $data);
                $this->load->view('favourites/index', $data);
                $this->load->view('templates/footer');
        }

}