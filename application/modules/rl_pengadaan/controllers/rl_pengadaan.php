<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rl_pengadaan extends CI_Controller {

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
                $data['title'] = 'Realisasi Data Pengadaan <small> </small>';
                $data['pengguna'] = $user;
                $data['level'] = $this->session->userdata('level'); 
                
                $this->load->view('rl_pengadaan/index', $data);
                }
	}

    public function data_rl_pengadaan(){
        $this->load->library( 'datatables');
        $user = $this->session->userdata('data_user');
        $role = $user->role;
        if ($role == "1"){
            $this->datatables->select('nama_pengadaan, kode, anggaran, id_pengadaan');
            $this->datatables->from('mtr_pengadaan');
            $this->datatables->join('skpd', 'mtr_pengadaan.id_skpd = skpd.id_skpd');
            return print_r($this->datatables->generate());
        } else {
            $skpd = $user->id_skpd;
            $this->datatables->select('nama_pengadaan, kode, anggaran, id_pengadaan');
            $this->datatables->from('mtr_pengadaan');
            $this->datatables->join('skpd', 'mtr_pengadaan.id_skpd = skpd.id_skpd');
             $this->datatables->where('mtr_pengadaan.id_skpd', $skpd);
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
                $data['title'] = 'Detail pengadaan <small> '.$user->name.'</small>';
                $data['pengguna'] = $user;
                $data['bulan_aktif']= $bulanint;
                $data['id']= $id;
                $data['level'] = $this->session->userdata('level'); 

                $this->db->select('*');
               $this->db->from('mtr_pengadaan');
               $this->db->where('id_pengadaan', $id);
               $query = $this->db->get();
                $data['data'] = $query->row();

                 $this->db->select('*');
               $this->db->from('dt_realisasi_pengadaan');
               $this->db->where('id_pengadaan', $id);
               $this->db->where('bulan', $user->bulan_aktif);
               $query = $this->db->get();
               $data['pengadaan'] = $query->row();

         $this->load->view('rl_pengadaan/detail_pengadaan', $data);

    }
    public function real_pengadaan($id){
        $this->load->library( 'datatables');
        $user = $this->session->userdata('data_user');
        $role = $user->role;
        
            $skpd = $user->id_skpd;
             $this->datatables->select("*");
            $this->datatables->from('dt_realisasi_pengadaan');
             $this->datatables->where('id_pengadaan', $id);
            return print_r($this->datatables->generate());
    }

     public function addrealisasi(){


                $user = $this->session->userdata('data_user');
        $id_pengadaan = $this->input->post('id_pengadaan');
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan_aktif');
        $kode_lelang = $this->input->post('kode_lelang');
        $tgl_pengadaan = $this->input->post('tgl_pengadaan');
        $tgl_kontrak = $this->input->post('tgl_kontrak');
        $no_kontrak = $this->input->post('no_kontrak');
        $tgl_serah_terima = $this->input->post('tgl_serah_terima');
        $pemenang = $this->input->post('pemenang');
        $pelaksanaan = $this->input->post('pelaksanaan');
        $keuangan = $this->input->post('keuangan');
        $nilai_kontrak = $this->input->post('nilai_kontrak');
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
        $id = $id_pengadaan.'-'. $tahun.'-'.$bulanint.'-'.$user->id_skpd;
       
        $data = array(
            'id'        => $id,
            'id_pengadaan' => $id_pengadaan,
            'bulan' => $bulan,
            'kode_lelang' => $kode_lelang,
            'tgl_kontrak' => $tgl_kontrak,
            'no_kontrak' => $no_kontrak,
            'tgl_pengadaan' => $tgl_pengadaan,
            'tgl_serah_terima' => $tgl_serah_terima,
            'kendala' => $kendala,
            'nilai_kontrak' => $nilai_kontrak,
            'pelaksanaan' => $pelaksanaan,
            'keuangan' => $keuangan,
            'kendala' => $kendala,
            );

       $this->db->where('id',$id);
        $q = $this->db->get('dt_realisasi_pengadaan');

        if ( $q->num_rows() > 0 ) {
                $this->db->where('id', $id);
                $this->db->update('dt_realisasi_pengadaan', $data); 
                echo json_encode(array("status" => TRUE));
        } else {
                $this->db->where('id', $id);
                $this->db->insert('dt_realisasi_pengadaan', $data); 
                echo json_encode(array("status" => TRUE));

        }

        
     }   

     


}
