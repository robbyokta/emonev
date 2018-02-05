<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mtr_kegiatan extends CI_Controller {

	private $datauser;

    public function __construct() {
        parent::__construct();

        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->model('m_login');
        $this->load->database();
        $this->datauser = $this->session->userdata('data_user');
        

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
                $data['title'] = 'Master Data Kegiatan <small></small>';
                $data['pengguna'] = $user;
                $data['level'] = $this->session->userdata('level'); 
                $this->db->select('*');
                $this->db->from('mtr_program');
                $this->db->where('id_skpd', $user->id_skpd);
                $query = $this->db->get();
                $data['program'] = $query->result();
               
                
                $this->load->view('mtr_kegiatan/index', $data);
                }
	}

    public function data_mtr_kegiatan(){
        $this->load->library( 'datatables');
        $user = $this->session->userdata('data_user');
        $role = $user->role;
        if ($role == "1"){
            $this->datatables->select('skpd.nama_skpd as skpd,kode, nama_keg, blj_pegawai, blj_barang, blj_modal, (blj_pegawai+blj_barang+blj_modal) as total, id_kegiatan');
            $this->datatables->from('mtr_kegiatan');
            $this->datatables->join('skpd', 'mtr_kegiatan.id_skpd = skpd.id_skpd');
            return print_r($this->datatables->generate());
        } else {
            $skpd = $user->id_skpd;
             $this->datatables->select('skpd.nama_skpd as skpd, kode, nama_keg, blj_pegawai, blj_barang, blj_modal, (blj_pegawai+blj_barang+blj_modal) as total, id_kegiatan');
            $this->datatables->from('mtr_kegiatan');
            $this->datatables->join('skpd', 'mtr_kegiatan.id_skpd = skpd.id_skpd');
             $this->datatables->where('mtr_kegiatan.id_skpd', $skpd);
            return print_r($this->datatables->generate());

        }

    }

    public function datatarget($id){
         $query =  $this->db->query("SELECT * from dt_target_kegiatan where id_kegiatan = '$id'");
        $data  = json_encode($query->result());

        echo $data;
    }

    public function detailkegiatan($id){
        if($this->session->userdata('isLogin') == FALSE) {

                redirect('login/login_form');
            } else {
                $this->load->model('m_login');
                $user = $this->session->userdata('data_user');
                $setting = $this->session->userdata('setting');
                //setting view
                $data = array();
                $data['title'] = 'Master Data Kegiatan <small> </small>';
                $data['pengguna'] = $user;
                $data['setting'] = $setting;
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
                $data['title'] = 'Detail & Target Kegiatan <small> </small>';
                $data['pengguna'] = $user;
                $data['bulan_aktif']= $bulanint;
                $data['id']= $id;
                $data['level'] = $this->session->userdata('level'); 

                $this->db->select('*');
               $this->db->from('mtr_kegiatan');
               $this->db->where('mtr_kegiatan.id_kegiatan', $id);
               $query = $this->db->get();
                $data['data'] = $query->row();

              $this->db->select('*');
               $this->db->from('dt_tgt_kegiatan');
               $this->db->where('dt_tgt_kegiatan.id_kegiatan', $id);
               $query = $this->db->get();
                $data['target'] = $query->result();

                


                
                $this->load->view('mtr_kegiatan/detailkegiatan', $data);
            }

    }

    public function simpantarget(){
        $id_kegiatan = $this->input->post('id_kegiatan');
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
          $this->db->where('id_kegiatan', $id_kegiatan);
          $this->db->where('bulan', $i);
        $this->db->update('dt_tgt_kegiatan', $data[$i]);  
        }  

        $query = $this->db->query("SELECT * FROM (`dt_tgt_kegiatan`) WHERE `id_kegiatan` = '$id_kegiatan'");
        $detail = $query->result();

        echo json_encode($detail);
    }

     public function simpandetail(){
        $id_kegiatan = $this->input->post('id_kegiatan');
        $kpa = $this->input->post('kpa');
        $pptk = $this->input->post('pptk');
        $data = array(
               'kpa' => $kpa,
               'pptk' => $pptk
            );
        $this->db->where('id_kegiatan', $id_kegiatan);
        $this->db->update('mtr_kegiatan', $data); 
        $query = $this->db->query("SELECT * FROM (`mtr_kegiatan`) WHERE `mtr_kegiatan`.`id_kegiatan` = '$id_kegiatan'");
        $detail = $query->result();

        echo json_encode($detail);



     }

     public function tambahkegiatan(){
        $user = $this->session->userdata('data_user');
        $this->db->select('*');
        $this->db->from('skpd');
        $this->db->where('id_skpd', $user->id_skpd);
        $query = $this->db->get();
        $skpd = $query->row();
        $data = array(
               'blj_pegawai' => $this->input->post('blj_pegawai'),
               'blj_barang' => $this->input->post('blj_barang'),
               'blj_modal' => $this->input->post('blj_modal'),
               'id_program' => $this->input->post('id_program'),
               'kode' => $this->input->post('kode_kegiatan'),
               'nama_keg' => $this->input->post('nama_kegiatan'),
               'jenis_blj' => $this->input->post('jenis_blj'),
               'id_skpd' => $user->id_skpd,
               'kd_urusan' => $skpd->kd_urusan,
               'kd_bidang' => $skpd->kd_bidang,
               'kd_unit' => $skpd->kd_unit,
               'kd_sub' => $skpd->kd_sub,
               'input_by' => $user->id_users,
            );
        $this->db->insert('mtr_kegiatan', $data); 
        //update program di trigger DB
       
       echo json_encode(array("status" => TRUE));


     }

     public function kegiatan($id){
             $this->db->select('*');
               $this->db->from('mtr_kegiatan');
               $this->db->where('mtr_kegiatan.id_kegiatan', $id);
                $query = $this->db->get();
                $kegiatan = $query->row();

        echo json_encode($kegiatan);
    }

    public function editkegiatan(){
        $user = $this->session->userdata('data_user');
        $this->db->select('*');
        $this->db->from('skpd');
        $this->db->where('id_skpd', $user->id_skpd);
        $query = $this->db->get();
        $skpd = $query->row();
        $id_kegiatan = $this->input->post('id_kegiatan');
        $data = array(
               'blj_pegawai' => $this->input->post('blj_pegawai'),
               'blj_barang' => $this->input->post('blj_barang'),
               'blj_modal' => $this->input->post('blj_modal'),
               'id_program' => $this->input->post('id_program'),
               'kode' => $this->input->post('kode_kegiatan'),
               'nama_keg' => $this->input->post('nama_kegiatan'),
               'jenis_blj' => $this->input->post('jenis_blj'),
               'id_skpd' => $user->id_skpd,
               'kd_urusan' => $skpd->kd_urusan,
               'kd_bidang' => $skpd->kd_bidang,
               'kd_unit' => $skpd->kd_unit,
               'kd_sub' => $skpd->kd_sub,
               'input_by' => $user->id_users,
            );
        $this->db->where('id_kegiatan', $id_kegiatan); 
        $this->db->update('mtr_kegiatan', $data); 
        //update program di trigger DB
       
       echo json_encode(array("status" => TRUE));
    }

    
}
