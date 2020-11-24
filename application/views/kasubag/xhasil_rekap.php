<section id="basic-examples">
	<div class="row">
		<div class="col-xs-12 mt-1 mb-3">
			<h4 class="">
				Rekapitulasi Surat
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
	<br>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css') ?>">
	<div class="row" style="margin-top: -30px;">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<form action="<?php echo base_url('kasubag/hasil_rekap') ?>" method="post">
						<div class="form-group">
							<label for="">Mulai Tanggal</label>
							<input type="text"  autocomplete="off" class="form-control mydatepicker" placeholder="mm/dd/yyyy" required="" name="dari">
						</div>
						<div class="form-group">
							<label for="">Sampai Tanggal</label>
							<input type="text"  autocomplete="off" class="form-control mydatepicker" placeholder="mm/dd/yyyy" required="" name="sampai">
						</div>
						<div class="form-group">
							<button class="btn btn-outline-primary">Tampilkan Rekapitulasi</button>

						</div>
					</form>
					<br>
					<div class="form-group">
						<button class="btn btn-outline-warning" onclick="disposisi()"><i class="fa fa-print"></i> Print Rekapitulasi</button>
					</div>
					<table class="table">
						<tr>
							<td>No</td>
							<td>Kategori</td>
							<td>Jumlah</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Surat Masuk</td>
							<td><?php echo $masuk->num_rows() ?> Surat</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Surat Keluar</td>
							<td><?php echo $keluar->num_rows() ?> Surat</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Disposisi Surat</td>
							<td><?php echo $disposisi->num_rows() ?> Surat</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="col-md-12 hide" id="print" style="margin-bottom: 50px;">
	<div class="card">
		<div class="card-body card-block">
			<div class="row">
				<table class="table" border="0">
					<tr>
						<td><img src="<?php echo base_url('assets/logoprint.PNG') ?>" alt=""></td>
						<td>
							<center>
								<h3><b>PEMERINTAH KABUPATEN BANDUNG</b></h3>
								<h2><b>KECAMATAN DAYEUHKOLOT</b></h2>
								<p>Jl. Raya Dayeuhkolot NO.409, Citeureup. Telp/Fax: (022) 5223238 <br>email : kec_dayeuhkolot@yahoo.co.id Bandung 40257 </p>
							</center>

						</td>
					</tr>
				</table>
				<div class="col-md-12">
					<hr>
					<div class="col-md-12">
						<center>
							<table style="width: 100%" class="table table-striped">
								<?php 
								$dt_dari = new DateTime($dari,new DateTimeZone('Asia/Jakarta')); 
								$dt_sampai = new DateTime($sampai,new DateTimeZone('Asia/Jakarta'));
								?>
								<tr>
									<td><center><h4>Laporan Data Surat Kecamatan Dayeuhkolot <br> <?php echo $dt_dari->format('d M Y').' - '.$dt_sampai->format('d M Y') ?></h4></center></td>
								</tr>
							</table>
							<hr>
						</center>
						<h4><b>Surat Masuk</b></h4>
						<table class="table" border="1" width="100%">
							<tr>
								<th>No</th>
								<th>No Surat</th>
								<th>Kode Surat</th>
								<th>Pengirim</th>
								<th>Tanggal Masuk</th>
								<th>Ditujukan</th>
							</tr>
							<?php $no = 0; foreach ($masuk->result() as $key): $no++;?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?php echo $key->no_surat ?></td>
								<td><?php echo $key->kode_surat ?></td>
								<td><?php echo $key->pengirim ?></td>
								<td><?php echo $key->tgl_masuk ?></td>
								<td><?php echo $key->ditujukan ?></td>
							</tr>
						<?php endforeach ?>
					</table>
					<h4><b>Surat Keluar</b></h4>
					<table class="table" border="1" width="100%">
						<tr>
							<th>No</th>
							<th>No Surat</th>
							<th>Kode Surat</th>
							<th>Ditujukan Ke</th>
							<th>Tanggal Keluar</th>
						</tr>
						<?php $no = 0; foreach ($keluar->result() as $key): $no++;?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $key->no_surat ?></td>
							<td><?php echo $key->kode_surat ?></td>
							<td><?php echo $key->ditujukan ?></td>
							<td><?php echo $key->tgl_keluar ?></td>
						</tr>
					<?php endforeach ?>
				</table>
				<br>
				<h4><b>Disposisi Surat</b></h4>
				<table class="table" border="1" width="100%">
					<tr>
						<th>No</th>
						<th>No Surat</th>
						<th>Surat Dari</th>
						<th>Tanggal Surat</th>
						<th>Perihal</th>
					</tr>
					<?php $no = 0; foreach ($disposisi->result() as $key): $no++;?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $key->no_surat ?></td>
						<td><?php echo $key->dari ?></td>
						<td><?php echo $key->tgl_diterima ?></td>
						<td><?php echo $key->perihal ?></td>
					</tr>
				<?php endforeach ?>
			</table>
			<br>
		</div>
	</div>
</div>
</div>
</div>
</div>

<script>
	function disposisi() {
		
		var divToPrint=document.getElementById('print');

		var newWin=window.open('','Print-Window');
		var WinPrint = window.open('', '', 'left=0,top=0,width=300,height=400,toolbar=1,scrollbars=1,status=0');


		newWin.document.open();

		newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

		newWin.document.close();

		setTimeout(function(){newWin.close();},10);
	}
</script>