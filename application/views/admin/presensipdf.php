<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Presensi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <center><img src="<?= base_url(); ?>assets/logo.jpg" alt="" class="" style="width:400px;height:100px"></center>
    <hr size="20px">
    <br>
    <center>
      <p>Laporan Presensi Harian Guru</p>
    </center>
    <center>
      <p>Periode : <?= $_POST['tglawal']?> s/d <?= $_POST['tglakhir']?> </p>
    </center>
    <br> <?php foreach($presensi as $a)?> <table border='1' class="table table-striped table-bordered table-sm" style="font-size:12px">
      <thead>
        <tr>
          <th style="width:100px;">NIP</th>
          <th style="width:10px;">:</th>
          <th> <?= $a->nip?> </th>
        </tr>
        <tr>
          <th style="width:100px;">NAMA</th>
          <th style="width:10px;">:</th>
          <th> <?= $a->nama_guru?> </th>
        </tr>
        <tr>
          <th style="width:100px;">Wali Kelas</th>
          <th style="width:10px;">:</th>
          <th> <?= $a->nama_kelas?> </th>
        </tr>
      </thead>
    </table>
    <br>
    <br>
    <table border='1' class="table table-striped table-bordered table-sm" style="font-size:12px">
      <thead>
        <tr>
          <th>#</th>
          <th>TANGGAL</th>
          <th>JAM MASUK</th>
          <th>JAM KELUAR</th>
          <th>TOTAL JAM KERJA</th>
          <th>KETERANGAN</th>
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
          $tlk   = $diff->h - 9;
          $tlkk = ($tlk > 1 ? $tlk : 0);

          if ($p->flag == '0') {
            if($p->jam_masuk > "06:45:00"){
              $tjknya = $diff->h - 9;
              $ket = "<span class='badge badge-warning'>Telat</span>";
              $tjk = "$diff->h jam, $diff->i Menit";

            }elseif($p->jam_keluar < "14:00:00"){
              $tjknya = $diff->h - 9;
              $ket = "<span class='badge badge-danger'>Jam Pulang Lebih Awal</span>";
              $tjk = "$diff->h jam, $diff->i Menit";
            }elseif($p->jam_keluar > "15:00:00"){
              $tjknya = $diff->h - 9;
              $ket = "";
              $tjk = "$diff->h jam, $diff->i Menit";
            }else{
              $ket = "";
              $tjk = "";
            }
          }else{
            $ket="";
            $tjk = "";
          }
        ?> 
  <tr>
          <td> <?= $no++ ?> </td>
          <!-- <td> <?php if ($p->tgl_kalender !== ''): ?> <span style="color: red"> <?= $p->tanggal ?> </span> <?php else: ?> <?= $p->tanggal ?> <?php endif; ?> </td> -->
          <td><?= $p->tanggal ?></td>
          <td> <?= $jmm ?> </td>
          <td> <?= $jkk ?> </td>
          <td> <?= $tjk ?> </td>
          <td> 
          <?php if($p->flag == '0'){
            echo "<span class='badge badge-success'>Hadir</span>";
          }elseif($p->flag == '1'){
            echo "<span class='badge badge-danger'>Alfa</span>";
          }elseif($p->flag == '2'){
            echo "<span class='badge badge-primary'>Izin</span>";
          }elseif($p->flag == '3'){
            echo "<span class='badge badge-primary'>Sakit</span>";
          } ?> <?= $ket?></td>
          </td>
        </tr> <?php endforeach ?> </tbody>
    </table>
  </body>
</html>