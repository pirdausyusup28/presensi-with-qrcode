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
        <th style="width:100px;">
          <img src="
									<?= base_url(); ?>assets/img/logo pesantren.png" alt="" class="" style="width:100%;">
        </th>
        <th style="width:100px;">
          <p style="text-align:center;">SDIT Ruhama Depok</p>
        </th>
      </tr>
    </table>
    <hr size="20px">
    <br>
    <center>
      <p>Laporan Data Guru</p>
    </center>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>NIP</th>
                <th>NAMA GURU</th>
                <th>JENIS KELAMIN</th>
                <th>WALIKELAS</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($data as $d):?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $d->nip?></td>
                <td><?= $d->nama_guru?></td>
                <td><?= $d->jenis_kelamin?></td>
                <td><?= $d->nama_kelas?></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
  </body>
</html>