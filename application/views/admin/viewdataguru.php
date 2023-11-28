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
                            <h5>List Data guru  </h5>
                            <a href="<?= base_url('Admin/formtambahguru '); ?>" class="btn btn-primary btn-sm">Tambah guru   </a>
                        </div>
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIP</th>
                                            <th>Nama Guru</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Guru Mata Pelajaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach ($guru as $v): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $v->nip ?></td>
                                                <td><?= $v->nama_guru ?></td>
                                                <td><?= $v->jenis_kelamin ?></td>
                                                <td><?= $v->guru_mapel ?></td>
                                                <td>
                                                    <a href="<?= base_url('Admin/editguru/'); ?><?= $v->id_guru; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="<?= base_url('Admin/hapusdataguru/'); ?><?= $v->id_guru; ?>" class="btn btn-danger btn-sm">Hapus</a>
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