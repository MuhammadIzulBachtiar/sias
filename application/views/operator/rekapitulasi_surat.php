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
					<form action="<?php echo base_url('operator/hasil_rekap') ?>" method="post">
						<div class="form-group">
							<label for="">Mulai Tanggal</label>
							<input type="text" autocomplete="off" class="form-control mydatepicker" required=""  placeholder="mm/dd/yyyy" name="dari">
						</div>
						<div class="form-group">
							<label for="">Sampai Tanggal</label>
							<input type="text" autocomplete="off" class="form-control mydatepicker" required="" placeholder="mm/dd/yyyy" name="sampai">
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Tampilkan Rekapitulasi</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>