<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rekap extends CI_Controller {

	private $datauser;

    public function __construct() {
        parent::__construct();

        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->model('m_login');
        $this->load->model('RekapKegiatan');
        $this->load->helper('tgl_indo');
        $this->load->library('Subquery');
        $this->load->library('Dompdf_gen');
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
                $data['title'] = 'Rekapitulasi <small> </small>';
                $data['pengguna'] = $user;
                 $this->db->select('*');
                $this->db->from('skpd');
              
                $data['skpd']= $this->db->get();
                $data['level'] = $this->session->userdata('level'); 
                
                $this->load->view('rekap/index', $data);
                }
	}

    public function lihatrekap()
    {
        if($this->session->userdata('isLogin') == FALSE) {

                redirect('login/login_form');
            } else {
                $this->load->model('m_login');
                $user = $this->session->userdata('data_user');
                $skpd = $this->input->post('skpd');
                $bulan = $this->input->post('bulan');
                $jenis = $this->input->post('jenis');
                $data = array();
                $data['pengguna'] = $user;
                $this->db->select('*');
                $this->db->from('skpd');
                $this->db->where('id_skpd', $skpd);
                $query = $this->db->get();
                $data['skpd']=  $query->row();
                $data['bulan']=  $bulan;


                //setting view
                
                if ($jenis=='1'){
                    $data['data'] = $this->RekapKegiatan->program($skpd, $jenis, $bulan);
                    $data['jenis'] = 'Belanja Langsung dan Tidak Langsung';
                     
                     
 
                    $this->load->view('rekap/hasil', $data);
                   
                } else  if ($jenis=='2'){
                    $data['data'] = $this->RekapKegiatan->program($skpd, $jenis, $bulan);
                    $data['jenis'] = 'Belanja Tidak Lansung';
                     $this->load->view('rekap/hasilbtl', $data);
                }  else  if ($jenis=='3'){
                    $data['data'] = $this->RekapKegiatan->program($skpd, $jenis, $bulan);
                    $data['jenis'] = 'Belanja Langsung';
                     $this->load->view('rekap/hasilbl', $data);
                } else  if ($jenis=='4'){
                    $data['data'] = $this->RekapKegiatan->belanjamodal($skpd, $bulan);
                    $data['jenis'] = 'Belanja Modal';
                     $this->load->view('rekap/hasilbjm', $data);
                } else  if ($jenis=='5'){
                    $data['data'] = $this->RekapKegiatan->pengadaan($skpd, $bulan);
                    $data['jenis'] = 'Belanja Pengadaan';
                     $this->load->view('rekap/hasilpengadaan', $data);
                } 

               /*  $html = $this->output->get_output();
                    // Convert to PDF
                    $this->dompdf->set_paper('f4', 'landscape');
                    $this->dompdf->load_html($html);
                    $this->dompdf->render();
                    $this->dompdf->stream($data['jenis'].".pdf");*/
                
                
               
                }
    }

    public function rekapskpd()
    {
        if($this->session->userdata('isLogin') == FALSE) {

                redirect('login/login_form');
            } else {
                $this->load->model('m_login');
                $user = $this->session->userdata('data_user');
                //setting view
                $data = array();
                $data['title'] = 'Rekapitulasi <small> </small>';
                $data['pengguna'] = $user;
                
                $data['level'] = $this->session->userdata('level'); 
                
                $this->load->view('rekap/rekapskpd', $data);
                }
    }

    public function lihatrekapskpd()
    {
        if($this->session->userdata('isLogin') == FALSE) {

                redirect('login/login_form');
            } else {
                $this->load->model('m_login');
                $user = $this->session->userdata('data_user');
                $skpd = $this->input->post('skpd');
                $bulan = $this->input->post('bulan');
                $jenis = $this->input->post('jenis');
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
                $targetfisik = 'tg_fisik_'.$bulanint;
                $targetkeu = 'tg_keu_'.$bulanint;

                //setting view
                $data = array();
                if ($jenis=='1'){
                    $data['jenis'] = 'Belanja Langsung dan Tidak Langsung';
                    $where = '';$where2 = '';
                } else  if ($jenis=='2'){
                    $data['jenis'] = 'Belanja Lansung';
                    $where = "where mtr_program.jenis_blj = '2'";
                     $where2 = "where mtr_program.jenis_blj = '2'";
                }  else  if ($jenis=='3'){
                    $data['jenis'] = 'Belanja Langsung';
                    $where = "where mtr_program.jenis_blj = '1'";
                     $where2 = "where mtr_program.jenis_blj = '1'";
                } else  if ($jenis=='4'){
                    $data['jenis'] = 'Belanja Modal';
                } else  if ($jenis=='5'){
                    $data['jenis'] = 'Belanja Pengadaan';
                } 
                if ($jenis < 4){
                $query = $this->db->query("Select b.nama_skpd, sum(a.jml_kegiatan) as jml_kegiatan,sum(a.nonprogram) as non_program, sum(a.gaji) as gaji, sum(a.blj_pegawai) as blj_pegawai, sum(mtr_program.blj_barang) as blj_barang, sum(mtr_program.blj_modal) as blj_modal,
      sum(mtr_program.blj_pegawai)+sum(mtr_program.blj_barang)+sum(mtr_program.blj_modal) as tot_anggaran,
    sum(a.tg_fisik)/sum(a.jml_kegiatan) as tg_fisik, 
        (avg(a.tg_keu)/( sum(mtr_program.blj_pegawai)+sum(mtr_program.blj_barang)+sum(mtr_program.blj_modal)))*100 as tg_keu,
      sum(a.rl_gaji) as rl_gaji, sum(a.rl_non_program) as rl_non_program, sum(a.rl_blj_pegawai) as rl_blj_pegawai,
         sum(a.rl_blj_barang) as rl_blj_barang, sum(a.rl_blj_modal) as rl_blj_modal, 
         
      (sum(a.rl_non_program)+ sum(a.rl_gaji)+sum(a.rl_blj_pegawai) + sum(a.rl_blj_barang) + sum(a.rl_blj_modal)) as tot_realisasi , sum(a.rl_fisik)/sum(a.jml_kegiatan) as rl_fisik,  ((sum(a.rl_non_program)+ sum(a.rl_gaji)+sum(a.rl_blj_pegawai) + sum(a.rl_blj_barang) + sum(a.rl_blj_modal))/
        (sum(mtr_program.blj_pegawai)+sum(mtr_program.blj_barang)+sum(mtr_program.blj_modal))*100) as rl_keu from  mtr_program
   left join (select mtr_kegiatan.id_skpd, count(b.id_kegiatan) as jml_kegiatan, mtr_kegiatan.id_program, 
        if(jenis_blj = 1 ,if(is_gaji = 0, sum(blj_pegawai), 0), 0) as gaji, 
        if(jenis_blj = 1 ,if(is_gaji = 1, sum(blj_pegawai), 0), 0) as non_program, 
        if(jenis_blj = 2 ,if(is_gaji = 0, sum(blj_pegawai), 0), 0) as blj_pegawai,
        sum(blj_barang) as blj_barang, sum(blj_modal) as blj_modal,
        if(is_gaji = 1, sum(blj_pegawai), 0) as nonprogram, 
        sum(ifnull(a.rl_fisik,0)) as rl_fisik, 
      if(jenis_blj = 1 ,if(is_gaji = 1,sum(ifnull(a.rl_blj_pegawai,0)),0),0) as rl_non_program, 
      if(jenis_blj = 1 ,if(is_gaji = 0,sum(ifnull(a.rl_blj_pegawai,0)),0),0) as rl_gaji,
        if(jenis_blj = 2 ,if(is_gaji = 0,sum(ifnull(a.rl_blj_pegawai,0)),0),0) as rl_blj_pegawai,
        sum(ifnull(a.rl_blj_barang,0)) as rl_blj_barang,
      sum(ifnull(a.rl_blj_modal,0)) as rl_blj_modal,
        sum(b.tg_keu) as tg_keu, sum(b.tg_fisik) as tg_fisik from mtr_kegiatan
            left JOIN (select id_kegiatan, rl_fisik, rl_blj_pegawai, rl_blj_modal, rl_blj_barang from dt_realisasi where dt_realisasi.bulan = '$bulan') a ON (`a`.`id_kegiatan` = `mtr_kegiatan`.`id_kegiatan` )
         left JOIN (select id_kegiatan, id_skpd, tg_fisik as tg_fisik, tg_keu as tg_keu from dt_tgt_kegiatan
                          where bulan = $bulanint
         group by id_kegiatan  ) b ON (`b`.`id_kegiatan` = `mtr_kegiatan`.`id_kegiatan`) 
        group by mtr_kegiatan.id_program) a on mtr_program.id_program = a.id_program
   left join (select nama_skpd, id_skpd from skpd ) b on (b.id_skpd = mtr_program.id_skpd)
$where
group by mtr_program.id_skpd");
                $data['rekap']=$query->result();

                $q= $this->db->query("select sum(blj_pegawai), sum(blj_barang), sum(blj_modal), 
                (sum(blj_pegawai) + sum(blj_barang) + sum(blj_modal)) as total from mtr_program
                $where2");
                $data['total']=$q->row();
                $data['pengguna'] = $user;
                $this->db->select('nama_skpd');
                $this->db->from('skpd');
                $this->db->where('id_skpd', $skpd);
                $query = $this->db->get();
                $data['skpd']=  $query->result();
                $data['bulan']=  $bulan;
                if ($jenis == '1'){
                $this->load->view('rekap/hasilskpd', $data);
                }if ($jenis == '2'){
                $this->load->view('rekap/hasilskpdbl', $data);
                } else { if ($jenis == '3'){
                $this->load->view('rekap/hasilskpdbtl', $data);
                }}
            } else { if ($jenis == '4'){
                $query = $this->db->query("SELECT skpd.nama_skpd, sum(a.anggaran) as anggaran, 
                     avg(a.tg_fisik) as tg_fisik, sum(a.tg_keu)/sum(a.anggaran) as tg_keu,
                    avg(a.rl_fisik) as rl_fisik, sum(a.rl_keu)/sum(a.anggaran) as rl_keu from skpd
                    left join (SELECT mtr_belanja_modal.id_bjm,  mtr_belanja_modal.anggaran, mtr_belanja_modal.id_skpd
                        ,ifnull(a.rl_fisik,0) as rl_fisik, ifnull(a.rl_keu, 0) as rl_keu, b.tg_fisik, b.tg_keu 
                                FROM (`mtr_belanja_modal`) 
                        left JOIN (select id_bjm, ifnull(rl_fisik,0) as rl_fisik, rl_keu 
                            from dt_realisasi_bjm where dt_realisasi_bjm.bulan = '$bulan') 
                            a ON (`a`.`id_bjm` = `mtr_belanja_modal`.`id_bjm` )
                        left JOIN (select id_bjm, ifnull(tg_keu,0) as tg_keu, ifnull(tg_fisik,0) as tg_fisik 
                             from dt_tgt_bljmodal where bulan= '$bulanint' ) b ON (`b`.`id_bjm` = `mtr_belanja_modal`.`id_bjm`)) a on (a.id_skpd = skpd.id_skpd)
                    group by skpd.id_skpd");
                $data['data']=$query->result();

               
                $data['pengguna'] = $user;
                $this->db->select('nama_skpd');
                $this->db->from('skpd');
                $this->db->where('id_skpd', $skpd);
                $query = $this->db->get();
                $data['skpd']=  $query->result();
                $data['bulan']=  $bulan;
                
                $this->load->view('rekap/hasilbjmskpd', $data);

            } else if ($jenis == '5'){
                $query = $this->db->query("SELECT skpd.nama_skpd, sum(a.anggaran) as anggaran, avg(a.tg_fisik) as tg_fisik,
                     sum(a.tg_keu)/sum(a.anggaran) as tg_keu, avg(a.rl_fisik) as rl_fisik, 
                     sum(a.rl_keu)/sum(a.anggaran) as rl_keu from skpd 
                     left join (SELECT mtr_pengadaan.id_pengadaan , mtr_pengadaan.anggaran, mtr_pengadaan.id_skpd,
                     ifnull(a.rl_fisik,0) as rl_fisik, ifnull(a.rl_keu, 0) as rl_keu, b.tg_fisik, b.tg_keu 
                     FROM mtr_pengadaan 
                     left JOIN (select id_pengadaan, ifnull(pelaksanaan,0) as rl_fisik, keuangan as rl_keu from dt_realisasi_pengadaan 
                     where dt_realisasi_pengadaan.bulan = '$bulan') a ON (`a`.`id_pengadaan` = `mtr_pengadaan`.`id_pengadaan` )
                     left JOIN (select id_pengadaan, ifnull(tg_keu,0) as tg_keu, ifnull(tg_fisik,0) as tg_fisik from dt_tgt_pengadaan where bulan= '$bulanint' ) b ON 
                    (`b`.`id_pengadaan` = mtr_pengadaan.id_pengadaan)) a on (a.id_skpd = skpd.id_skpd) group by skpd.id_skpd");
                $data['data']=$query->result();

               
                $data['pengguna'] = $user;
                $this->db->select('nama_skpd');
                $this->db->from('skpd');
                $this->db->where('id_skpd', $skpd);
                $query = $this->db->get();
                $data['skpd']=  $query->result();
                $data['bulan']=  $bulan;
                
                $this->load->view('rekap/hasilpengadaanskpd', $data);

            } }
        }
    }




}
