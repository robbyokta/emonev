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
                    <h2>Data User <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> 
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <button align="right"  class=" col-md-1 col-sm-offset-11 btn btn-primary" onclick="tambah()"> tambah </button>
                    <div class= "col-md-12 col-sm-offset-0" align="center">
                        <table width ="100%" id="rl_kegiatan" class="table table-striped table-bordered ">
                          <thead>
                          <tr>
                           
                            <th width = "15%">Nama</th>
                            <th  width = "15%">Email</th>
                            <th  width = "10%">Role</th>
                            <th  width = "15%" >SKPD</th>
                            <th width = "10%">Bulan Aktif</th>
                            <th width = "10%"> Action </th>
                          </tr>
                          
                        </thead>
                        <tbody>
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

                  <div name="modaladd" id="modaladd" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" onclick="closemodal()" ><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="labeladd" name="labeladd" >Tambah User</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open(); ?>
                            
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Nama <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="nama" name='nama'  required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Email <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="email" name='email'  required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>

                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Hak Akses <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                 <select class="form-control chosen-select" name="role" id="role">
                                    <option value = "1">Admin</option>
                                    <option value = "2">Operator SKPD</option>
                                  </select>
                              </div>
                            </div>

                            <div class="form-group col-md-8 col-sm-offset-2" id="skpd" name="skpd" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Operator SKPD <span class="required"></span>
                              </label>
                               <div class="col-md-8 col-sm-6 col-xs-12">
                                 <select class="form-control chosen-select" name="id_skpd" id="id_skpd">
                                    <option value="" >Pilih SKPD</option>
                                   <?php foreach ($skpd as $data ) { ?>
                                    <option value = "<?php echo $data->id_skpd?>" ><?php echo $data->nama_skpd?></option>
                                  <?php } ?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Password<span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="password" id="password" name='password'  required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Confirm Password <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="password" id="c_password" name='c_password'  required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>

                            </div>
                            <div class="modal-footer">
                              
                              <a type="button" onclick="simpan()" class="btn btn-primary">Save changes</a>
                            </div>
                          </form
                      </div>
                    </div>
                    </div>
                  </div>



                  <div name="modaldetail" id="modaldetail" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" onclick="closemodal()" ><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="labeladd" name="labeladd" >Detail User</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open(); ?>
                            
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Nama <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="dnama" name='dnama'  required="required" class="form-control col-md-7 col-xs-12">

                            <input type="hidden" id="id_users" name='id_users'  required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Email <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="demail" name='demail'  required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>

                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Hak Akses <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                 <select class="form-control chosen-select" name="drole" id="drole">
                                    <option value = "1">Admin</option>
                                    <option value = "2">Operator SKPD</option>
                                  </select>
                              </div>
                            </div>

                            <div class="form-group col-md-8 col-sm-offset-2" id="skpd" name="skpd" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Operator SKPD <span class="required"></span>
                              </label>
                               <div class="col-md-8 col-sm-6 col-xs-12">
                                 <select class="form-control chosen-select" name="did_skpd" id="did_skpd">
                                    <option value="" >Pilih SKPD</option>
                                   <?php foreach ($skpd as $data ) { ?>
                                    <option value = "<?php echo $data->id_skpd?>" ><?php echo $data->nama_skpd?></option>
                                  <?php } ?>
                                  </select>
                              </div>
                            </div>

                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Status <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                 <select class="form-control chosen-select" name="dstat" id="dstat">
                                    <option value = "0">Non Aktif</option>
                                    <option value = "1">Aktif</option>
                                  </select>
                              </div>
                            </div>

                            </div>
                            <div class="modal-footer">
                              
                              <a type="button" onclick="simpandetail()" class="btn btn-primary">Save changes</a>
                            </div>
                          </form
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
                          <h4 class="modal-title" id="lablledit" name="labeledit" >Edit Setting User</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open(); ?>
                            
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Tanggal Mulai Input<span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="date" id="mulai" name='mulai' format="mm-dd-yyyy" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                            <input type="hidden" id="id_users" name='id_users'  required="required" class="form-control col-md-7 col-xs-12">
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Tanggal Akhir Input <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="date" id="akhir" name='akhir' format="dd-mm-yyyy" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>

                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Bulan Aktif<span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                 <select class="form-control" name="bulan" id="bulan">
                                    <option value = "Januari"> Januari </option>
                                    <option value = "Februari"> Februari </option>
                                    <option value = "Maret"> Maret </option>
                                    <option value = "April"> April </option>
                                    <option value = "Mei"> Mei </option>
                                    <option value = "Juni"> Juni </option>
                                    <option value = "Juli"> Juli </option>
                                    <option value = "Agustus"> Agustus </option>
                                    <option value = "September"> September </option>
                                    <option value = "Oktober"> Oktober </option>
                                    <option value = "November"> November </option>
                                    <option value = "Desember"> Desember </option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Tahun Aktif<span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="number" id="tahun" name='tahun'  required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>

                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Edit Belanja <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="date" id="edit_blj" name='edit_blj' format="dd-mm-yyyy"  required="required" class="form-control col-md-7 col-xs-12">
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
           $(".chosen-select").chosen({
          width: "100%"
          });

        $('#skpd').hide();
        $( "#role" ).on('change', function() {
        val = $(this).val();
        console.log(val);
            if (val == '2'){
              $('#skpd').show();
            } else { $('#skpd').hide(); }
        });
          var table = $('#rl_kegiatan').dataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
               
                "ajax": {
                "url" : '<?php echo site_url('mtr_user/datauser/');?>',
                "type"  : "POST"
                },
                "columns": [
                        {"data": "name", },
                        {"data": "email", },
                        {"data": "role", "render": function ( data, type, row, meta ) {
                          if(data == '1'){
                            r = 'Admin';
                          } else {r = 'Operator';}
                          return r;
                        }},
                        {"data": "nama_skpd", },
                        {"data": "bulan_aktif", },
                        {"data": "id_users", "render": function ( data, type, row, meta ) {
                          return '<a class="btn btn-xs btn-primary" onclick = "detail('+data+')" type="button">Detail</a> <a class="btn btn-xs btn-info" onclick = "setting('+data+')" type="button">Setting</a>'
                        }},
                        ],
                "columnDefs": [
                 { "targets": [ 2,3,4,5 ], "className" : "text-center"},
                 ],
          })
        function closemodal () {
          $('#modaladd').hide();
          $('#modalsetting').hide();
          $('#modaldetail').hide();
         }

         function tambah(){
          $('#modaladd').show();
         }

          function simpan(){
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          formData = {
            nama : $('#nama').val(),
            email : $('#email').val(),
            role : $('#role').val(),
            id_skpd : $('#id_skpd').val(),
            password : $('#password').val(),
            c_password : $('#c_password').val(),

          }
           console.log(formData);
          var tipe = 'POST';
          var dturl = '<?php echo site_url('mtr_user/adduser');?>';
          $.ajax({
            type: tipe,
            url: dturl ,
            data: formData,
            dataType: 'json',
            success: function (data) {
              console.log(data.type);
              $('#modaladd').hide();
              table.api().ajax.reload();
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
              $('#modaladd').hide();
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

          function setting($id){
             $('#modalsetting').show();
            console.log($id);
            var id = $id;
            $('#id_users').val($id);
             $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          formData = {
            
          }
           console.log(formData);
          var tipe = 'POST'+$id;
          var dturl = '<?php echo site_url('mtr_user/settinguser');?>/'+ $id;
          $.ajax({
            type: tipe,
            url: dturl ,
            data: formData,
            dataType: 'json',
            success: function (data) {
              console.log(data[0]);
              $('#mulai').val(data[0].mulai);
              $('#akhir').val(data[0].selesai);
              $('#bulan').val(data[0].bulan_aktif);
              $('#edit_blj').val(data[0].edit_blj);
              $('#tahun').val(data[0].tahun);
              $('#myModalLabel').append('Edit Setting User');
              
            },
            error: function (data) {
              console.log(data);
             }
          })
          }


        function simpansetting(){
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          formData = {
            id_users : $('#id_users').val(),
            mulai : $('#mulai').val(),
            selesai : $('#akhir').val(),
            bulan : $('#bulan').val(),
            edit_blj: $('#edit_blj').val(),

          }
           console.log(formData);
          var tipe = 'POST';
          var dturl = '<?php echo site_url('mtr_user/simpansettinguser');?>';
          $.ajax({
            type: tipe,
            url: dturl ,
            data: formData,
            dataType: 'json',
            success: function (data) {
              console.log(data.type);
              $('#modalsetting').hide();
              table.api().ajax.reload();
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

          function detail($id){
             $('#modaldetail').show();
            console.log($id);
            var id = $id;
            $('#id_users').val($id);
             $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          formData = {
            
          }
           console.log(formData);
          var tipe = 'POST'+$id;
          var dturl = '<?php echo site_url('mtr_user/settinguser');?>/'+ $id;
          $.ajax({
            type: tipe,
            url: dturl ,
            data: formData,
            dataType: 'json',
            success: function (data) {
              console.log(data[0]);
              $('#dnama').val(data[0].name);
              $('#demail').val(data[0].email);
              $('#drole').val(data[0].role);
              $('#did_skpd').val(data[0].id_skpd);
              $('#dstat').val(data[0].status);
              $('#myModalLabel').append('Edit Setting User');
              
            },
            error: function (data) {
              console.log(data);
             }
          })
          }

        function simpandetail(){
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          formData = { 
            nama: $('#dnama').val(),
            email:  $('#demail').val(),
            role :  $('#drole').val(),
            id_skpd : $('#did_skpd').val(),
            status :  $('#dstat').val(),
            id_users : $('#id_users').val(),

          }
           console.log(formData);
          var tipe = 'POST';
          var dturl = '<?php echo site_url('mtr_user/simpandetailuser');?>';
          $.ajax({
            type: tipe,
            url: dturl ,
            data: formData,
            dataType: 'json',
            success: function (data) {
              console.log(data.type);
              $('#modaldetail').hide();
              table.api().ajax.reload();
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

