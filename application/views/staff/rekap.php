<section id="basic-examples">
	<div class="row">
	<div class="col-xs-12 mt-1 mb-3">
			<h3 class="">
				<b>Rekapitulasi Surat</b>
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
				<div class="card-block">
					<form action="<?php echo base_url('staff/rekap') ?>" method="post">
					<div class="form-group">
							<label for="">Mulai Tanggal</label>
							<input type="text" autocomplete="off" class="form-control mydatepicker" required="" placeholder="mm/dd/yyyy" name="dari">
						</div>
						<div class="form-group">
							<label for="">Sampai Tanggal</label>
							<input type="text" autocomplete="off" class="form-control mydatepicker" required="" placeholder="mm/dd/yyyy" name="sampai">
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Tampilkan Rekapitulasi</button>

						</div>
					</form>
					<br>
					<label for="">Hasil Rekapitulasi</label><br>
					<?php 
								$dt_dari = new DateTime($dari,new DateTimeZone('Asia/Jakarta')); 
								$dt_sampai = new DateTime($sampai,new DateTimeZone('Asia/Jakarta'));
								?>
					<label><?php echo $dt_dari->format('d M Y').' - '.$dt_sampai->format('d M Y') ?></label><br>
					<table class="table">
						<tr>
							<td>No</td>
							<td>Kategori</td>
							<td>Jumlah</td>
							<td>Aksi</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Surat Masuk</td>
							<td><?php echo $masuk->num_rows() ?> Surat</td>
							<td>
								<button class="btn btn-warning" onclick="ditujukansm()"><i class="fa fa-print"></i> Print Rekapitulasi</button>
								<a href="<?php echo site_url('staff/cetak_exportsm/');?><?php echo $this->input->post('dari');?>/<?php echo $this->input->post('sampai');?>" target="_blank" class="btn btn-success"><i class="fa fa-download"></i> Export Excel</a>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Surat Keluar</td>
							<td><?php echo $keluar->num_rows() ?> Surat</td>
							<td>
								<button class="btn btn-warning" onclick="ditujukansk()"><i class="fa fa-print"></i> Print Rekapitulasi</button>
								<a href="<?php echo site_url('staff/cetak_exportsk/');?><?php echo $this->input->post('dari');?>/<?php echo $this->input->post('sampai');?>" target="_blank" class="btn btn-success"><i class="fa fa-download"></i> Export Excel</a>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Undangan</td>
							<td><?php echo $undangan->num_rows() ?> Surat</td>
							<td>
								<button class="btn btn-warning" onclick="ditujukanundangan()"><i class="fa fa-print"></i> Print Rekapitulasi</button>
								<a href="<?php echo site_url('staff/cetak_export_undangan/');?><?php echo $this->input->post('dari');?>/<?php echo $this->input->post('sampai');?>" target="_blank" class="btn btn-success"><i class="fa fa-download"></i> Export Excel</a>
							</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Disposisi</td>
							<td><?php echo $disposisi->num_rows() ?> Surat</td>
							<td>
								<button class="btn btn-warning" onclick="ditujukands()"><i class="fa fa-print"></i> Print Rekapitulasi</button>
								<a href="<?php echo site_url('staff/cetak_exportds/');?><?php echo $this->input->post('dari');?>/<?php echo $this->input->post('sampai');?>" target="_blank" class="btn btn-success"><i class="fa fa-download"></i> Export Excel</a>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>



<!-- cetak surat masuk -->
<div class="col-md-12 hide" id="print1" style="margin-bottom: 50px;">
	<div class="card">
		<div class="card-body card-block">
			<div class="row">
					<div class="col-md-12">
						<center>
							<table style="width: 100%" class="table table-striped">
								<?php 
								$dt_dari = new DateTime($dari,new DateTimeZone('Asia/Jakarta')); 
								$dt_sampai = new DateTime($sampai,new DateTimeZone('Asia/Jakarta'));
								?>
								<tr>
									
									<td><center><h4><b>BADAN PENGELOLAAN KEUANGAN DAERAH KABUPATEN PEKALONGAN</b>
									<br>Surat Masuk<br> <?php echo $dt_dari->format('d M Y').' - '.$dt_sampai->format('d M Y') ?></h4></center></td>
								</tr>
							</table>
							<hr>
						</center>
						<table class="table" border="1" width="100%">
							<tr>
								<th><span style="font-size: small;">No</span></th>
								<th><span style="font-size: small;">Tanggal Catat</span></th>
								<th><span style="font-size: small;">No Surat</span></th>
								<th><span style="font-size: small;">Tanggal Surat</span></th>
								<th><span style="font-size: small;">Perihal</span></th>
								<th><span style="font-size: small;">Pengirim</span></th>
								<th><span style="font-size: small;">Ditujukan</span></th>
							</tr>
							<?php $no = 0; foreach ($masuk->result() as $key): $no++;?>
							<tr>
								<td><span style="font-size: small;"><?php echo $no ?></span></td>
								<td><span style="font-size: small;"><?php echo $key->tgl_masuk ?></span></td>
								<td><span style="font-size: small;"><?php echo $key->no_surat ?></span></td>	
								<td><span style="font-size: small;"><?php echo $key->tgl_surat ?></span></td>
								<td><span style="font-size: small;"><?php echo $key->perihal ?></span></td>						
								<td><span style="font-size: small;"><?php echo $key->pengirim ?></span></td>
								<td><span style="font-size: small;"><?php echo $key->ditujukan ?></span></td>
							</tr>
						<?php endforeach ?>
					</table>
					
			<br>

	</div>
