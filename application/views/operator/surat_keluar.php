<section id="basic-examples">
	<div class="row">
		<div class="col-xs-12 mt-1 mb-3">
			<h3 class="">
				<b>Surat keluar</b>
			</h3>
		
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
						<br>
						<button class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah</button>
						<div class="table-responsive m-t-40" style="margin-bottom: 15px;">
							<table cellspacing="0" class="display nowrap table table-hover table-bordered tableku" style="width: 100%">
								<thead>
									<tr style="font-weight: bold;">
										<th width="50px">
										<span style="font-size: small;">No</span>
										</th>
										<th>
										<span style="font-size: small;">Tanggal Catat</span>
										</th>
										<th>
										<span style="font-size: small;">No Surat</span>
										</th>
										<th>
										<span style="font-size: small;">Perihal</span>
										</th>
										<th>
										<span style="font-size: small;">Tanggal Surat</span>
										</th>
										<th>
										<span style="font-size: small;">Ditujukan</span>
										</th>
										<th>
										<span style="font-size: small;">Keterangan</span>
										</th>
										<th class="text-center">
										<span style="font-size: small;">Aksi</span>
										</th>
									</tr>
								</thead>
								<tbody id="isi">
									<?php $no = 0; foreach ($keluar->result() as $key): $no++;?>
									<tr>
										<td><span style="font-size: small;"><?php echo $no ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->tgl_catat ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->no_surat ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->perihal ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->tgl_keluar ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->ditujukan?></span></td>
										<td><span style="font-size: small;"><?php echo $key->keterangan?></span></td>
										<td>
											<button class="btn btn-success btn-sm " style="margin:5px" data-toggle="modal" data-target="#update<?php echo $key->id_skeluar ?>">Edit</button>
											<a href="<?php echo base_url('operator/detailsuratkeluar/'.$key->id_skeluar) ?>" class="btn btn-primary btn-sm " style="margin:5px">Detail</a>
											<a href="<?php echo base_url('operator/delkeluar/'.$key->id_skeluar) ?>" class="btn btn-danger btn-sm " style="margin:5px" onclick="return confirm('Hapus surat masuk?')">Hapus</a>
										</td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>

	<!-- edit surat keluar -->
	<?php foreach ($keluar->result() as $e): ?>
	<div class="modal fade text-xs-left" id="update<?php echo $e->id_skeluar ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3 class="modal-title" id="myModalLabel1"><b>Edit Surat Keluar</b></h3>
				</div>
				<form method="post" action="<?php echo base_url('operator/updatekeluar/'.$e->id_skeluar) ?>" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="">No Surat</label>
											<input type="text" value="<?php echo $e->no_surat ?>" id="no_surat<?php echo $e->id_skeluar ?>" onkeyup="carinosurat2(<?php echo $e->id_skeluar ?>)" class="form-control" required="" autocomplete="off" name="no_surat">
											<small id="msgsurat<?php echo $e->id_skeluar ?>" class="btn-danger hide">No surat telah digunakan sebelumnya</small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Kategori</label>
											<select name="kategori" class="form-control">
												<option <?php if($e->kategori=="") echo "selected"; ?> value="">----</option>
												<option <?php if($e->kategori=="Undangan") echo "selected"; ?> value="Undangan">Undangan</option>
												<option <?php if($e->kategori=="Permohonan") echo "selected"; ?> value="Permohonan">Permohonan</option>
												<option <?php if($e->kategori=="Laporan") echo "selected"; ?> value="Laporan">Laporan</option>
												<option <?php if($e->kategori=="Pemberitahuan") echo "selected"; ?> value="Pemberitahuan">Pemberitahuan</option>
												<option <?php if($e->kategori=="Himbauan") echo "selected"; ?> value="Himbauan">Himbauan</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="timesheetinput1">Tanggal Catat</label>
											<div class="position-relative has-icon-right">
												<input value="<?php echo $e->tgl_catat ?>" type="text"autocomplete="off" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="tgl_catat" required="">
												<div class="form-control-position">
													<i class="icon-android-calendar" style="font-size: 2em;margin-top: 5px;position: absolute;right: 0px"></i>
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="timesheetinput1">Tanggal Surat</label>
											<div class="position-relative has-icon-right">
												<input value="<?php echo $e->tgl_keluar ?>" type="text"autocomplete="off" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="tgl_keluar" required="">
												<div class="form-control-position">
													<i class="icon-android-calendar" style="font-size: 2em;margin-top: 5px;position: absolute;right: 0px"></i>
												</div>
											</div>
										</div>
									</div>
								</div>

							<div class="form-group">
								<label for="">Ditujukan</label>
								<input type="text" value="<?php echo $e->ditujukan ?>" class="form-control" required="" autocomplete="off" name="ditujukan">
							</div>

							<div class="form-group">
								<label for="">Perihal</label>
								<textarea value="<?php echo $e->perihal ?>" style="resize: none;height: 130px;" type="text" class="form-control" autocomplete="off" required="" name="perihal"></textarea>
							</div>										
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="">Keterangan Surat</label>
								<textarea name="keterangan" style="resize: none;height: 150px;" class="form-control"><?php echo $e->keterangan ?></textarea>
							</div>
							<div class="form-group">
								<label for="">Scan Foto</label>
								<input type="file" data-default-file="<?php echo base_url('upload/keluar/'.$e->foto) ?>" class="dropify" name="foto">
							</div>
						</div>
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" id="btnsubmit<?php echo $e->id_skeluar ?>" class="btn btn-primary">Simpan</button>
				</div>
				</form>
			</div>
		</div>
	</div>	
	<?php endforeach ?>

