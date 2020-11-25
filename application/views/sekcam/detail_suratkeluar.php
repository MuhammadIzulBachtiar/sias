<section id="basic-examples">
	<div class="row">
		<div class="col-xs-12 mt-1 mb-3">
			<h4 class="">
				Detail Surat Keluar
			</h4>
			<p>
				Detail surat keluar dengan no surat : <?php echo $lama[0]->no_surat ?>
			</p>
			<hr>
		</div>
		<div class="col-xs-12">
			<?php 
			if ($this->session->flashdata('error')!==null) {
				?>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $this->session->flashdata('error') ?>
				</div>
				<?php
			}

			if ($this->session->flashdata('success')!==null) {
				?>
				<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $this->session->flashdata('success') ?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<br>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css') ?>">
	<div class="row" style="margin-top: -30px;">
		<div class="col-12">
			<div class="card">
				<div class="container">
					<div class="card-body">
						<div class="col-md-12" style="padding-bottom: 20px;">
							<div class="table-responsive">
								<table class="display nowrap table  table-striped table-bordered">
									<tr>
										<th style="width: 20%">No Surat</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $lama[0]->no_surat ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Kode Surat</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $lama[0]->kode_surat ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Ditujukan</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $lama[0]->ditujukan ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Perihal</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $lama[0]->perihal ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Tanggal Keluar</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $lama[0]->tgl_keluar ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Kategori</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $lama[0]->kategori ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Keterangan</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $lama[0]->keterangan ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Scan Surat</th>
										<th  style="width: 5%">:</th>
										<th><a href="#" data-toggle="modal" data-target="#foto" style="font-weight: bold;"><?php echo $lama[0]->foto ?></a><a class="btn btn-outline-primary" style="margin-left: 10px;" data-toggle="tooltip" href="<?php echo base_url('upload/keluar/'.$lama[0]->foto) ?>" download title="Download"><i class="fa fa-download"></i></a></th>
									</tr>
								</table>
								<a href="<?php echo base_url('sekcam/suratkeluar') ?>" class="btn btn-outline-danger">Kembali</a>
								<br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

