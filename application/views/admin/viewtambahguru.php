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
                            <h5>Form Data guru</h5>
                        </div>
                        <div class="card-body">
                            <!-- <div class="card-title d-flex align-items-start justify-content-between"> -->
                                <form method="post" action="<?= base_url() ?>Admin/savedataguru">
                                    <div class="">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">NIP</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="nip" name="nip" placeholder="">
                                        </div>
                                    </div>
                                    <div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Guru</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="">
                                        </div>
                                    </div>
									<div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-12">
                                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
												<option value="-">-- Pilih Jenis kelamin</option>
												<option value="Pria">Pria</option>
												<option value="Wanita">Wanita</option>
											</select>
                                        </div>
                                    </div>
									<div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Mata Pelajaran</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="guru_mapel" name="guru_mapel" placeholder="">
                                        </div>
                                    </div><br>
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