</div>
</div>
</div>
</div>

<!-- cetak surat keluar -->
<div class="col-md-12 hide" id="print2" style="margin-bottom: 50px;">
	<div class="card">
		<div class="card-body card-block">
			<div class="row">
					<div class="col-md-12">
						<center>
							<table style="width: 100%" class="table table-striped">
								<?php 
								$dt_dari = new DateTime($dari,new DateTimeZone('Asia/Jakarta')); 
								$dt_sampai = new DateTime($sampai,new DateTimeZone('Asia/Jakarta'));
								?>
								<tr>
									
									<td><center><h4><b>BADAN PENGELOLAAN KEUANGAN DAERAH KABUPATEN PEKALONGAN</b>
									<br>Surat Keluar<br> <?php echo $dt_dari->format('d M Y').' - '.$dt_sampai->format('d M Y') ?></h4></center></td>
								</tr>
							</table>
							<hr>
						</center>
					<table class="table" border="1" width="100%">
						<tr>
							<th><span style="font-size: small;">No</span></th>
							<th><span style="font-size: small;">Tanggal Catat</span></th>
							<th><span style="font-size: small;">No Surat</span></th>
							<th><span style="font-size: small;">Tanggal Surat</span></th>
							<th><span style="font-size: small;">Perihal</span></th>
							<th><span style="font-size: small;">Ditujukan Ke</span></th>
							<th><span style="font-size: small;">Keterangan</span></th>
						</tr>
						<?php $no = 0; foreach ($keluar->result() as $key): $no++;?>
						<tr>
							<td><span style="font-size: small;"><?php echo $no ?></span></td>
							<td><span style="font-size: small;"><?php echo $key->tgl_catat ?></span></td>
							<td><span style="font-size: small;"><?php echo $key->no_surat ?></span></td>
							<td><span style="font-size: small;"><?php echo $key->tgl_keluar ?></span></td>
							<td><span style="font-size: small;"><?php echo $key->perihal ?></span></td>
							<td><span style="font-size: small;"><?php echo $key->ditujukan ?></span></td>
							<td><span style="font-size: small;"><?php echo $key->keterangan ?></span></td>
							
						</tr>
					<?php endforeach ?>
				</table>
				<br>
			<br>

	</div>
</div>
</div>
</div>
</div>

<!-- cetak disposisi -->
<div class="col-md-12 hide" id="print3" style="margin-bottom: 50px;">
	<div class="card">
		<div class="card-body card-block">
			<div class="row">
					<div class="col-md-12">
						<center>
							<table style="width: 100%" class="table table-striped">
								<?php 
								$dt_dari = new DateTime($dari,new DateTimeZone('Asia/Jakarta')); 
								$dt_sampai = new DateTime($sampai,new DateTimeZone('Asia/Jakarta'));
								?>
								<tr>
									
									<td><center><h4><b>BADAN PENGELOLAAN KEUANGAN DAERAH KABUPATEN PEKALONGAN</b>
									<br>Disposisi<br> <?php echo $dt_dari->format('d M Y').' - '.$dt_sampai->format('d M Y') ?></h4></center></td>
								</tr>
							</table>
							<hr>
						</center>
					<table class="table" border="1" width="100%">
						<tr>
						<th><span style="font-size: small;">No</span></th>
							<th><span style="font-size: small;">Tanggal Catat</span></th>
							<th><span style="font-size: small;">No Surat</span></th>
							<th><span style="font-size: small;">Dari</span></th>
							<th><span style="font-size: small;">Tanggal Surat</span></th>
							<th><span style="font-size: small;">Perihal</span></th>
							<th><span style="font-size: small;">Diteruskan</span></th>
							<th><span style="font-size: small;">Catatan</span></th>
						</tr>
						<?php $no = 0; foreach ($disposisi->result() as $key): $no++;?>
						<tr>
							<td><span style="font-size: small;"><?php echo $no ?></span></td>
							<td><span style="font-size: small;"><?php echo $key->tgl_diterima ?></span></td>
							<td><span style="font-size: small;"><?php echo $key->no_surat ?></span></td>
							<td><span style="font-size: small;"><?php echo $key->dari ?></span></td>
							<td><span style="font-size: small;"><?php echo $key->tgl_surat ?></span></td>
							<td><span style="font-size: small;"><?php echo $key->perihal ?></span></td>
							<td><span style="font-size: small;"><?php echo $key->diteruskan ?></span></td>
							<td><span style="font-size: small;"><?php echo $key->catatan ?></span></td>
							
						</tr>
					<?php endforeach ?>
				</table>
				<br>
			<br>

	</div>
