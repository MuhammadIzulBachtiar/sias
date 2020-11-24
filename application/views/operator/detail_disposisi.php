<section id="basic-examples">
	<div class="row">
		<div class="col-xs-12 mt-1 mb-3">
			<h4 class="">
				Detail Disposisi Surat : <?php echo $list->no_surat ?>
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
				<div class="container">
					<div class="card-body">
						<div class="col-md-12" style="padding-bottom: 20px;">
							<div class="table-responsive">
								<table class="display nowrap table  table-striped table-bordered">
									<tr>
										<th style="width: 20%">No Surat</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $list->no_surat  ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Surat dari</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $list->dari ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Diterima tanggal</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $list->tgl_diterima ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Perihal</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $list->perihal  ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Sifat</th>
										<th style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $list->sifat ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Diteruskan kepada</th>
										<th style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $list->diteruskan ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Dengan hormat harap</th>
										<th style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $list->dgn_hormat ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Catatan</th>
										<th style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $list->catatan ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Tanggapan</th>
										<th style="width: 5%"></th>
										<th><span style="font-weight: bold;"><?php echo $list->tanggapan ?></span></th>
								
									</tr>
								</table>
								
								<br>
								<div class="form-group">
									

									<button class="btn btn-outline-success" onclick="disposisi()" type="button"><i class="fa fa-print"></i> Print Disposisi Surat</button>
									
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="col-md-12 hide" id="print" style="margin-bottom: 50px;">
	<div class="card">
		<div class="card-body card-block">
			<div class="row" style="padding-bottom: 3px;border-bottom: 1px solid #000;">
				<table class="table" width="100%">
					<tr>
						<td width="20%"><img src="<?=base_url('assets/logo2.png')?>" alt="" width="100"></td>
						<td>
							<center>
								<center>
								<h3><b>PEMERINTAH PERHUBUNGAN LAUT<br>DIREKTORAT JENDRAL PERHUBUNGAN LAUT</b></h3>
								<h3><b>LEMBAR DISPOSISI<br>KEPALA KANTOR KESYAHBANDRAN DAN<br>OTORITAS PELABUHAN KELAS II GRESIK</b></h3>
							</center>
							</center>

						</td>
					</tr>
				</table>
				<div class="col-md-12">
					<div class="col-md-12">
						<center>
							<table style="width: 100%" class="table table-striped">
								<tr>
									<td><center><h3>LEMBAR DISPOSISI</h3></center></td>
								</tr>
							</table>
							<hr>
							<table class="table" style="width: 100%; border: 1px solid gray;padding: 10px;">
								<tr>
									<td style="width: 30%">NO Surat</td>
									<td><?php echo $list->no_surat ?></td>
								</tr>
								<tr>
									<td style="width: 30%">Surat Dari</td>
									<td><?php echo $list->dari ?></td>
								</tr>
								<tr>
									<td style="width: 30%">Tanggal Surat</td>
									<td><?php echo $list->tgl_surat ?></td>
								</tr>
								<tr>
									<td style="width: 30%">Diterima Tanggal</td>
									<td><?php echo $list->tgl_diterima ?></td>
								</tr>
								<tr>
									<td style="width: 30%">Sifat</td>
									<td><?php echo $list->sifat ?></td>
								</tr>

								<tr>
									<td style="width: 30%">Perilhal</td>
									<td><?php echo $list->perihal ?></td>
								</tr>
								<tr>
									<td style="width: 30%">Diteruskan Kepada</td>
									<td><?php echo $list->diteruskan ?></td>
								</tr>
								<tr>
									<td style="width: 30%">Dengan Hormat Harap</td>
									<td><?php echo $list->dgn_hormat ?></td>
								</tr>
							</table>
						</center>
						<br>
						<br>
						<div style="bottom: 0px; position: absolute;float: right!important;right: 0">
							<b class="pull-right" style="margin-left: 50px;">Camat Dayeuhkolot</b>
							<br><br><br><br><br><br>
							<b class="pull-right" style="letter-spacing: 2px;">(.....................................)</b>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br><br><br>



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


