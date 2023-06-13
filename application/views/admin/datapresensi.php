<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Presensi    </h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Table Presensi </a></li>
                            <li class="breadcrumb-item"><a href="#!">Presensi   </a></li>
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
                        <h5>List Data Presensi  </h5>
                        <!-- <button type="button" class="btn btn-primary btn-sm"> Tambah guru  </button> -->
                        <!-- <a href="<?= base_url('Admin/formtambahguru '); ?>" class="btn btn-primary btn-sm">Tambah guru   </a> -->
                        <!-- <span class="d-block m-t-5">use class <code>table-striped</code> inside table element</span> -->
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
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
            </div>
        </div>

		<div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>List Data yang sudah di Approve  </h5>
                        <!-- <button type="button" class="btn btn-primary btn-sm"> Tambah guru  </button> -->
                        <!-- <a href="<?= base_url('Admin/formtambahguru '); ?>" class="btn btn-primary btn-sm">Tambah guru   </a> -->
                        <!-- <span class="d-block m-t-5">use class <code>table-striped</code> inside table element</span> -->
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
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
												$ket = "<span class='badge badge-warning'>Jam Kerja Lebih</span>";
												$tjk = "<span class='badge badge-warning'>total $diff->h jam kerja dan Jam Kerja lebih $tjknya</span>";
											}elseif($diff->h <= 8){
												$tjknya = $diff->h - 8;
												$ket = "<span class='badge badge-danger'>Jam Kerja Kurang</span>";
												$tjk = "<span class='badge badge-danger'>total $diff->h jam kerja dan Jam Kerja $tjknya</span>";
											}elseif($diff->h == 8){
												$ket = "<span class='badge badge-success'>Jam Kerja Pas</span>";
												$tjk = "<span class='badge badge-success'>Jam Kerja Pas 8 jam</span>";
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
                                            <td><?= $ket ?></td>
                                            <td><?= $tjk ?></td>
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
        <!-- [ Main Content ] end -->
    </div>
</section>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
	$(document).ready(function () {
		$("#flag").click(function(){
  			console.log($('#flag').val());
		});
	});
</script>
