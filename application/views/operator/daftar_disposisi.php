<section id="basic-examples">
	<div class="row">
		<div class="col-xs-12 mt-1 mb-3">
		<h3 class="">
				<b>Daftar Disposisi Surat</b>
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
					<form class="form-horizontal" method="post"  action="<?php echo site_url('operator/suratmasuk');?>">
							<button type="submit"  class="btn btn-primary" ><i class="glyphicon glyphicon-search"></i> Tambah Disposisi</button>
					</form>
						<div class="table-responsive m-t-40" style="margin-bottom: 15px;">
							<table cellspacing="0" class="display nowrap table table-hover table-bordered tableku" width="100%">
								<thead>
									<tr style="font-weight: bold;">
										<th>
										<span style="font-size: small;">No</span>
										</th>
										<th>
										<span style="font-size: small;">No Surat</span>
										</th>
										<th>
										<span style="font-size: small;">Tanggal Surat</span>
										</th>
										<th>
										<span style="font-size: small;">Dari</span>
										</th>
										<th>
										<span style="font-size: small;">Perihal</span>
										</th>
										<th>
										<span style="font-size: small;">Tanggal Diterima</span>
										</th>
										<th>
										<span style="font-size: small;">Diteruskan</span>
										</th>
										<th class="text-center">
										<span style="font-size: small;">Aksi</span>
										</th>

									</tr>
								</thead>
								<tbody id="isi">
									<?php $no = 0; foreach ($disposisi->result() as $key): $no++;?>
									<tr>
										<td><span style="font-size: small;"><?php echo $no ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->no_surat ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->tgl_surat ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->dari ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->perihal ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->tgl_diterima ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->diteruskan ?></span></td>	
										<td>
											<button class="btn btn-success btn-sm " style="margin:5px" data-toggle="modal" data-target="#update<?php echo $key->id_disposisi ?>">Edit</button>
											<a href="<?php echo base_url('operator/detaildisposisi/'.$key->id_disposisi) ?>" class="btn btn-primary btn-sm " style="margin:5px">Detail</a>
											<a href="<?php echo base_url('operator/del_disposisi/'.$key->id_disposisi) ?>" class="btn btn-danger btn-sm " style="margin:5px" onclick="return confirm('Hapus surat masuk?')">Hapus</a>
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

<?php foreach ($disposisi->result() as $e): ?>
<div class="modal fade text-xs-left" id="update<?php echo $e->id_disposisi ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="myModalLabel1"><b>Edit Disposisi</b></h3>
			</div>
			<form method="post" action="<?php echo base_url('operator/update_disposisi/'.$e->id_disposisi) ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">No Surat</label>
										<input type="text" value="<?php echo $e->no_surat ?>"  id="no_surat<?php echo $e->id_disposisi ?>" onkeyup="carinosurat2(<?php echo $e->id_disposisi ?>)" class="form-control" required="" autocomplete="off" name="no_surat">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Surat dari</label>
										<input type="text" value="<?php echo $e->dari ?>"  class="form-control" required="" autocomplete="off" name="dari">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="timesheetinput1">Tanggal Surat</label>
								<div class="position-relative has-icon-right">
									<input value="<?php echo $e->tgl_surat ?>"  type="text" autocomplete="off" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="tgl_diterima" required="">
									<div class="form-control-position">
										<i class="icon-android-calendar" style="font-size: 2em;margin-top: 5px;position: absolute;right: 0px"></i>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="timesheetinput1">Diterima Tanggal</label>
								<div class="position-relative has-icon-right">
									<input value="<?php echo $e->tgl_diterima ?>" type="text" autocomplete="off" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="tgl_diterima" required="">
									<div class="form-control-position">
										<i class="icon-android-calendar" style="font-size: 2em;margin-top: 5px;position: absolute;right: 0px"></i>
									</div>
								</div>
							</div>
								
									<div class="form-group">
										<label for="">Perihal</label>
										<textarea type="text" style="resize: none;height: 150px;"  class="form-control" required="" name="perihal"><?php echo $e->perihal ?></textarea>
									</div>	

						</div>	

						<div class="col-md-6">
						<div class="form-group">
									<label for="">Ditujukan Kepada</label>
									<input value="<?php echo $e->ditujukan ?>" type="text" class="form-control" required="" name="ditujukan" id="ditujukan">
								</div>
							<div class="form-group">
									<label for="">Sifat</label>
										<select name="sifat" class="form-control">
											<option value=""><?php echo $e->sifat ?></option>
											<option <?php if($e->sifat=="SangatSegera") echo "selected"; ?> value="SangatSegera">Sangat segera</option>
											<option <?php if($e->sifat=="Segera") echo "selected"; ?> value="Segera">Segera</option>
											<option <?php if($e->sifat=="Rahasia") echo "selected"; ?> value="Rahasia">Rahasia</option>
										</select>
								</div>

							<div class="form-group">
									<label for="">Diteruskan kepada</label>
									<select name="diteruskan" class="form-control">
										<option value=""><?php echo $e->diteruskan ?></option>
										
										<option <?php if($e->diteruskan=="Kepala Kantor") echo "selected"; ?> value="Kasubag Kantor">Kepala Kantor</option>
										<option <?php if($e->diteruskan=="Bag. Umum dan Kepegawaian") echo "selected"; ?> value="Bag. Umum dan Kepegawaian">Bag. Umum dan Kepegawaian</option>
										<option <?php if($e->diteruskan=="Bag. Pemberdayaan Masyarakat") echo "selected"; ?> value="Bag. Pemberdayaan Masyarakat">Bag. Pemberdayaan Masyarakat</option>
										<option <?php if($e->diteruskan=="Bag. Kependudukan") echo "selected"; ?> value="Bag. Kependudukan">Bag. Kependudukan</option>
										<option <?php if($e->diteruskan=="Bag. Pembangunan") echo "selected"; ?> value="Bag. Pembangunan">Bag. Pembangunan</option>
										<option <?php if($e->diteruskan=="Bag. Program dan Keuangan") echo "selected"; ?> value="Bag. Program dan Keuangan">Bag. Program dan keuangan</option>
										<option <?php if($e->diteruskan=="Bag. Sosial dan Budaya") echo "selected"; ?> value="Bag. Sosial dan Budaya">Bag. Sosial dan Budaya</option>
									</select>
								</div>
														
								<div class="form-group">
									<label for="">Catatan</label>
									<textarea name="catatan" required="" id="" style="resize: none;height: 150px;" class="form-control"><?php echo $e->catatan ?></textarea>
								</div>
							
						</div>
						
					
				</div>
			</div>
			<
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" id="btnsubmit<?php echo $e->id_disposisi ?>" class="btn btn-outline-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach ?>