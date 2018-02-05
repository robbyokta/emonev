<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

    class Login extends CI_Controller {

        public function __construct() {
            parent::__construct();

            $this->load->model('m_login');
            $this->load->library(array('form_validation','session'));
            $this->load->database();
            $this->load->helper('url');
         }

          public function index() {
            $session = $this->session->userdata('isLogin');
                if($session == FALSE) {
                redirect('login/login_form');
            } else {
              $user = $this->session->userdata('data_user');
              if ($user->role <= '2'){
                redirect('skpd');
              } else { redirect('home');}
              
            }
        }

          public function login_form() {
            $this->form_validation->set_rules('email', 'email', 'required|trim|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|md5|xss_clean');
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            if($this->form_validation->run()==FALSE) {
                $this->load->view('welcome_message');
            }else{
                       $email = $this->input->post('email');
                       $password = $this->input->post('password');
                       //$level = $this->input->post('level');
                       $cek = $this->m_login->ambilPengguna($email, $password, 1/*, $level*/);
                      $setting = $this->m_login->datasetting();
                    if($cek->num_rows() <> 0) {
                      //cek skpd 
                       

                    $this->session->set_userdata('isLogin', TRUE);
                    $this->session->set_userdata('data_user',$cek->row());
                    // $this->session->set_userdata('level',$level);

                    redirect('skpd');
                }else {
                         echo " <script>
                                    alert('Gagal Login: Cek email , password dan level anda!');
                                    history.go(-1);
                          </script>";        
                }
            }  
        }

          public function logout() {
               $this->session->sess_destroy();
               redirect('login/login_form');
          }
    }

?>