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
                            <h5>Cetak Data Presensi Siswa</h5>
                            <form action="<?= base_url('Admin/cetakpresensisiswa');?>" method="post" class="form-horizontal">
							<div class="">
								<label for="staticEmail" class="col-sm-2 col-form-label">Dari Tanggal</label>
								<div class="col-sm-10">
									<input type="date" class="form-control" id="tglawal" name="tglawal">
								</div>
							</div>
							<div class="">
								<label for="inputPassword" class="col-sm-2 col-form-label">Sampai Tanggal</label>
								<div class="col-sm-10">
									<input type="date" class="form-control" id="tglakhir" name="tglakhir">
								</div>
							</div>
							<div class="">
								<label for="inputPassword" class="col-sm-2 col-form-label">NISN</label>
								<div class="col-sm-10">
									<select name="nisn" id="nisn" class="form-control">
										<!-- <option value="semua">Semua</option> -->
										<?php foreach($nisn as $v){?>
											<option value="<?= $v->nisn?>"><?= $v->nisn?> || <?= $v->nama_siswa?></option>
										<?php }?>
									</select>
								</div>
							</div><br>
							<button type="submit" class="btn btn-primary btn-sm">Cetak</button>
							<button type="button" class="btn btn-danger btn-sm">Batal</button>
						</form>
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->