<?php foreach ($guru as $v): ?>
<?php endforeach ?>
<div class="content-wrapper">
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
                            <form id="updateForm" method="post" action="<?= base_url() ?>Admin/updatedataguru">
                                <div class="">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">NIP</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" class="form-control" id="id_guru" name="id_guru" placeholder="" value="<?= $v->id_guru; ?>">
                                        <input type="text" class="form-control" id="nip" name="nip" placeholder="" value="<?= $v->nip; ?>">
                                    </div>
                                </div>
                                <div class="">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Guru</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="" value="<?= $v->nama_guru; ?>">
                                    </div>
                                </div>
                                <div class="">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                            <option value="-">-- Pilih Jenis kelamin</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Wali Kelas</label>
                                        <div class="col-sm-12">
                                            <select name="walikelas" class="form-control" id="walikelas">
                                                <?php foreach($kelas as $k):?>
                                                    <option value="<?= $k->id_kelas?>"><?= $k->nama_kelas?></option>
                                                <?php endforeach?>
											</select>
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
                                <!-- <div class="">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Mata Pelajaran</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="guru_mapel" name="guru_mapel" placeholder="" value="<?= $v->guru_mapel; ?>">
                                    </div>
                                </div> -->
                                <br>
                                <div class="">
                                    <div class="col-sm-10">
                                        <input type="button" name="update" class="btn btn-primary" value="Update" onclick="showConfirmation()"/>
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