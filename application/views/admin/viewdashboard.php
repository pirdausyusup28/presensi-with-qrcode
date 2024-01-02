<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->
<?php foreach($hadir as $h):?><?php endforeach?>
<?php foreach($ijin as $i):?><?php endforeach?>
<?php foreach($telat as $t):?><?php endforeach?>

<?php foreach($hadirs as $hs):?><?php endforeach?>
<?php foreach($ijins as $is):?><?php endforeach?>
<?php foreach($telats as $ts):?><?php endforeach?>
<?php
    if($this->session->userdata('role') == 'ots'){
        $flag = "Siswa";
    }else if($this->session->userdata('role') == 'guru'){
        $flag = "Guru";
    }else{
        $flag = "Guru";
    }
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
    <div class="col-lg-12 col-md-4 order-1">
        <div class="row">
        <?php
    if($this->session->userdata('role') !== 'ots'){ ?>
        <div class="col-lg-4 col-md-4 col-4 mb-2">
            <div class="card">
            <div class="card-body">
                <span class="fw-medium d-block mb-1">Absensi Guru Bulan Ini</span>
                <h3 class="card-title mb-2"><?= $h->totalhadirguru?></h3>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-4 mb-2">
            <div class="card">
            <div class="card-body">
                <span class="fw-medium d-block mb-1">Total Guru Izin Bulan Ini</span>
                <h3 class="card-title mb-2"><?= $i->totalijinguru?></h3>
            </div>
            </div> 
        </div>
        <div class="col-lg-4 col-md-4 col-4 mb-2">
            <div class="card">
            <div class="card-body">
                <span class="fw-medium d-block mb-1">Total Guru Telat Bulan Ini</span>
                <h3 class="card-title mb-2"><?= $t->totaltelatguru?></h3>
            </div>
            </div>
        </div>
        <?php }?>
        <div class="col-lg-4 col-md-4 col-4 mb-2">
            <div class="card">
            <div class="card-body">
                <span class="fw-medium d-block mb-1">Total Absensi Siswa Bulan Ini</span>
                <h3 class="card-title mb-2"><?= $hs->totalhadirsiswa?></h3>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-4 mb-2">
            <div class="card">
            <div class="card-body">
                <span class="fw-medium d-block mb-1">Total Siswa Izin Bulan Ini</span>
                <h3 class="card-title mb-2"><?= $is->totalijinsiswa?></h3>
            </div>
            </div> 
        </div>
        <div class="col-lg-4 col-md-4 col-4 mb-4">
            <div class="card">
            <div class="card-body">
                <span class="fw-medium d-block mb-1">Total Siswa Telat Bulan Ini</span>
                <h3 class="card-title mb-2"><?= $ts->totaltelatsiswa?></h3>
            </div>
            </div>
        </div>
        </div>
        <ul class="list-group">
            <li class="list-group-item active" aria-current="true">HARI LIBUR NASIONAL</li>
            <?php foreach($libur as $lib):?>
                <li class="list-group-item"><span class="badge rounded-pill bg-danger"><?= $lib->tgl_kalender?></span> <span class="badge rounded-pill bg-primary"> <?= $lib->deskripsi?></span></li>
            <?php endforeach?>
        </ul>
    </div>
    </div>
    <div class="row">
    </div>
</div>
<!-- / Content -->