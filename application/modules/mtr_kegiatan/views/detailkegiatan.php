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

            <div class="row">
              <div class="col-md-12"> 
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail Kegiatan <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> 
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <h2 align="center"><strong>Detail Kegiatan <br/> <?php echo $data->nama_keg; ?></strong></h2>
                    <br/>
                     <?php
                      $now = time();
                      $edit = strtotime($pengguna->edit_blj);
                       if ( $now <= $edit) {
                    ?>
                    <button align="right"  class=" col-md-2 col-sm-offset-9 btn btn-primary" onclick="editdetail()"> Edit Detail</button> 

                     <?php }?>
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
                            <td><?php echo $data->nama_keg; ?></td>
                          </tr>
                        </tbody>
                      </table>
                      <table  width ="80%"  class="table table-striped">
                        <thead>
                          <tr>
                            <th colspan="3" style="text-align: center;"><strong> Anggaran Kegiatan </strong> </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width = "30%"> Belanja Peagawai </td><td width="3%">:</td>
                            <td><?php echo 'Rp.'.number_format($data->blj_pegawai,2); ?></td>
                          </tr>
                          <tr>
                            <td width = "30%"> Belanja Barang</td><td width="3%">:</td>
                            <td><?php echo 'Rp.'.number_format($data->blj_barang,2); ?></td>
                          </tr>
                          <tr>
                            <td width = "30%"> Belanja Modal</td><td width="3%">:</td>
                            <td><?php echo 'Rp.'.number_format($data->blj_modal,2); ?></td>
                          </tr>
                          <tr>
                            <td width = "30%"> Total Anggaran</td><td width="3%">:</td>
                            <td><?php echo 'Rp.'.number_format(($data->blj_modal+$data->blj_barang+$data->blj_pegawai),2); ?></td>
                          </tr>
                        </tbody>
                      </table>
                      <table  width ="80%"  class="table table-striped">
                        <thead>
                          <tr>
                            <th colspan="3" style="text-align: center;"><strong> Pelaksana Kegiatan</strong> </th>
                          </tr>
                          
                        </thead>
                        <tbody>
                          <tr>
                            <td width = "30%"> Nama KPA </td><td width="3%">:</td>
                            <td id="dt_kpa" name="dt_kpa" ><?php echo $data->kpa; ?></td>
                          </tr>
                          <tr>
                            <td width = "30%"> Nama PPTK </td><td width="3%">:</td>
                            <td id="dt_pptk" name="dt_pptk" ><?php echo $data->pptk; ?></td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
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
                    <h2 align="center"><strong>Target Kegiatan <br/> <?php echo $data->nama_keg; ?></strong></h2>
                    <br/>
                     <?php
                      $now = time();
                      $edit = strtotime($pengguna->edit_blj);
                       if ( $now <= $edit) {
                    ?>
                    <button align="right"  class="col-md-2 col-sm-offset-9 btn btn-primary" onclick="edittarget()"> Edit Target</button>
                     <?php }?> 
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
                          <h4 class="modal-title" id="myModalLabel">Edit Detail Kegiatan</h4>
                        </div>
                          <div class="modal-body">
                            <form action="javascript:simpandetail();" id="detail">
                             <input type="hidden" id="id_kegiatan" name="id_kegiatan" value ="<?php echo $data->id_kegiatan; ?>"  class="form-control col-md-7 col-xs-12">
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12"  for="first-name">Nama KPA <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="kpa" name='kpa' value="<?php echo $data->kpa; ?>"  class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Nama PPTK <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="pptk" name='pptk' value="<?php echo $data->pptk; ?>"  class="form-control col-md-7 col-xs-12" >
                              </div>
                            </div>

                          </div>
                            <div class="modal-footer">
                              <button type="submit" id ="tombol" class="btn btn-primary"> Simpan</button>
                             
                            </div>
                          </form
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
                            
                             <input type="hidden" id="id_kegiatan" name="id_kegiatan"   class="form-control col-md-7 col-xs-12">
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

        $('input.currency').number( true, 0 );
        $('input.fisik').number( true, 2 );

          var save_method; 
          function closemodal () {
          $('#modaledit').hide();

          $('#modaltarget').hide();
         }

          function simpantarget(){
             $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              formData = {  
                id_kegiatan : $('#id_kegiatan').val(),
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
               }
           console.log(formData);
          var tipe = 'POST';
          var dturl = '<?php echo site_url('mtr_kegiatan/simpantarget');?>';
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
                id_kegiatan : $('#id_kegiatan').val(),
                 kpa : $('#kpa').val(),
                 pptk : $('#pptk').val(),
              }
              console.log(formData);
              var tipe = 'POST';
              var dturl = '<?php echo site_url('mtr_kegiatan/simpandetail');?>';
               $.ajax({
                type: tipe,
                url: dturl ,
                data: formData,
                dataType: 'json',
                success: function (data) {
                  console.log(data);
                  $('#dt_kpa').html(data[0].kpa);
                  $('#dt_pptk').html(data[0].pptk);
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

        $( "#detail" ).validate( {
        rules: {
          kpa: 'required',
          pptk : 'required'

        }
      })

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

