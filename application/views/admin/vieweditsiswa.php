<?php foreach ($siswa as $v): ?>
<?php endforeach ?>
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Form Data siswa</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url() ?>Admin/updatedatasiswa">
                                <div class="">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">NISN</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" class="form-control" id="id_siswa" name="id_siswa" placeholder="" value="<?= $v->id_siswa; ?>">
                                        <input type="text" class="form-control" id="nisn" name="nisn" placeholder="" value="<?= $v->nisn; ?>">
                                    </div>
                                </div>
                                <div class="">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Nama siswa</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="" value="<?= $v->nama_siswa; ?>">
                                    </div>
                                </div>
                                <div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Kelas</label>
                                        <div class="col-sm-12">
                                            <select name="kelas" class="form-control" id="kelas">
                                                <?php foreach($kelas as $k):?>
                                                    <option value="<?= $k->id_kelas?>"><?= $k->nama_kelas?></option>
                                                <?php endforeach?>
											</select>
                                        </div>
                                </div>
                                <div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Orangtua</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" value="<?= $v->orangtua_siswa?>" id="orangtua_siswa" name="orangtua_siswa" placeholder="">
                                        </div>
                                    </div>
                                    <div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Alamat Siswa</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" value="<?= $v->alamat_siswa?>" id="alamat_siswa" name="alamat_siswa" placeholder="">
                                        </div>
                                    </div>
                                    <div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-12">
                                            <select name="status" class="form-control" id="status">
                                                <option value="0">Non Aktif</option>
                                                <option value="1">Aktif</option>
											</select>
                                        </div>
                                    </div>
                                <br>
                                <div class="">
                                    <div class="col-sm-10">
                                        <input type="submit" name="update" class="btn btn-primary" value="Update"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>