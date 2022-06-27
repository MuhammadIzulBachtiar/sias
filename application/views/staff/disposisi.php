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
									<?php $no = 0; foreach ($list->result() as $key): $no++;?>
									<tr>
										<td><span style="font-size: small;"><?php echo $no ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->no_surat ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->tgl_surat ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->dari ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->perihal ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->tgl_diterima ?></span></td>
										<td><span style="font-size: small;"><?php echo $key->diteruskan ?></span></td>	
										<td>
											<a href="<?php echo base_url('staff/detail/'.$key->id_disposisi) ?>" class="btn btn-primary btn-sm">Detail</a>
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


<script>
	function carinosurat() {
		if ($("#no_surat").val()!=='') {
			$.ajax({
				type: "GET",
				url: "<?php echo base_url('staff/carinosurat_keluar/') ?>"+$("#no_surat").val(),
				success: function (data) {
					var dataa = data;
					if (dataa==1) {
						$("#btnsubmit").prop('disabled',true);
						$("#msgsurat").removeClass('hide');
					}else{
						$("#btnsubmit").prop('disabled',false);
						$("#msgsurat").addClass('hide');
					}
				}
			}); 
		}else{
			$("#msgsurat").addClass('hide');
			$("#btnsubmit").prop('disabled',false);
		}
	}

	function carinosurat2(id) {
		if ($("#no_surat"+id.toString()).val()!=='') {
			$.ajax({
				type: "GET",
				url: "<?php echo base_url('staff/carinosurat_keluar/') ?>"+$("#no_surat"+id.toString()).val(),
				success: function (data) {
					var dataa = data;
					if (dataa==1) {
						$("#btnsubmit"+id.toString()).prop('disabled',true);
						$("#msgsurat"+id.toString()).removeClass('hide');
					}else{
						$("#btnsubmit"+id.toString()).prop('disabled',false);
						$("#msgsurat"+id.toString()).addClass('hide');
					}
				}
			}); 
		}else{
			$("#msgsurat"+id.toString()).addClass('hide');
			$("#btnsubmit"+id.toString()).prop('disabled',false);
		}
	}

</script>