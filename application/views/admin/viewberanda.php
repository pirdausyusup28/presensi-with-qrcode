<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Beranda</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="#!">Beranda</a></li>
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
                    <div class="card-header text-center">
					<div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>SMA ISLAM PESANTREN PUTRI AS-SYAFI'IYAH 04  </h5><br>
						<img src="<?= base_url(); ?>assets/bgnya.png" alt="" class="img-fluid mb-4" width="30%">
                        <!-- <button type="button" class="btn btn-primary btn-sm"> Tambah guru  </button> -->
                        <!-- <a href="<?= base_url('Admin/formtambahguru '); ?>" class="btn btn-primary btn-sm">Tambah guru   </a> -->
                        <!-- <span class="d-block m-t-5">use class <code>table-striped</code> inside table element</span> -->
                    </div>
                    <!-- <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIP</th>
                                        <th>Nama Guru</th>
                                        <th>TANGGAL</th>
                                        <th>ABSEN MASUK</th>
                                        <th>ABSEN KELUAR</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($pres as $v): ?>
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
                                            <td><?= $v->tanggal ?></td>
                                            <td><?= $v->jam_masuk ?></td>
                                            <td><?= $v->jam_keluar ?></td>
                                            <td><?= $ket?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
