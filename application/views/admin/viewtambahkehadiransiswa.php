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
                            <h5>Form Input Kehadiran Siswa Manual</h5>
                        </div>
                        <div class="card-body">
                            <!-- <div class="card-title d-flex align-items-start justify-content-between"> -->
                                <form id="updateForm" method="post" action="<?= base_url() ?>Admin/savedatakehadiransiswa" enctype="multipart/form-data">
                                    <div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Siswa</label>
                                        <div class="col-sm-12">
                                            <select name="nisn" class="form-control" id="nisn" required>
                                                <option value="-">-- Pilih Siswa --</option>
                                                <?php foreach($siswa as $k):?>
                                                    <option value="<?= $k->nisn?>"><?= $k->nisn?> || <?= $k->nama_siswa?></option>
                                                <?php endforeach?>
											</select>
                                        </div>
                                    </div>
									<div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis Kehadiran</label>
                                        <div class="col-sm-12">
                                            <select name="flag" class="form-control" id="flag" required>
												<option value="-">-- Pilih Jenis Kehadiran</option>
												<option value="1">Alfa</option>
												<option value="2">Izin</option>
												<option value="3">Sakit</option>
											</select>
                                        </div>
                                    </div>
                                    <div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Upload Photo Surat Sakit (jika siswa sakit)</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" name="gambar">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="">
                                        <div class="col-sm-10">
                                            <input type="button" name="save" class="btn btn-primary" value="Simpan" onclick="showConfirmation()"/>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showConfirmation() {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Yakin Data Yang di input sudah Benar',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('updateForm').submit();
                Swal.fire({
                    title: "Data Berhasil Disimpan",
                    text: "",
                    icon: "success"
                });
            }
        });
    }
</script>