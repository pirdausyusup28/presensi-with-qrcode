<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Form Guru</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Form Guru</a></li>
                            <li class="breadcrumb-item"><a href="#!">Form Guru</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                
            </div>
            <!-- [ form-element ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Tambah Guru</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" action="<?= base_url() ?>Admin/savedataguru">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">NIP</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nip" name="nip" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Guru</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
												<option value="-">-- Pilih Jenis kelamin</option>
												<option value="Pria">Pria</option>
												<option value="Wanita">Wanita</option>
											</select>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Mata Pelajaran</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="guru_mapel" name="guru_mapel" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="submit" name="save" class="btn btn-primary" value="Simpan"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                        <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (function() {
                                'use strict';
                                window.addEventListener('load', function() {
                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms = document.getUserByClassName('needs-validation');
                                    // Loop over them and prevent submission
                                    var validation = Array.prototype.filter.call(forms, function(form) {
                                        form.addEventListener('submit', function(event) {
                                            if (form.checkValidity() === false) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }
                                            form.classList.add('was-validated');
                                        }, false);
                                    });
                                }, false);
                            })();
                        </script>
            </div>
            <!-- [ form-element ] end -->
        </div>
        <!-- [ Main Content ] end -->

    </div>
</section>
