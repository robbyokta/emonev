<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller {

	private $datauser;

    public function __construct() {
        parent::__construct();

        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->model('m_login');
        $this->load->database();
        $this->datauser = $this->session->userdata('data_user');
         $this->datauser = $this->session->userdata('data_user');
          $this->load->library(array('form_validation','session'));
            $this->load->database();
            $this->load->helper('url');
             $this->load->helper('tgl_indo');
        

        }

	public function index()
	{
		if($this->session->userdata('isLogin') == FALSE) {

                redirect('login/login_form');
            } else {
                $this->load->model('m_login');
                $user = $this->session->userdata('data_user');
                //setting view
                $data = array();
                $data['title'] = 'Detail User<small> </small>';
                $data['pengguna'] = $user;
                $data['level'] = $this->session->userdata('level'); 
                $this->db->select('*');
                $this->db->from('users');
                $this->db->join('skpd', 'skpd.id_skpd = users.id_skpd', 'left');
                $this->db->where('id_users', $user->id_users);
                $query = $this->db->get();
                $data['user']=  $query->row();
                $this->load->view('profile/profile', $data);
                }
	}

    public function changepassword(){

        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $cfm_password = $this->input->post('cfm_password');
        $user = $this->session->userdata('data_user');
                //setting view


        if($cfm_password <> $new_password){
             echo json_encode(array("status" => 'Password Tidak Sama', "type" => 'error', 'title' => 'GAGAL'));
        } else {
            //cek old password
            $old = md5($this->input->post('old_password'));  
            $this->db->where('password',$old);
            $this->db->where('id_users', $user->id_users);
            $query = $this->db->get('users');

            if ($query->num_rows() <> 1){
                echo json_encode(array("status" => 'Password Lama Salah', "type" => 'error', 'title' => 'GAGAL'));
            } else {
                $password = md5($this->input->post('new_password'));
                $data = array (
                'password' => $password,
                );
            $this->db->where('id_users', $user->id_users);
              $this->db->set($data);
            $this->db->update('users');


                echo json_encode(array("status" => 'Berhasil', "type" => 'success', 'title' => 'SUKSES'));
            }
        }
    }

    public function editprofile(){

        $user = $this->session->userdata('data_user');
        $name = $this->input->post('name');
        $nama_skpd = $this->input->post('nama_skpd');
        $nip_kpl = $this->input->post('nip_kpl');
        $nama_pimpinan = $this->input->post('nama_pimpinan');
        $jbt_pimpinan = $this->input->post('jbt_pimpinan');
        $data1 = array (
            'name' => $name,
            
            );
         $data2 = array (
            'nama_skpd' => $nama_skpd,
            'nip_kpl' => $nip_kpl,
            'nama_pimpinan' => $nama_pimpinan,
            'jbt_pimpinan' => $jbt_pimpinan,
            );
        $this->db->where('id_users', $user->id_users);
        $this->db->set($data1);
        $this->db->update('users');
        $this->db->where('id_skpd', $user->id_skpd);
        $this->db->set($data2);
        $this->db->update('skpd');
         $this->db->select('*');
                $this->db->from('users');
                $this->db->join('skpd', 'skpd.id_skpd = users.id_skpd', 'left');
                $this->db->where('id_users', $user->id_users);
                $query = $this->db->get();
                $data=  $query->row();
        echo json_encode(array("status" => 'Berhasil', "type" => 'success', 'title' => 'SUKSES', 'data'=>$data));
    }

    

    
}
