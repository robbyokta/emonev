<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class skpd extends CI_Controller {

	private $datauser;

    public function __construct() {
        parent::__construct();

        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->model('m_login');
        $this->load->model('realisasi');
        $this->load->model('kpapptk');
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

                $data = array();
                $data['title'] = 'Dashboard <small> </small>';
                $data['pengguna'] = $user;
                if($user->role == '2'){
                
                $data['realisasi']= $this->realisasi->datagrafikrealisasi($user->role,$user->id_skpd);
                // $data['level'] = $this->session->userdata('level');       
                //$data['pengguna'] = $this->m_login->dataPengguna($user);
                $this->load->view('skpd/view_homepage', $data);
                } else {

                    $data['realisasi']= $this->realisasi->datagrafikrealisasi($user->role,$user->id_skpd);
                // $data['level'] = $this->session->userdata('level');       
                //$data['pengguna'] = $this->m_login->dataPengguna($user);
                $this->load->view('skpd/admin_home', $data);
                }
	   }
    }

    public function inputskpd(){
        $bulan = $this->input->post('bulan');
        $query = $this->db->query("select a.nama_skpd, b.jml_kegiatan, ifnull(c.jml_input,0) as inputan from skpd a
            left join (select id_skpd, count(id_kegiatan) as jml_kegiatan 
            from mtr_kegiatan group by id_skpd) b on (b.id_skpd = a.id_skpd)
            left join (Select split_string(id,'-',4) as skpd, count(id) as jml_input from dt_realisasi
            where split_string(id,'-',3) = '$bulan'
            group by split_string(id,'-',4) ) c on (c.skpd = a.id_skpd)");
        $input = $query->result(); 
        $d = '';
        $i = 1;foreach ($input as $data) {
                        $d .= '<tr>
                                <td align="center">'.$i.'</td>
                                <td>'.$data->nama_skpd.'</td>
                                <td align="center">'.$data->jml_kegiatan.'</td>
                                <td align="center">'.$data->inputan.'</td>
                              </tr>';
                        # code...
                        $i++;
                      }
        echo json_encode($input);

    }
    
	

    public function datakpapptk(){
        $user = $this->session->userdata('data_user');

                $bulan = $this->input->post('bulan');

                $data = array();
                $data['title'] = 'Dashboard <small> </small>';
                $data['pengguna'] = $user;
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

                $kpapptk = $this->kpapptk->kpa($user->id_skpd, $bulan, $bulanint);

                 $i= 1;
                    $rl_keu_kpa = 0;
                    $tg_keu_kpa = 0;
                    $dev_keu_kpa = 0;
                    $aa ='';
                  foreach ($kpapptk as $kpapptk) {

                    $rl_keu_kpa =  ($kpapptk->tot_realisasi/$kpapptk->tot_anggaran)*100;
                    $tg_keu_kpa = ($kpapptk->tg_keu/$kpapptk->tot_anggaran) * 100;
                    $dev_keu_kpa = $rl_keu_kpa - $tg_keu_kpa;
                    $dev_fisik_kpa = $kpapptk->rl_fisik - $kpapptk->tg_fisik;
                     $stat = '';
                        if($dev_keu_kpa < -25 or $dev_fisik_kpa < -25){
                            $stat ='red';
                        } else if($dev_keu_kpa < -15 or $dev_fisik_kpa < -15){
                                        $stat ='yellow';
                        }
                    $aa .= "<tr class='".$stat."' style='background-color: #f2f2f2'><td align='center'>".$i."</td><;
                      <td>".$kpapptk->kpa."</td>
                       <td align='center'>".$kpapptk->jml_keg."</td>
                      <td align='right'>".number_format($kpapptk->blj_pegawai)."</td>
                      <td align='right'>".number_format($kpapptk->blj_barang)."</td>
                      <td align='right'>".number_format($kpapptk->blj_modal)."</td>
                      <td align='right'>".number_format($kpapptk->tot_anggaran)."</td>
                      <td align='center'>".number_format($tg_keu_kpa,2)."</td>
                      <td align='center'>".number_format($kpapptk->tg_fisik,2)."</td>
                      <td align='right'>".number_format($kpapptk->rl_blj_pegawai)."</td>
                      <td align='right'>".number_format($kpapptk->rl_blj_barang)."</td>
                      <td align='right'>".number_format($kpapptk->rl_blj_modal)."</td>
                      <td align='right'>".number_format($kpapptk->tot_realisasi)."</td>
                      <td align='center'>".number_format($rl_keu_kpa,2)."</td>
                      <td align='center'>".number_format($kpapptk->rl_fisik,2)."</td>
                      <td align='center'>".number_format($dev_keu_kpa,3)."</td>
                      <td align='center'>".number_format($dev_fisik_kpa,3)."</td>
                    </tr>";

                    $j=1 ;
                    $rl_keu_pptk = 0;
                    $tg_keu_pptk = 0;
                    foreach ($kpapptk->subs as $pptk)  {
                    $rl_keu_pptk =  ($pptk->tot_realisasi/$pptk->tot_anggaran)*100;
                    $tg_keu_pptk = ($pptk->tg_keu/$pptk->tot_anggaran) * 100;
                    $dev_keu_pptk = $rl_keu_pptk - $tg_keu_pptk;
                    $dev_fisik_pptk = $pptk->rl_fisik - $pptk->tg_fisik; 
                    $stat = '';
                        if($dev_keu_pptk < -25 or $dev_fisik_pptk < -25){
                            $stat ='red';
                        } else if($dev_keu_pptk < -15 or $dev_fisik_pptk < -15){
                                        $stat ='yellow';
                        }
                    $aa .=   '<tr class="'.$stat.'">
                            <td align="center">'.$i.'.'.$j.'</td>
                           <td>'.$pptk->pptk.'</td>
                            <td align="center">'.$pptk->jml_keg.'</td>
                           <td align="right">'.number_format($pptk->blj_pegawai).'</td>
                            <td align="right">'.number_format($pptk->blj_barang).'</td>
                            <td align="right">'.number_format($pptk->blj_modal).'</td>
                            <td align="right">'.number_format($pptk->tot_anggaran).'</td>
                            <td align="center">'.number_format($tg_keu_pptk,2).'</td>
                            <td align="center">'.number_format($pptk->tg_fisik,2).'</td>
                            <td align="right">'.number_format($pptk->rl_blj_pegawai).'</td>
                            <td align="right">'.number_format($pptk->rl_blj_barang).'</td>
                            <td align="right">'.number_format($pptk->rl_blj_modal).'</td>
                            <td align="right">'.number_format($pptk->tot_realisasi).'</td>
                            <td align="center">'.number_format($rl_keu_pptk,2).'</td>
                            <td align="center">'.number_format($pptk->rl_fisik,2).'</td>
                            <td align="center">'.number_format($dev_keu_pptk,3).'</td>
                            <td align="center">'.number_format($dev_fisik_pptk,3).'</td>
                      </tr>';
                    $j++;
                    }
                    $i++;
                  }
        echo json_encode($aa);
    }

    public function realisasiskpd(){
        
        $user = $this->session->userdata('data_user');

                $bulan = $this->input->post('bulan');

                $data = array();
                $data['title'] = 'Dashboard <small> </small>';
                $data['pengguna'] = $user;
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
        $id_skpd = $user->id_skpd;

         $query = $this->db->query("SELECT mtr_program.id_program, mtr_program.nama_program, a.anggaran, a.realisasi, avg(a.rl_fisik) as rl_fisik from mtr_program
                left join (SELECT mtr_kegiatan.id_program, sum(blj_modal + blj_barang + blj_pegawai) as anggaran
                        ,sum(ifnull(rl_blj_modal,0) + ifnull(rl_blj_barang,0) +  ifnull(rl_blj_pegawai,0)) as realisasi , avg(ifnull(rl_fisik,0)) as rl_fisik from mtr_kegiatan
                        left JOIN (SELECT split_string(id, '-', 1) as id_kegiatan, ifnull(rl_fisik,0) as rl_fisik, rl_blj_pegawai as rl_blj_pegawai, rl_blj_modal as rl_blj_modal, max(rl_blj_barang)as rl_blj_barang from dt_realisasi where dt_realisasi.bulan = '$bulan'
                                    group by id_kegiatan) a ON (`a`.`id_kegiatan` = `mtr_kegiatan`.`id_kegiatan` ) 
                            where id_skpd = $id_skpd
                    group by mtr_kegiatan.id_program) a on (a.id_program = mtr_program.id_program) 
                where id_skpd = '$id_skpd'
                group by mtr_program.id_program");
         $data = $query->result();
         $return = '';
         $i =1;
          foreach ($data as $data) {
            $return .= '<p>'.$i.'. '.$data->nama_program.'</p>
                    
                      <div class="progress" style="margin-bottom:  0;">
                        <div class="progress-bar progress-bar-striped progress-bar-info" role="progressbar" aria-valuenow="70"
                          aria-valuemin="0" aria-valuemax="100" style="width:'.(($data->realisasi/$data->anggaran)*100).'%"></div>
                        <span class="sr-only">70% Complete</span>
                      </div>
                      <div class="progress" style="margin-bottom:  0;">
                        <div class="progress-bar  progress-bar-striped progress-bar-warning" role="progressbar" aria-valuenow="70"
                          aria-valuemin="0" aria-valuemax="100" style="width:'.$data->rl_fisik.'%"><span></span></div>
                        <span class="sr-only">70% Complete</span>
                      </div>
                      <br>
                  ';
            $i++;
          }


         echo json_encode($return);

    }


}