
<section id="basic-examples">
	<div class="row">
		<div class="col-xs-12 mt-1 mb-3">
			<h4 class="">
				Kelola Pegawai
			</h4>
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
	</div>
	<br>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css') ?>">
	<div class="row" style="margin-top: -30px;">
		<div class="col-12">
			<div class="card">
				<div class="container">
					<div class="card-body">
						<button class="btn btn-outline-primary pull-right" data-toggle="modal" data-target="#tambah">Tambah pegawai</button>
						<div class="table-responsive m-t-40" style="margin-bottom: 15px;">
							<table cellspacing="0" class="display nowrap table table-hover table-striped table-bordered tableku" width="100%">
								<thead>
									<tr>
										<th>
											No
										</th>
										<th>
											Nip
										</th>
										<th>
											Nama pegawai
										</th>
										<th>
											Hak Akses
										</th>
										<th class="text-center">
											Aksi
										</th>
									</tr>
								</thead>
								<tbody id="isi">
									<?php $no = 0; foreach ($pegawai->result() as $key): $no++;?>
									<tr>
										<td><?php echo $no ?></td>
										<td><?php echo $key->nip ?></td>
										<td><?php echo $key->nama ?></td>
										<td><?php echo $key->akses ?></td>
										<td>

											<button class="btn btn-outline-success" data-toggle="modal" data-target="#update<?php echo $key->id_pegawai ?>"><i data-toggle="tooltip" title="Update pegawai" class="fa fa-edit"></i></button>
											<?php if ($key->id_pegawai != $this->session->userdata('operator')): ?>
												<a href="<?php echo base_url('operator/soft_delete/'.$key->id_pegawai) ?>" onclick="return confirm('Hapus pegawai? semua data yang berhubungan dengan pegawai ini akan terhapus!')" class="btn btn-outline-danger" data-toggle="tooltip" title="Hapus pegawai"><i class="fa fa-trash"></i></a>
											<?php endif ?>
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

<?php foreach ($pegawai->result() as $key): ?>
	<div class="modal fade text-xs-left" id="update<?php echo $key->id_pegawai ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel1">Edit pegawai</h4>
				</div>
				<form method="post" action="<?php echo base_url('operator/updatepegawai/'.$key->id_pegawai) ?>">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-grup">
									<label for="">NIP</label>
									<input type="number" class="form-control" value="<?php echo $key->nip ?>" onkeyup="carinip2(<?php echo $key->id_pegawai ?>)" id="nip<?php echo $key->id_pegawai ?>" required="" name="nip" autocomplete="off">
									<small id="msgnip<?php echo $key->id_pegawai ?>" class="btn-danger hide">Nip telah di gunakan</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Nama Lengkap</label>
									<input type="text" value="<?php echo $key->nama ?>" class="form-control" required="" name="nama" autocomplete="off"> 
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										
										<div class="form-group">
											<label for="">Hak Akses</label>
											<select name="akses" required="" class="form-control">
												<option value="">----</option>
												<option <?php if($key->akses=="Operator"){echo "selected";} ?> value="Operator">Operator</option>
												<option <?php if($key->akses=="Staff Umpeg"){echo "selected";} ?> value="Staff Umpeg">Staff Umpeg</option>
												<option <?php if($key->akses=="Kepala"){echo "selected";} ?> value="Kepala">Camat</option>
												<option <?php if($key->akses=="Sekcam"){echo "selected";} ?> value="Sekcam">Sekcam</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="ro">
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Jabatan</label>
													<input type="text" class="form-control" value="<?php echo $key->jabatan ?>" autocomplete="off" name="jabatan" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Pangkat</label>
													<input type="text" class="form-control" value="<?php echo $key->pangkat ?>" autocomplete="off" name="pangkat" required>
												</div>	
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Username</label>
													<input type="text" class="form-control" onkeyup="cariusernamepegawai2(<?php echo $key->id_pegawai ?>)" value="<?php echo $key->username ?>" required="" autocomplete="off" name="username" id="usernamebaru<?php echo $key->id_pegawai ?>">
													<label for="" class="btn-danger hide" id="msgusernamebaru<?php echo $key->id_pegawai ?>">Username telah terdaftar</label>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="timesheetinput1">Password</label>
														<input type="password" value="<?php echo $key->password ?>" required="" class="form-control" name="password">
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6" style="padding-top: 30px;">				
										<button type="submit" id="btnnip<?php echo $key->id_pegawai ?>" class="btn btn-outline-primary">Update pegawai</button>
										<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Kembali</button>
									</div>
								</div>
								<!-- </div> -->
							</div>
						</div>
					</div>
					<div class="modal-footer">
					</div>
				</form>
			</div>
		</div>
	</div>
	
