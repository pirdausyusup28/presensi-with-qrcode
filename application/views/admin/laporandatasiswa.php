<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Laporan Data Siswa</h5>
                        <a href="<?= base_url('admin/cetaksiswa');?>" class="btn btn-primary btn-sm">Cetak</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NISN</th>
                                        <th>NAMA SISWA</th>
                                        <th>KELAS</th>
                                        <th>ORANG TUA SISWA</th>
                                        <th>ALAMAT SISWA</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($data as $d):?>
                                    <tr>
                                        <td><?= $no++?></td>
                                        <td><?= $d->nisn?></td>
                                        <td><?= $d->nama_siswa?></td>
                                        <td><?= $d->nama_kelas?></td>
                                        <td><?= $d->orangtua_siswa?></td>
                                        <td><?= $d->alamat_siswa?></td>
                                        <td><?= $d->status?></td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->