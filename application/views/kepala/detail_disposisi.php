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
										<th style="width: 5%"></th>
										<th><span style="font-weight: bold;"><?php echo $list->catatan ?></span></th>
									</tr>
								</table>
								<a href="<?php echo base_url('kepala/daftardisposisi') ?>" class="btn btn-outline-danger">Kembali</a>
								<br>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>


