<section id="basic-examples">
	<div class="row">
		<div class="col-xs-12 mt-1 mb-3">
			<h4 class="">
				Disposisi Surat
			</h4>
			<p>
				Detail data disposisi surat
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
				<div class="card-body " style="padding: 20px;">
					<div class="row">
						<form action="<?php echo base_url('camat/add_disposisi') ?>" method="post">
							
							<div class="col-md-6">
								<div class="form-group">
									<label for="">No Surat</label>
									<input readonly="" type="text" class="form-control" value="<?php echo $list->no_surat ?>" required="" name="no_surat">
								</div>
								<div class="form-group">
									<label for="">Surat Dari</label>
									<input readonly="" type="text" class="form-control"value="<?php echo $list->dari ?>" required="" name="dari">
								</div>
								<div class="form-group">
									<label for="timesheetinput1">Tanggal Surat</label>
									<div class="position-relative has-icon-right">
										<input readonly="" type="text"autocomplete="off" class="form-control mydatepicker" placeholder="yyyy/mm/dd" name="tgl_surat" required="" value="<?php echo $list->tgl_surat ?>">
										<div class="form-control-position">
											<i class="icon-android-calendar" style="font-size: 2em;margin-top: 5px;position: absolute;right: 0px"></i>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="timesheetinput1">Diterima Tanggal</label>
									<div class="position-relative has-icon-right">
										<input readonly="" type="text"autocomplete="off" class="form-control mydatepicker" placeholder="yyyy/mm/dd" name="tgl_diterima" required="" value="<?php echo $list->tgl_diterima ?>">
										<div class="form-control-position">
											<i class="icon-android-calendar" style="font-size: 2em;margin-top: 5px;position: absolute;right: 0px"></i>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="">Sifat</label>
									<select disabled="" name="sifat" required="" class="form-control" id="">
										<option value="" hidden="">Pilih Sifat</option>
										<option <?php if($list->sifat=="Sangat Segera"){echo "selected";} ?> >Sangat Segera</option>
										<option <?php if($list->sifat=="Segera"){echo "selected";} ?> >Segera</option>
										<option <?php if($list->sifat=="Rahasia"){echo "selected";} ?> >Rahasia</option>
									</select>
								</div>
								<div class="form-group">
									<label for="">Perihal</label>
									<textarea readonly="" name="perihal" required="" class="form-control" style="height: 150px"><?php echo $list->perihal ?></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Diteruskan Kepada</label>
									<input readonly="" type="text" value="<?php echo $list->diteruskan ?>" class="form-control" required="" name="diteruskan">
								</div>
								<div class="form-group">
									<label for="">Dengan Hormat Harap</label>
									<select disabled="" name="dgn_hormat" required="" class="form-control" id="">
										<option value="" hidden="">Pilih Opsi</option>
										<option <?php if($list->dgn_hormat=="Tanggapan dan saran"){echo "selected";} ?> >Tanggapan dan saran</option>
										<option <?php if($list->dgn_hormat=="Proses dan lanjut"){echo "selected";} ?> >Proses lebih lanjut</option>
										<option <?php if($list->dgn_hormat=="Koordinasi dan konfirmasi"){echo "selected";} ?> >Koordinasi dan konfirmasi</option>
									</select>
								</div>
								<div class="form-group">
									<label for="">Catatan</label>
									<textarea readonly="" name="catatan" required="" class="form-control" style="height: 150px"><?php echo $list->catatan ?></textarea>
								</div>
								<div class="form-group">
									<button class="btn btn-outline-success" onclick="disposisi()" type="button"><i class="fa fa-print"></i> Print Disposisi Surat</button>
									<a href="<?php echo base_url('kasubag/disposisi') ?>" class="btn btn-outline-danger">Batal</a>
								</div>
							</div>

						</form>
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