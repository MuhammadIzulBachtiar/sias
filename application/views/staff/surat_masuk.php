<section id="basic-examples">
	<div class="row">
		<div class="col-xs-12 mt-1 mb-3">
		<h3 class="">
				<b>Surat masuk</b>
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
										<span style="font-size: small;">Tanggal Surat</span>
										</th>
										<th>
										<span style="font-size: small;">Perihal</span>
										</th>
										<th>
										<span style="font-size: small;">Pengirim</span>
										</th>
										<th>
										<span style="font-size: small;">Ditujukan</span>
										</th>
										<th class="text-center">
										<span style="font-size: small;">Aksi</span>
										</th>
									</tr>
								</thead>
								<tbody id="isi">
								<?php $no = 0; foreach ($masuk->result() as $key): $no++;?>
									<tr>
										<td><span style="font-size: small;"><?php echo $no ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->tgl_masuk ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->no_surat ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->tgl_surat ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->perihal ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->pengirim ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->ditujukan ?></span></td>
										<td>
											<button class="btn btn-success btn-sm " style="margin:5px" data-toggle="modal" data-target="#update<?php echo $key->id_smasuk ?>">Edit</button>
											<a href="<?php echo base_url('staff/detailsuratmasuk/'.$key->id_smasuk) ?>" class="btn btn-primary btn-sm " style="margin:5px">Detail</a>
											<!-- <a href="<?php echo base_url('staff/laman_disposisi/'.$key->id_smasuk) ?>" class="btn btn-green btn-sm " style="margin:5px">Disposisi</a>-->
											<a href="<?php echo base_url('staff/delmasuk/'.$key->id_smasuk) ?>" class="btn btn-danger btn-sm " style="margin:5px" onclick="return confirm('Hapus surat masuk?')">Hapus</a>											
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

<!-- edit surat -->
<?php foreach ($masuk->result() as $e): ?>
<div class="modal fade text-xs-left" id="update<?php echo $e->id_smasuk ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="myModalLabel1"><b>Update Surat Masuk</b></h3>
			</div>
			<form method="post" action="<?php echo base_url('staff/updatemasuk/'.$e->id_smasuk) ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">No Surat</label>
										<input type="text" value="<?php echo $e->no_surat ?>" id="no_surat<?php echo $e->id_smasuk ?>" onkeyup="carinosurat2(<?php echo $e->id_smasuk ?>)" class="form-control" required="" autocomplete="off" name="no_surat">
										<small id="msgsurat<?php echo $e->id_smasuk ?>" class="btn-danger hide">No surat telah digunakan sebelumnya</small>
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
										<input value="<?php echo $e->tgl_masuk ?>" type="text"autocomplete="off" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="tgl_masuk" required="">
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
										<input value="<?php echo $e->tgl_surat ?>" type="text"autocomplete="off" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="tgl_surat" required="">
										<div class="form-control-position">
											<i class="icon-android-calendar" style="font-size: 2em;margin-top: 5px;position: absolute;right: 0px"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
							
								
						<div class="form-group">
							<label for="">Pengirim</label>
							<input value="<?php echo $e->pengirim ?>" type="text" class="form-control" autocomplete="off" required="" name="pengirim">
						</div>	
								
								
						<div class="form-group">
							<label for="">Ditujukan</label>
								<select name="ditujukan" class="form-control">
									<option value="">----</option>
									<option <?php if($e->ditujukan=="Kepala BPKD") echo "selected"; ?> value="Kepala BPKD">Kepala BPKD</option>
									<option <?php if($e->ditujukan=="Sekretaris") echo "selected"; ?> value="Sekretaris">Sekretaris</option>
									<option <?php if($e->ditujukan=="Kabid Perencanaan & Penetapan") echo "selected"; ?> value="Kabid Perencanaan & Penetapan">Kabid Perencanaan & Penetapan</option>
									<option <?php if($e->ditujukan=="Kabid Pelayanan & Penagihan") echo "selected"; ?> value="Kabid Pelayanan & Penagihan">Kabid Pelayanan & Penagihan</option>
									<option <?php if($e->ditujukan=="Kabid Anggaran & Perbendaharaan") echo "selected"; ?> value="Kabid Anggaran & Perbendaharaan">Kabid Anggaran & Perbendaharaan</option>
									<option <?php if($e->ditujukan=="Kabid Akutansi & Pembukuan") echo "selected"; ?> value="Kabid Akutansi & Pembukuan">Kabid Akutansi & Pembukuan</option>
									<option <?php if($e->ditujukan=="Kabid Aset") echo "selected"; ?> value="Kabid Aset">Kabid Aset</option>										
								</select>
							</div>

							<div class="form-group">
								<label for="">Perihal</label>
								<textarea name="perihal" required="" id="" class="form-control"><?php echo $e->perihal ?></textarea>
							</div>

							</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Keterangan</label>
										<textarea name="Keterangan" style="resize: none;height: 150px;" class="form-control"><?php echo $e->Keterangan ?></textarea>
									</div>

									<div class="form-group">
										<label for="">Scan Surat</label>
										<input type="file" data-default-file="<?php echo base_url('upload/masuk/'.$e->foto) ?>" class="dropify" name="foto">
										<label><h6>type file : gif, jpg, png, jpeg, pdf, doc, docx</h6></label>
									</div>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Tutup</button>
							<button type="submit" id="btnsubmit<?php echo $e->id_smasuk ?>" class="btn btn-primary">Simpan</button>
						</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach ?>

