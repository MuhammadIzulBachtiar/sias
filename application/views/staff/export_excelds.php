<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_rekapitulasi.xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Rekapitulasi Disposisi Surat Masuk</title>
</head>
<body>
	<div class="col-md-12">
		<h3 style="text-align: center;"><b>BADAN PENGELOLAAN KEUANGAN DAERAH KABUPATEN PEKALONGAN</b><h3>
		<h3 style="text-align: center;">Laporan Rekapitulasi Disposisi Surat Masuk <?php echo $dari;?> Sampai <?php echo $sampai;?></h3>
		
		<table class="table" border="1" width="100%">
		<tr>
							<th>No</th>
							<th>Tanggal Catat</th>
							<th>>No Surat</th>
							<th>Dari</th>
							<th>Tanggal Surat</th>
							<th>Perihal</th>
							<th>Diteruskan</th>
							<th>Catatan</th>
			</tr>
			<?php $no = 0; foreach ($disposisi->result() as $key): $no++;?>
			<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $key->tgl_catat ?></td>
							<td><?php echo $key->no_surat ?></td>
							<td><?php echo $key->dari ?></td>
							<td><?php echo $key->tgl_keluar ?></td>
							<td><?php echo $key->perihal ?></td>
							<td><?php echo $key->ditujukan ?></td>
							<td><?php echo $key->catatan ?></td>
			</tr>
		<?php endforeach ?>
		</table>
		<br>
	</div>
</body>
</html>