</div>
</div>
</div>
</div>

<!-- cetak undangan -->
<div class="col-md-12 hide" id="print4" style="margin-bottom: 50px;">
	<div class="card">
		<div class="card-body card-block">
			<div class="row">
					<div class="col-md-12">
						<center>
							<table style="width: 100%" class="table table-striped">
								<?php 
								$dt_dari = new DateTime($dari,new DateTimeZone('Asia/Jakarta')); 
								$dt_sampai = new DateTime($sampai,new DateTimeZone('Asia/Jakarta'));
								?>
								<tr>
									
									<td><center><h4><b>BADAN PENGELOLAAN KEUANGAN DAERAH KABUPATEN PEKALONGAN</b>
									<br>Undangan<br> <?php echo $dt_dari->format('d M Y').' - '.$dt_sampai->format('d M Y') ?></h4></center></td>
								</tr>
							</table>
							<hr>
						</center>
						<table class="table" border="1" width="100%">
							<tr>
								<th><span style="font-size: small;">No</span></th>
								<th><span style="font-size: small;">Tanggal Catat</span></th>
								<th><span style="font-size: small;">No Surat</span></th>
								<th><span style="font-size: small;">Tanggal Surat</span></th>
								<th><span style="font-size: small;">Perihal</span></th>
								<th><span style="font-size: small;">Pengirim</span></th>
								<th><span style="font-size: small;">Ditujukan</span></th>
								<th><span style="font-size: small;">Keterangan</span></th>
							</tr>
							<?php $no = 0; foreach ($undangan->result() as $key): $no++;?>
							<tr>
								<td><span style="font-size: small;"><?php echo $no ?></span></td>
								<td><span style="font-size: small;"><?php echo $key->tgl_masuk ?></span></td>
								<td><span style="font-size: small;"><?php echo $key->no_surat ?></span></td>	
								<td><span style="font-size: small;"><?php echo $key->tgl_surat ?></span></td>
								<td><span style="font-size: small;"><?php echo $key->perihal ?></span></td>						
								<td><span style="font-size: small;"><?php echo $key->pengirim ?></span></td>
								<td><span style="font-size: small;"><?php echo $key->ditujukan ?></span></td>
								<td><span style="font-size: small;"><?php echo $key->Keterangan ?></span></td>
							</tr>
						<?php endforeach ?>
					</table>
					
			<br>

	</div>
</div>
</div>
</div>
</div>

<script>
	function ditujukansm() {
		
		var divToPrint=document.getElementById('print1');

		var newWin=window.open('','Print-Window');
		var WinPrint = window.open('', '', 'left=0,top=0,width=300,height=400,toolbar=1,scrollbars=1,status=0');


		newWin.document.open();

		newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

		newWin.document.close();

		setTimeout(function(){newWin.close();},10);
	}

	function ditujukansk() {
		
		var divToPrint=document.getElementById('print2');

		var newWin=window.open('','Print-Window');
		var WinPrint = window.open('', '', 'left=0,top=0,width=300,height=400,toolbar=1,scrollbars=1,status=0');


		newWin.document.open();

		newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

		newWin.document.close();

		setTimeout(function(){newWin.close();},10);
	}

	function ditujukands() {
		
		var divToPrint=document.getElementById('print3');

		var newWin=window.open('','Print-Window');
		var WinPrint = window.open('', '', 'left=0,top=0,width=300,height=400,toolbar=1,scrollbars=1,status=0');


		newWin.document.open();

		newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

		newWin.document.close();

		setTimeout(function(){newWin.close();},10);
	}

	function ditujukanundangan() {
		
		var divToPrint=document.getElementById('print4');

		var newWin=window.open('','Print-Window');
		var WinPrint = window.open('', '', 'left=0,top=0,width=300,height=400,toolbar=1,scrollbars=1,status=0');


		newWin.document.open();

		newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

		newWin.document.close();

		setTimeout(function(){newWin.close();},10);
	}
	


</script>