<!-- tambah surat -->
<div class="modal fade text-xs-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel1">Tambah surat masuk</h4>
			</div>
			<form method="post" action="<?php echo base_url('staff/addmasuk') ?>" enctype="multipart/form-data">
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
											<input type="text"autocomplete="off" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="tgl_masuk" required="">
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
											<input type="text"autocomplete="off" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="tgl_surat" required="">
											<div class="form-control-position">
												<i class="icon-android-calendar" style="font-size: 2em;margin-top: 5px;position: absolute;right: 0px"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
															
							<div class="form-group">
								<label for="">Pengirim</label>
								<input type="text" class="form-control" autocomplete="off" required="" name="pengirim">
							</div>	
															
							<div class="form-group">
								<label for="">Ditujukan</label>
								<select name="ditujukan"  class="form-control">
									<option value="">----</option>
									<option value="Kepala BPKD">Kepala BPKD</option>
									<option value="Sekretaris">Sekretaris</option>
									<option value="Kabid Perencanaan & Penetapan">Kabid Perencanaan & Penetapan</option>
									<option value="Kabid Pelayanan & Penagihan">Kabid Pelayanan & Penagihan</option>
									<option value="Kabid Anggaran & Perbendaharaan">Kabid Anggaran & Perbendaharaan</option>
									<option value="Kabid Akutansi & Pembukuan">Kabid Akutansi & Pembukuan</option>
									<option value="Kabid Aset">Kabid Aset</option>
								</select>			
							</div>

							<div class="form-group">
								<label for="">Perihal</label>
								<textarea name="perihal"  class="form-control"></textarea>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="">Keterangan</label>
								<textarea name="perihal" style="resize: none;height: 150px;" class="form-control"></textarea>
							</div>

							<div class="form-group">
								<label for="">Scan Surat</label>
								<input type="file" class="dropify" name="foto">
								<label><h6>type file : gif, jpg, png, jpeg, pdf, doc, docx</h6></label>
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
				url: "<?php echo base_url('kasubag/carinosurat/') ?>"+$("#no_surat").val(),
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
				url: "<?php echo base_url('kasubag/carinosurat/') ?>"+$("#no_surat"+id.toString()).val(),
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
			$("#msgsurat"+id_smasuk.toString()).addClass('hide');
			$("#btnsubmit"+id_smasuk.toString()).prop('disabled',false);
		}
	}

</script>