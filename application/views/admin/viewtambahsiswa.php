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
                            <h5>Form Data siswa</h5>
                        </div>
                        <div class="card-body">
                            <!-- <div class="card-title d-flex align-items-start justify-content-between"> -->
                                <form method="post" action="<?= base_url() ?>Admin/savedatasiswa">
                                    <div class="">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">NISN</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="nisn" name="nisn" placeholder="">
                                        </div>
                                    </div>
                                    <div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama siswa</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="">
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
                                            <input type="text" class="form-control" id="orangtua_siswa" name="orangtua_siswa" placeholder="">
                                        </div>
                                    </div>
                                    <div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Alamat Siswa</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa" placeholder="">
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
                                            <input type="submit" name="save" class="btn btn-primary" value="Simpan"/>
                                        </div>
                                    </div>
                                </form>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->