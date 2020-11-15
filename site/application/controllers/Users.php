<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Users extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
         
        // Load form validation ibrary & user model 
        $this->load->library('form_validation'); 
        $this->load->model('user'); 
         
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
    } 
     
    public function index(){ 
        
        if($this->isUserLoggedIn){ 
            redirect('users/account'); 
        }else{ 
            redirect('users/login'); 
        }
         
    } 
 
    public function account(){ 
        $data = array(); 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->user->getRows($con); 
            $data['title'] = "Профиль";
            // Pass the user data and load view 
            $this->load->view('templates/header', $data); 
            $this->load->view('users/account', $data); 
            $this->load->view('templates/footer'); 
        }else{ 
            redirect('users/login'); 
        } 
    } 
 
    public function login(){ 
        $data = array(); 
         
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
        // If login request submitted 
        if($this->input->post('loginSubmit')){ 
            $this->form_validation->set_rules('mail', 'Email', 'required|valid_email'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
             
            if($this->form_validation->run() == true){ 
                $con = array( 
                    'returnType' => 'single', 
                    'conditions' => array( 
                        'mail'=> $this->input->post('mail'), 
                        'password' => md5($this->input->post('password')), 
                        'status' => 1 
                    ) 
                ); 
                
                $checkLogin = $this->user->getRows($con); 
                if($checkLogin){ 
                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin['id']); 
                    redirect(''); 
                }else{ 
                    $data['error_msg'] = 'Wrong email or password, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
        $data['title'] = "Авторизация";
        // Load view 
        $this->load->view('templates/header', $data); 
        $this->load->view('users/login', $data); 
        $this->load->view('templates/footer'); 
    } 
 
    public function registration(){ 
        $data = $userData = array(); 
         
        // If registration request is submitted 
        if($this->input->post('signupSubmit')){ 
            //echo  "ItIsWork";
            $this->form_validation->set_rules('name', 'Имя', 'required'); 
            $this->form_validation->set_rules('mail', 'Email', 'required|valid_email|callback_email_check'); 
            $this->form_validation->set_rules('password', 'Пароль', 'required'); 
            $this->form_validation->set_rules('conf_password', 'Подтверждение пароля', 'required|matches[password]'); 
 
            $userData = array( 
                'name' => strip_tags($this->input->post('name')),  
                'mail' => strip_tags($this->input->post('mail')), 
                'password' => md5($this->input->post('password')), 
                'gender' => $this->input->post('gender'), 
                'phone' => strip_tags($this->input->post('phone')) 
            ); 
 
            if($this->form_validation->run() == true){ 
                $insert = $this->user->insert($userData); 
                if($insert){ 
                    $this->session->set_userdata('success_msg', 'Регистрация вашей учетной записи прошла успешно. Пожалуйста войдите в свой аккаунт.'); 
                    redirect('users/login'); 
                }else{ 
                    $data['error_msg'] = 'Возникли некоторые проблемы, пожалуйста, попробуйте еще раз.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Пожалуйста, заполните все обязательные поля.'; 
            } 
        } 
         
        // Posted data 
        $data['user'] = $userData; 
        
        $data['title'] = "Регистрация"; 
        // Load view 
        $this->load->view('templates/header', $data); 
        $this->load->view('users/registration', $data); 
        $this->load->view('templates/footer'); 
    } 
     
    public function logout(){ 
        $this->session->unset_userdata('isUserLoggedIn'); 
        $this->session->unset_userdata('userId'); 
        $this->session->sess_destroy(); 
        redirect('users/login/'); 
    } 
     
     
    // Existing email check during validation 
    public function email_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'mail' => $str 
            ) 
        ); 
        $checkEmail = $this->user->getRows($con); 
        if($checkEmail > 0){ 
            $this->form_validation->set_message('email_check', 'The given email already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    } 
}