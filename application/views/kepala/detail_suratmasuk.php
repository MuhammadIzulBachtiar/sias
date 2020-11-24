<section id="basic-examples">
	<div class="row">
		<div class="col-xs-12 mt-1 mb-3">
			<h4 class="">
				Detail Surat Masuk 
			</h4>
			<p>
				Detail surat masuk dengan no surat : <?php echo $lama[0]->no_surat ?>
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
										<th style="width: 20%">Pengirim</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $lama[0]->pengirim ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Perihal</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $lama[0]->perihal ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Tanggal Masuk</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $lama[0]->tgl_masuk ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Ditujukan</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $lama[0]->ditujukan ?></span></th>
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
										<th style="width: 20%">Scan surat</th>
										<th  style="width: 5%">:</th>
										<th><a href="#" data-toggle="modal" data-target="#foto" style="font-weight: bold;"><?php echo $lama[0]->foto ?></a><a class="btn btn-outline-primary" style="margin-left: 10px;" data-toggle="tooltip" href="<?php echo base_url('upload/masuk/'.$lama[0]->foto) ?>" download title="Download"><i class="fa fa-download"></i></a></th>
									</tr>
								</table>
								<a href="<?php echo base_url('kepala/suratmasuk') ?>" class="btn btn-outline-danger">Kembali</a>
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
				<h4 class="modal-title" id="myModalLabel1">update surat masuk</h4>
			</div>
			<form method="post" action="<?php echo base_url('kepala/updatemasuk/'.$lama[0]->id_smasuk) ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">No Surat</label>
										<input type="text" value="<?php echo $lama[0]->no_surat ?>" id="no_surat" onkeyup="carinosurat()" class="form-control" required="" autocomplete="off" name="no_surat">
										<small id="msgsurat" class="btn-danger hide">No surat telah digunakan sebelumnya</small>
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
								<label for="timesheetinput1">Tanggal Masuk</label>
								<div class="position-relative has-icon-right">
									<input value="<?php echo $lama[0]->tgl_masuk ?>" type="text"autocomplete="off" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="tgl_masuk" required="">
									<div class="form-control-position">
										<i class="icon-android-calendar" style="font-size: 2em;margin-top: 5px;position: absolute;right: 0px"></i>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Pengirim</label>
										<input value="<?php echo $lama[0]->pengirim ?>" type="text" class="form-control" autocomplete="off" required="" name="pengirim">
									</div>	
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Ditujukan</label>
										<input value="<?php echo $lama[0]->ditujukan?>" type="text" class="form-control" autocomplete="off" required="" name="ditujukan">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="">Isi Surat</label>
								<textarea name="isi" required="" id="" style="resize: none;height: 150px;" class="form-control"><?php echo $lama[0]->isi ?></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Keterangan Surat</label>
								<textarea name="keterangan" required="" id="" style="resize: none;height: 150px;" class="form-control"><?php echo $lama[0]->keterangan ?></textarea>
							</div>
							<div class="form-group">
								<label for="">Scan Foto</label>
								<input type="file" data-default-file="<?php echo base_url('upload/masuk/'.$lama[0]->foto) ?>" class="dropify" name="foto">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" id="btnsubmit" class="btn btn-outline-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>	

<div class="modal fade text-xs-left" id="foto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form method="post" action="<?php echo base_url('kepala/addmasuk') ?>" enctype="multipart/form-data">
				<div class="modal-body" style="background: url(<?php echo base_url('upload/masuk/'.$lama[0]->foto) ?>);height: 450px;width: 100%;background-size: cover;">
					<iframe id="gambar" style="display: none;"></iframe>
				</div>
			</form>
		</div>
	</div>
</div>


<script>
	function carinosurat() {
		if ($("#no_surat").val()!=='') {
			$.ajax({
				type: "GET",
				url: "<?php echo base_url('kepala/carinosurat/') ?>"+$("#no_surat").val(),
				success: function (data) {
					var dataa = data;
					if (dataa==1) {
						$("#btnsubmit").prop('disabled',true);
						$("#msgsurat").removeClass('hide');
					}else{
						$("#btnsubmit").prop('disabled',false);
						$("#msgsurat").addClass('hide');
					}
				}
			}); 
		}else{
			$("#msgsurat").addClass('hide');
			$("#btnsubmit").prop('disabled',false);
		}
	}

</script>