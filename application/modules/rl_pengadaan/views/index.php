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
                  <table id="rl_pengadaan" class="data" width="100%">
                      <thead>
                        <tr>
                          <th style="text-align:  center;" width = "10%">Kode pengadaan</th>
                          <th style="text-align:  center;" width = "25%">Nama pengadaan</th>
                          <th style="text-align:  center;" width = "15%">Total</th>
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

       <?php $this->load->view('template\datatablescript.php'); ?> 
        <script>
          var save_method; 
            table = $('#rl_pengadaan');
            $('#rl_pengadaan').dataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
               
                "ajax": {
                "url" : '<?php echo site_url('rl_pengadaan/data_rl_pengadaan');?>',
                "type"  : "POST"
                },
                "columns": [
                        {"data": "kode", },
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
                          return '<a class="btn btn-xs btn-primary" href="<?php echo site_url('rl_pengadaan/detail');?>/'+data+'" type="button">Detail</a>'
                        } },
                    ],
                 "columnDefs": [
                 { "targets": 0, "orderable": false,  },
                 { "targets": [ 2], "className" : "text-right"},
                  { "targets": [0, 3], "className" : "text-center"},
                 ]

                 
            });
        
        </script>
        <!-- page content -->
<?php $this->load->view('template\footer.php'); ?> 
<?php $this->load->view('template\script.php'); ?>

