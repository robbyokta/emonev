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
                     $start = strtotime($pengguna->mulai); 
                      $finish = strtotime($pengguna->selesai); 
                      $now = time();
                     if ($start <= $now && $now <$finish) {?>
                     <button align="right"  class=" col-md-1 col-sm-offset-11 btn btn-primary" onclick="tambah()"> Tambah </button>
                     <?php }?>
                    <div class= "col-md-10 col-sm-offset-1" align="center">
                      <table width ="80%" id="mtr_kegiatan" class="table table-striped ">
                        <thead>
                        </thead>
                        <tbody>
                        <tr>
                        <td colspan="3" align ="center"><strong> Keterangan Kegiatan </strong> </td>
                        </tr>
                        <tr>
                          <td width = "30%"> Kode Kegiatan</td><td width="2%">:</td>
                          <td><?php echo $data->kode; ?></td>
                        <tr>
                        <tr>
                          <td width = "30%"> Nama Kegiatan</td><td width="2%">:</td>
                          <td><?php echo $data->nama_keg; ?></td>
                        <tr>
                        <td colspan="3" align ="center"><strong> Anggaran Kegiatan </strong> </td>
                        </tr>
                        <?php if ($data->jenis_blj == '2'){ ?>
                        <tr>
                          <td width = "30%"> Belanja Pegawai </td><td width="2%">:</td>
                          <td><?php echo 'Rp.'.number_format($data->blj_pegawai,2); ?></td>
                        <tr>
                        <tr>
                          <td width = "30%"> Belanja Barang</td><td width="2%">:</td>
                          <td><?php echo 'Rp.'.number_format($data->blj_barang,2); ?></td>
                        <tr>
                        <tr>
                          <td width = "30%"> Belanja Modal</td><td width="2%">:</td>
                          <td><?php echo 'Rp.'.number_format($data->blj_modal,2); ?></td>
                        <tr>
                        <tr>
                          <td width = "30%"> Total</td><td width="2%">:</td>
                          <td><?php echo 'Rp.'.number_format(($data->blj_modal+$data->blj_barang+$data->blj_pegawai),2); ?></td>
                        <tr>
                        <?php } else  {?>
                        <tr>
                          <td width = "30%"> Anggaran </td><td width="2%">:</td>
                          <td><?php echo 'Rp.'.number_format($data->blj_pegawai,2); ?></td>
                        <tr>
                        <?php } ?>
                        </tbody>
                      </table>
                  </div>

                    <div class= "col-md-12 col-sm-offset-0" align="center">
                      <table width ="100%" id="rl_kegiatan" class="data table table-striped table-bordered ">
                        <thead>
                        <?php if (($data->jenis_blj == "2")) { ?>
                        <tr>
                          <th rowspan = "2"  width = "10%">Bulan </th>
                          <th rowspan = "2"  width = "14%">Realisasi Fisik </th>
                          <th  width = "45%" colspan="3" >Realisasi Keuangan</th>
                          <th rowspan = "2" width = "15%">Total</th>
                          <th rowspan = "2" width = "8%"> Action </th>
                        </tr>
                        <tr>
                          <th> Belanja Pegawai</th>
                          <th> Belanja Barang</th>
                          <th> Belanja Modal</th>
                        </tr>

                        <?php }else { ?>
                        <tr>
                          <th  width = "25%">Bulan </th>
                          <th  width = "25%">Realisasi Fisik </th>
                          <th  width = "25%"  >Realisasi Keuangan</th>
                          <th  width = "25"> Action </th>
                        </tr>

                        <?php }?>
                        
                      </thead>
                      <tbody>
                      </tbody>
                        </thead>
                        <tbody>
                       
                        </tbody>
                      </table>
                    </tr>
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
                          <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                           <form action="javascript:simpan()" id="detail">
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Bulan <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text"  value ="<?php echo $pengguna->bulan_aktif; ?>" disabled="true" class="form-control col-md-7 col-xs-12">
                                <input type="hidden" id="bulan_aktif" name="bulan_aktif" value ="<?php echo $pengguna->bulan_aktif; ?>" disabled="true" class="form-control col-md-7 col-xs-12">
                              </div>
                                <input type="hidden" id="id_keg" name="id_keg" value ="<?php echo $id; ?>" class="form-control col-md-7 col-xs-12">
                                <input type="hidden" id="id" name="id" class="form-control col-md-7 col-xs-12">
                                
                            </div>
                            <div class="form-group col-md-12"  align="center">
                                <label> Bulan Lalu</label> 
                                <br/>
                               <div class="form-group col-md-8 col-sm-offset-2" >
                                <div class="col-md-6 col-sm-6 col-xs-12"> <h6 align="center"><label >Fisik</label></h6>
                                <input type="text"  required="required" class="form-control col-md-7 col-xs-12 fisik" value="<?php echo $target->fisik; ?>" disabled>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12"> <h6 align="center"><label >Keuangan</label></h6>
                                <input type="text"  required="required" class="form-control col-md-7 col-xs-12 fisik " value="<?php echo $target->keu; ?>" disabled>
                              </div>
                             </div>
                            
                              
                              
                            </div>
                             <input type="hidden" id="tahun" name="tahun" value ="2018"  class="form-control col-md-7 col-xs-12">
                             
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Realisasi Fisik <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="rl_fisik" name='rl_fisik'  required="required" class="form-control col-md-7 col-xs-12 fisik">
                              </div>
                            </div>
                            

                        <?php if ($data->jenis_blj == '2'){ ?>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Realisasi Keuangan <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="keu" name='keu'  required="required" class="form-control col-md-7 col-xs-12 currency" disabled>
                              </div>
                            </div>
                            <div class="form-group col-md-7 col-sm-offset-3" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Belanja Pegawai <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="blj_pegawai" name='blj_pegawai'  required="required" class="form-control col-md-7 col-xs-12 currency  keu">
                              </div>
                            </div>

                            <div class="form-group col-md-7 col-sm-offset-3" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Belanja Barang <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="blj_barang" name='blj_barang'  required="required" class="form-control col-md-7 col-xs-12 currency  keu">
                              </div>
                            </div>

                             <div class="form-group col-md-7 col-sm-offset-3" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Belanja Modal <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="blj_modal" name='blj_modal'  required="required" class="form-control col-md-7 col-xs-12 currency  keu">
                              </div>
                            </div>
                          <?php } else  {?>
                           <div class="form-group col-md-8 col-sm-offset-2" >
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Realisasi Keuangan <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="blj_pegawai" name='blj_pegawai'  required="required" class="form-control col-md-7 col-xs-12 currency  keu">
                              </div>
                            </div>


                            <div class="form-group col-md-7 col-sm-offset-3" hidden="true">
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Belanja Barang <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="blj_barang" name='blj_barang'  required="required" class="form-control col-md-7 col-xs-12 currency  keu">
                              </div>
                            </div>

                            <div class="form-group col-md-7 col-sm-offset-3" hidden="true">
                              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Belanja Modal <span class="required"></span>
                              </label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" id="blj_modal" name='blj_modal'  required="required" class="form-control col-md-7 col-xs-12 currency  keu">
                              </div>
                            </div>
                           <?php } ?>
                            <div class="form-group col-md-8 col-sm-offset-2" >
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Kendala <span class="required"></span></label>
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                <textarea id="kendala" name='kendala'  required="required" class="form-control col-md-7 col-xs-12"></textarea>
                              </div>
                            </div>
                                
                            </div>
                            <div class="modal-footer">
                              
                              <button type="submit" value = "" id ="tombol"  class="btn btn-primary"></button>
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
         var table = $('#rl_kegiatan').dataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "bPaginate": false,
                "searching" :false,
               
                "ajax": {
                "url" : '<?php echo site_url('rl_kegiatan/real_kegiatan/'.$data->id_kegiatan);?>',
                "type"  : "POST"
                },
                "columns": [

                  <?php if (($data->jenis_blj == "2")) { ?>
                        {"data": "bulan", },
                        {"data": "rl_fisik", "render" :function ( data, type, row, meta ) {
                            
                          return data+' %';
                          }
                       },
                        {"data": "rl_blj_pegawai", "render": function ( data, type, row, meta ) {
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
                        {"data": "rl_blj_barang", "render": function ( data, type, row, meta ) {
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
                        {"data": "rl_blj_modal", "render": function ( data, type, row, meta ) {
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
                          {"data": "id", "render": function ( data, type, row, meta ) {
                            var aktif = data.split("-");
                            //console.log(data);
                            var strdata = data.toString();
                            if (aktif[2] == '<?php echo $bulan_aktif;?>' ){
                          val = '<a class="btn btn-xs btn-primary"  onclick=edit("'+strdata+'") type="button">Edit</a>';
                        } else {
                          val = ' ';
                        }
                        return val;
                        } },
                        ],
                      "columnDefs": [
                     { "targets": [ 1, 6 ], "className" : "text-center"},
                     { "targets": [ 1,2, 3, 4 ,5 ], "className" : "text-right"},
                     ],

                 <?php }else { ?>
                      {"data": "bulan", },
                      {"data": "rl_fisik", "render" :function ( data, type, row, meta ) {
                            
                          return data+' %';
                          }
                       },
                      {"data": "rl_blj_pegawai", "render": function ( data, type, row, meta ) {
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

                      {"data": "id", "render": function ( data, type, row, meta ) {
                            var aktif = data.split("-");
                            //console.log(data);
                            var strdata = data.toString();
                            if (aktif[2] == '<?php echo $bulan_aktif;?>' && <?php echo $start;?> <= <?php echo $now;?> && <?php echo $now;?> <= <?php echo $finish;?> ){
                          val = '<a class="btn btn-xs btn-primary"  onclick=edit("'+strdata+'") type="button">Edit</a>';
                        } else {
                          val = ' ';
                        }
                        return val;
                        } },
                      ],
                      "columnDefs": [
                     { "targets": [ 0,1,3 ], "className" : "text-center"},
                     { "targets": [ 1,2 ], "className" : "text-right"},
                     ],
                 <?php }?>

             });
         
         function closemodal () {
          $('#modaladd').hide();
         }

         function tambah(){
           $('#tombol').html('Tambah Data');
           $('#myModalLabel').html('Tambah Data Realisasi');
          $('#modaladd').show();
          $('#tombol').val("add");
          $('#rl_fisik').val('');
          $('#blj_modal').val('');
          $('#blj_pegawai').val('');
          $('#blj_barang').val('');
          $('#keu').val('');
         }

        function simpan(){ 
          id_keg = $('#id_keg').val();
          id = $('#id').val();
          console.log(id);
          $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          formData = {
              id_keg : $('#id_keg').val().replace(/,/g, ''),
              tahun : $('#tahun').val().replace(/,/g, ''),
              bulan_aktif : $('#bulan_aktif').val().replace(/,/g, ''),
              rl_fisik : $('#rl_fisik').val().replace(/,/g, ''),
              blj_modal : $('#blj_modal').val().replace(/,/g, ''),
              blj_barang : $('#blj_barang').val().replace(/,/g, ''),
              blj_pegawai: $('#blj_pegawai').val().replace(/,/g, ''),
              kendala: $('#kendala').val(),
            }
          console.log(formData);
          state = $('#tombol').val(); 
          var tipe = 'POST';
          var dturl = '<?php echo site_url('rl_kegiatan/addrealisasi');?>';
          if (state == "edit"){
              tipe = 'POST';
             dturl = '<?php echo site_url('rl_kegiatan/editrealisasi');?>/'+id;
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

        function edit($id){
          var d = $id.toString();
           $('#myModalLabel').html('Edit Data Realisasi');

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
          var dturl ='<?php echo site_url('rl_kegiatan/editdata');?>/'+$id;
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
               $('#kendala').val(data[0].kendala);
              $('#blj_modal').val(convert(data[0].rl_blj_modal));
              $('#blj_pegawai').val(convert(data[0].rl_blj_pegawai));
              $('#blj_barang').val(convert(data[0].rl_blj_barang));
              $('#keu').val(convert(1*data[0].total));
            }
          });
        }

         $( "#detail" ).validate( {
            rules: {
              rl_fisik: {
                required: true,
                range: [0, 100], 
              },
              blj_barang : 'required'

            }

          })


         function convert( data) {
          console.log(data);
                           var rev     = parseInt(data, 10).toString().split('').reverse().join('');
                           var rev2    = '';
                            for(var i = 0; i < rev.length; i++){
                                rev2  += rev[i];
                                if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                                    rev2 += '.';
                                }
                            }
                            return rev2.split('').reverse().join('') ;
                          }

        $("#detail").on("keyup", "input.keu", function(event) {
          var totals = 0;
            var a = $('#blj_barang').val().replace(/,/g, '');
            console.log(a);
            var b = parseInt($('#blj_pegawai').val().replace(/,/g, ''));
            var c = parseInt($('#blj_modal').val().replace(/,/g, ''));
            var totals = (1 * a + b + c);
            console.log(totals);
      $("#keu").val(convert(totals));
    });

      
        </script>
        <!-- page content -->
        
<?php $this->load->view('template\footer.php'); ?> 
<?php $this->load->view('template\script.php'); ?>

