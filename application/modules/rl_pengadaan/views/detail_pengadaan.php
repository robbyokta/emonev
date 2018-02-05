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
                          <td width = "30%"> Kode Kegiatan</td><td>:</td>
                          <td><?php echo $data->kode; ?></td>
                        </tr>
                        <tr>
                          <td width = "30%"> Nama Kegiatan</td><td>:</td>
                          <td><?php echo $data->nama_pengadaan; ?></td>
                        </tr>
                        <tr>
                          <td colspan="3" align ="center"><strong> Anggaran Kegiatan </strong> </td>
                        </tr>
                        <tr>
                          <td width = "30%"> Anggaran </td><td>:</td>
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
                      <table width ="100%" id="rl_pengadaan" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th style="text-align:  center;">Bulan </th>
                            <th style="text-align:  center;">Tanggal Kontrak</th>
                            <th style="text-align:  center;">Nilai Kontrak</th>
                            <th style="text-align:  center;">Realisasi Fisik (%)</th>
                            <th style="text-align:  center;">Realisasi Keuangan (Rp)</th>
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
                    <form id="rlpengadaan" action="javascript:simpan()">
                    <button type="submit"  class=" col-md-1 col-sm-offset-11 btn btn-primary" > Simpan</button>
                      <div class="form-group col-md-6 " >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Bulan <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text"  value ="<?php echo $pengguna->bulan_aktif; ?>" disabled="true" class="form-control col-md-7 col-xs-12">
                                <input type="hidden" id="bulan_aktif" name="bulan_aktif" value ="<?php echo $pengguna->bulan_aktif; ?>" disabled="true" class="form-control col-md-7 col-xs-12">
                              </div>
                                <input type="hidden" id="id_pengadaan" name="id_pengadaan" value ="<?php echo $id; ?>" class="form-control col-md-7 col-xs-12">
                                <input type="hidden" id="id" name="id" value ="" class="form-control col-md-7 col-xs-12">  
                      </div>
                      <input type="hidden" id="tahun" name="tahun" value ="2018"  class="form-control col-md-7 col-xs-12">
                        <div class="form-group col-md-6" >
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Kode Lelang <span class="required"></span></label>
                          <div class="col-md-8 col-sm-6 col-xs-12"><?php $rl = json_encode($pengadaan); ?>
                            <input type="text" id="kode_lelang" name='kode_lelang' value ="<?php echo ($pengadaan != null)?$pengadaan->kode_lelang :''; ?>" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group col-md-6" >
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Tanggal Pengadaan <span class="required"></span></label>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="date" id="tgl_pengadaan" name='tgl_pengadaan' value ="<?php echo ($pengadaan != null)?$pengadaan->tgl_pengadaan:''; ?>" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group col-md-6" >
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Tanggal Serah Terima <span class="required"></span></label>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="date" id="tgl_serah_terima" name='tgl_serah_terima' value ="<?php echo  ($pengadaan != null)?$pengadaan->tgl_serah_terima:''; ?>" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group col-md-6" >
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> No. Kontrak<span class="required"></span></label>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" id="no_kontrak" name='no_kontrak' value ="<?php echo  ($pengadaan != null)?$pengadaan->no_kontrak:''; ?>" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group col-md-6" >
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Tanggal Kontrak <span class="required"></span></label>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="date" id="tgl_kontrak" name='tgl_kontrak' value ="<?php echo  ($pengadaan != null)?$pengadaan->tgl_kontrak:''; ?>"  required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group col-md-6" >
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Pemenang <span class="required"></span></label>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" id="pemenang" name='pemenang' value ="<?php echo  ($pengadaan != null)?$pengadaan->pemenang:''; ?>" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group col-md-6" >
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Nilai Kontrak <span class="required"></span></label>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" id="nilai_kontrak" name='nilai_kontrak' value ="<?php echo  ($pengadaan != null)?$pengadaan->nilai_kontrak:''; ?>" required="required" class="form-control col-md-7 col-xs-12 currency">
                          </div>
                        </div>
                        <div class="form-group col-md-6" >
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Pelaksanaan Fisik (%) <span class="required"></span></label>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" id="pelaksanaan" name='pelaksanaan' value ="<?php echo  ($pengadaan != null)?$pengadaan->pelaksanaan:''; ?>"  required="required" class="form-control col-md-7 col-xs-12 fisik">
                          </div>
                        </div>
                        <div class="form-group col-md-6" >
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Keuangan (rp) <span class="required"></span></label>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" id="keuangan" name='keuangan' value ="<?php echo  ($pengadaan != null)?$pengadaan->keuangan:''; ?>"  required="required" class="form-control col-md-7 col-xs-12 currency">
                          </div>
                        </div>
                         <div class="form-group col-md-12" >
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Kendala <span class="required"></span></label>
                          <div class="col-md-10 col-sm-6 col-xs-12">
                            <textarea id="kendala" name='kendala'  required="required" class="form-control col-md-7 col-xs-12"><?php echo  ($pengadaan != null)?$pengadaan->kendala:'';?></textarea>
                          </div>
                        </div>
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
         $( "#rlpengadaan" ).validate( {
        rules: {
          pelaksanaan: {
            range: [0, 100]
          },

        }
      })

          var save_method; 
         var table = $('#rl_pengadaan').dataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "bPaginate": false,
                "searching" :false,
                "ajax": {
                "url" : '<?php echo site_url('rl_pengadaan/real_pengadaan/'.$data->id_pengadaan);?>',
                "type"  : "POST"
                },
                "columns": [
                        {"data": "bulan", },
                        {"data": "tgl_kontrak" , "render" :function ( data, type, row, meta ) {
                            date = data.split('-');
                          return date[2]+'/'+date[1]+'/'+date[0];
                          }
                      },
                        {"data": "nilai_kontrak", "render": function ( data, type, row, meta ) {
                           var rev     = parseInt(data, 10).toString().split('').reverse().join('');
                           var rev2    = '';
                            for(var i = 0; i < rev.length; i++){
                                rev2  += rev[i];
                                if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                                    rev2 += '.';
                                }
                            }
                            return ' Rp. '+rev2.split('').reverse().join('') + ',00';
                          }
                        },
                        {"data": "pelaksanaan", "render" :function ( data, type, row, meta ) {
                            
                          return data+' %';
                          }
                       },
                        {"data": "keuangan", "render": function ( data, type, row, meta ) {
                            
                           var rev     = parseInt(data, 10).toString().split('').reverse().join('');
                           var rev2    = '';
                            for(var i = 0; i < rev.length; i++){
                                rev2  += rev[i];
                                if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                                    rev2 += '.';
                                }
                            }
                            return ' Rp. '+rev2.split('').reverse().join('') + ',00';
                          }
                       },

                        {"data": "kendala"},
                ],
                  "columnDefs": [
                 { "targets": [ 1, 3, 5 ], "className" : "text-center"},
                 { "targets": [ 2,4], "className" : "text-right"},
                 ],
        })
         
         function closemodal () {
          $('#modaladd').hide();
         }

         function tambah(){
           $('#tombol').html('Tambah Data');
          $('#modaladd').show();
          $('#tombol').val("add");
          $('#rl_fisik').val('');
          $('#rl_blj_modal').val('');
          $('#rl_blj_pegawai').val('');
          $('#rl_blj_barang').val('');
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
              id_pengadaan : $('#id_pengadaan').val(),
              tahun : $('#tahun').val(),
              bulan_aktif : $('#bulan_aktif').val(),
              kode_lelang : $('#kode_lelang').val(),
              tgl_pengadaan : $('#tgl_pengadaan').val(),
              tgl_kontrak : $('#tgl_kontrak').val(),
              no_kontrak : $('#no_kontrak').val(),
              tgl_serah_terima: $('#tgl_serah_terima').val(),
              pelaksanaan : $('#pelaksanaan').val(),
              keuangan : $('#keuangan').val().replace(/,/g, ''),
              pemenang : $('#pemenang').val(),
              nilai_kontrak : $('#nilai_kontrak').val().replace(/,/g, ''),
              kendala : $('#kendala').val(),
            }
          console.log(formData);
          state = $('#tombol').val(); 
          var tipe = 'POST';
          var dturl = '<?php echo site_url('rl_pengadaan/addrealisasi');?>';
          if (state == "edit"){
              tipe = 'POST';
             dturl = '<?php echo site_url('rl_pengadaan/editrealisasi');?>/'+id;
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
          var dturl ='<?php echo site_url('rl_pengadaan/editdata');?>/'+$id;
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

