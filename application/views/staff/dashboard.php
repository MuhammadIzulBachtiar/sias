<?php 
$admin = $this->db->where('id_pegawai',$this->session->userdata('staff'))->get('pegawai')->result();
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
    
    <div class="col-xl-4 col-lg-4 col-xs-12">
      <div class="card">
        <div class="card-body">
          <div class="card-block">
            <div class="media">
              <div class="media-body text-xs-left">
                <h3 class="info"><?php echo $this->db->get('masuk')->num_rows() ?></h3>
                  <span>Surat Masuk</span>
              </div>
              <div class="media-right media-middle">
                <i class="icon-inbox info font-large-2 float-xs-right"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-xs-12">
      <div class="card">
        <div class="card-body">
          <div class="card-block">
            <div class="media">
              <div class="media-body text-xs-left">
                <h3 class="success"><?php echo $this->db->get('keluar')->num_rows() ?></h3>
                  <span>Surat Keluar</span>
              </div>
              <div class="media-right media-middle">
                <i class="fa fa-share success font-large-2 float-xs-right"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-xs-12">
      <div class="card">
        <div class="card-body">
          <div class="card-block">
            <div class="media">
              <div class="media-body text-xs-left">
                <h3 class="indigo"><?php echo $this->db->get('disposisi')->num_rows() ?></h3>
                  <span>Disposisi</span>
              </div>
              <div class="media-right media-middle">
                <i class="fa fa-envelope-open indigo font-large-2 float-xs-right"></i>
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