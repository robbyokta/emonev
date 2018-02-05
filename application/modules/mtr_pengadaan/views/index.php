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
                 <?php
                      $now = time();
                      $edit = strtotime($pengguna->edit_blj);
                       if ( $now <= $edit) {
                    ?>
                <button align="right"  class=" col-md-2 col-sm-offset-10 btn btn-primary" onclick="addpengadaan()"> Tambah Pengadaan</button> 

                  <?php }?>
                  <table id="mtr_program" class="data " width="100%">
                      <thead>
                        <tr>
                          <th style="text-align:  center;" width = "20%">SKPD</th>
                          <th style="text-align:  center;"  width = "45%">Nama Program</th>
                          <th style="text-align:  center;" >Anggaran</th>
                          <th style="text-align:  center;" width = "15%">Action</th>
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

          <div name="modaledit" id="modaledit" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" onclick="closemodal()" ><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Tambah Pengadaan</h4>
                        </div>
                          <div class="modal-body">
                            <form action="javascript:tambah();" id="detail">
                             <input type="hidden" id="id_pengadaan" name='id_pengadaan' class="form-control col-md-7 col-xs-12" required>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Kegiatan <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                 <select class="form-control chosen-select" name="id_kegiatan" id="id_kegiatan" required>
                                    <option value="" >Pilih Kegiatan</option>
                                   <?php foreach ($kegiatan as $data ) { ?>
                                    <option value = "<?php echo $data->id_kegiatan?>" ><?php echo $data->nama_keg;?></option>
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
                                 <select class="form-control chosen-select" name="jenis_blj" id="jenis_blj" required><option value = "" >Pilih Jenis Belanja</option>
                                    <option value = "Belanja Modal" >Belanja Modal</option>
                                    <option value = "Belanja Barang/Jasa" >Belanja Barang/Jasa</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12 " for="first-name"> Anggaran <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="anggaran" name='anggaran' class="currency form-control col-md-7 col-xs-12" required>
                              </div>
                            </div>
                            
                          </div>
                            <div class="modal-footer">
                              <button type="submit" id ="tombol" value ='tambah' class="btn btn-primary"> Simpan</button>
                             
                            </div>
                          </form
                      </div>
                    </div>
                  </div>
      </div>

       <?php $this->load->view('template\datatablescript.php'); ?> 
        <script>
       $keg = $(".chosen-select").chosen({
          width: "100%"
          });
          var save_method; 

          $('input.currency').number( true, 0 );
            
            table = $('#mtr_program').dataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
               
                "ajax": {
                "url" : '<?php echo site_url('mtr_pengadaan/data_mtr_pengadaan');?>',
                "type"  : "POST"
                },
                "columns": [
                        {"data": "skpd", },
                        {"data": "nama_pengadaan", },
                        
                        {"data": "anggaran", "render": function ( data, type, row, meta ) {
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
                          {"data": "id_pengadaan", "render": function ( data, type, row, meta ) {
                            <?php if ( $now <= $edit) { ?>
                              val = '<a class="btn btn-xs btn-primary"  href="<?php echo site_url('mtr_pengadaan/detailpengadaan');?>/'+data+'" type="button">Detail</a><button align="right"  class="btn btn-xs" onclick="<?php echo "edit(";?>'+data+')" >Edit</button>';
                             <?php } else {?>
                              val = '<a class="btn btn-xs btn-primary"  href="<?php echo site_url('mtr_pengadaan/detailpengadaan');?>/'+data+'" type="button">Detail</a>';
                              <?php } ?>
              
                            return val ;
                          }},
                    ],
 

                 "columnDefs": [
                 { "targets": [ 3 ], "className" : "text-center"},
                 { "targets": [ 2 ], "className" : "text-right"},
              ]
            });

          function edit($id){
           var $c = $('#id_kegiatan');
            
            console.log($id);
            
                $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
               formData = {}
             console.log(formData); 
              var tipe = 'POST';
                  var dturl = '<?php echo site_url('mtr_pengadaan/pengadaan');?>/'+ $id;
                  $.ajax({
                      type: tipe,
                      url: dturl ,
                      data: formData,
                      dataType: 'json',
                      success: function (data) {
                        console.log(data);
                          $('#id_pengadaan').val(data.id_pengadaan);
                          $('#id_kegiatan').val(data.id_kegiatan); 
                          $('#nama').val(data.nama_pengadaan);
                          $('#kode').val(data.kode);
                          $('#jenis_blj').val(data.jenis_belanja);  
                          $('#anggaran').val(data.anggaran); 
                          $('#tombol').val('edit');
                          $('#tombol').html('Edit Data');
                          $('#modaledit').show();
                          $keg.chosen().trigger("chosen:updated");
                      }
                  });
          }

        function closemodal () {
          $('#modaledit').hide();
         }

         function tambah(){
             $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              formData = {
                id_kegiatan : $('#id_kegiatan').val(),   
                id_pengadaan : $('#id_pengadaan').val(),   
                nama_pengadaan : $('#nama').val(),   
                kode_pengadaan : $('#kode').val(),   
                jenis_blj : $('#jenis_blj').val(),   
                anggaran : $('#anggaran').val().replace(/,/g, ''), 
               
               }
           console.log(formData);
           stat = $('#tombol').val();
          var tipe = 'POST';
          var dturl = '<?php echo site_url('mtr_pengadaan/tambahpengadaan');?>';
          console.log(stat);
          if (stat == 'edit'){
                var tipe = 'POST';
                var dturl = '<?php echo site_url('mtr_pengadaan/editpengadaan');?>';
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

           function addpengadaan(){
             $('#id_pengadaan').val(), 
                          $('#id_kegiatan').val(''), 
                          $('#nama').val(''),   
                          $('#kode').val(''),   
                          $('#jenis_blj').val(''),   
                          $('#anggaran').val(''), 
                          $('#tombol').val('tambah'), 
                          $('#tombol').html('Tambah Data'),
          $('#modaledit').show();

         }
        
        </script>
        <!-- page content -->
<?php $this->load->view('template\footer.php'); ?> 
<?php $this->load->view('template\script.php'); ?>

