<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mtr_user extends CI_Controller {

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
                $data['title'] = 'Master Data User <small> </small>';
                $data['pengguna'] = $user;
                $data['level'] = $this->session->userdata('level');

                $this->db->select('*');
                $this->db->from('skpd'); 
                $query = $this->db->get();
                $data['skpd'] = $query->result(); 
                $this->load->view('mtr_user/index', $data);
                }
	}

    public function datauser(){
         $this->load->library( 'datatables');
        $user = $this->session->userdata('data_user');
        $role = $user->role;
        $this->datatables->select('email , name, nama_skpd, id_users, bulan_aktif, role');
            $this->datatables->from('users');
            $this->datatables->join('skpd', 'users.id_skpd = skpd.id_skpd', 'left');
            return print_r($this->datatables->generate());
    }

    public function adduser(){
        $name = $this->input->post('nama');
        $email = $this->input->post('email');
        $id_skpd = $this->input->post('id_skpd');
        $password = $this->input->post('password');
        $c_password = $this->input->post('c_password');
        if ($password == $c_password){
        $role = $this->input->post('role');
        $pass = md5($password);
        if($role == '1'){
            $id_skpd = 48;
        }
        $this->db->query("INSERT INTO users (id_skpd, role,  name, email, password) VALUES ('$id_skpd', '$role', '$name', '$email', '$pass')");
        echo json_encode(array("status" => "Data Berhasi Ditambahkan", "type" => 'success', 'title' => 'SUKSES'));
        } else {echo json_encode(array("status" => 'Konfirmasi Password Salah',"type" => 'error', 'title' => 'ERROR'));}
    }

    public function settinguser($id){
        $query =  $this->db->query("SELECT * from users where id_users = '$id'");
        $data  = json_encode($query->result());

        echo $data;
    }

     public function simpansettinguser(){
        $id = $this->input->post('id_users');
        $mulai = $this->input->post('mulai');
        $selesai = $this->input->post('selesai');
        $bulan = $this->input->post('bulan');
        $edit_blj = $this->input->post('edit_blj');
         $this->db->query(" UPDATE users SET mulai='$mulai', `selesai`='$selesai', `bulan_aktif`='$bulan', `edit_blj`='$edit_blj' WHERE  `id_users`= '$id'");
          echo json_encode(array("status" => "Data Berhasi Ditambahkan", "type" => 'success', 'title' => 'SUKSES'));
     }

     public function settingapp(){
        if($this->session->userdata('isLogin') == FALSE) {

                redirect('login/login_form');
            } else {
                $this->load->model('m_login');
                $user = $this->session->userdata('data_user');
                //setting view
                $data = array();
                $data['title'] = 'Setting Target & Aplikasi <small> </small>';
                $data['pengguna'] = $user;
                $data['level'] = $this->session->userdata('level'); 
                $this->db->select('*');
                $this->db->from('app_setting'); 
                $query = $this->db->get();
                $data['setting'] = $query->row();
                $this->db->select('*');
                $this->db->from('target'); 
                $query = $this->db->get();
                $data['target'] = $query->result();
                $this->load->view('mtr_user/settingapp', $data);
                }

     }

    public function simpansetting(){
        $id = $this->input->post('id_users');
        $mulai = $this->input->post('mulai');
        $selesai = $this->input->post('selesai');
        $bulan = $this->input->post('bulan');
        $edit_blj = $this->input->post('edit_blj');
        $tahun = $this->input->post('tahun');
         $this->db->query(" UPDATE users SET mulai='$mulai', `selesai`='$selesai', `bulan_aktif`='$bulan', `edit_blj`='$edit_blj', tahun='$tahun'");
         $this->db->query(" UPDATE app_setting SET mulai='$mulai', `selesai`='$selesai', `bulan_aktif`='$bulan', `edit_blj`='$edit_blj', tahun='$tahun'");
          echo json_encode(array("status" => "Data Berhasi Dirubah", "type" => 'success', 'title' => 'SUKSES'));
     }



    public function simpantarget(){
        $dt_fisik[1] = $this->input->post('tg_fisik_1'); $dt_keu[1] = $this->input->post('tg_keu_1'); 
        $dt_fisik[2] = $this->input->post('tg_fisik_2'); $dt_keu[2] = $this->input->post('tg_keu_2'); 
        $dt_fisik[3] = $this->input->post('tg_fisik_3'); $dt_keu[3] = $this->input->post('tg_keu_3'); 
        $dt_fisik[4] = $this->input->post('tg_fisik_4'); $dt_keu[4] = $this->input->post('tg_keu_4'); 
        $dt_fisik[5] = $this->input->post('tg_fisik_5'); $dt_keu[5] = $this->input->post('tg_keu_5'); 
        $dt_fisik[6] = $this->input->post('tg_fisik_6'); $dt_keu[6] = $this->input->post('tg_keu_6'); 
        $dt_fisik[7] = $this->input->post('tg_fisik_7'); $dt_keu[7] = $this->input->post('tg_keu_7'); 
        $dt_fisik[8] = $this->input->post('tg_fisik_8'); $dt_keu[8] = $this->input->post('tg_keu_8'); 
        $dt_fisik[9] = $this->input->post('tg_fisik_9'); $dt_keu[9] = $this->input->post('tg_keu_9'); 
        $dt_fisik[10] = $this->input->post('tg_fisik_10'); $dt_keu[10] = $this->input->post('tg_keu_10'); 
        $dt_fisik[11] = $this->input->post('tg_fisik_11'); $dt_keu[11] = $this->input->post('tg_keu_11'); 
        $dt_fisik[12] = $this->input->post('tg_fisik_12'); $dt_keu[12] = $this->input->post('tg_keu_12');

       for ($i=1 ;$i<13;$i++) {
          $data[$i] = array(
               'tg_fisik' => $dt_fisik[$i], 'tg_keu' => $dt_keu[$i]
          );  
          $this->db->where('tahun', '2018');
          $this->db->where('bulan', $i);
        $this->db->update('target', $data[$i]);  
        }  
          echo json_encode(array("status" => "Target Berhasil Dirubah", "type" => 'success', 'title' => 'SUKSES'));
     }

     public function simpandetailuser(){
        $id = $this->input->post('id_users');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $role = $this->input->post('role');
        $id_skpd = $this->input->post('id_skpd');
        $status = $this->input->post('status');
        $data = array('name' => $nama,
                        'email' => $email,
                        'role' => $role,
                        'id_skpd' => $id_skpd,
                        'status' => $status, );
        $this->db->where('id_users', $id);
        $this->db->update('users', $data);  
          echo json_encode(array("status" => "Data Berhasi Dirubah", "type" => 'success', 'title' => 'SUKSES'));
     }

    
}
