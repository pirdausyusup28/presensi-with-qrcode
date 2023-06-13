<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data guru    </h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Table guru </a></li>
                            <li class="breadcrumb-item"><a href="#!">guru   </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>List Data guru  </h5>
                        <!-- <button type="button" class="btn btn-primary btn-sm"> Tambah guru  </button> -->
                        <a href="<?= base_url('Admin/formtambahguru '); ?>" class="btn btn-primary btn-sm">Tambah guru   </a>
                        <!-- <span class="d-block m-t-5">use class <code>table-striped</code> inside table element</span> -->
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIP</th>
                                        <th>Nama Guru</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Guru Mata Pelajaran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($guru as $v): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $v->nip ?></td>
                                            <td><?= $v->nama_guru ?></td>
                                            <td><?= $v->jenis_kelamin ?></td>
                                            <td><?= $v->guru_mapel ?></td>
                                            <td>
                                                <a href="<?= base_url('Admin/editguru/'); ?><?= $v->id_guru; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?= base_url('Admin/hapusdataguru/'); ?><?= $v->id_guru; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
