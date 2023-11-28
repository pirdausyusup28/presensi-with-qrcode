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
                        <h5>List Data Qr Code  </h5>
                        <a href="<?= base_url('Admin/formtambahqrcode '); ?>" class="btn btn-primary btn-sm">Tambah Qr Code</a>
                        <a href="<?= base_url('Absen/sqanqrcode '); ?>" class="btn btn-success btn-sm" target="_blank">Absen Scan QrCode</a>
                        </div>
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Guru MaPel</th>
                                        <th>QrCode</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($qrcode as $v): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $v->nip ?></td>
                                            <td><?= $v->nama_guru ?></td>
                                            <td><?= $v->guru_mapel ?></td>
                                            <td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$v->gambar;?>"></td>
                                            <td>
												<a href="<?= base_url('Admin/cetakqrcode/'); ?><?= $v->id_barcode ; ?>" class="btn btn-warning btn-sm">Cetak</a>
                                                <a href="<?= base_url('Admin/hapusqrcode/'); ?><?= $v->id_barcode ; ?>" class="btn btn-danger btn-sm">Hapus</a>
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