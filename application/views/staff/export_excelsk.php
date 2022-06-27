<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_rekapitulasi.xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Rekapitulasi Surat Keluar</title>
</head>
<body>
	<div class="col-md-12">
		<h3 style="text-align: center;"><b>BADAN PENGELOLAAN KEUANGAN DAERAH KABUPATEN PEKALONGAN</b><h3>
		<h3 style="text-align: center;">Laporan Rekapitulasi Surat Keluar Tanggal <?php echo $dari;?> Sampai <?php echo $sampai;?></h3>
		
		<table class="table" border="1" width="100%">
			<tr>
			<th>No</th>
			<th>Tanggal Catat</th>
			<th>No Surat</th>
			<th>Tanggal Surat</th>
			<th>Perihal</th>
			<th>Ditujukan Ke</th>
			<th>Keterangan</th>
			</tr>
			<?php $no = 0; foreach ($keluar->result() as $key): $no++;?>
			<tr>
			<td><?php echo $no ?></td>
							<td><?php echo $key->tgl_catat ?></td>
							<td><?php echo $key->no_surat ?></td>
							<td><?php echo $key->tgl_keluar ?></td>
							<td><?php echo $key->perihal ?></td>
							<td><?php echo $key->ditujukan ?></td>
							<td><?php echo $key->keterangan ?></td>
			</tr>
		<?php endforeach ?>
		</table>
		<br>
	</div>
</body>
</html>