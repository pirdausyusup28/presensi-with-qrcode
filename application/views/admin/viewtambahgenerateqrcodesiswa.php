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
                            <h5>Form Generate Qr Code Siswa</h5>
                        </div>
                        <div class="card-body">
                            <!-- <div class="card-title d-flex align-items-start justify-content-between"> -->
                                <form action="<?= base_url() ?>Admin/simpanqrcodesiswa" method="post">
                                    <div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">NISN</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nisn" name="nisn" placeholder="">
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