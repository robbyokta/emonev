<html>
<body>
<style type="text/css">

    @page { margin: 20px; }
    body { margin: 20px; }
    


    .table thead > tr > th,

    .table tbody > tr > th,

    .table tfoot > tr > th,

    .table thead > tr > td,

    .table tbody > tr > td,

    .table tfoot > tr > td {

        padding: 0 3px 0 3px;



    }

    #records {
        border-collapse: collapse;

    }


    #records th {
        height: 30px;

         font-size: 10pt;

        vertical-align: middle;

        text-align: center;

        border: 0.1px solid #000;

    }

    #records td {
         height: 30px;

    }




    .belanja {

        display: none;

    }

    .program {

        background-color: #e2ded6;

    }

    .red {
       background-color: #ff5555; 
    }

    .yellow {
       background-color: #ffff55; 
    }

    #records tbody td {



        border: 0.1px solid #000;

        font-size: 8pt;

    }



    .table-responsive {

        width: 100%;

        margin-bottom: 15px;



        -webkit-overflow-scrolling: touch;

        -ms-overflow-style: -ms-autohiding-scrollbar;



    }

    #ttd td{
        height: 20px;
    }

</style>
<h3 align ='center'>Laporan Realisasi Kegiatan <br/> <?php echo $jenis ;?> <br/>
 <?php echo $skpd->nama_skpd ;?> <br/> Sampai Bulan <?php echo $bulan;?> 2017</h3>

<br/><br/>

<table id="records" class="table" cellspacing="0" width="100%">

        <thead>

        <tr>

            <th rowspan="2" width = "2%">No</th>

            <th rowspan="2" width = "38%">Nama Pengadaan</th>

            <th rowspan="2" width = '10%'>Anggaran</th>

            <th rowspan="2" width = '10%'>Tanggal Pengadaan</th>

            <th rowspan="2" width = '10%'>No Kontrak</th>

            <th rowspan="1" colspan="2" width = '10%'>Target</th>

            <th rowspan="1" colspan="2" width = '10%'>Realisasi</th>

            <th rowspan="1" colspan="2" width = '10%'>Deviasi</th>

            


        </tr>

        <tr>



            <th >Keu (Rp)</th>

            <th >Fisik (%)</th>

            <th >Keu (Rp)</th>

            <th >Fisik (%)</th>

            <th >Keu (Rp)</th>

            <th >Fisik (%)</th>

        </tr>

        
        </thead>
        <tbody>
            <?php 

               $i = 1;$tot_anggaran=0;
               $tot_tg_fisik = 0;$tot_rl_fisik = 0;$tot_tg_keu = 0;$tot_rl_keu = 0;
               $avg_tg_fisik = 0;$avg_rl_fisik = 0;$avg_tg_keu = 0;$avg_rl_keu = 0;
                foreach ($data as $data){

                    $tot_anggaran = $tot_anggaran + $data->anggaran;
                    $tot_tg_fisik = $tot_tg_fisik + $data->tg_fisik;
                    $avg_tg_fisik = $tot_tg_fisik/$i;
                    if ($data->anggaran == 0 ){
                        $tg_keu = 0;
                        $rl_keu = 0;
                    } else {
                    $tg_keu = $data->tg_keu/$data->anggaran;
                    $rl_keu = $data->keuangan/$data->anggaran;
                     }
                    $tot_tg_keu = $tot_tg_keu + $tg_keu;
                    $avg_tg_keu = $tot_tg_keu/$i;
                    $tot_rl_keu = $tot_rl_keu + $rl_keu;
                    $avg_rl_keu = $tot_rl_keu/$i;
                    $tot_rl_fisik = $tot_rl_fisik + $data->pelaksanaan;
                    $avg_rl_fisik = $tot_rl_fisik/$i;
                   
                    echo '<tr><td align="center">'.$i.'</td>
                              <td>'.$data->nama_pengadaan.'</td>
                              <td align="right"> Rp. '.number_format($data->anggaran,2).'</td>
                              <td align="center">';
                         echo     ($data->tgl_kontrak == "")?"Belum di mulai":tgl_indo($data->tgl_kontrak);
                         echo '</td>
                              <td align="center">';
                         echo ($data->no_kontrak == "")?"---":$data->no_kontrak;;
                         echo '</td>
                              <td align="center">'.number_format($tg_keu,2).'</td>
                              <td align="center">'.number_format($data->tg_fisik,2).'</td>
                              <td align="center">'.number_format($rl_keu,2).'</td>
                              <td align="center">'.number_format($data->pelaksanaan,2).'</td>
                              <td align="center">'.number_format($rl_keu-$tg_keu,2).'</td>
                              <td align="center">'.number_format($data->pelaksanaan-$data->pelaksanaan,2).'</td>
                              ';

                    echo '</tr>';
               $i++;
            }
            ?>
            <tr style="
    background-color:  bisque;
">
                <td align="center" colspan="2">TOTAL</td>
                <td align="right"> Rp. <?php echo number_format($tot_anggaran,2)?></td>
                <td colspan="2"></td>
                <td align="center"><?php echo number_format($avg_tg_keu,2)?></td>
                <td align="center"><?php echo number_format($avg_tg_fisik,2)?></td>
                <td align="center"><?php echo number_format($avg_rl_keu,2)?></td>
                <td align="center"><?php echo number_format($avg_rl_fisik,2)?></td>
                <td align="center"><?php echo number_format($avg_rl_keu-$avg_tg_keu,2)?></td>
                <td align="center"><?php echo number_format($avg_rl_fisik-$avg_tg_fisik,2)?></td>
            </tr>
        </tbody>
        </tbody>
</table>

<br>
<table id="ttd" class="table" cellspacing="0" width="100%">
    <tr>
    <td width="30%"><td> </td><td width="40%" align="center"></td>
    </tr>

    <tr>
    <td> </td><td></td><td align="center"> Batusangkar, <?php echo tgl_indo(date("Y-m-d"))  ?></td>
    </tr>
    <tr><td align="center"></td><td/><td align="center">Mengetahui</td></tr>
    <tr><td ></td><td></td><td align="center"><?php echo $skpd->jbt_pimpinan;?></td></tr>
    <tr><td/><td/><td/></tr>
    <tr><td/><td/><td/></tr>
    <tr><td/><td/><td/></tr>
    <tr><td align="center"></td><td/><td align="center"><u><?php echo $skpd->nama_pimpinan;?></u></td></tr>
    <tr><td align="center"></td><td/><td align="center"><?php echo $skpd->nip_kpl;?></td></tr>

</table>


</body>
</html>