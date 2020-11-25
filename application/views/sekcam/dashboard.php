<?php 
$admin = $this->db->where('id_pegawai',$this->session->userdata('sekcam'))->get('pegawai')->result();

?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css') ?>">
      <div class="content-body">
        <div class="row">
    
      <div class="alert alert-warning alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times; &nbsp;</span>
         </button>
         <strong>Selamat datang,<?php echo $admin[0]->nama ?></strong>
         <br>
         <strong>Jabatan Anda Sekarang,<?php echo $admin[0]->jabatan ?></strong>
       </div>
     </div>
      <hr>
          <div class="col-xl-6 col-lg-6 col-xs-12">
            <div class="card">
              <div class="card-body">
                <div class="card-block">
                  <div class="media">
                    <div class="media-body text-xs-left">
                      <h3 class="info"><?php echo $this->db->get('masuk')->num_rows() ?></h3>
                      <span>Surat Masuk</span>
                    </div>
                    <div class="media-right media-middle">
                      <i class="icon-email info font-large-2 float-xs-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-xs-12">
            <div class="card">
              <div class="card-body">
                <div class="card-block">
                  <div class="media">
                    <div class="media-body text-xs-left">
                      <h3 class="teal"><?php echo $this->db->get('keluar')->num_rows() ?></h3>
                      <span>Surat Keluar</span>
                    </div>
                    <div class="media-right media-middle">
                      <i class="icon-android-drafts teal font-large-2 float-xs-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12"></div>
          
        </div>
      </div>
        <div class="col-xs-6">
            <div class="card">
              <div class="card-body">
                <div class="card-block">
                  <h4>Grafik Kategori Surat Masuk</h4>
                  <hr>
                  <canvas id="myChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="card">
              <div class="card-body">
                <div class="card-block">
                  <h4>Grafik Kategori Surat Keluar</h4>
                  <hr>
                  <canvas id="keluar"></canvas>
                </div>
              </div>
            </div>
          </div>
      