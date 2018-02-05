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
                  <table id="mtr_program" class="data" width="100%">
                      <thead>
                        <tr>
                          <th style="text-align:  center;" rowspan = "2" width = "15%">SKPD</th>
                          <th style="text-align:  center;" rowspan = "2"  width = "25%">Nama Program</th>
                          <th style="text-align:  center;" colspan="3" >Anggaran</th>
                          <th style="text-align:  center;" rowspan = "2" width = "15%">Total</th>
                        </tr>
                        <tr>
                        <th style="text-align:  center;"> Belanja Pegawai</th>
                        <th style="text-align:  center;"> Belanja Barang</th>
                        <th style="text-align:  center;"> Belanja Modal</th>
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

       <?php $this->load->view('template\datatablescript.php'); ?> 
        <script>
          var save_method; 
            table = $('#mtr_program');
            $('#mtr_program').dataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
               
                "ajax": {
                "url" : '<?php echo site_url('mtr_program/data_mtr_program');?>',
                "type"  : "POST"
                },
                "columns": [
                        {"data": "skpd", },
                        {"data": "nama_program", },
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
                    ],
 

                 "columnDefs": [
                 { "targets": [ 2, 3, 4 ,5 ], "className" : "text-right"},

     ]
             
              
            });
        
        </script>
        <!-- page content -->
<?php $this->load->view('template\footer.php'); ?> 
<?php $this->load->view('template\script.php'); ?>

