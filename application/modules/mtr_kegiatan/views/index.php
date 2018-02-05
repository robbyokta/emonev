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
                <div class= "col-md-12 col-sm-offset-0" align="center">
                 <?php
                      $now = time();
                      $edit = strtotime($pengguna->edit_blj);
                       if ( $now <= $edit) {
                    ?>
                <button align="right"  class=" col-md-2 col-sm-offset-10 btn btn-primary" onclick="addkegiatan()"> Tambah Kegiatan</button> 
                  <?php }?>
                  <table  id="mtr_kegiatan" class="data" width="100%">
                      <thead ">
                        <tr>
                          <th style="text-align: center;" rowspan = "2" width = "15%">SKPD</th>
                          <th style="text-align: center;" rowspan = "2"  width = "22%">Nama Kegiatan</th>
                          <th style="text-align: center;" colspan="3" width = "45%" >Anggaran</th>
                          <th style="text-align: center;" rowspan = "2" width = "15%">Total</th>
                          <th style="text-align: center;" rowspan = "2" width = "8%">Action</th>

                        </tr>
                        <tr>
                        <th style="text-align: center;" > Belanja Pegawai</th>
                        <th style="text-align: center;" > Belanja Barang</th>
                        <th style="text-align: center;" > Belanja Modal</th>
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
        </div>

          <div name="modaledit" id="modaledit" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" onclick="closemodal()" ><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Tambah Kegiatan</h4>
                        </div>
                          <div class="modal-body">
                            <form action="javascript:tambah();" id="detail">
                             <input type="hidden" id="id_kegiatan" name='id_kegiatan' class="form-control col-md-7 col-xs-12" required>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Program <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                 <select class="chosen-select" name="id_program" id="id_program" data-placeholder="Choose a Country..." style="width:350px;"   required>
                                    <option value="" >Pilih Program</option>
                                   <?php foreach ($program as $data ) { ?>
                                    <option value = "<?php echo $data->id_program?>" ><?php echo $data->nama_program;?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Nama Kegiatan <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="nama" name='nama' class="form-control col-md-7 col-xs-12" required>
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Kode Kegiatan <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="kode" name='kode' class="form-control col-md-7 col-xs-12" required>
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Jenis Belanja <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                 <select class="form-control chosen-select" name="jenis_blj" id="jenis_blj" required>
                                    <option value="" >Pilih Jenis Belanja</option>
                                    <option value = "2" >Belanja Tidak Langsung</option>
                                    <option value = "1" >Belanja Langsung</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12 " for="first-name"> Belanja Pegawai <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="blj_pegawai" name='blj_pegawai' class="currency form-control col-md-7 col-xs-12" required>
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Belanja Barang <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="blj_barang" name='blj_barang' class=" currency form-control col-md-7 col-xs-12" required>
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Belanja Modal <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="blj_modal" name='blj_modal' class="currency form-control col-md-7 col-xs-12" required>
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
                

       <?php $this->load->view('template\datatablescript.php'); ?> 
        <script>
         $chs = $(".chosen-select").chosen({
          width: "100%"
          });
          var save_method; 
          $('input.currency').number( true, 0 );
          $('input.fisik').number( true, 2 );
          table =  $('#mtr_kegiatan').dataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                
                "ajax": {
                "url" : '<?php echo site_url('mtr_kegiatan/data_mtr_kegiatan');?>',
                "type"  : "POST"
                },
                "columns": [
                        {"data": "skpd", },
                        {"data": "nama_keg", },
                        {"data": "blj_pegawai", "render": function ( data, type, row, meta ) {
                           var rev     = parseInt(data, 10).toString().split('').reverse().join('');
                           var rev2    = '';
                            for(var i = 0; i < rev.length; i++){
                                rev2  += rev[i];
                                if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                                    rev2 += '.';
                                }
                            }
                            return ' Rp. '+rev2.split('').reverse().join('') + ',00';
                          } },
                        {"data": "blj_barang", "render": function ( data, type, row, meta ) {
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
                        {"data": "blj_modal", "render": function ( data, type, row, meta ) {
                           var rev     = parseInt(data, 10).toString().split('').reverse().join('');
                           var rev2    = '';
                            for(var i = 0; i < rev.length; i++){
                                rev2  += rev[i];
                                if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                                    rev2 += '.';
                                }
                            }
                            return ' Rp. '+rev2.split('').reverse().join('') + ',00';
                          } },
                        {"data": "total", "render": function ( data, type, row, meta ) {
                           var rev     = parseInt(data, 10).toString().split('').reverse().join('');
                           var rev2    = '';
                            for(var i = 0; i < rev.length; i++){
                                rev2  += rev[i];
                                if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                                    rev2 += '.';
                                }
                            }
                            return ' Rp. '+rev2.split('').reverse().join('') + ',00';
                          } },
                          {"data": "id_kegiatan", "render": function ( data, type, row, meta ) {
                            <?php if ( $now <= $edit) { ?>
                             val = '<a class="btn btn-xs btn-primary"  href="<?php echo site_url('mtr_kegiatan/detailkegiatan');?>/'+data+'" type="button">Detail</a> <button align="right"  class="btn btn-xs" onclick="<?php echo "edit(";?>'+data+')" >Edit</button>';
                             <?php } else {?>
                                val = '<a class="btn btn-xs btn-primary"  href="<?php echo site_url('mtr_kegiatan/detailkegiatan');?>/'+data+'" type="button">Detail</a>';
                             <?php }?>
                             return val;
                          }},
                    ],
 

                 "columnDefs": [
                 { "targets": [ 2, 3, 4 ,5 ], "className" : "text-right"},
                 { "targets": [ 6 ], "className" : "text-center"},
                 { "targets": [ 6 ], "width" : "12%"},
                ]
            });
           function closemodal () {
          $('#modaledit').hide();
         }

         function addkegiatan(){
           $('#id_kegiatan').val(''), 
                          $('#id_program').val(''),   
                          $('#nama').val(''),   
                          $('#kode').val(''),   
                          $('#jenis_blj').val(''),   
                          $('#blj_pegawai').val(''),   
                          $('#blj_barang').val(''),      
                          $('#blj_modal').val(''),    
                          $('#tombol').val('tambah'), 
                          $('#tombol').html('Tambah Data'),
          $('#modaledit').show();
         }
          
          function tambah(){
             $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              formData = {
                id_kegiatan : $('#id_kegiatan').val(),   
                id_program : $('#id_program').val(),   
                nama_kegiatan : $('#nama').val(),   
                kode_kegiatan : $('#kode').val(),   
                jenis_blj : $('#jenis_blj').val(),   
                blj_pegawai : $('#blj_pegawai').val().replace(/,/g, ''),   
                blj_barang: $('#blj_barang').val().replace(/,/g, ''),      
                blj_modal: $('#blj_modal').val().replace(/,/g, ''),    
               
               }
           console.log(formData);
           stat = $('#tombol').val();
          var tipe = 'POST';
          var dturl = '<?php echo site_url('mtr_kegiatan/tambahkegiatan');?>';
          console.log(stat);
          if (stat == 'edit'){
                var tipe = 'POST';
                var dturl = '<?php echo site_url('mtr_kegiatan/editkegiatan');?>';
          }
          $.ajax({
            type: tipe,
            url: dturl ,
            data: formData,
            dataType: 'json',
            success: function (data) {
              console.log(data.type);
              $('#modaledit').hide();
              table.api().ajax.reload();
              new PNotify({
                                  title: 'Sukses',
                                  text: 'Kegiatan Berhasil ditambah',
                                  type: 'success',
                                  hide: false,
                                  styling: 'bootstrap3'
                              });
              
            },
            error: function (data) {
              console.log(data);
              $('#modaledit').hide();
              new PNotify({
                                  title: 'Gagal Simpan',
                                  text: 'Data Sudah ada',
                                  type: 'error',
                                  hide: false,
                                  styling: 'bootstrap3'
                              });
            }
          })
         
          }

          

          function edit($id){
            
            console.log($id);
            
                $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
               formData = {}
             console.log(formData); 
              var tipe = 'POST';
                  var dturl = '<?php echo site_url('mtr_kegiatan/kegiatan');?>/'+ $id;
                  $.ajax({
                      type: tipe,
                      url: dturl ,
                      data: formData,
                      dataType: 'json',
                      success: function (data) {
                        console.log(data.nama_keg);
                          $('#id_kegiatan').val(data.id_kegiatan), 
                          $('#id_program').val(data.id_program),   
                          $('#nama').val(data.nama_keg),   
                          $('#kode').val(data.kode),   
                          $('#jenis_blj').val(data.jenis_blj),   
                          $('#blj_pegawai').val(data.blj_pegawai),   
                          $('#blj_barang').val(data.blj_barang),      
                          $('#blj_modal').val(data.blj_modal),    
                          $('#tombol').val('edit'), 
                          $('#tombol').html('Edit Data'),
                        $('#modaledit').show();

                          $chs.chosen().trigger("chosen:updated");
                      }
                  });
          }
       
        </script>
        <!-- page content -->
<?php $this->load->view('template\footer.php'); ?> 
<?php $this->load->view('template\script.php'); ?>

