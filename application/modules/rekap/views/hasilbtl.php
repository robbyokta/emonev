<!DOCTYPE html>
<html>
<head>
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
    <title></title>
</head>
<body>

<h3 align ='center'>Laporan Realisasi Kegiatan <br/> <?php echo $jenis ;?> <br/>
 <?php echo $skpd->nama_skpd ;?> <br/> Sampai Bulan <?php echo $bulan;?> 2017</h3>

<br/><br/>

<table id="records" class="table" cellspacing="0" width="100%">

    <thead style="background-color:  bisque;">

        <tr style="background-color:  bisque;">

            <th rowspan="3" width="2%">No</th>

            <th rowspan="3" width="40%">Nama SKPD</th>

            <th rowspan="1" colspan ="5" width="30%">Anggaran</th>

            <th rowspan="1" colspan="5" width="40%">Realisasi</th>

            <th rowspan="2" colspan="2" width="8%">Deviasi</th>

        </tr>
        <tr>
            <th rowspan="1" colspan="2" >BTL</th>

            <th rowspan="2" width="5%">Total</th>

            <th rowspan="1" colspan="2" width="6%">Target</th>

            <th rowspan="1" colspan="2" >BTL</th>

            <th rowspan="2" width="5%">Total</th>

            <th rowspan="2" width="3%">Keu (%)</th>

            <th rowspan="2" width="3%">Fisik (%)</th>
        </tr>
       
        <tr>
            <th width="6%"> Gaji</th>
            <th width="6%"> Non Program</th>

            <th >Keu</th>
            <th>Fisik</th>

            <th width="6%"> Gaji</th>
            <th width="6%"> Non Program</th>

            <th>Keu</th>
            <th>Fisik</th>

        </tr>
        
        

     </thead>
        <tbody>
            <?php 
                $h = 0;
                $tot_rl_blj_pegawai = 0;$tot_rl_blj_barang = 0;$tot_rl_blj_modal =0;$tot_rl_gaji =0;$tot_rl_non_program =0;
                $tot_blj_pegawai = 0;$tot_blj_barang = 0;$tot_blj_modal =0;$tot_gaji =0;$tot_non_program =0;
                $tot_tg_fisik = 0;$tot_tg_keu = 0;$tot_keg=0;
                $tot_rl_fisik = 0;$tot_rl_keu = 0;
                $avg_tg_fisik = 0;$avg_tg_keu = 0;$avg_rl_fisik = 0;$avg_rl_keu = 0;
                foreach ($data as $kegiatan)
                    { $rl_pegawai = 0;$rl_barang = 0;$rl_modal = 0;$rl_gaji=0;$rl_non_program=0;
                        $prog_tg_fisik = 0;$prog_tg_keu=0;$i=0;$prog_rl_keu=0;$prog_rl_fisik=0;
                    
                    $h++;

                   
                    $anggaran_prog = $kegiatan->gaji+$kegiatan->non_program+$kegiatan->blj_pegawai+$kegiatan->blj_modal+$kegiatan->blj_barang;
                    $prog_tg_keu = ($kegiatan->tg_keu/$anggaran_prog)*100;
                    $tg_fisik = $kegiatan->tg_fisik/$kegiatan->jml_kegiatan;
                    $prog_rl_keu = (($kegiatan->rl_gaji+$kegiatan->rl_non_program+$kegiatan->rl_blj_modal+$rl_pegawai+$rl_barang)/$anggaran_prog)*100;
                    $rl_fisik = ($kegiatan->rl_fisik/$kegiatan->jml_kegiatan);
                             ?>
                <tr class="program">
                    <td> <?php echo $h; ?></td>
                    <td> <?php echo $kegiatan->nama_program; ?></td>
                    <td align='right'> <?php echo number_format($kegiatan->gaji); ?></td>
                    <td align='right'> <?php echo number_format($kegiatan->non_program); ?></td>
                    <td align='right'> <?php echo number_format($kegiatan->gaji+$kegiatan->non_program+$kegiatan->blj_pegawai+$kegiatan->blj_modal+$kegiatan->blj_barang); ?></td>

                    <td align="center"><?php echo number_format($prog_tg_keu,2); ?> </td>
                    <td align="center"><?php echo number_format($tg_fisik,2); ?> </td>
                    <td align='right'> <?php echo number_format($kegiatan->rl_gaji); ?>  </td>
                    <td align='right'> <?php echo number_format($kegiatan->rl_non_program); ?>  </td>
                    <td align='right'> <?php echo number_format($kegiatan->rl_gaji+$kegiatan->rl_non_program+$kegiatan->rl_blj_modal+$rl_pegawai+$rl_barang); ?>  </td>
                    <td align="center"><?php echo number_format($prog_rl_keu,2); ?> </td>
                    <td align="center"><?php echo number_format($rl_fisik,2); ?> </td>
                    <td align="center"> <?php echo number_format($prog_rl_keu-$prog_tg_keu,2); ?> </td>
                    <td align="center"> <?php echo number_format($rl_fisik-$tg_fisik,2); ?> </td>
                </tr>

                    
            <?php
                if(!empty($kegiatan->subs)) {
                    $blj_pegawai=0;$blj_barang=0;$blj_modal=0;$i=1;$gaji=0;$non_program=0;
                    foreach ($kegiatan->subs as $sub)  {
                         $anggaran = $sub->gaji+$sub->non_program+$sub->blj_modal+$sub->blj_barang+$sub->blj_pegawai;

                        if ($anggaran==0){
                            $rl_keu = 0;
                            $persen_tg_keu = 0;
                        } else {

                        $persen_tg_keu = ($sub->tg_keu/($sub->gaji+$sub->non_program+$sub->blj_modal+$sub->blj_barang+$sub->blj_pegawai)*100);
                        $rl_keu = (($sub->rl_gaji+$sub->rl_non_program+$sub->rl_blj_modal+$sub->rl_blj_barang+$sub->rl_blj_pegawai)/($anggaran))*100;
                        }
                        $dev_keu = $rl_keu - $persen_tg_keu;
                        $dev_fisik = $sub->rl_fisik - $sub->tg_fisik;
                        $stat = '';
                        if($dev_keu < -25 or $dev_fisik < -25){
                            $stat ='red';
                        } else if($dev_keu < -15 or $dev_fisik < -15){
                                        $stat ='yellow';
                        }

                        echo '<tr class="kegiatan '.$stat.'">';
                        echo '<td>' . $h.'.'.$i. '</td>';
                        echo '<td>' . $sub->nama_keg . '</td>';
                        echo '<td align="right"> ' . number_format($sub->gaji) . '</td>';
                        echo '<td align="right"> ' . number_format($sub->non_program) . '</td>';
                        echo '<td align="right"> ' . number_format($sub->gaji+$sub->non_program+$sub->blj_modal+$sub->blj_barang+$sub->blj_pegawai) . '</td>';
                        echo '<td align="center">'.number_format($persen_tg_keu,2).'</td>';
                        echo '<td align="center">'.number_format($sub->tg_fisik,2).' </td>';
                        echo '<td align="right"> ' . number_format($sub->rl_gaji) . '</td>';
                        echo '<td align="right"> ' . number_format($sub->rl_non_program) . '</td>';
                        echo '<td align="right"> ' . number_format($sub->rl_gaji+$sub->rl_non_program+$sub->rl_blj_modal+$sub->rl_blj_barang+$sub->rl_blj_pegawai) . '</td>';
                        echo '<td align="center">'. number_format($rl_keu,2) . ' </td>';
                        echo '<td align="center">' . number_format($sub->rl_fisik,2) . ' </td>';
                       
                        echo '<td align="center">'.number_format($dev_keu,2).'</td>';
                        echo '<td align="center">'.number_format($dev_fisik, 2).'</td>';
                        echo '</tr>';
                        $gaji = $gaji + $sub->gaji;
                        $non_program = $non_program + $sub->non_program;
                        $blj_pegawai = $blj_pegawai + $sub->blj_pegawai;
                        $blj_barang = $blj_barang + $sub->blj_barang;
                        $blj_modal = $blj_modal + $sub->blj_modal;
                        $i++;

                    }
                    $tot_gaji = $tot_gaji + $gaji;
                    $tot_non_program = $tot_non_program + $non_program;
                    $tot_blj_pegawai = $tot_blj_pegawai + $blj_pegawai;
                    $tot_blj_barang = $tot_blj_barang + $blj_barang;
                    $tot_blj_modal = $tot_blj_modal + $blj_modal;
                }
           

                $tot_tg_keu= $tot_tg_keu + $kegiatan->tg_keu;

                $tot_tg_fisik = $tot_tg_fisik + $kegiatan->tg_fisik;
                $tot_keg = $tot_keg + $kegiatan->jml_kegiatan;
                
                $avg_tg_keu = $tot_tg_keu/$h;
                $persen_tg_keu = (($tot_tg_keu/($tot_gaji+$tot_non_program+$tot_blj_modal+$tot_blj_barang+$tot_blj_pegawai))*100)/$h;
                $avg_tg_fisik = $tot_tg_fisik/$tot_keg;

                $tot_rl_gaji = $tot_rl_gaji + $kegiatan->rl_gaji;
                $tot_rl_non_program = $tot_rl_non_program + $kegiatan->rl_non_program;
                $tot_rl_blj_pegawai = $tot_rl_blj_pegawai + $kegiatan->rl_blj_pegawai;
                $tot_rl_blj_modal = $tot_rl_blj_modal + $kegiatan->rl_blj_modal;
                $tot_rl_blj_barang = $tot_rl_blj_barang + $kegiatan->rl_blj_barang; 

                $tot_rl_fisik = $tot_rl_fisik + $kegiatan->rl_fisik;
                $avg_rl_keu = (($tot_rl_gaji+$tot_rl_non_program+$tot_rl_blj_modal+$tot_rl_blj_barang+$tot_rl_blj_pegawai)/($tot_gaji+$tot_non_program+$tot_blj_modal+$tot_blj_barang+$tot_blj_pegawai))*100;
                $avg_rl_fisik = $tot_rl_fisik/$tot_keg;
                    
       


            }
            ?>
            <tr style="background-color:  bisque;">
            <td align="center" colspan="2"><Strong>TOTAL</Strong></td>
            <td align='right'><?php echo number_format($tot_gaji);?></td>
            <td align='right'><?php echo number_format($tot_non_program);?></td>
            <td align='right'><?php echo number_format($tot_gaji+$tot_non_program+$tot_blj_modal+$tot_blj_barang+$tot_blj_pegawai);?></td>
            <td align="center" ><?php echo number_format($persen_tg_keu,2);?></td>
            <td align="center" ><?php echo number_format($avg_tg_fisik,2);?></td>
            <td align='right'><?php echo number_format($tot_rl_gaji);?></td>
            <td align='right'><?php echo number_format($tot_rl_non_program);?></td>
            <td align='right'><?php echo number_format($tot_rl_gaji+$tot_rl_non_program+$tot_rl_blj_modal+$tot_rl_blj_barang+$tot_rl_blj_pegawai);?></td>
            <td align='center'><?php echo number_format($avg_rl_keu,2);?></td>
            <td align='center'><?php echo number_format($avg_rl_fisik,2);?></td>
            <td align='center'><?php echo number_format($avg_rl_keu-$persen_tg_keu,2);?></td>
            <td align='center'><?php echo number_format($avg_rl_fisik-$avg_tg_fisik,2);?></td>
            </tr>


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