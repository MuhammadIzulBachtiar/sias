<section id="basic-examples">
	<div class="row">
		<div class="col-xs-12 mt-1 mb-3">
			<h3 class="">
				Detail Disposisi Surat
			</h3>
			<p>
				Detail disposisi dengan no surat : <?php echo $list->no_surat ?>
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
										<th><span style="font-weight: bold;"><?php echo $list->no_surat  ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Surat dari</th>
										<th  style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $list->dari ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Ditujukan kepada</th>
										<th style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $list->ditujukan?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Tanggal surat</th>
										<th style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $list->tgl_surat?></span></th>
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
										<th style="width: 20%">Diteruskan Kepada</th>
										<th style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $list->diteruskan ?></span></th>
									</tr>
									<tr>
										<th style="width: 20%">Catatan</th>
										<th style="width: 5%">:</th>
										<th><span style="font-weight: bold;"><?php echo $list->catatan ?></span></th>
									</tr>
									<tr>
										
								</table>
								
								<br> 
								<div class="form-group">
									<button class="btn btn-success" onclick="disposisi()" type="button"><i class="fa fa-print"></i> Print Disposisi Surat</button>
									<a href="<?php echo base_url('staff/disposisi') ?>" class="btn btn-danger">Kembali</a>
								<br>
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
			<div class="row">
				<table class="table">
					<tr>
						<td>
							<center>
								<h3>PEMERINTAH KABUPATEN PEKALONGAN<br><b>BADAN PENGELOLAAN KEUANGAN DAERAH (BPKD)</b></h3>
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
							<table style="width: 100%; border: 1px solid gray; padding: 10px;">
								<tr>
									<td style="width: 20%">Surat Dari</td>
									<td style="width: 30%">: <?php echo $list->dari ?></td>
									<td style="width: 20%">Diterima Tanggal</td>
									<td style="width: 30%">: <?php echo $list->tgl_diterima ?></td>
								</tr>
								<tr>
									<td style="width: 20%">No Surat</td>
									<td style="width: 30%">: <?php echo $list->no_surat ?></td>
									<td style="width: 20%">No Agenda</td>
									<td style="width: 30%">:</td>
								</tr>
								<tr>
									<td style="width: 20%">Tanggal Surat</td>
									<td style="width: 30%">: <?php echo $list->tgl_surat ?></td>
									<td style="width: 20%">Sifat</td>
									<td style="width: 30%">: <?php echo $list->sifat ?></td>
								</tr>
							</table>
							<table  style="width: 100%; height: 10%; border: 1px solid gray; padding: 10px;">								
								<tr>
									<td align=left valign=top style="width: 20%">Perilhal</td>
									<td align=left valign=top>: <?php echo $list->perihal ?></td>
								</tr>
							</table>
							<table  style="width: 100%; border: 1px solid gray; padding: 10px;">								
								<tr>
									<td style="width: 20%">Diteruskan Kepada</td>
									<td>: <?php echo $list->diteruskan ?></td>
								</tr>
							</table>
							<table  style="width: 100%; height: 10%; border: 1px solid gray; padding: 10px;">
							<tr>								
								<td align=left valign=top style="width: 50%">Catatan      :</td>
								<td align=right valign=top><b>Kepala Kantor BPKD</b></td>
							</tr>
							<tr>
								<td align=left valign=top><?php echo $list->catatan ?></td>
								<td align=right valign=top>
										<br><br><br><br><br>
										<b>(.....................................)</b>
								</td>
							</table>
						</center>
						<!-- <br>
						<br>
						<div style="bottom: 0px; position: absolute;float: right!important;right: 0">
							<b class="pull-right" style="margin-left: 50px;">Camat Dayeuhkolot</b>
							<br><br><br><br><br><br>
							<b class="pull-right" style="letter-spacing: 2px;">(.....................................)</b>
						</div> -->
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


