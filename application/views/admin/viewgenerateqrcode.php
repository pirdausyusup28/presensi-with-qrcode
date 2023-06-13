<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Qr Code    </h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Table Qr Code </a></li>
                            <li class="breadcrumb-item"><a href="#!">Qr Code</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>List Data Qr Code  </h5>
                        <a href="<?= base_url('Admin/formtambahqrcode '); ?>" class="btn btn-primary btn-sm">Tambah Qr Code</a>
                        <a href="<?= base_url('Absen/sqanqrcode '); ?>" class="btn btn-success btn-sm">Absen Scan QrCode</a>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
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
        <!-- [ Main Content ] end -->
    </div>
</section>
