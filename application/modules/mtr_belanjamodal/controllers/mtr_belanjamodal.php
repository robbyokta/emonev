<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mtr_belanjamodal extends CI_Controller {

	private $datauser;

    public function __construct() {
        parent::__construct();

        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->model('m_login');
        $this->load->database();
        $this->datauser = $this->session->userdata('data_user');
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
                $data['title'] = 'Master Data Belanja Modal <small> </small>';
                $data['pengguna'] = $user;
                $data['level'] = $this->session->userdata('level'); 
                
                $this->db->select('*');
                $this->db->from('mtr_kegiatan');
                $this->db->where('id_skpd', $user->id_skpd);
                $query = $this->db->get();
                $data['kegiatan'] = $query->result();
                
                $this->load->view('mtr_belanjamodal/index', $data);
                }
	}

    public function data_mtr_belanja_modal(){
        $this->load->library( 'datatables');
        $user = $this->session->userdata('data_user');
        $role = $user->role;
        if ($role == "1"){
            $this->datatables->select('skpd.nama_skpd as skpd,kode, nama_pengadaan, anggaran, id_bjm');
            $this->datatables->from('mtr_belanja_modal');
            $this->datatables->join('skpd', 'mtr_belanja_modal.id_skpd = skpd.id_skpd');
            return print_r($this->datatables->generate());
        } else {
            $skpd = $user->id_skpd;
             $this->datatables->select('skpd.nama_skpd as skpd, kode, nama_pengadaan, anggaran, id_bjm');
            $this->datatables->from('mtr_belanja_modal');
            $this->datatables->join('skpd', 'mtr_belanja_modal.id_skpd = skpd.id_skpd');
             $this->datatables->where('mtr_belanja_modal.id_skpd', $skpd);
            return print_r($this->datatables->generate());

        }
    }

     public function detailbelanjamodal($id){
        if($this->session->userdata('isLogin') == FALSE) {

                redirect('login/login_form');
            } else {
                $this->load->model('m_login');
                $user = $this->session->userdata('data_user');
                //setting view
                $data = array();
                $data['title'] = 'Master Data Kegiatan <small> </small>';
                $data['pengguna'] = $user;
                $data['level'] = $this->session->userdata('level'); 
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
                $data['title'] = 'Detail Belanja Modal <small> </small>';
                $data['pengguna'] = $user;
                $data['bulan_aktif']= $bulanint;
                $data['id']= $id;
                $data['level'] = $this->session->userdata('level'); 

                $this->db->select('mtr_belanja_modal.*, skpd.nama_skpd');
                $this->db->from('mtr_belanja_modal');
                $this->db->join('skpd', 'mtr_belanja_modal.id_skpd = skpd.id_skpd');
                $this->db->where('mtr_belanja_modal.id_bjm', $id);
                $query = $this->db->get();
                $data['data'] = $query->row();$this->db->select('*');
                $this->db->from('dt_tgt_bljmodal');
                $this->db->where('dt_tgt_bljmodal.id_bjm', $id);
                $query = $this->db->get();
                $data['target'] = $query->result();
                
                $this->load->view('mtr_belanjamodal/detailbelanjamodal', $data);
            }

    }

    public function simpandetail(){
        $id_bjm = $this->input->post('id_bjm');
        $jenis_pengadaan = $this->input->post('jenis_pengadaan');
        $volume = $this->input->post('volume');
        $metoda_pemilihan_penyedia = $this->input->post('metoda_pemilihan_penyedia');
        $pemilihan_penyedia_awal = $this->input->post('pemilihan_penyedia_awal');
        $pemilihan_penyedia_akhir = $this->input->post('pemilihan_penyedia_akhir');
        $pelaksana_pekerjaan_awal = $this->input->post('pelaksana_pekerjaan_awal');
        $pelaksana_pekerjaan_akhir = $this->input->post('pelaksana_pekerjaan_akhir');
        $data = array(
               'jenis_pengadaan' => $jenis_pengadaan,
               'volume' => $volume,
               'metoda_pemilihan_penyedia' => $metoda_pemilihan_penyedia,
               'pemilihan_penyedia_awal' => $pelaksana_pekerjaan_awal,
               'pemilihan_penyedia_akhir' => $pelaksana_pekerjaan_akhir,
               'pelaksana_pekerjaan_awal' => $pelaksana_pekerjaan_awal,
               'pelaksana_pekerjaan_akhir' => $pemilihan_penyedia_akhir,
            );
        $this->db->where('id_bjm', $id_bjm);
        $this->db->update('mtr_belanja_modal', $data); 
        $query = $this->db->query("SELECT * FROM (`mtr_belanja_modal`) WHERE `mtr_belanja_modal`.`id_bjm` = '$id_bjm'");
        $detail = $query->result();

        echo json_encode($detail);
     }

     public function simpantarget(){
        $id_bjm = $this->input->post('id');
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
          $this->db->where('id_bjm', $id_bjm);
          $this->db->where('bulan', $i);
        $this->db->update('dt_tgt_bljmodal', $data[$i]);  
        }  

        $query = $this->db->query("SELECT * FROM (`dt_tgt_bljmodal`) WHERE `id_bjm` = '$id_bjm'");
        $detail = $query->result();

        echo json_encode($detail);
    }

    public function belanjamodal($id){
             $this->db->select('*');
               $this->db->from('mtr_belanja_modal');
               $this->db->where('mtr_belanja_modal.id_bjm', $id);
                $query = $this->db->get();
                $kegiatan = $query->row();

        echo json_encode($kegiatan);
    }

    public function tambahbjm(){
        $user = $this->session->userdata('data_user');
        $this->db->select('*');
        $this->db->from('skpd');
        $this->db->where('id_skpd', $user->id_skpd);
        $query = $this->db->get();
        $skpd = $query->row();
        $data = array(
               'anggaran' => $this->input->post('anggaran'),
               'id_kegiatan' => $this->input->post('id_kegiatan'),
               'kode' => $this->input->post('kode_pengadaan'),
               'nama_pengadaan' => $this->input->post('nama_pengadaan'),
               'id_skpd' => $user->id_skpd,
               'kd_urusan' => $skpd->kd_urusan,
               'kd_bidang' => $skpd->kd_bidang,
               'kd_unit' => $skpd->kd_unit,
               'kd_sub' => $skpd->kd_sub,
               'input_by' => $user->id_users,
            );
        $this->db->insert('mtr_belanja_modal', $data); 
        //update program di trigger DB
       
       echo json_encode(array("status" => TRUE));


     }
    public function editbjm(){
        $user = $this->session->userdata('data_user');
        $this->db->select('*');
        $this->db->from('skpd');
        $this->db->where('id_skpd', $user->id_skpd);
        $query = $this->db->get();
        $skpd = $query->row();
        $id_pengadaan = $this->input->post('id_pengadaan');
        $data = array(
               'anggaran' => $this->input->post('anggaran'),
               'id_kegiatan' => $this->input->post('id_kegiatan'),
               'kode' => $this->input->post('kode_pengadaan'),
               'nama_pengadaan' => $this->input->post('nama_pengadaan'),
               'id_skpd' => $user->id_skpd,
               'kd_urusan' => $skpd->kd_urusan,
               'kd_bidang' => $skpd->kd_bidang,
               'kd_unit' => $skpd->kd_unit,
               'kd_sub' => $skpd->kd_sub,
               'input_by' => $user->id_users,
            );
        $this->db->where('id_bjm', $id_pengadaan); 
        $this->db->update('mtr_belanja_modal', $data); 
        //update program di trigger DB
       
       echo json_encode(array("status" => TRUE));
    }

}