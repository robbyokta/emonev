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
                    <h2>Waktu & Tanggal<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> 
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <button align="right"  class=" col-md-1 col-sm-offset-11 btn btn-primary" onclick="setting()"> edit </button>
                    <div class= "col-md-12 col-sm-offset-0" align="center">
                        <table width ="100%" class="data table table-striped table-bordered ">
                          <thead>
                          <tr>
                            <th width = "15%">Tanggal Mulai Input</th>
                            <th  width = "15%">Tanggal Akhir Input</th>
                            <th  width = "15%">Batas Akhir Edit Belanja</th>
                            <th  width = "10%">Bulan Aktif</th>
                            <th  width = "10%">Tahun</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td align="center" id="dt_mulai"><?php echo tgl_indo($setting->mulai); ?></td>
                            <td align="center" id="dt_selesai"><?php echo tgl_indo($setting->selesai); ?></td>
                            <td align="center" id="dt_edit_blj"><?php echo tgl_indo($setting->edit_blj); ?></td>
                            <td align="center" id="dt_bulan_aktif"><?php echo $setting->bulan_aktif; ?></td>
                            <td align="center" id="dt_edit_blj"><?php echo $setting->tahun; ?></td>
                          </tr>
                        </tbody>
                          </thead>
                          <tbody>
                         
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
                    <h2>Target Kabupaten Tanah Datar<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> 
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <button align="right"  class=" col-md-1 col-sm-offset-11 btn btn-primary" onclick="simpantarget()"> edit </button>
                    <div class= "col-md-12 col-sm-offset-0" align="center">
                        <table width ="80%" class="data ">
                          <thead>
                          <tr>
                            <th width = "15%">Bulan</th>
                            <th  width = "15%">Target Realisasi Fisik (%)</th>
                            <th  width = "15%">Target Realisasi Keuangan (%)</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          <?php $i=1; foreach ($target as $target) {?>
                           <tr>
                            <td align="center" id="dt_mulai"><?php echo $target->bulan; ?></td>
                            <td align="center" id="dt_selesai"><input type="number" id="<?php echo 'dt_fisik_'.$i; ?>" name="<?php echo 'dt_fisik_'.$i; ?>""  required="required" class=" col-md-12" style="text-align:center;" value ="<?php echo $target->tg_fisik; ?>"></td>
                            <td align="center" id="dt_edit_blj"><input type="number" id="<?php echo 'dt_keu_'.$i; ?>" name="<?php echo 'dt_keu_'.$i; ?>" required="required" class=" col-md-12" style="text-align:center;" value ="<?php echo $target->tg_keu; ?>"></td>
                          </tr>
                          <?php  # code...
                          $i++;} ?>
                        </tbody>
                          </thead>
                          <tbody>
                         
                          </tbody>
                        </table>
                    </div>
                    
                  </div>
                  </div>
                </div>
              </div>
            </div>

            </div>

          </div>
        </div>


                    <div name="modalsetting" id="modalsetting" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" onclick="closemodal()" ><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel" name="myModalLabel" >Edit Waktu Input</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open(); ?>
                            
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Tanggal Mulai Input<span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="date" id="mulai" name='mulai'  required="required" class="form-control col-md-7 col-xs-12" value = "<?php echo $setting->mulai; ?>">
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Tanggal Akhir Input <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="date" id="akhir" name='akhir'  required="required" class="form-control col-md-7 col-xs-12" value ="<?php echo $setting->selesai; ?>">
                              </div>
                            </div>

                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Bulan Aktif<span class="required" ></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                 <select class="form-control" name="bulan" id="bulan">
                                    <option value = "Januari" <?php echo ($setting->bulan_aktif=='Januari')?'Selected':''; ?> > Januari </option>
                                    <option value = "Februari" <?php echo ($setting->bulan_aktif=='Februari')?'Selected':''; ?>> Februari </option>
                                    <option value = "Maret" <?php echo ($setting->bulan_aktif=='Maret')?'Selected':''; ?>> Maret </option>
                                    <option value = "April" <?php echo ($setting->bulan_aktif=='April')?'Selected':''; ?>> April </option>
                                    <option value = "Mei" <?php echo ($setting->bulan_aktif=='Mei')?'Selected':''; ?>> Mei </option>
                                    <option value = "Juni" <?php echo ($setting->bulan_aktif=='Juni')?'Selected':''; ?>> Juni </option>
                                    <option value = "Juli" <?php echo ($setting->bulan_aktif=='Juli')?'Selected':''; ?>> Juli </option>
                                    <option value = "Agustus" <?php echo ($setting->bulan_aktif=='Agustus')?'Selected':''; ?>> Agustus </option>
                                    <option value = "September" <?php echo ($setting->bulan_aktif=='September')?'Selected':''; ?>> September </option>
                                    <option value = "Oktober" <?php echo ($setting->bulan_aktif=='Oktober')?'Selected':''; ?>> Oktober </option>
                                    <option value = "November" <?php echo ($setting->bulan_aktif=='November')?'Selected':''; ?>> November </option>
                                    <option value = "Desember" <?php echo ($setting->bulan_aktif=='Desember')?'Selected':''; ?>> Desember </option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Tahun Aktif<span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="number" id="tahun" name='tahun'  required="required" class="form-control col-md-7 col-xs-12" value ="<?php echo $setting->tahun; ?>">
                              </div>
                            </div>

                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Edit Belanja <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="date" id="edit_blj" name='edit_blj'  required="required" class="form-control col-md-7 col-xs-12" value ="<?php echo $setting->edit_blj; ?>">
                              </div>
                            </div>

                            </div>
                            <div class="modal-footer">
                              
                              <a type="button" onclick="simpansetting()" class="btn btn-primary">Save changes</a>
                            </div>
                          </form
                      </div>
                    </div>
                  </div>
                  </div>




       <?php $this->load->view('template\datatablescript.php'); ?> 
        <script>

        $('#skpd').hide();
        $( "#role" ).on('change', function() {
        val = $(this).val();
        console.log(val);
            if (val == '2'){
              $('#skpd').show();
            } else { $('#skpd').hide(); }
        });
        
        function closemodal () {
          $('#modalsetting').hide();
         }

         function tambah(){
          $('#modaladd').show();
         }

         

          function setting(){
             $('#modalsetting').show();
            
          }


          function simpansetting(){
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          formData = {
            edit_blj : $('#edit_blj').val(),
            mulai : $('#mulai').val(),
            selesai : $('#akhir').val(),
            bulan : $('#bulan').val(),
            tahun : $('#tahun').val(),

          }
           console.log(formData);
          var tipe = 'POST';
          var dturl = '<?php echo site_url('mtr_user/simpansetting');?>';
          $.ajax({
            type: tipe,
            url: dturl ,
            data: formData,
            dataType: 'json',
            success: function (data) {
              console.log(data.type);
              $('#modalsetting').hide();
              new PNotify({
                                  title: data.title,
                                  text: data.status,
                                  type: data.type,
                                  hide: false,
                                  styling: 'bootstrap3'
                              });
              
            },
            error: function (data) {
              console.log(data);
              $('#modalsetting').hide();
              new PNotify({
                                  title: 'Gagal tambah',
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
          formData = {tg_fisik_1 : parseFloat($('#dt_fisik_1').val().replace(/,/g, '')), tg_keu_1 : parseFloat($('#dt_keu_1').val().replace(/,/g, '')),
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
          var dturl = '<?php echo site_url('mtr_user/simpantarget');?>';
          $.ajax({
            type: tipe,
            url: dturl ,
            data: formData,
            dataType: 'json',
            success: function (data) {
              console.log(data.type);
              $('#modalsetting').hide();
              new PNotify({
                                  title: data.title,
                                  text: data.status,
                                  type: data.type,
                                  hide: false,
                                  styling: 'bootstrap3'
                              });
              
            },
            error: function (data) {
              console.log(data);
              $('#modalsetting').hide();
              new PNotify({
                                  title: 'Gagal tambah',
                                  text: 'Data Sudah ada',
                                  type: 'error',
                                  hide: false,
                                  styling: 'bootstrap3'
                              });
            }
          })

          }

         
        </script>
        <!-- page content -->
<?php $this->load->view('template\footer.php'); ?> 
<?php $this->load->view('template\script.php'); ?>

