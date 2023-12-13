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
                            <h5>List Data siswa  </h5>
                            <a href="<?= base_url('Admin/formtambahsiswa '); ?>" class="btn btn-primary btn-sm">Tambah siswa   </a>
                        </div>
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NISN</th>
                                            <th>Nama siswa</th>
                                            <th>Kelas</th>                            
                                            <th>Orangtua Siswa</th>
                                            <th>Alamat Siswa</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach ($siswa as $v): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $v->nisn ?></td>
                                                <td><?= $v->nama_siswa ?></td>
                                                <td><?= $v->nama_kelas ?></td>
                                                <td><?= $v->orangtua_siswa ?></td>
                                                <td><?= $v->alamat_siswa ?></td>
                                                <td><?= $v->status ?></td>
                                                <td>
                                                    <a href="<?= base_url('Admin/editsiswa/'); ?><?= $v->id_siswa; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="<?= base_url('Admin/hapusdatasiswa/'); ?><?= $v->id_siswa; ?>" class="btn btn-danger btn-sm">Hapus</a>
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
    </div>
</div>
<!-- / Content -->