<!-- tambah surat keluar -->
<div class="modal fade text-xs-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="myModalLabel1"><b>Tambah surat keluar</b></h3>
			</div>
			<form method="post" action="<?php echo base_url('operator/addkeluar') ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">No Surat</label>
										<input type="text"  id="no_surat" onkeyup="carinosurat()" class="form-control" required="" autocomplete="off" name="no_surat">
										<small id="msgsurat" class="btn-danger hide">No surat telah digunakan sebelumnya</small>
									</div>
								</div>
								<div class="col-md-6">
								<div class="form-group">
										<label for="">Kategori</label>
										<select name="kategori" class="form-control">
												<option value="">----</option>
												<option value="Undangan">Undangan</option>
												<option value="Permohonan">Permohonan</option>
												<option value="Laporan">Laporan</option>
												<option value="Pemberitahuan">Pemberitahuan</option>
												<option value="Himbauan">Himbauan</option>
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="timesheetinput1">Tanggal Catat</label>
										<div class="position-relative has-icon-right">
											<input type="text"autocomplete="off" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="tgl_catat" required="">
											<div class="form-control-position">
												<i class="icon-android-calendar" style="font-size: 2em;margin-top: 5px;position: absolute;right: 0px"></i>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="timesheetinput1">Tanggal Surat</label>
										<div class="position-relative has-icon-right">
											<input type="text"autocomplete="off" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="tgl_keluar" required="">
											<div class="form-control-position">
												<i class="icon-android-calendar" style="font-size: 2em;margin-top: 5px;position: absolute;right: 0px"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
								
							<div class="form-group">
									<label for="">Ditujukan</label>
									<input type="text" class="form-control" required="" autocomplete="off" name="ditujukan">				
							</div>
	 								
							<div class="form-group">
								<label for="">Perihal</label>
								<textarea style="resize: none;height: 130px;" type="text" class="form-control" autocomplete="off" required="" name="perihal"></textarea>
							</div>	
						</div>
					
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Keterangan Surat</label>
								<textarea name="keterangan"  style="resize: none;height: 150px;" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for="">Scan Surat</label>
								<input type="file" class="dropify"  name="foto">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" id="btnsubmit" class="btn btn-primary">Simpan</button>
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
				url: "<?php echo base_url('operator/carinosurat_keluar/') ?>"+$("#no_surat").val(),
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

	function carinosurat2(id) {
		if ($("#no_surat"+id.toString()).val()!=='') {
			$.ajax({
				type: "GET",
				url: "<?php echo base_url('operator/carinosurat_keluar/') ?>"+$("#no_surat"+id.toString()).val(),
				success: function (data) {
					var dataa = data;
					if (dataa==1) {
						$("#btnsubmit"+id.toString()).prop('disabled',true);
						$("#msgsurat"+id.toString()).removeClass('hide');
					}else{
						$("#btnsubmit"+id.toString()).prop('disabled',false);
						$("#msgsurat"+id.toString()).addClass('hide');
					}
				}
			}); 
		}else{
			$("#msgsurat"+id.toString()).addClass('hide');
			$("#btnsubmit"+id.toString()).prop('disabled',false);
		}
	}

</script>
