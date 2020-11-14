<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipes extends CI_Controller {

    public function __construct()
        {
                parent::__construct();
               // $this->load->model('news_model');
        }

        public function index()
        {
                //$data['news'] = $this->news_model->get_news();
                $data['title'] = 'Рецепты ';
                $data['recipes'] = $this->recipes->get_recipes();

                $this->load->view('templates/header', $data);
                $this->load->view('recipes/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($code = NULL)
        {
                 
                $data['recip_item'] = $this->recipes->get_recipes($code);
                //$data['news_item'] = $this->news_model->get_news($slug);

                if (empty($data['recip_item']))
                {
                        show_404();
                }

                $data['title'] = $data['recip_item']['name'];
                
                $this->load->view('templates/header', $data);
                $this->load->view('recipes/view', $data);
                $this->load->view('templates/footer');
                //$data['news_item'] = $this->news_model->get_news($slug);
        }
}