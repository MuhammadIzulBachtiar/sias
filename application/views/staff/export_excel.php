<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_rekapitulasi.xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Rekapitulasi</title>
</head>
<body>
	<div class="col-md-12">
		<h3 style="text-align: center;">Laporan Rekapitulasi Tanggal <?php echo $dari;?> Sampai <?php echo $sampai;?></h3>
		<h4><b>Surat Masuk</b></h4>
		<table class="table" border="1" width="100%">
			<tr>
				<th>No</th>
				<th>No Surat</th>
				<th>Kode Surat</th>
				<th>Pengirim</th>
				<th>Tanggal Masuk</th>
				<th>Keterangan</th>
			</tr>
			<?php $no = 0; foreach ($masuk->result() as $key): $no++;?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $key->no_surat ?></td>
				<td><?php echo $key->kode_surat ?></td>
				<td><?php echo $key->pengirim ?></td>
				<td><?php echo $key->tgl_masuk ?></td>
				<td><?php echo $key->keterangan ?></td>
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
				<td><?php echo $key->tgl_surat ?></td>
				<td><?php echo $key->perihal ?></td>
			</tr>
		<?php endforeach ?>
	</table>
	<br>
	</div>
</body>
</html>