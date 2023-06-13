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
                        <center><h5>Cetak Data Presensi</h5></center>
						<form action="<?= base_url('Admin/cetakpresensi');?>" method="post" class="form-horizontal">
							<div class="form-group row">
								<label for="staticEmail" class="col-sm-2 col-form-label">Dari Tanggal</label>
								<div class="col-sm-10">
									<input type="date" class="form-control" id="tglawal" name="tglawal">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Sampai Tanggal</label>
								<div class="col-sm-10">
									<input type="date" class="form-control" id="tglakhir" name="tglakhir">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">NIP</label>
								<div class="col-sm-10">
									<select name="nip" id="nip" class="form-control">
										<!-- <option value="semua">Semua</option> -->
										<?php foreach($nip as $v){?>
											<option value="<?= $v->nip?>"><?= $v->nip?> || <?= $v->nama_guru?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<!-- <div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Keterangan</label>
								<div class="col-sm-10">
									<select name="nip" id="nip" class="form-control">
										<option value="semua">Semua</option>
										<option value="izin">Izin</option>
										<option value="sakit">Sakit</option>
										<option value="alfa">Alfa</option>
									</select>
								</div>
							</div> -->
							<button type="submit" class="btn btn-primary btn-sm">Cetak</button>
							<button type="submit" class="btn btn-danger btn-sm">Batal</button>
						</form>
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
                                        <th>APPROVE</th>
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
                                            <td><?= $v->tanggal ?></td>
                                            <td><?= $v->jam_masuk ?></td>
                                            <td><?= $v->jam_keluar ?></td>
                                            <td><?= $ket?></td>
                                            <td>
                                                <input type="checkbox" name="flag" class="form-control" value="1">
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
