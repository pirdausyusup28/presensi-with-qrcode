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
                            <h5>Form Generate Qr Code</h5>
                        </div>
                        <div class="card-body">
                            <!-- <div class="card-title d-flex align-items-start justify-content-between"> -->
                                <form id="updateForm" action="<?= base_url() ?>Admin/simpanqrcode" method="post">
                                    <div class="">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">NIP</label>
                                        <div class="col-sm-9">
                                            <!-- <input type="text" class="form-control" id="nip" name="nip" placeholder=""> -->
                                             <select name="nip" id="nip" class="form-control">
                                                <?php foreach($nip as $v):?>
                                                    <option value="<?= $v->nip?>"><?= $v->nip?> - <?= $v->nama_guru?></option>
                                                <?php endforeach?>
                                             </select>
                                        </div>
                                    </div><br>
                                    <div class="">
                                        <div class="col-sm-10">
                                            <input type="button" onclick="showConfirmation()" name="save" class="btn btn-primary" value="Simpan"/>
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