<?php $this->load->view('template\head.php'); ?>
<?php $this->load->view('template\datatablescriptcss.php'); ?> 
<?php $this->load->view('template\sidebar.php'); ?> 
<?php $this->load->view('template\header.php'); ?>  
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> <?php echo $title; ?> </h3>
              </div>

              <div class="title_right">
                </div>
              </div>
            </div>

             <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12"> 
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail Pengadaan <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> 
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <h2 align="center"><strong>Detail Pengadaan <br/> <?php echo $data->nama_pengadaan; ?></strong></h2>
                    <br/>
                    <button align="right"  class=" col-md-1 col-sm-offset-10 btn btn-primary" onclick="editdetail()"> Edit Detail</button> 
                    <div class= "col-md-10 col-sm-offset-1" align="center" style="border: 2px solid;">
                      <table width ="80%"  class="table table-striped ">
                        <thead>
                          <tr>
                            <th colspan="3" style="text-align: center;"><strong> Keterangan Kegiatan </strong> </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width = "30%"> Kode Kegiatan</td><td width="3%">:</td>
                            <td><?php echo $data->kode; ?></td>
                          </tr>
                          <tr>
                            <td width = "30%"> Nama Kegiatan</td><td width="3%">:</td>
                            <td><?php echo $data->nama_pengadaan; ?></td>
                          </tr>
                          <tr>
                            <td width = "30%"> SKPD Pelaksana</td><td width="3%">:</td>
                            <td><?php echo $data->nama_skpd; ?></td>
                          </tr>
                        </tbody>
                      </table>
                      <table  width ="80%"  class="table table-striped">
                        <thead>
                          <tr>
                            <th colspan="3" style="text-align: center;"><strong> Anggaran Pengadaan </strong> </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width = "30%"> Total Anggaran </td><td width="3%">:</td>
                            <td><?php echo 'Rp.'.number_format($data->anggaran,2); ?></td>
                          </tr>
                        </tbody>
                      </table>
                      <table  width ="80%"  class="table table-striped">
                        <thead>
                          <tr>
                            <th colspan="3" style="text-align: center;"><strong> Pelaksana Pengadaan </strong> </th>
                          </tr>
                          
                        </thead>
                        <tbody>
                          <tr>
                            <td width = "30%"> Jenis Pengadaan </td><td width="3%">:</td>
                            <td id="dt_jn_pengadaan" name="dt_kpa"><?php echo $data->jenis_pengadaan; ?></td>
                          </tr>
                          <tr>
                            <td width = "30%"> Metode Pemilihan Penyedia </td><td width="3%">:</td>
                            <td id="dt_mpp" name="dt_mpp" ><?php echo $data->metoda_pemilihan_penyedia; ?></td>
                          </tr>
                          <tr>
                            <td width = "30%"> volume </td><td width="3%">:</td>
                            <td id="dt_vol" name="dt_vol"><?php echo $data->volume; ?></td>
                          </tr>
                        </tbody>
                      </table>
                      <table  width ="80%"  class="table table-striped">
                        <thead>
                          <tr>
                            <th colspan="3" style="text-align: center;"><strong> Waktu Penyedia </strong> </th>
                          </tr>
                          
                        </thead>
                        <tbody>
                          <tr>
                            <td width = "30%"> Pemilihan Penyedia Awal </td><td width="3%">:</td>
                            <td id="dt_1" name="dt_1"><?php echo tgl_indo($data->pemilihan_penyedia_awal); ?></td>
                          </tr>
                          <tr>
                            <td width = "30%"> Pemilihan Penyedia Akhir </td><td width="3%">:</td>
                            <td id="dt_2" name="dt_2" ><?php echo tgl_indo($data->pemilihan_penyedia_akhir); ?></td>
                          </tr>
                          <tr>
                            <td width = "30%"> Pelaksana Pekerjaan Awal </td><td width="3%">:</td>
                            <td id="dt_3" name="dt_3"><?php echo tgl_indo($data->pelaksana_pekerjaan_awal); ?></td>
                          </tr>
                          <tr>
                            <td width = "30%"> Pelaksana Pekerjaan Awal </td><td width="3%">:</td>
                            <td id="dt_4" name="dt_4"><?php echo tgl_indo($data->pelaksana_pekerjaan_akhir); ?></td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>

             <div class="row">
              <div class="col-md-12"> 
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Target Kegiatan <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> 
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <h2 align="center"><strong>Target Kegiatan <br/> <?php echo $data->nama_pengadaan; ?></strong></h2>
                    <br/>
                    <button align="right"  class=" col-md-1 col-sm-offset-10 btn btn-primary" onclick="edittarget()"> Edit Target</button> 
                    <div class= "col-md-10 col-sm-offset-1" align="center" style="border: 2px solid;">
                      <table  width ="80%"  class="table table-striped">
                        <thead>
                          <tr>
                            <th colspan="3" style="text-align: center;"><strong> Target Kegiatan </strong> </th>
                          </tr>
                          <tr>
                                <th width ="33%" style="text-align: center;"> Bulan </th>
                                <th width ="33%" style="text-align: center;"> Realisasi Fisik </th>
                                <th width ="33%" style="text-align: center;"> Realisasi Keuangan </th>
                              </tr>
                          
                        </thead>
                        <tbody>
                          
                          <?php foreach ($target as $target1) {?>
                          <tr>
                            <td align="center" width = "33%"> <?php echo ($target1->bulan)?></td>
                            <td align="center" id = "dtf<?php echo ($target1->bulan)?>"><?php echo number_format($target1->tg_fisik,2).' %'; ?></td>
                            <td align="center" id = "dtk<?php echo ($target1->bulan)?>"><?php echo 'Rp.'.number_format($target1->tg_keu,2); ?></td>
                          </tr>
                          <?php }?>
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>

        </div>
        </div>
        </div>
           
         <div name="modaledit" id="modaledit" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" onclick="closemodal()" ><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Edit Detail pengadaan</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                            <input type="hidden" id="id_pengadaan" name="id_pengadaan" value ="<?php echo $data->id_pengadaan; ?>"  class="form-control col-md-7 col-xs-12">
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12"  for="first-name">Jenis Pengadaan <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <select type="text" id="jenis_pengadaan" name='jenis_pengadaan'   class="chosen-select col-md-7 col-xs-12">
                                  <option value = ""> Pilih Jenis Pengadaan </option>
                                  <option value="Barang / Jasa (B/J)" <?php echo ( $data->jenis_pengadaan=='Barang / Jasa (B/J)')? 'selected':'' ?>> Barang / Jasa (B/J) </option>
                                  <option value="Konstruksi (KK)" <?php echo ( $data->jenis_pengadaan=='Konstruksi (KK))')? 'selected':'' ?>> Konstruksi (KK) </option>
                                  <option value="Konsultasi (KL)" <?php echo ( $data->jenis_pengadaan=='Konsultasi (KL)')? 'selected':'' ?>> Konsultasi (KL) </option>
                                  <option value="Jasa Lainnya (JL)" <?php echo ( $data->jenis_pengadaan=='Jasa Lainnya (JL)')? 'selected':'' ?>> Jasa Lainnya (JL) </option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12"  for="first-name">Metoda Pemilihan Penyedia <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <select type="text" id="metoda_pemilihan_penyedia" name='metoda_pemilihan_penyedia'  class="chosen-select col-md-7 col-xs-12">
                                  <option value = ""> Pilih Metoda Pemilihan Penyedia </option>
                                  <option value="Lelang Umum (LU)" <?php echo ( $data->metoda_pemilihan_penyedia=='Lelang Umum (LU)')? 'selected':'' ?>> Lelang Umum (LU) </option>
                                  <option value="Lelang Sederhana (LS)" <?php echo ( $data->metoda_pemilihan_penyedia=='Lelang Sederhana (LS)')? 'selected':'' ?>> Lelang Sederhana (LS) </option>
                                  <option value="Lelang Terbatas (LT)" <?php echo ( $data->metoda_pemilihan_penyedia=='Lelang Terbatas (LT)')? 'selected':'' ?>> Lelang Terbatas (LT) </option>
                                  <option value="Seleksi Sederhana (SS)" <?php echo ( $data->metoda_pemilihan_penyedia=='Seleksi Sederhana (SS)')? 'selected':'' ?>> Seleksi Sederhana (SS) </option>
                                  <option value="Seleksi Terbatas (ST)" <?php echo ( $data->metoda_pemilihan_penyedia=='Seleksi Terbatas (ST)')? 'selected':'' ?>> Seleksi Terbatas (ST) </option>
                                  <option value="Penunjukan Langsung (PnL)" <?php echo ( $data->metoda_pemilihan_penyedia=='Penunjukan Langsung (PnL)')? 'selected':'' ?>> Penunjukan Langsung (PnL) </option>
                                  <option value="Pengadaan Langsung (PL)" <?php echo ( $data->metoda_pemilihan_penyedia=='Pengadaan Langsung (PL)')? 'selected':'' ?>> Pengadaan Langsung (PL) </option>
                                  <option value="Sayembara (Sy)" <?php echo ( $data->metoda_pemilihan_penyedia=='Sayembara (Sy)')? 'selected':'' ?>> Sayembara (Sy) </option>
                                  <option value="e-Purcasing (eP)" <?php echo ( $data->metoda_pemilihan_penyedia=='e-Purcasing (eP)')? 'selected':'' ?>> e-Purcasing (eP) </option>
                                  <option value="Pemilihan Langsung (PML)" <?php echo ( $data->metoda_pemilihan_penyedia=='Pemilihan Langsung (PML)')? 'selected':'' ?>> Pemilihan Langsung (PML) </option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12"  for="first-name">Volume <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="volume" name='volume' value="<?php echo $data->volume; ?>"  class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12"  for="first-name">Waktu Penyedia Awal <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="date" class="form-control " id="pemilihan_penyedia_awal" name ="pemilihan_penyedia_awal"  value="<?php echo $data->pemilihan_penyedia_awal; ?>">
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12"  for="first-name">Waktu Penyedia Akhir <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="date" class="form-control " id="pemilihan_penyedia_akhir" name ="pemilihan_penyedia_akhir"  value="<?php echo $data->pemilihan_penyedia_akhir; ?>">
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12"  for="first-name">Pelaksana Pekerjaan Awal <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="date" class="form-control " id="pelaksana_pekerjaan_awal" name ="pelaksana_pekerjaan_awal"  value="<?php echo $data->pelaksana_pekerjaan_awal; ?>">
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12"  for="first-name">Pelaksana Pekerjaan Akhir <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="date" class="form-control " id="pelaksana_pekerjaan_akhir" name ="pelaksana_pekerjaan_akhir"  value="<?php echo $data->pelaksana_pekerjaan_akhir; ?>">
                              </div>
                            </div>
                            </form>
                        </div>

                        <div class="modal-footer">  
                          <button type="button" value = "" id ="tombol" onclick="simpandetail()" class="btn btn-primary"> Simpan</button>
                        </div>
                      </div>
                    </div>
                  </div>
      </div>

        <div name="modaltarget" id="modaltarget" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" onclick="closemodal()" ><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Target</h4>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:simpantarget()" id="target">
                            
                             <input type="hidden" id="id_kegiatan" name="id_kegiatan"   class="form-control col-md-7 col-xs-12" value="<?php echo $data->id_pengadaan; ?>">
                          <div class="col-md-10 col-sm-offset-1">
                            <table width="100%">
                            <thead class="table">
                              <tr>
                                <th width ="33%" style="text-align: center;"> Bulan </th>
                                <th width ="33%" style="text-align: center;"> Realisasi Fisik </th>
                                <th width ="33%" style="text-align: center;"> Realisasi Keuangan </th>
                              </tr>
                            </thead>
                            <tbody>
                             <?php foreach ($target as $target1) {?>
                              <tr>
                                <td align="center"> <?php echo $target1->bulan;?> </td>
                                <td align="center"><input type="text" class = "fisik" id="dt_fisik_<?php echo $target1->bulan;?>" name="dt_fisik_<?php echo $target1->bulan;?>" value="<?php echo $target1->tg_fisik;?>"  required="required" ></td>
                                <td align="center"><input type="text" class = "currency" id="dt_keu_<?php echo $target1->bulan;?>" name='dt_keu_1'  required="required" value="<?php echo $target1->tg_keu;?>"></td>
                              </tr>
                             <?php }?>
                            </tbody>
                            </table>
                          </div>  

                            </div>
                            <div class="modal-footer">
                              
                              <button type="submit" value = "" id ="tombol" class="btn btn-primary">Simpan</button>
                            </div>
                          </form
                      </div>
                    </div>
                  </div>
                </div>
      



       <?php $this->load->view('template\datatablescript.php'); ?> 
        <script>

          $(".chosen-select").chosen({
          width: "100%"
          });
          var save_method; 
           $('input.currency').number( true, 0 );
        $('input.fisik').number( true, 2 );
          function closemodal () {
          $('#modaledit').hide();

          $('#modaltarget').hide();
         }


          function formatCurrency(num) {
              num = num.toString().replace(/\Rp|/g,'');
              if(isNaN(num))
                  num = "0";
              sign = (num == (num = Math.abs(num)));
              num = Math.floor(num*100+0.50000000001);
              cents = num%100;
              num = Math.floor(num/100).toString();
              if(cents<10)
                  cents = "0" + cents;
              for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
                  num = num.substring(0,num.length-(4*i+3))+'.'+
                  num.substring(num.length-(4*i+3));
              prefix =  'Rp ' + num + ',' + cents;
              return prefix;

          }
          function editdetail(){
            $('#modaledit').show();
            console.log($('#kpa').val());
          }

          function edittarget(){
            $('#modaltarget').show();
          }
        
          function simpandetail(){
             $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              formData = {
                id_pengadaan : $('#id_pengadaan').val(),
                 jenis_pengadaan : $('#jenis_pengadaan').val(),
                 metoda_pemilihan_penyedia : $('#metoda_pemilihan_penyedia').val(),
                volume : $('#volume').val(),
                pemilihan_penyedia_awal : $('#pemilihan_penyedia_awal').val(),
                pemilihan_penyedia_akhir : $('#pemilihan_penyedia_akhir').val(),
                pelaksana_pekerjaan_awal : $('#pelaksana_pekerjaan_awal').val(),
                pelaksana_pekerjaan_akhir : $('#pelaksana_pekerjaan_akhir').val(),
              }
              console.log(formData);
              var tipe = 'POST';
              var dturl = '<?php echo site_url('mtr_pengadaan/simpandetail');?>';
               $.ajax({
                type: tipe,
                url: dturl ,
                data: formData,
                dataType: 'json',
                success: function (data) {
                  console.log(data); 
                   $('#dt_jn_pengadaan').html(data[0].jenis_pengadaan);
                   $('#dt_mpp').html(data[0].metoda_pemilihan_penyedia);
                   $('#dt_vol').html(data[0].volume);
                   $('#dt_1').html(data[0].pemilihan_penyedia_awal);
                   $('#dt_2').html(data[0].pemilihan_penyedia_akhir);
                   $('#dt_3').html(data[0].pelaksana_pekerjaan_awal);
                   $('#dt_4').html(data[0].pelaksana_pekerjaan_akhir);
                    $('#modaledit').hide();                 
                  new PNotify({
                                      title: 'SUKSES',
                                      text: 'Data berhasil disimpan',
                                      type: 'success',
                                      hide: false,
                                      styling: 'bootstrap3'
                                  });
                  
                },
                error: function (data) {
                  console.log(data);
                  $('#modaladd').hide();
                  new PNotify({
                                      title: 'GAGAL',
                                      text: 'Data Sudah ada',
                                      type: 'error',
                                      hide: false,
                                      styling: 'bootstrap3'
                                  });
                }
              })
          }
           
        function simpantarget(){
             $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              formData = {  
                id : $('#id_kegiatan').val(),
              tg_fisik_1 : parseFloat($('#dt_fisik_1').val().replace(/,/g, '')), tg_keu_1 : parseFloat($('#dt_keu_1').val().replace(/,/g, '')),
              tg_fisik_2 : parseFloat($('#dt_fisik_2').val().replace(/,/g, '')), tg_keu_2 : $('#dt_keu_2').val().replace(/,/g, ''),
                tg_fisik_3 : parseFloat($('#dt_fisik_3').val().replace(/,/g, '')), tg_keu_3 : $('#dt_keu_3').val().replace(/,/g, ''),
                tg_fisik_4 : parseFloat($('#dt_fisik_4').val().replace(/,/g, '')), tg_keu_4 : $('#dt_keu_4').val().replace(/,/g, ''),
                tg_fisik_5 : parseFloat($('#dt_fisik_5').val().replace(/,/g, '')), tg_keu_5 : $('#dt_keu_5').val().replace(/,/g, ''),
                tg_fisik_6 : parseFloat($('#dt_fisik_6').val().replace(/,/g, '')), tg_keu_6 : $('#dt_keu_6').val().replace(/,/g, ''),
                tg_fisik_7 : parseFloat($('#dt_fisik_7').val().replace(/,/g, '')), tg_keu_7 : $('#dt_keu_7').val().replace(/,/g, ''),
                tg_fisik_8 : parseFloat($('#dt_fisik_8').val().replace(/,/g, '')), tg_keu_8 : $('#dt_keu_8').val().replace(/,/g, ''),
                tg_fisik_9 : parseFloat($('#dt_fisik_9').val().replace(/,/g, '')), tg_keu_9 : $('#dt_keu_9').val().replace(/,/g, ''),
                tg_fisik_10 : parseFloat($('#dt_fisik_10').val().replace(/,/g, '')), tg_keu_10 : $('#dt_keu_10').val().replace(/,/g, ''),
                tg_fisik_11 : parseFloat($('#dt_fisik_11').val().replace(/,/g, '')), tg_keu_11 : $('#dt_keu_11').val().replace(/,/g, ''),
                tg_fisik_12 : parseFloat($('#dt_fisik_12').val().replace(/,/g, '')), tg_keu_12 : $('#dt_keu_12').val().replace(/,/g, ''),
                tg_fisik_12 : parseFloat($('#dt_fisik_12').val().replace(/,/g, '')), tg_keu_12 : $('#dt_keu_12').val().replace(/,/g, ''),
               }
           console.log(formData);
          var tipe = 'POST';
          var dturl = '<?php echo site_url('mtr_pengadaan/simpantarget');?>';
          $.ajax({
            type: tipe,
            url: dturl ,
            data: formData,
            dataType: 'json',
            success: function (data) {
              console.log(data[0]);
              for (i=0;i<12;i++){
                j=i+1;
               $('#dtf'+j).html(data[i].tg_fisik+' %');
               $('#dtk'+j).html(formatCurrency(data[i].tg_keu));
              }
               
              $('#modaltarget').hide();
                new PNotify({
                                      title: 'SUKSES',
                                      text: 'Data berhasil disimpan',
                                      type: 'success',
                                      hide: false,
                                      styling: 'bootstrap3'
                                  });
                  
                },
                error: function (data) {
                  console.log(data);
                  $('#modaladd').hide();
                  new PNotify({
                                      title: 'GAGAL',
                                      text: 'Data Sudah ada',
                                      type: 'error',
                                      hide: false,
                                      styling: 'bootstrap3'
                                  });
                }
          })
        }

        $("#target" ).validate( {
        rules: {
          dt_fisik_1 : {
            required: true,
            range: [0, 100]
          },dt_fisik_2 : {
            required: true,
            range: [0, 100]
          },dt_fisik_3 : {
            required: true,
            range: [0, 100]
          },dt_fisik_4 : {
            required: true,
            range: [0, 100]
          },dt_fisik_5 : {
            required: true,
            range: [0, 100]
          },dt_fisik_6 : {
            required: true,
            range: [0, 100]
          },dt_fisik_7 : {
            required: true,
            range: [0, 100]
          },dt_fisik_8 : {
            required: true,
            range: [0, 100]
          },dt_fisik_9 : {
            required: true,
            range: [0, 100]
          },dt_fisik_10 : {
            required: true,
            range: [0, 100]
          },dt_fisik_11 : {
            required: true,
            range: [0, 100]
          },dt_fisik_12 : {
            required: true,
            range: [0, 100]
          }, 

        }
      })

       
        </script>
        <!-- page content -->
          
<?php $this->load->view('template\footer.php'); ?> 
<?php $this->load->view('template\script.php'); ?>

