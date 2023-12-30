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
                        <?php if ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><?php echo $this->session->flashdata('error'); ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php elseif ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?php echo $this->session->flashdata('success'); ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?><br>
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
                                                <a href="<?= base_url('Admin/hapusqrcode/'); ?><?= $v->id_barcode ; ?>" class="btn btn-danger btn-sm hapus-link">Hapus</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Intercept the click event on the 'Approve' link
        $("a.hapus-link").click(function(event) {
            event.preventDefault(); // Prevent the default link behavior

            // Get the URL from the href attribute
            var hapusUrl = $(this).attr("href");

            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Yakin Ingin menghapus data ini ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                // If confirmed, navigate to the approval URL
                if (result.isConfirmed) {
                    window.location.href = hapusUrl;
                }
            });
        });
    });
</script>