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
                        <a href="<?= base_url('admin/inputkehadiransiswa');?>"class="btn btn-warning btn-sm">Input Kehadiran</a><br><br>
                        <h5>List Data Presensi Siswa</h5>
                        </div>
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NISN</th>
                                            <th>NAMA SISWA</th>
                                            <th>KELAS</th>
                                            <th>TANGGAL</th>
                                            <th>ABSEN MASUK</th>
                                            <th>ABSEN KELUAR</th>
                                            <th>KETERANGAN</th>
                                            <th><?= ($this->session->userdata('role') == 'ots')?'FILE UPLOAD':'STATUS';?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach ($presensi as $v): ?>
                                            <?php
                                                $awal  = date_create($v->jam_keluar);
                                                $akhir = date_create($v->jam_masuk); // waktu sekarang
                                                $diff  = date_diff( $awal, $akhir );
                                                if($diff->h >= 8){
                                                    $ket = "<span class='badge bg-warning'>Jam Kerja Lebih</span>";
                                                }elseif($diff->h <= 8){
                                                    $ket = "<span class='badge bg-danger'>Jam Kerja Kurang</span>";
                                                }elseif($diff->h == 8){
                                                    $ket = "<span class='badge bg-success'>Jam Kerja Pas</span>";
                                                }
                                            ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $v->nisn ?></td>
                                                <td><?= $v->nama_siswa ?></td>
                                                <td><?= $v->nama_kelas ?></td>
                                                <td><?= $v->tanggal ?></td>
                                                <td><?= $v->jam_masuk ?></td>
                                                <td><?= $v->jam_keluar ?></td>
                                                <td>
                                                    <?php if($v->flag == '3'){?>
                                                        <span class='badge bg-success'>Sakit</span>
                                                    <?php }elseif($v->flag == '2'){ ?>
                                                        <span class='badge bg-danger'>Izin</span>
                                                    <?php }else{ ?>
                                                        <span class=''></span>
                                                    <?php }?>
                                                </td>
                                                <td>
                                                    <?php if($this->session->userdata('role') !== 'ots'){?>
                                                        <a href="<?= base_url('Admin/approvesiswa/') . $v->nisn ?>" class="btn btn-primary btn-sm approve-link">Approve</a>
                                                    <?php } ?>
                                                        <a href="<?= base_url('assets/buktisakit/') . $v->gambar ?>" target="_blank">Lihat Dokumen Upload</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                        <h5>List Data yang sudah di Approve</h5>
                        </div>
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NISN</th>
                                        <th>NAMA SISWA</th>
                                        <th>KELAS</th>
                                        <th>TANGGAL</th>
                                        <th>ABSEN MASUK</th>
                                        <th>ABSEN KELUAR</th>
                                        <th>KETERANGAN</th>
										<!-- <th>TOTAL JAM KERJA</th>
										<th>TOTAL JAM LEMBUR</th> -->
                                        <!-- <th>STATUS</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($presensi_ap as $v): ?>
										<?php
											$awal  = date_create($v->jam_keluar);
											$akhir = date_create($v->jam_masuk); // waktu sekarang
											$diff  = date_diff( $awal, $akhir );
											$tlk   = $diff->h - 8;
											$tlkk = ($tlk > 1 ? $tlk : 0);
											if($diff->h >= 8){
												$tjknya = $diff->h - 8;
												$ket = "<span class='badge bg-warning'>Jam Kerja Lebih</span>";
												$tjk = "<span class='badge bg-warning'>total $diff->h jam kerja dan Jam Kerja lebih $tjknya</span>";
											}elseif($diff->h <= 8){
												$tjknya = $diff->h - 8;
												$ket = "<span class='badge bg-danger'>Jam Kerja Kurang</span>";
												$tjk = "<span class='badge bg-danger'>total $diff->h jam kerja dan Jam Kerja $tjknya</span>";
											}elseif($diff->h == 8){
												$ket = "<span class='badge bg-success'>Jam Kerja Pas</span>";
												$tjk = "<span class='badge bg-success'>Jam Kerja Pas 8 jam</span>";
											}
										?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $v->nisn ?></td>
                                            <td><?= $v->nama_siswa ?></td>
                                            <td><?= $v->nama_kelas ?></td>
                                            <td><?= $v->tanggal ?></td>
                                            <td><?= $v->jam_masuk ?></td>
                                            <td><?= $v->jam_keluar ?></td>
                                            <td>
                                                <?php if($v->flag == '3'){?>
                                                    <span class='badge bg-success'>Sakit</span>
                                                <?php }elseif($v->flag == '2'){ ?>
                                                    <span class='badge bg-danger'>Izin</span>
                                                <?php }else{ ?>
                                                    <span class=''></span>
                                                <?php }?>
                                            </td>
                                            <!-- <td><?= ($v->flag == '2')?'<span class="badge bg-danger">0</span>':$tjk ?></td> -->
                                            <!-- <td><?= $tlkk ?></td> -->
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
<!-- Include jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Your JavaScript code -->
<script>
    $(document).ready(function() {
        // Intercept the click event on the 'Approve' link
        $("a.approve-link").click(function(event) {
            event.preventDefault(); // Prevent the default link behavior

            // Get the URL from the href attribute
            var approveUrl = $(this).attr("href");

            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Yakin Ingin mengApprove absensi siswa ini ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                // If confirmed, navigate to the approval URL
                if (result.isConfirmed) {
                    window.location.href = approveUrl;
                }
            });
        });
    });
</script>