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
                            <h5>Form Input Kehadiran Guru Manual</h5>
                        </div>
                        <div class="card-body">
                            <!-- <div class="card-title d-flex align-items-start justify-content-between"> -->
                                <form method="post" action="<?= base_url() ?>Admin/savedatakehadiran">
                                    <div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Guru</label>
                                        <div class="col-sm-12">
                                            <select name="nip" class="form-control" id="nip">
                                                <?php foreach($guru as $k):?>
                                                    <option value="<?= $k->nip?>"><?= $k->nip?> || <?= $k->nama_guru?></option>
                                                <?php endforeach?>
											</select>
                                        </div>
                                    </div>
									<div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis Kehadiran</label>
                                        <div class="col-sm-12">
                                            <select name="flag" class="form-control" id="flag">
												<option value="-">-- Pilih Jenis Kehadiran</option>
												<option value="0">Masuk</option>
												<option value="1">Telat</option>
												<option value="2">Izin</option>
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