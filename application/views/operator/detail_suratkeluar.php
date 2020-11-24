<section id="basic-examples">
	<div class="row">
		<div class="col-xs-12 mt-1 mb-3">
			<h4 class="">
				Detail Surat keluar
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
										<th style="width: 20%">Scan Foto</th>
										<th  style="width: 5%">:</th>
										<th><a href="#" data-toggle="modal" data-target="#foto" style="font-weight: bold;"><?php echo $lama[0]->foto ?></a><a class="btn btn-outline-primary" style="margin-left: 10px;" data-toggle="tooltip" href="<?php echo base_url('upload/keluar/'.$lama[0]->foto) ?>" download title="Download"><i class="fa fa-download"></i></a></th>
									</tr>
								</table>
								<button class="btn btn-outline-primary" data-toggle="modal" data-target="#update">Edit</button>
								<a href="<?php echo base_url('operator/suratkeluar') ?>" class="btn btn-outline-danger">Kembali</a>
								<br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade text-xs-left" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel1">update surat keluar</h4>
				</div>
				<form method="post" action="<?php echo base_url('operator/updatekeluar/'.$lama[0]->id_skeluar) ?>" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="">No Surat</label>
											<input type="text" value="<?php echo $lama[0]->no_surat ?>" id="no_surat<?php echo $lama[0]->id_skeluar ?>" onkeyup="carinosurat2(<?php echo $lama[0]->id_skeluar ?>)" class="form-control" required="" autocomplete="off" name="no_surat">
											<small id="msgsurat<?php echo $lama[0]->id_skeluar ?>" class="btn-danger hide">No surat telah digunakan sebelumnya</small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Kode Surat</label>
											<input type="text" value="<?php echo $lama[0]->kode_surat ?>" class="form-control" required="" autocomplete="off" name="kode_surat">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="timesheetinput1">Tanggal keluar</label>
									<div class="position-relative has-icon-right">
										<input value="<?php echo $lama[0]->tgl_keluar ?>" type="text"autocomplete="off" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="tgl_keluar" required="">
										<div class="form-control-position">
											<i class="icon-android-calendar" style="font-size: 2em;margin-top: 5px;position: absolute;right: 0px"></i>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Ditujukan</label>
											<input value="<?php echo $lama[0]->ditujukan ?>" type="text" class="form-control" autocomplete="off" required="" name="ditujukan">
										</div>	
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Perihal</label>
											<input value="<?php echo $lama[0]->perihal ?>" type="text" class="form-control" autocomplete="off" required="" name="perihal">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Kategori</label>
											<input value="<?php echo $lama[0]->kategori ?>" type="text" class="form-control" autocomplete="off" required="" name="kategori">
										</div>
									</div>

								</div>
							
							<div class="input-group">
								<label class="display-inline-block custom-control custom-radio ml-1">
									<input type="radio" name="status" <?php if ($lama[0]->status=="Proses"): ?>
										checked=""
									<?php endif ?> value="Proses" required="" class="custom-control-input">
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description ml-0">Proses</span>
								</label>
								<label class="display-inline-block custom-control custom-radio ml-1">
									<input type="radio" name="status" <?php if ($lama[0]->status=="Selesai"): ?>
										checked=""
									<?php endif ?> value="Selesai" required="" class="custom-control-input">
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description ml-0">Selesai</span>
								</label>
								<label class="display-inline-block custom-control custom-radio">
									<input type="radio" name="status" <?php if ($lama[0]->status=="Diterima"): ?>
										checked=""
									<?php endif ?> value="Diterima" required="" class="custom-control-input">
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description ml-0">Diterima</span>
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Keterangan Surat</label>
								<textarea name="keterangan" required="" id="" style="resize: none;height: 150px;" class="form-control"><?php echo $lama[0]->keterangan ?></textarea>
							</div>
							<div class="form-group">
								<label for="">Scan Foto</label>
								<input type="file" data-default-file="<?php echo base_url('upload/keluar/'.$lama[0]->foto) ?>" class="dropify" name="foto">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" id="btnsubmit<?php echo $lama[0]->id_skeluar ?>" class="btn btn-outline-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>	
<div class="modal fade text-xs-left" id="foto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form method="post" action="<?php echo base_url('operator/addmasuk') ?>" enctype="multipart/form-data">
				<div class="modal-body" style="background: url(<?php echo base_url('upload/keluar/'.$lama[0]->foto) ?>);height: 450px;width: 100%;background-size: cover;">
					<iframe id="gambar" style="display: none;"></iframe>
				</div>
			</form>
		</div>
	</div>
</div>