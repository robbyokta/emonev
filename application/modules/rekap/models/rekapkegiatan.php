


<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

    class RekapKegiatan extends CI_Model {

        public function __construct() {

            parent::__construct();

        }

        public function Program($skpd, $jenis, $bulan) {
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
          if($jenis=='1'){
                $query = $this->db->query("select mtr_kegiatan.id_program, count(b.id_kegiatan) as jml_kegiatan, c.nama_program, 
        if(jenis_blj = 1 ,if(is_gaji = 0, sum(blj_pegawai), 0), 0) as gaji, 
        if(jenis_blj = 1 ,if(is_gaji = 1, sum(blj_pegawai), 0), 0) as non_program, 
        if(jenis_blj = 2 ,if(is_gaji = 0, sum(blj_pegawai), 0), 0) as blj_pegawai,
        sum(blj_barang) as blj_barang, sum(blj_modal) as blj_modal,
        if(is_gaji = 1, sum(blj_pegawai), 0) as nonprogram, 
        sum(ifnull(a.rl_fisik,0)) as rl_fisik, 
      if(jenis_blj = 1 ,if(is_gaji = 0,sum(ifnull(a.rl_blj_pegawai,0)),0),0) as rl_gaji,
      if(jenis_blj = 1 ,if(is_gaji = 1,sum(ifnull(a.rl_blj_pegawai,0)),0),0) as rl_non_program, 
        if(jenis_blj = 2 ,if(is_gaji = 0,sum(ifnull(a.rl_blj_pegawai,0)),0),0) as rl_blj_pegawai,
        sum(ifnull(a.rl_blj_barang,0)) as rl_blj_barang,
      sum(ifnull(a.rl_blj_modal,0)) as rl_blj_modal,
        sum(b.tg_keu) as tg_keu, sum(b.tg_fisik) as tg_fisik from mtr_kegiatan
            left join (select id_program, nama_program from mtr_program) c on (mtr_kegiatan.id_program = c.id_program)
            left JOIN (select id_kegiatan, rl_fisik, rl_blj_pegawai, rl_blj_modal, rl_blj_barang from dt_realisasi where dt_realisasi.bulan = '$bulan') a ON (`a`.`id_kegiatan` = `mtr_kegiatan`.`id_kegiatan` )
         left JOIN (select id_kegiatan, id_skpd, tg_fisik as tg_fisik, tg_keu as tg_keu from dt_tgt_kegiatan
                          where bulan = $bulanint
         group by id_kegiatan  ) b ON (`b`.`id_kegiatan` = `mtr_kegiatan`.`id_kegiatan`) 
where mtr_kegiatan.id_skpd = $skpd
group by mtr_kegiatan.id_program");
                foreach ($query->result() as $program)
                {
                    $return[$program->id_program] = $program;
                    $return[$program->id_program]->subs = $this->kegiatan($program->id_program, $bulan); // Get the categories sub categories
                }

            return $return;
          } else  if($jenis=='2'){
            $query = $this->db->query("select mtr_kegiatan.id_program, count(b.id_kegiatan) as jml_kegiatan, c.nama_program, 
        if(jenis_blj = 1 ,if(is_gaji = 0, sum(blj_pegawai), 0), 0) as gaji, 
        if(jenis_blj = 1 ,if(is_gaji = 1, sum(blj_pegawai), 0), 0) as non_program, 
        if(jenis_blj = 2 ,if(is_gaji = 0, sum(blj_pegawai), 0), 0) as blj_pegawai,
        sum(blj_barang) as blj_barang, sum(blj_modal) as blj_modal,
        if(is_gaji = 1, sum(blj_pegawai), 0) as nonprogram, 
        sum(ifnull(a.rl_fisik,0)) as rl_fisik, 
      if(jenis_blj = 1 ,if(is_gaji = 0,sum(ifnull(a.rl_blj_pegawai,0)),0),0) as rl_gaji,
      if(jenis_blj = 1 ,if(is_gaji = 1,sum(ifnull(a.rl_blj_pegawai,0)),0),0) as rl_non_program, 
        if(jenis_blj = 2 ,if(is_gaji = 0,sum(ifnull(a.rl_blj_pegawai,0)),0),0) as rl_blj_pegawai,
        sum(ifnull(a.rl_blj_barang,0)) as rl_blj_barang,
      sum(ifnull(a.rl_blj_modal,0)) as rl_blj_modal,
        sum(b.tg_keu) as tg_keu, sum(b.tg_fisik) as tg_fisik from mtr_kegiatan
            left join (select id_program, nama_program from mtr_program) c on (mtr_kegiatan.id_program = c.id_program)
            left JOIN (select id_kegiatan, rl_fisik, rl_blj_pegawai, rl_blj_modal, rl_blj_barang from dt_realisasi where dt_realisasi.bulan = '$bulan') a ON (`a`.`id_kegiatan` = `mtr_kegiatan`.`id_kegiatan` )
         left JOIN (select id_kegiatan, id_skpd, tg_fisik as tg_fisik, tg_keu as tg_keu from dt_tgt_kegiatan
                          where bulan = $bulanint
         group by id_kegiatan  ) b ON (`b`.`id_kegiatan` = `mtr_kegiatan`.`id_kegiatan`) 
where mtr_kegiatan.id_skpd = $skpd and mtr_kegiatan.jenis_blj=1
group by mtr_kegiatan.id_program");
                foreach ($query->result() as $program)
                {
                    $return[$program->id_program] = $program;
                    $return[$program->id_program]->subs = $this->kegiatan($program->id_program, $bulan); // Get the categories sub categories
                }

            return $return;
          } else  if($jenis=='3'){
               $query = $this->db->query("select mtr_kegiatan.id_program, count(b.id_kegiatan) as jml_kegiatan, c.nama_program, 
        if(jenis_blj = 1 ,if(is_gaji = 0, sum(blj_pegawai), 0), 0) as gaji, 
        if(jenis_blj = 1 ,if(is_gaji = 1, sum(blj_pegawai), 0), 0) as non_program, 
        if(jenis_blj = 2 ,if(is_gaji = 0, sum(blj_pegawai), 0), 0) as blj_pegawai,
        sum(blj_barang) as blj_barang, sum(blj_modal) as blj_modal,
        if(is_gaji = 1, sum(blj_pegawai), 0) as nonprogram, 
        sum(ifnull(a.rl_fisik,0)) as rl_fisik, 
      if(jenis_blj = 1 ,if(is_gaji = 0,sum(ifnull(a.rl_blj_pegawai,0)),0),0) as rl_gaji,
      if(jenis_blj = 1 ,if(is_gaji = 1,sum(ifnull(a.rl_blj_pegawai,0)),0),0) as rl_non_program, 
        if(jenis_blj = 2 ,if(is_gaji = 0,sum(ifnull(a.rl_blj_pegawai,0)),0),0) as rl_blj_pegawai,
        sum(ifnull(a.rl_blj_barang,0)) as rl_blj_barang,
      sum(ifnull(a.rl_blj_modal,0)) as rl_blj_modal,
        sum(b.tg_keu) as tg_keu, sum(b.tg_fisik) as tg_fisik from mtr_kegiatan
            left join (select id_program, nama_program from mtr_program) c on (mtr_kegiatan.id_program = c.id_program)
            left JOIN (select id_kegiatan, rl_fisik, rl_blj_pegawai, rl_blj_modal, rl_blj_barang from dt_realisasi where dt_realisasi.bulan = '$bulan') a ON (`a`.`id_kegiatan` = `mtr_kegiatan`.`id_kegiatan` )
         left JOIN (select id_kegiatan, id_skpd, tg_fisik as tg_fisik, tg_keu as tg_keu from dt_tgt_kegiatan
                          where bulan = $bulanint
         group by id_kegiatan  ) b ON (`b`.`id_kegiatan` = `mtr_kegiatan`.`id_kegiatan`) 
where mtr_kegiatan.id_skpd = $skpd and mtr_kegiatan.jenis_blj=2 
group by mtr_kegiatan.id_program");
                foreach ($query->result() as $program)
                {
                    $return[$program->id_program] = $program;
                    $return[$program->id_program]->subs = $this->kegiatan($program->id_program, $bulan); // Get the categories sub categories
                }

            return $return;
          } 


          }

          public function Kegiatan($id_program, $bulan) {

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
               
                $query = $this->db->query("SELECT count(b.id_kegiatan) as jml_kegiatan, nama_keg,
        if(jenis_blj = 1 ,if(is_gaji = 0, sum(blj_pegawai), 0), 0) as gaji, 
        if(jenis_blj = 1 ,if(is_gaji = 1, sum(blj_pegawai), 0), 0) as non_program, 
        if(jenis_blj = 2 ,if(is_gaji = 0, sum(blj_pegawai), 0), 0) as blj_pegawai,
        sum(blj_barang) as blj_barang, sum(blj_modal) as blj_modal,
        if(is_gaji = 1, sum(blj_pegawai), 0) as nonprogram, 
        sum(ifnull(a.rl_fisik,0)) as rl_fisik, 
      if(jenis_blj = 1 ,if(is_gaji = 0,sum(ifnull(a.rl_blj_pegawai,0)),0),0) as rl_gaji,
      if(jenis_blj = 1 ,if(is_gaji = 1,sum(ifnull(a.rl_blj_pegawai,0)),0),0) as rl_non_program, 
        if(jenis_blj = 2 ,if(is_gaji = 0,sum(ifnull(a.rl_blj_pegawai,0)),0),0) as rl_blj_pegawai,
        sum(ifnull(a.rl_blj_barang,0)) as rl_blj_barang,
      sum(ifnull(a.rl_blj_modal,0)) as rl_blj_modal,
        sum(b.tg_keu) as tg_keu, sum(b.tg_fisik) as tg_fisik from mtr_kegiatan
            left join (select id_program, nama_program from mtr_program) c on (mtr_kegiatan.id_program = c.id_program)
            left JOIN (select id_kegiatan, rl_fisik, rl_blj_pegawai, rl_blj_modal, rl_blj_barang from dt_realisasi where dt_realisasi.bulan = '$bulan') a ON (`a`.`id_kegiatan` = `mtr_kegiatan`.`id_kegiatan` )
         left JOIN (select id_kegiatan, id_skpd, tg_fisik as tg_fisik, tg_keu as tg_keu from dt_tgt_kegiatan
                          where bulan = $bulanint
         group by id_kegiatan  ) b ON (`b`.`id_kegiatan` = `mtr_kegiatan`.`id_kegiatan`) 
where mtr_kegiatan.id_program = $id_program
group by mtr_kegiatan.id_kegiatan
 ");
               return $query->result();
          }

        public function pengadaan($skpd, $bulan) {
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
            $query = $this->db->query("SELECT mtr_pengadaan.id_pengadaan, mtr_pengadaan.anggaran, mtr_pengadaan.nama_pengadaan, mtr_pengadaan.id_skpd
         ,a.*, b.* FROM (`mtr_pengadaan`) 
              left JOIN (select * from dt_realisasi_pengadaan where dt_realisasi_pengadaan.bulan = '$bulan') 
                  a ON (`a`.`id_pengadaan` = `mtr_pengadaan`.`id_pengadaan` )
              left JOIN (select id_pengadaan, ifnull(tg_keu,0) as tg_keu, ifnull(tg_fisik,0) as tg_fisik from dt_tgt_pengadaan
                    where bulan= '$bulanint' ) b ON (`b`.`id_pengadaan` = `mtr_pengadaan`.`id_pengadaan`)
                    where mtr_pengadaan.id_skpd = '$skpd'");


               return $query->result();


          }

           public function belanjamodal($skpd, $bulan) {
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
            $query = $this->db->query("SELECT  mtr_belanja_modal.anggaran, mtr_belanja_modal.nama_pengadaan, mtr_belanja_modal.id_skpd
         ,a.*, b.* FROM (`mtr_belanja_modal`) 
              left JOIN (select * from dt_realisasi_bjm where dt_realisasi_bjm.bulan = '$bulan') 
                  a ON (`a`.`id_bjm` = `mtr_belanja_modal`.`id_bjm` )
              left JOIN (select id_bjm, ifnull(tg_keu,0) as tg_keu, ifnull(tg_fisik,0) as tg_fisik 
                          from dt_tgt_bljmodal
                    where bulan= '$bulanint' ) b ON (`b`.`id_bjm` = `mtr_belanja_modal`.`id_bjm`)
                    where mtr_belanja_modal.id_skpd = '$skpd'");


               return $query->result();
          }
    }  


   
?>