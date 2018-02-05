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
                     <h2>Rekapitulasi Bulanan <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> 
                      
                    </ul>
                   
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                    <form target="_blank" action="<?php echo site_url('rekap/lihatrekap');?>" method="POST">
                    <?php if ($pengguna->role == '1'){ ?>
                      <div class="form-group col-md-8 col-sm-offset-2" >
                          <label class="control-label col-md-4 col-sm-3 col-xs-12"  for="first-name">Pilih SKPD <span class="required"></span></label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                              <select type="text" id="skpd" name='skpd'   class="chosen-select col-md-7 col-xs-12">
                                <?php foreach ($skpd->result() as $row_agama) {  
                                  echo "<option value='".$row_agama->id_skpd."'>".$row_agama->nama_skpd."</option>";}?>
                              </select>
                            </div>
                      </div>
                    <?php } else { ?>
                      <input type="hidden" id="skpd" name="skpd" value ="<?php echo $pengguna->id_skpd; ?>"  class="form-control col-md-7 col-xs-12">
                    <?php } ?>
                      <div class="form-group col-md-8 col-sm-offset-2" >
                          <label class="control-label col-md-4 col-sm-3 col-xs-12"  for="first-name">Jenis Rekap <span class="required"></span></label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                              <select type="jenis" id="skpd" name='jenis'   class="chosen-select col-md-7 col-xs-12">
                                <option value='1'>Belanja Langsung & Tidak Langsung</option>
                                <option value='3'>Belanja Langsung </option>
                                <option value='2'>Belanja Tidak Langsung</option>
                                <option value='4'>Belanja Modal</option>
                                <option value='5'>Pengadaan</option>
                              </select>
                            </div>
                      </div>
                      <div class="form-group col-md-8 col-sm-offset-2" >
                          <label class="control-label col-md-4 col-sm-3 col-xs-12"  for="first-name">Bulan <span class="required"></span></label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                              <select type="text" id="bulan" name='bulan'   class="chosen-select col-md-7 col-xs-12">
                                <option value='Januari'> Januari </option>
                                <option value='Februari'> Februari </option>
                                <option value='Maret'> Maret </option>
                                <option value='April'> April </option>
                                <option value='Mei'> Mei </option>
                                <option value='Juni'> Juni </option>
                                <option value='Juli'> Juli </option>
                                <option value='Agustus'> Agustus </option>
                                <option value='September'> September </option>
                                <option value='Oktober'> Oktober </option>
                                <option value='November'> November </option>
                                <option value='Desember'> Desemeber </option>
                              </select>
                            </div>
                      </div>

                      <div class="form-group col-md-8 col-sm-offset-9" >
                        <button type="submit" value = "" id ="tombol"  class="btn btn-primary"> Simpan</button>
                      </div>
                      </form>
                        

                       
                    </div>
                  </div>
                </div>
              </div>
            </div>

          
            
          </div>
        </div>

                  



       <?php $this->load->view('template\datatablescript.php'); ?> 
        <script>

         $(".chosen-select").chosen({
          width: "100%"
          });


         
        </script>
        <!-- page content -->
<?php $this->load->view('template\footer.php'); ?> 
<?php $this->load->view('template\script.php'); ?>

