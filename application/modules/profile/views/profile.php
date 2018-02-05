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
                    <h2>Profile User <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> 
                      
                    </ul>
                    <div class="clearfix"></div>
                </div>
              <div class="x_content">
              
               <button align="right"  class=" col-md-2 col-sm-offset-1 btn btn-xs btn-primary" onclick="editprofile()"> Edit Profile</button> 
               <button align="left"  class=" col-md-2 col-sm-offset-6 btn btn-xs btn-primary" onclick="edit()"> Change Password </button> 
             
                  <div class= "col-md-10 col-sm-offset-1" align="center" style="border: 2px solid;">
                  <br>
                  <div class= "col-md-12 col-sm-offset-0" align="center">
                  <table  width ="80%"  class="table table-striped">
                        <thead>
                          <tr>
                            <th colspan="3" style="text-align: center;"><strong> Profile </strong> </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width ="33%" > Username </td><td width="3%">:</td>
                            <td id="dt_name"> <?php echo $user->name;?> </th>
                          </tr>
                          <tr>
                            <td width ="33%" > Email </td><td width="3%">:</td>
                            <td > <?php echo $user->email;?> </th>
                          </tr>
                        </tbody>
                  </table>
                  <table  width ="80%"  class="table table-striped">
                        <thead>
                          <tr>
                            <th colspan="3" style="text-align: center;"><strong> Penanda Tanganan Laporan </strong> </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width ="33%" > Nama SKPD</td><td width="3%">:</td>
                            <td id="dt_nama_skpd"> <?php echo $user->nama_skpd;?> </th>
                          </tr>
                          <tr>
                            <td width ="33%" > Pimpinan </td><td width="3%">:</td>
                            <td id="dt_nama_pimpinan" > <?php echo $user->nama_pimpinan;?> </th>
                          </tr>
                          <tr>
                            <td width ="33%" > NIP Pimpinan </td><td width="3%">:</td>
                            <td id="dt_nip_kpl"> <?php echo $user->nip_kpl;?> </th>
                          </tr>
                          <tr>
                            <td width ="33%" > Jabatan Pimpinan </td><td width="3%">:</td>
                            <td id="dt_jbt_pimpinan"> <?php echo $user->jbt_pimpinan;?> </th>
                          </tr>
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

          <div name="modaledituser" id="modaledituser" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" onclick="closemodal()" ><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Edit Profile User</h4>
                        </div>
                          <div class="modal-body">
                            <form action="javascript:changepassword();" id="detail">
                           
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Old Password <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="password" id="old_password" name='old_password' class="form-control col-md-7 col-xs-12" >
                              </div>
                            </div>

                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> New Password <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="password" id="new_password" name='new_password' class="form-control col-md-7 col-xs-12" >
                              </div>
                            </div>

                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Confirm New Password <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="password" id="cfm_password" name='cfm_password' class="form-control col-md-7 col-xs-12" >
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

       <div name="modaleditprofile" id="modaleditprofile" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" onclick="closemodal()" ><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Edit Profile User</h4>
                        </div>
                          <div class="modal-body">
                            <form action="javascript:changedata();" id="detail">
                           
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Username <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="username" name='username' class="form-control col-md-7 col-xs-12" value="<?php echo $user->name;?>">
                              </div>
                            </div>
                             <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Nama SKPD <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="nama_skpd" name='nama_skpd' class="form-control col-md-7 col-xs-12" value="<?php echo $user->nama_skpd;?>">
                              </div>
                            </div>

                             <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Pimpinan <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="pimpinan" name='pimpinan' class="form-control col-md-7 col-xs-12" value="<?php echo $user->nama_pimpinan;?>">
                              </div>
                            </div>

                             <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> NIP Pimpinan <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="nip_kpl" name='nip_kpl' class="form-control col-md-7 col-xs-12" value="<?php echo $user->nip_kpl;?>">
                              </div>
                            </div>

                             <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Jabatan Pimpinan <span  class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="jbt_pimpinan" name='jbt_pimpinan' class="form-control col-md-7 col-xs-12" value="<?php echo $user->jbt_pimpinan;?>">
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
        function closemodal () {
          $('#modaledituser').hide();
          $('#modaleditprofile').hide();
         }

         function edit () {
          $('#modaledituser').show();
         }

         function editprofile () {
          $('#modaleditprofile').show();
         }

         function changepassword () {
          $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          formData = {
             old_password : $('#old_password').val(),
             new_password : $('#new_password').val(),
             cfm_password : $('#cfm_password').val()
            }
          console.log(formData);
          var tipe = 'POST';
          var dturl = '<?php echo site_url('profile/changepassword');?>';
        
        
          $.ajax({
            type: tipe,
            url: dturl ,
            data: formData,
            dataType: 'json',
            success: function (data) {
              console.log(data);
              $('#modaledituser').hide();
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

         function changedata () {
          $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          formData = {
             name : $('#username').val(),
             nama_skpd : $('#nama_skpd').val(),
             nama_pimpinan : $('#pimpinan').val(),
             nip_kpl : $('#nip_kpl').val(),
             jbt_pimpinan : $('#jbt_pimpinan').val(),
            }
          console.log(formData);
          var tipe = 'POST';
          var dturl = '<?php echo site_url('profile/editprofile');?>';
        
        
          $.ajax({
            type: tipe,
            url: dturl ,
            data: formData,
            dataType: 'json',
            success: function (data) {
              console.log(data);
              $('#modaleditprofile').hide();
              $('#dt_name').html(data.data.name);
              $('#dt_nama_pimpinan').html(data.data.nama_pimpinan);
              $('#dt_nip_kpl').html(data.data.nip_kpl);
              $('#dt_nama_skpd').html(data.data.nama_skpd);
              $('#dt_jbt_pimpinan').html(data.data.jbt_pimpinan);
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
              $('#dt_name').nama
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
         
       
       
        </script>
        <!-- page content -->
<?php $this->load->view('template\footer.php'); ?> 
<?php $this->load->view('template\script.php'); ?>

