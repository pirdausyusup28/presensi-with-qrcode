<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan Presensi</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<table>
<tr>
<th style="width:100px;"><img src="<?= base_url(); ?>assets/img/logo pesantren.png" alt="" class="" style="width:100%;"></th>
<th style="width:100px;"><p style="text-align:center;">SMA ISLAM PESANTREN PUTRI AS-SYAFI'IYAH 04</p></th>
</tr>
</table>
<hr size="20px">
<br>
<center><p>Laporan Presensi Harian Guru</p></center>
<center><p>Periode : <?= $_POST['tglawal']?> s/d <?= $_POST['tglakhir']?></p></center><br>
<?php foreach($presensi as $a)?>
<table border='1' class="table table-striped table-bordered table-sm" style="font-size:12px">
<thead>
<tr>
<th style="width:100px;">NIP</th>
<th style="width:10px;">:</th>
<th><?= $a->nip?></th>
</tr>
<tr>
<th style="width:100px;">NAMA</th>
<th style="width:10px;">:</th>
<th><?= $a->nama_guru?></th>
</tr>
<tr>
<th style="width:100px;">Guru Mata Pelajaran</th>
<th style="width:10px;">:</th>
<th><?= $a->guru_mapel?></th>
</tr>
</thead>
</table><br><br>
<table border='1' class="table table-striped table-bordered table-sm" style="font-size:12px">
<thead>
<tr>
<th>#</th>
<th>TANGGAL</th>
<th>JAM MASUK</th>
<th>JAM KELUAR</th>
<th>KETERANGAN</th>
<th>TOTAL JAM KERJA</th>
<th>TOTAL JAM LEMBUR</th>
</tr>
</thead>
<tbody>
<?php
	$no=1; foreach ($presensi as $p):
	$jm = date_create($p->jam_masuk);
	$jmm =  date_format($jm,"H:i:s");

	$jk = date_create($p->jam_keluar);
	$jkk =  date_format($jk,"H:i:s");

	$awal  = date_create($p->jam_keluar);
	$akhir = date_create($p->jam_masuk); // waktu sekarang
	$diff  = date_diff( $awal, $akhir );
	$tlk   = $diff->h - 8;
	$tlkk = ($tlk > 1 ? $tlk : 0);
	if($diff->h >= 8){
		$tjknya = $diff->h - 8;
		$ket = "<span class='badge badge-warning'>Jam Kerja Lebih</span>";
		$tjk = "<span class='badge badge-warning'>total $diff->h jam kerja dan Jam Kerja lebih  $tjknya</span>";
	}elseif($diff->h <= 8){
		$tjknya = $diff->h - 8;
		$ket = "<span class='badge badge-danger'>Jam Kerja Kurang</span>";
		$tjk = "<span class='badge badge-danger'>total $diff->h jam kerja dan Jam Kerja $tjknya</span>";
	}elseif($diff->h == 8){
		$ket = "<span class='badge badge-success'>Jam Kerja Pas</span>";
		$tjk = "<span class='badge badge-success'>Jam Kerja Pas 8 jam</span>";
	}
	?>

	<tr>
	<td><?= $no++ ?></td>
	<td><?= $p->tanggal ?></td>
	<td><?= $jmm ?></td>
	<td><?= $jkk ?></td>
	<td><?= $ket?></td>
	<td><?= $tjk ?></td>
	<td><?= $tlkk ?></td>
	</tr>
	<?php endforeach ?>
	</tbody>
	</table>
	</body>
	</html>
