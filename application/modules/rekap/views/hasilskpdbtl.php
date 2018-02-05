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
<h3 align ='center'>Laporan Realisasi Kegiatan <br/> <?php echo $jenis ;?> <br/> Sampai Bulan <?php echo $bulan;?> 2017</h3>

<br/>

<table id="records" class="table" cellspacing="0" width="100%">

        <thead style="background-color:  bisque;">

        <tr style="background-color:  bisque;">

            <th rowspan="3" width="2%">No</th>

            <th rowspan="3" width="20%">Nama SKPD</th>

            <th rowspan="3" width="3%">Bobot (%)</th>

            <th rowspan="1" colspan ="5" width="30%">Anggaran</th>

            <th rowspan="1" colspan="5" width="40%">Realisasi</th>

            <th rowspan="2" colspan="2" width="8%">Deviasi</th>

            <th rowspan="3" width="5%">KT</th>

        </tr>
        <tr>
            <th rowspan="1" colspan="2" >BTL</th>

            <th rowspan="3" width="5%">Total</th>

            <th rowspan="1" colspan="2" width="6%">Target</th>

            <th rowspan="1" colspan="2" >BTL</th>

            <th rowspan="2" width="5%">Total</th>

            <th rowspan="2" width="3%">Keu (%)</th>

            <th rowspan="2" width="3%">Fisik (%)</th>
        </tr>
       
        <tr>
            <th width="6%"> Gaji</th>
            <th width="6%"> Non Program</th>

            <th width="3%">Keu</th>
            <th width="3%">Fisik</th>

            <th width="6%"> Gaji</th>
            <th width="6%"> Non Program</th>

            <th width="3%">Keu</th>
            <th width="3%">Fisik</th>

        </tr>
        
        

        </thead>
        <tbody>
        <?php $i= 1;
        $tot_bot = 0;$avg_tg_keu= 0;$tot_tg_keu= 0;$avg_tg_fisik= 0;$tot_tg_fisik= 0;
        $avg_rl_keu= 0;$tot_rl_keu= 0;$avg_rl_fisik= 0;$tot_rl_fisik= 0;
        $avg_dev_keu= 0;$tot_dev_keu= 0;$avg_dev_fisik= 0;$tot_dev_fisik= 0;
        $tot_blj_pegawai=0;$tot_blj_barang=0;$tot_blj_modal=0;$tot_non_program=0;$tot_gaji=0;
        $tot_rl_blj_pegawai=0;$tot_rl_blj_modal=0;$tot_rl_blj_barang=0;$tot_rl_non_program=0;$tot_rl_gaji=0;
        $tot_realisasi=0;$tot_komulatif=0;
        foreach ($rekap as $rekap) {
            $stat='';
            $bobot = ($rekap->tot_anggaran/$total->total)*100;
            $dev_keu = $rekap->rl_keu-$rekap->tg_keu;
            $dev_fisik = $rekap->rl_fisik-$rekap->tg_fisik;
            $komulatif = ($bobot*$rekap->rl_fisik)/100;
            if($dev_keu < -25 or $dev_fisik < -25){
                            $stat ='red';
            } else if($dev_keu < -15 or $dev_fisik < -15){
                            $stat ='yellow';
            }
            ?>
        <tr class="<?php echo $stat; ?>">
            <td align='center'><?php echo $i;?></td>
            <td ><?php echo $rekap->nama_skpd;?></td>
            <td align='center'><?php echo number_format($bobot,2);?> </td>
            <td align='right'> <?php echo number_format($rekap->gaji)?></td>
            <td align='right'> <?php echo number_format($rekap->non_program)?></td>
            <td align='right'> <?php echo number_format($rekap->tot_anggaran)?></td>
            <td align='center'><?php echo number_format($rekap->tg_keu,2);?> </td>
            <td align='center'><?php echo number_format($rekap->tg_fisik,2);?> </td>
            <td align='right'> <?php echo number_format($rekap->rl_gaji)?></td>
            <td align='right'> <?php echo number_format($rekap->rl_non_program)?></td>
            <td align='right'> <?php echo number_format($rekap->tot_realisasi)?></td>
            <td align='center'><?php echo number_format($rekap->rl_keu,2);?> </td>
            <td align='center'><?php echo number_format($rekap->rl_fisik,2);?> </td>
            <td align='center'><?php echo number_format($dev_keu,2);?> </td>
            <td align='center'><?php echo number_format($dev_fisik,2);?> </td>
            <td align='center'><?php echo number_format($komulatif,3);?> </td>
        </tr>
        <?php 
            $tot_bot= $tot_bot + $bobot;
            $tot_realisasi = $tot_realisasi + $rekap->tot_realisasi;
            $tot_tg_keu = $tot_tg_keu + $rekap->tg_keu;
            $avg_tg_keu = $tot_tg_keu/$i;
            $tot_tg_fisik = $tot_tg_fisik + $rekap->tg_fisik;
            $avg_tg_fisik = $tot_tg_fisik/$i;
            $tot_blj_pegawai= $tot_blj_pegawai + $rekap->blj_pegawai;
            $tot_blj_barang= $tot_blj_barang + $rekap->blj_barang;
            $tot_blj_modal= $tot_blj_modal + $rekap->blj_modal;
            $tot_gaji= $tot_gaji + $rekap->gaji;
            $tot_non_program= $tot_non_program + $rekap->non_program;
            $tot_rl_blj_pegawai= $tot_rl_blj_pegawai + $rekap->rl_blj_pegawai;
            $tot_rl_blj_barang= $tot_rl_blj_barang + $rekap->rl_blj_barang;
            $tot_rl_blj_modal= $tot_rl_blj_modal + $rekap->rl_blj_modal;            
            $tot_rl_gaji= $tot_rl_gaji + $rekap->rl_gaji;
            $tot_rl_non_program= $tot_rl_non_program + $rekap->rl_non_program;
            $tot_rl_keu = $tot_rl_keu + $rekap->rl_keu;
            $avg_rl_keu = $tot_rl_keu/$i;
            $tot_rl_fisik = $tot_rl_fisik + $rekap->rl_fisik;
            $avg_rl_fisik = $tot_rl_fisik/$i;
            $tot_dev_keu = $tot_dev_keu + $dev_keu;
            $avg_dev_keu = $tot_dev_keu/$i;
            $tot_dev_fisik = $tot_dev_fisik + $dev_fisik;
            $avg_dev_fisik = $tot_dev_fisik/$i;
            $tot_komulatif = $tot_komulatif +$komulatif;
            $i++; 
        } ?>

        <tr style="background-color:  bisque;">
            
            <td colspan="2" align="center">TOTAL</td>
            <td align='center'><?php echo number_format($tot_bot);?></td>
            <td align='right'><?php echo ''.number_format($tot_gaji);?></td>
            <td align='right'><?php echo ''.number_format($tot_non_program);?></td>
            <td align='right'><?php echo ''.number_format($total->total);?></td>
            <td align='center'><?php echo number_format($avg_tg_keu,2);?></td>
            <td align='center'><?php echo number_format($avg_tg_fisik,2);?></td>
            <td align='right'><?php echo ''.number_format($tot_rl_gaji);?></td>
            <td align='right'><?php echo ''.number_format($tot_rl_non_program);?></td>
            <td align='right'><?php echo ''.number_format($tot_realisasi);?></td>
            <td align='center'><?php echo number_format($avg_rl_keu,2);?></td>
            <td align='center'><?php echo number_format($avg_rl_fisik,2);?></td>
            <td align='center'><?php echo number_format($avg_dev_keu,2);?></td>
            <td align='center'><?php echo number_format($avg_dev_fisik,2);?></td>
            <td align='center'><?php echo number_format($tot_komulatif,3);?></td>

        </tr>
        </tbody>
</table>



