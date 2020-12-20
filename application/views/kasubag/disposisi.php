<section id="basic-examples">
	<div class="row">
		<div class="col-xs-12 mt-1 mb-3">
			<h4 class="">
				Disposisi surat 
			</h4>
			<p>
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
						<div class="table-responsive m-t-40" style="margin-bottom: 15px;">
							<table cellspacing="0" class="display nowrap table table-hover table-striped table-bordered tableku" width="100%">
								<thead>
									<tr>
										<th>
											No
										</th>
										<th>
											No Surat
										</th>
										<th>
											Tanggal diterima
										</th>
										<th>
											Dari
										</th>
										<th>
											Perihal
										</th>
										
										<th class="text-center">
											Aksi
										</th>
									</tr>
								</thead>
								<tbody id="isi">
									<?php $no = 0; foreach ($list->result() as $key): $no++;?>
									<tr>
										<td><?php echo $no ?></td>
										<td><?php echo $key->no_surat ?></td>
										<td><?php echo $key->tgl_diterima ?></td>
										<td><?php echo $key->dari ?></td>
										<td><?php echo $key->perihal ?></td> 
										
										<td>
											<button class="btn btn-outline-success" data-toggle="modal" data-target="#update<?php echo $key->id_disposisi ?>"><i data-toggle="tooltip" title="Tanggapan Disposisi" class="fa fa-edit">Tanggapan</i></button>
											
											<a href="<?php echo base_url('kasubag/detaildisposisi/'.$key->id_disposisi) ?>" class="btn btn-outline-primary"><i class="fa fa-search"></i>Rincian</a>
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

<?php foreach ($list->result() as $e): ?>
<div class="modal fade text-xs-left" id="update<?php echo $e->id_disposisi ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel1">Tanggapan Disposisi</h4>
			</div>
			<form method="post" action="<?php echo base_url('kasubag/update_disposisi/'.$e->id_disposisi) ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">No Surat</label>
										<input type="text" value="<?php echo $e->no_surat ?>" readonly="readonly" id="no_surat<?php echo $e->id_disposisi ?>" onkeyup="carinosurat2(<?php echo $e->id_disposisi ?>)" class="form-control" required="" autocomplete="off" name="no_surat">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Surat dari</label>
										<input type="text" value="<?php echo $e->dari ?>" readonly="readonly" class="form-control" required="" autocomplete="off" name="dari">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="timesheetinput1">Diterima Tanggal</label>
								<div class="position-relative has-icon-right">
									<input value="<?php echo $e->tgl_diterima ?>" readonly="readonly" type="text" autocomplete="off" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="tgl_diterima" required="">
									<div class="form-control-position">
										<i class="icon-android-calendar" style="font-size: 2em;margin-top: 5px;position: absolute;right: 0px"></i>
									</div>
								</div>
							</div>
								
									<div class="form-group">
										<label for="">Perihal</label>
										<textarea type="text" style="resize: none;height: 150px;" readonly="readonly" class="form-control" required="" name="perihal"><?php echo $e->perihal ?></textarea>
									</div>	

						</div>	

						<div class="col-md-6">
							<div class="form-group">
									<label for="">Sifat</label>
										<select name="sifat" class="form-control" readonly="readonly">
											<option value="">----</option>
											<option <?php if($e->sifat=="SangatSegera") echo "selected"; ?> value="SangatSegera">Sangat segera</option>
											<option <?php if($e->sifat=="Segera") echo "selected"; ?> value="Segera">Segera</option>
											<option <?php if($e->sifat=="Biasa") echo "selected"; ?> value="Biasa">Biasa</option>
											<option <?php if($e->sifat=="Rahasia") echo "selected"; ?> value="Rahasia">Rahasia</option>
										</select>
								</div>

							<div class="form-group">
									<label for="">Diteruskan kepada</label>
									<select name="diteruskan" class="form-control">
										
										<option <?php if($e->diteruskan=="Operator") echo "selected"; ?> value="Operator">Operator</option>
										<option <?php if($e->diteruskan=="Bag. Umum dan Kepegawaian") echo "selected"; ?> value="Bag. Umum dan Kepegawaian">Bag. Umum dan Kepegawaian</option>
										<option <?php if($e->diteruskan=="Bag. Pemberdayaan Masyarakat") echo "selected"; ?> value="Bag. Pemberdayaan Masyarakat">Bag. Pemberdayaan Masyarakat</option>
										<option <?php if($e->diteruskan=="Bag. Kependudukan") echo "selected"; ?> value="Bag. Kependudukan">Bag. Kependudukan</option>
										<option <?php if($e->diteruskan=="Bag. Pembangunan") echo "selected"; ?> value="Bag. Pembangunan">Bag. Pembangunan</option>
										<option <?php if($e->diteruskan=="Bag. Program dan Keuangan") echo "selected"; ?> value="Bag. Program dan Keuangan">Bag. Program dan keuangan</option>
										<option <?php if($e->diteruskan=="Bag. Sosial dan Budaya") echo "selected"; ?> value="Bag. Sosial dan Budaya">Bag. Sosial dan Budaya</option>
										
									</select>
								</div>
							
							<div class="form-group">
									<label for="">Dengan Hormat Harap</label>
									<select name="dgn_hormat" class="form-control" >
										<option value="">----</option>
										<option <?php if($e->dgn_hormat=="Tanggapan dan Saran")echo "selected"; ?> value="Tanggapan dan Saran">Tanggapan dan saran</option>
										<option <?php if($e->dgn_hormat=="Proses lebih lanjut") echo "selected"; ?> value="Proses lebih lanjut">Proses lebih lanjut</option>
										<option <?php if($e->dgn_hormat=="Koordinasi dan konfirmasi") echo "selected"; ?> value="Koordinasi dan konfirmasi">Koordinasi dan konfirmasi</option>
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



