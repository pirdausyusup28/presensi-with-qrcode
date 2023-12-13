<?php foreach ($kelas as $v): ?>
<?php endforeach ?>
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Form Data kelas</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url() ?>Admin/updatedatakelas">
                                <div class="">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Kelas</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?= $v->id_kelas; ?>">
                                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="" value="<?= $v->nama_kelas; ?>">
                                    </div>
                                </div><br>
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