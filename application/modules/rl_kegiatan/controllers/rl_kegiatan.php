<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rl_kegiatan extends CI_Controller {

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
                $data['title'] = 'Realisasi Kegiatan <small> </small>';
                $data['pengguna'] = $user;
                $data['level'] = $this->session->userdata('level'); 
                
                $this->load->view('rl_kegiatan/index', $data);
                }
	}

    public function data_rl_kegiatan(){

        $this->load->library( 'datatables');
        $user = $this->session->userdata('data_user');
        $role = $user->role;
        if ($role == "1"){
            $this->datatables->select('nama_keg, kode, (blj_pegawai+blj_barang+blj_modal) as total, id_kegiatan');
            $this->datatables->from('mtr_kegiatan');
            $this->datatables->join('skpd', 'mtr_kegiatan.id_skpd = skpd.id_skpd');
            return print_r($this->datatables->generate());
        } else {
            $skpd = $user->id_skpd;
             $this->datatables->select(' nama_keg, kode, (blj_pegawai+blj_barang+blj_modal) as total, id_kegiatan');
            $this->datatables->from('mtr_kegiatan');
            $this->datatables->join('skpd', 'mtr_kegiatan.id_skpd = skpd.id_skpd');
             $this->datatables->where('mtr_kegiatan.id_skpd', $skpd);
            return print_r($this->datatables->generate());

        }

    }

    public function detail($id){
        if($this->session->userdata('isLogin') == FALSE) {

                redirect('login/login_form');
            } else {
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
                $data['title'] = 'Realisasi Kegiatan <small> </small>';
                $data['pengguna'] = $user;
                $data['bulan_aktif']= $bulanint;
                $lalu = $bulanint -1;
                $data['id']= $id;
                $data['level'] = $this->session->userdata('level'); 
                $fisik = 'tg_fisik_'.$bulanint;
                $keu = 'tg_keu_'.$bulanint;
                $this->db->select('*');
               $this->db->from('mtr_kegiatan');
               $this->db->where('id_kegiatan', $id);
               $query = $this->db->get();
               $data['data'] = $query->row();
               $data['target'] = new stdClass;
               $data['target']->fisik = '0';
               $data['target']->keu = '0';
               $old = $this->db->query("select ifnull(rl_fisik,0) as fisik, ifnull(rl_blj_modal+rl_blj_pegawai+rl_blj_barang,0) as keu 
                    from dt_realisasi where id_kegiatan = '$id' and bulanint = $lalu ");
               if ($old->num_rows()!=0){
               $data['target'] = $old->row();
                } 

         $this->load->view('rl_kegiatan/detail_kegiatan', $data);
     }
    }
    public function real_kegiatan($id){
        $this->load->library( 'datatables');
        $user = $this->session->userdata('data_user');
        $role = $user->role;
        
            $skpd = $user->id_skpd;
             $this->datatables->select('id, bulan, bulanint, rl_fisik, rl_blj_pegawai, rl_blj_barang, rl_blj_modal,(rl_blj_pegawai+rl_blj_barang+rl_blj_modal) as total');
            $this->datatables->from('dt_realisasi');
             $this->datatables->where('id_kegiatan', $id);
           $this->db->order_by('bulanint','asc');
            return print_r($this->datatables->generate());
    }

     public function addrealisasi(){
        $id_kegiatan = $this->input->post('id_keg');
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan_aktif');
                $user = $this->session->userdata('data_user');
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
        $blj_barang = $this->input->post('blj_barang');
        $blj_modal = $this->input->post('blj_modal');
        $blj_pegawai = $this->input->post('blj_pegawai');
        $rl_fisik = $this->input->post('rl_fisik');
        $kendala= $this->input->post('kendala');
        $id = $id_kegiatan.'-'.$tahun.'-'.$bulanint.'-'.$user->id_skpd;

        $this->db->query("INSERT INTO dt_realisasi (id,id_kegiatan, tahun, bulanint, bulan, rl_fisik, rl_blj_pegawai, rl_blj_barang, rl_blj_modal, kendala) VALUES ('$id', '$id_kegiatan', '$tahun', '$bulanint', '$bulan', '$rl_fisik', '$blj_pegawai', '$blj_barang', '$blj_modal', '$kendala')");
        $data = 'sukses';
        echo json_encode(array("status" => TRUE));
     }   

      public function editdata($id){
        $query = $this->db->query("SELECT *, (rl_blj_modal+rl_blj_pegawai+rl_blj_barang) as total from dt_realisasi WHERE id = '$id'");
        $data  = json_encode($query->result());

        echo $data;

      } 

      public function editrealisasi($id){
        $id_kegiatan = $this->input->post('id_keg');
        $tahun = $this->input->post('tahun');
      
        $blj_barang = $this->input->post('blj_barang');
        $blj_modal = $this->input->post('blj_modal');
        $blj_pegawai = $this->input->post('blj_pegawai');
        $rl_fisik = $this->input->post('rl_fisik');
        $kendala= $this->input->post('kendala');
        $this->db->query("UPDATE dt_realisasi SET rl_fisik='$rl_fisik', rl_blj_modal='$blj_modal', rl_blj_barang='$blj_barang', rl_blj_pegawai='$blj_pegawai', kendala='$kendala' where id = '$id'");
        $data = 'sukses';
        echo json_encode(array("status" => TRUE));
     }   


}
