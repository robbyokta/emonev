<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rl_bljmodal extends CI_Controller {

	private $datauser;

    public function __construct() {
        parent::__construct();

        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->model('m_login');
        $this->load->database();
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
                $data['title'] = 'Realisasi Data Belanja Modal <small></small>';
                $data['pengguna'] = $user;
                $data['level'] = $this->session->userdata('level'); 
                
                $this->load->view('rl_bljmodal/index', $data);
                }
	}

    public function data_rl_bljmodal(){
        $this->load->library( 'datatables');
        $user = $this->session->userdata('data_user');
        $role = $user->role;
        if ($role == "1"){
            $this->datatables->select('nama_pengadaan, kode, anggaran, id_bjm');
            $this->datatables->from('mtr_belanja_modal');
            $this->datatables->join('skpd', 'mtr_belanja_modal.id_skpd = skpd.id_skpd');
            return print_r($this->datatables->generate());
        } else {
            $skpd = $user->id_skpd;
            $this->datatables->select('nama_pengadaan, kode, anggaran, id_bjm');
            $this->datatables->from('mtr_belanja_modal');
            $this->datatables->join('skpd', 'mtr_belanja_modal.id_skpd = skpd.id_skpd');
             $this->datatables->where('mtr_belanja_modal.id_skpd', $skpd);
            return print_r($this->datatables->generate());

        }

    }

    public function detail($id){
        $this->load->model('m_login');
                $user = $this->session->userdata('data_user');
                //setting view
                $data = array();
                if ($user->bulan_aktif == 'Januari'){
                    $bulanint = '1';
                    } else   if ($user->bulan_aktif == 'Februari'){
                    $bulanint = '2';
                } else   if ($user->bulan_aktif == 'Maret'){
                    $bulanint = '3';
                } else   if ($user->bulan_aktif == 'April'){
                    $bulanint = '4';
                } else   if ($user->bulan_aktif == 'Mei'){
                    $bulanint = '5';
                } else   if ($user->bulan_aktif == 'Juni'){
                    $bulanint = '6';
                } else   if ($user->bulan_aktif == 'Juli'){
                    $bulanint = '7';
                } else   if ($user->bulan_aktif == 'Agustus'){
                    $bulanint = '8';
                } else   if ($user->bulan_aktif == 'September'){
                    $bulanint = '9';
                } else   if ($user->bulan_aktif == 'Oktober'){
                    $bulanint = '10';
                } else   if ($user->bulan_aktif == 'November'){
                    $bulanint = '11';
                } else   if ($user->bulan_aktif == 'Desember'){
                    $bulanint = '12';
                }
                $data['title'] = 'Detail pengadaan <small> </small>';
                $data['pengguna'] = $user;
                $data['bulan_aktif']= $bulanint;
                $data['id']= $id;
                $data['level'] = $this->session->userdata('level'); 

                $this->db->select('*');
               $this->db->from('mtr_belanja_modal');
               $this->db->where('id_bjm', $id);
               $query = $this->db->get();
                $data['data'] = $query->row();

                 $this->db->select('*');
               $this->db->from('dt_realisasi_bjm');
               $this->db->where('id_bjm', $id);
               $this->db->where('bulan', $user->bulan_aktif);
               $query = $this->db->get();
               $data['pengadaan'] = $query->row();

         $this->load->view('rl_bljmodal/detail_bljmodal', $data);

    }
    public function real_bljmodal($id){
        $this->load->library( 'datatables');
        $user = $this->session->userdata('data_user');
        $role = $user->role;
        
            $skpd = $user->id_skpd;
             $this->datatables->select('*');
            $this->datatables->from('dt_realisasi_bjm');
             $this->datatables->where('id_bjm', $id);
            return print_r($this->datatables->generate());
    }

     public function addrealisasi(){
                $user = $this->session->userdata('data_user');
        $id_bjm = $this->input->post('id_bjm');
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan_aktif');
        $rl_fisik = $this->input->post('rl_fisik');
        $rl_keu = $this->input->post('rl_keu');
        $kendala = $this->input->post('kendala');
        if ($bulan == 'Januari'){
            $bulanint = '1';
            } else   if ($bulan == 'Februari'){
            $bulanint = '2';
        } else   if ($bulan == 'Maret'){
            $bulanint = '3';
        } else   if ($bulan == 'April'){
            $bulanint = '4';
        } else   if ($bulan == 'Mei'){
            $bulanint = '5';
        } else   if ($bulan == 'Juni'){
            $bulanint = '6';
        } else   if ($bulan == 'Juli'){
            $bulanint = '7';
        } else   if ($bulan == 'Agustus'){
            $bulanint = '8';
        } else   if ($bulan == 'September'){
            $bulanint = '9';
        } else   if ($bulan == 'Oktober'){
            $bulanint = '10';
        } else   if ($bulan == 'November'){
            $bulanint = '11';
        } else   if ($bulan == 'Desember'){
            $bulanint = '12';
        }
        $id = $id_bjm.'-'. $tahun.'-'.$bulanint.'-'.$user->id_skpd;
       
        $data = array(
            'id'        => $id,
            'id_bjm' => $id_bjm,
            'bulan' => $bulan,
            'tahun' =>$tahun,
            'rl_fisik' => $rl_fisik,
            'rl_keu' => $rl_keu,
            'kendala' => $kendala,
            );

       $this->db->where('id',$id);
        $q = $this->db->get('dt_realisasi_bjm');

        if ( $q->num_rows() > 0 ) {
                $this->db->where('id_bjm', $id);
                $this->db->update('dt_realisasi_bjm', $data); 
                echo json_encode(array("status" => TRUE));
        } else {
                $this->db->where('id_bjm', $id);
                $this->db->insert('dt_realisasi_bjm', $data); 
                echo json_encode(array("status" => TRUE));

        }

        
     }   

      

}
