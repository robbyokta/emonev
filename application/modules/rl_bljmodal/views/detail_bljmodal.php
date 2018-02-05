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

            <div class="row" id="view">
              <div class="col-md-12"> 
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail Pengadaan <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> 
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <h2 align="center"><strong>Detail Pengadaan <br/> <?php echo $data->nama_pengadaan; ?></strong></h2>
                    <br/>
                    <?php
                     $start = strtotime($pengguna->mulai); 
                      $finish = strtotime($pengguna->selesai); 
                      $now = time();
                     if ($start <= $now && $now <$finish) {?>
                     <button align="right"  class=" col-md-1 col-sm-offset-11 btn btn-primary" onclick="javascript:
        $('#view').hide();$('#form').show();"> Tambah </button>
                     <?php }?>
                    <div class= "col-md-10 col-sm-offset-1" align="center">
                      <table width ="80%" id="mtr_pengadaan" class="table table-striped ">
                        
                        <tbody>
                        <tr>
                        <td colspan="3" align ="center"><strong> Keterangan pengadaan </strong> </td>
                        </tr>
                        <tr>
                          <td width = "30%"> Kode Kegiatan</td><td width="2%">:</td>
                          <td><?php echo $data->kode; ?></td>
                        </tr>
                        <tr>
                          <td width = "30%"> Nama Kegiatan</td><td width="2%">:</td>
                          <td><?php echo $data->nama_pengadaan; ?></td>
                        </tr>
                        <tr>
                          <td colspan="3" align ="center"><strong> Anggaran Kegiatan </strong> </td>
                        </tr>
                        <tr>
                          <td width = "30%"> Anggaran </td><td width="2%">:</td>
                          <td><?php echo 'Rp.'.number_format($data->anggaran,2); ?></td>
                        </tr>
                        <tr>
                          <td colspan="3" align ="center"><strong> Riwayat Realisasi </strong> </td>
                        </tr>
                        
                        </tbody>
                      </table>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                      <table width ="100%" id="rl_bljmodal" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th style="text-align:  center;">Bulan </th>
                            <th style="text-align:  center;">Realisasi Fisik(%)</th>
                            <th style="text-align:  center;">Realisasi Keuangan</th>
                            <th style="text-align:  center;">Kendala</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row" id="form">
              <div class="col-md-12"> 
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail Realisasi pengadaan <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> 
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <h2 align="center"><strong>Detail pengadaan <br/> <?php echo $data->nama_pengadaan; ?></strong></h2>
                    <br/>
                    <?php
                     $start = strtotime($pengguna->mulai); 
                      $finish = strtotime($pengguna->selesai); 
                      $now = time();
                     
                     if ($start <= $now && $now <=$finish) {?>
                   
                     <?php }?>
                    <br/><br/><br/>
                    <div class= "col-md-12 col-sm-offset-0" align="center">
                    <form id="frm" action="javascript:simpan()">
                      <div class="form-group col-md-12 " >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Bulan <span class="required"></span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text"  value ="<?php echo $pengguna->bulan_aktif; ?>" disabled="true" class="form-control col-md-6 col-xs-12">
                                <input type="hidden" id="bulan_aktif" name="bulan_aktif" value ="<?php echo $pengguna->bulan_aktif; ?>" disabled="true" class="form-control col-md-7 col-xs-12">
                              </div>
                                <input type="hidden" id="id_pengadaan" name="id_pengadaan" value ="<?php echo $id; ?>" class="form-control col-md-7 col-xs-12">
                                <input type="hidden" id="id" name="id" value ="" class="form-control col-md-7 col-xs-12">  
                      </div>
                      <input type="hidden" id="tahun" name="tahun" value ="2018"  class="form-control col-md-7 col-xs-12">
                        
                        <div class="form-group col-md-12" >
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Realisasi Fisik <span class="required"></span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="rl_fisik" name='rl_fisik' value ="<?php echo  ($pengadaan != null)?$pengadaan->rl_fisik:''; ?>" required class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group col-md-12" >
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Realisasi Keuangan <span class="required"></span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="rl_keu" name='rl_keu' <?php echo  ($pengadaan != null)?"value ='".$pengadaan->rl_keu."'":''; ?>  required class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        
                         <div class="form-group col-md-12" >
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Kendala <span class="required"></span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="kendala" name='kendala'  required class="form-control col-md-7 col-xs-12"><?php echo  ($pengadaan != null)?$pengadaan->kendala:'';?></textarea>
                          </div>
                        </div>
                          <button type="submit"  class=" col-md-1 col-sm-offset-11 btn btn-primary" > Simpan</button>
                    </form>  
                    </tr>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>

                  
       <?php $this->load->view('template\datatablescript.php'); ?> 
        <script>

        $('input.currency').number( true, 0 );
        $('input.fisik').number( true, 2 );

        $('#view').show();$('#form').hide();
         $( "#frm" ).validate( {
            rules: {
              rl_fisik: {
                required: true,
                range: [0, 100], 
              },
              Kendala : 'required',
              rl_keu : 'required',
            }

          })

          var save_method; 
         var table = $('#rl_bljmodal').dataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "bPaginate": false,
                "searching" :false,
               
                "ajax": {
                "url" : '<?php echo site_url('rl_bljmodal/real_bljmodal/'.$data->id_bjm);?>',
                "type"  : "POST"
                },
                "columns": [
                        {"data": "bulan", },
                        {"data": "rl_fisik", "render" :function ( data, type, row, meta ) {
                            
                          return data+' %';
                          }
                       },
                        {"data": "rl_keu" , "render" :function ( data, type, row, meta ) {
                            
                          return data;
                          }
                      },
                        {"data": "kendala"},
                ],
                  "columnDefs": [
                 { "targets": [ 1, 2 ], "className" : "text-center"},
                 { "targets": [ 1,3], "className" : "text-right"},
                 ],
        })
         
         function closemodal () {
          $('#modaladd').hide();
         }

        

        function simpan(){ 
          id = $('#id').val();
          console.log(id);
          $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          formData = {
              id_bjm : $('#id_pengadaan').val(),
              tahun : $('#tahun').val(),
              bulan_aktif : $('#bulan_aktif').val(),
              rl_keu : $('#rl_keu').val(),
              rl_fisik : $('#rl_fisik').val(),
              kendala : $('#kendala').val(),
            }
          console.log(formData);
          state = $('#tombol').val(); 
          var tipe = 'POST';
          var dturl = '<?php echo site_url('rl_bljmodal/addrealisasi');?>';
          if (state == "edit"){
              tipe = 'POST';
             dturl = '<?php echo site_url('rl_bljmodal/editrealisasi');?>/'+id;
        }
          $.ajax({
            type: tipe,
            url: dturl ,
            data: formData,
            dataType: 'json',
            success: function (data) {
              console.log(data);
              $('#modaladd').hide();
              table.api().ajax.reload();
              new PNotify({
                                  title: 'Tambah Data Sukses',
                                  text: 'Data berhasil ditambahkan',
                                  type: 'success',
                                  hide: false,
                                  styling: 'bootstrap3'
                              });
              
        $('#view').show();$('#form').hide();
            },
            error: function (data) {
              console.log(data);
              $('#modaladd').hide();
              new PNotify({
                                  title: 'Gagal tambah',
                                  text: 'Data Sudah ada',
                                  type: 'error',
                                  hide: false,
                                  styling: 'bootstrap3'
                              });

        $('#view').show();$('#form').hide();
            }
          })
         }

        function edit($id){
          var d = $id.toString();
          console.log(d);
            $('#modalsetting').show();
            console.log($id);
            var id = $id;
            $('#id').val($id);
             $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          formData = {
            
          }
           console.log(formData);
          var tipe = 'POST';
          var dturl ='<?php echo site_url('rl_bljmodal/editdata');?>/'+$id;
           $.ajax({
            type: tipe,
            url: dturl ,
            data: formData,
            dataType: 'json',
            success: function (data) {
              console.log(data[0]);
               $('#tombol').html('Edit Data');
               $('#modaladd').show();
              $('#tombol').val("edit");
               $('#rl_fisik').val(data[0].rl_fisik);
              $('#blj_modal').val(data[0].rl_blj_modal);
              $('#blj_pegawai').val(data[0].rl_blj_pegawai);
              $('#blj_barang').val(data[0].rl_blj_barang);
            }
          });
        }

      
        </script>
        <!-- page content -->
        
<?php $this->load->view('template\footer.php'); ?> 
<?php $this->load->view('template\script.php'); ?>