<?php endforeach ?>
<div class="modal fade text-xs-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel1">Tambah pegawai</h4>
			</div>
			<form method="post" action="<?php echo base_url('operator/tambahpegawai') ?>">
				<div class="modal-body">
					<!-- <div class="col-xs-12"> -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-grup">
									<label for="">NIP</label>
									<input type="number" class="form-control" onkeyup="carinip()" id="nip" required="" name="nip" autocomplete="off">
									<small id="msgnip" class="btn-danger hide">Nip telah di gunakan</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Nama Lengkap</label>
									<input type="text" class="form-control" required="" name="nama" autocomplete="off">
								</div>
							</div>							
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										
										<div class="form-group">
											<label for="">Hak Akses</label>
											<select name="akses" required="" class="form-control">
												<option value="">----</option>
												<option value="Operator">Operator</option>
												<option value="Staff Umpeg">Staff Umpeg</option>
												<option value="Kepala">Kepala</option>
												<option value="Sekcam">Sekcam</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="ro">
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Jabatan</label>
													<input type="text" class="form-control" autocomplete="off" name="jabatan" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Pangkat</label>
													<input type="text" class="form-control" autocomplete="off" name="pangkat" required>
												</div>	
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Username</label>
													<input type="text" id="usernamebaru" onkeyup="cariusernamepegawai()" class="form-control" required="" autocomplete="off" name="username">
													<label id="msgusernamebaru" class="btn-danger hide" for="">Username telah terdaftar</label>
												</div>
											</div>
											<div class="col-md-6">
												
												<div class="form-group">
													<label for="timesheetinput1">Password</label>
													<input type="password" id="lama3" required="" class="form-control" name="password">
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6" style="padding-top: 30px;">				
										<button type="submit" id="btnnip" class="btn btn-outline-primary">Simpan</button>
										<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Keluar</button>
									</div>
								</div>
								<!-- </div> -->
							</div>
						</div>
					</div>
					<div class="modal-footer">
					</div>
				</form>

					<script>
		function carinip() {
			if ($("#nip").val()!=='') {
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('operator/carinip/') ?>"+$("#nip").val(),
					success: function (data) {
						var dataa = data;
						if (dataa==1) {
							$("#btnnip").prop('disabled',true);
							$("#msgnip").removeClass('hide');
						}else{
							$("#btnnip").prop('disabled',false);
							$("#msgnip").addClass('hide');
						}
					}
				}); 
			}else{
				$("#msgnip").addClass('hide');
				$("#btnnip").prop('disabled',false);
			}
		}

		function cariusernamepegawai() {
			if ($("#usernamebaru").val()!=='') {
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('operator/cariusername/') ?>"+$("#usernamebaru").val(),
					success: function (data) {
						var dataa = data;
						if (dataa==1) {
							$("#btnnip").prop('disabled',true);
							$("#msgusernamebaru").removeClass('hide');
						}else{
							$("#btnnip").prop('disabled',false);
							$("#msgusernamebaru").addClass('hide');
						}
					}
				}); 
			}else{
				$("#msgusernamebaru").addClass('hide');
				$("#btnnip").prop('disabled',false);
			}
		}

		function carinip2(id) {
			if ($("#nip"+id.toString()).val()!=='') {
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('operator/carinip/') ?>"+$("#nip"+id_pegawai.toString()).val(),
					success: function (data) {
						var dataa = data;
						if (dataa==1) {
							$("#btnnip"+id_pegawai.toString()).prop('disabled',true);
							$("#msgnip"+id_pegawai.toString()).removeClass('hide');
						}else{
							$("#btnnip"+id_pegawai.toString()).prop('disabled',false);
							$("#msgnip"+id_pegawai.toString()).addClass('hide');
						}
					}
				}); 
			}else{
				$("#msgnip"+id_pegawai.toString()).addClass('hide');
				$("#btnnip"+id_pegawai.toString()).prop('disabled',false);
			}
		}

		function cariusernamepegawai2(id) {
			if ($("#usernamebaru"+id.toString()).val()!=='') {
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('operator/cariusername/') ?>"+$("#usernamebaru"+id.toString()).val(),
					success: function (data) {
						var dataa = data;
						if (dataa==1) {
							$("#btnnip"+id.toString()).prop('disabled',true);
							$("#msgusernamebaru"+id.toString()).removeClass('hide');
						}else{
							$("#btnnip"+id.toString()).prop('disabled',false);
							$("#msgusernamebaru"+id.toString()).addClass('hide');
						}
					}
				}); 
			}else{
				$("#msgusernamebaru"+id.toString()).addClass('hide');
				$("#btnnip"+id.toString()).prop('disabled',false);
			}
		}
	</script>


