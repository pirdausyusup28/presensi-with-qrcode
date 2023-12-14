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
                            <a href="<?= base_url('admin/inputkehadiran');?>"class="btn btn-warning btn-sm">Input Kehadiran</a><br><br>
                        <h5>List Data Presensi</h5>
                        </div>
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIP</th>
                                            <th>Nama Guru</th>
                                            <th>Guru Mapel</th>
                                            <th>TANGGAL</th>
                                            <th>ABSEN MASUK</th>
                                            <th>ABSEN KELUAR</th>
                                            <th>KETERANGAN</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach ($presensi as $v): ?>
                                            <?php
                                                $awal  = date_create($v->jam_keluar);
                                                $akhir = date_create($v->jam_masuk); // waktu sekarang
                                                $diff  = date_diff( $awal, $akhir );
                                                if($diff->h >= 8){
                                                    $ket = "<span class='badge badge-warning'>Jam Kerja Lebih</span>";
                                                }elseif($diff->h <= 8){
                                                    $ket = "<span class='badge badge-danger'>Jam Kerja Kurang</span>";
                                                }elseif($diff->h == 8){
                                                    $ket = "<span class='badge badge-success'>Jam Kerja Pas</span>";
                                                }
                                            ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $v->nip ?></td>
                                                <td><?= $v->nama_guru ?></td>
                                                <td><?= $v->guru_mapel ?></td>
                                                <td><?= $v->tanggal ?></td>
                                                <td><?= $v->jam_masuk ?></td>
                                                <td><?= $v->jam_keluar ?></td>
                                                <td><?= $ket?></td>
                                                <td>
                                                    <!-- <input type="checkbox" id="flag" name="flag" class="form-control" value="<?= $v->nip?>"> -->
                                                    <a href="<?= base_url('Admin/approve/')?><?= $v->nip?>" type="submit" class="btn btn-primary btn-sm">Approve</a>
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
                                        <th>NIP</th>
                                        <th>Nama Guru</th>
                                        <th>Guru Mapel</th>
                                        <th>TANGGAL</th>
                                        <th>ABSEN MASUK</th>
                                        <th>ABSEN KELUAR</th>
                                        <th>KETERANGAN</th>
										<th>TOTAL JAM KERJA</th>
										<th>TOTAL JAM LEMBUR</th>
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
                                            <td><?= $v->nip ?></td>
                                            <td><?= $v->nama_guru ?></td>
                                            <td><?= $v->guru_mapel ?></td>
                                            <td><?= $v->tanggal ?></td>
                                            <td><?= $v->jam_masuk ?></td>
                                            <td><?= $v->jam_keluar ?></td>
                                            <td><?= ($v->flag == '2')?'<span class="badge bg-success">Izin</span>':$ket ?></td>
                                            <td><?= ($v->flag == '2')?'<span class="badge bg-danger">Jam Kerja 0</span>':$tjk ?></td>
                                            <td><?= $tlkk ?></td>
                                            <!-- <td>
                                                <input type="checkbox" id="flag" name="flag" class="form-control" value="<?= $v->nip?>">
												<a href="<?= base_url('Admin/approve/')?><?= $v->nip?>" type="submit" class="btn btn-success btn-sm">Sudah di Approve</a>
                                            </td> -->
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