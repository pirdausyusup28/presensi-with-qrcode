<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDIT Ruhama Depok</title>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/'); ?>fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/bootstrap/css/custom-button.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/morris/morris.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fapicker/dist/css/fontawesome-iconpicker.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css.css">
    <link rel="icon" href="<?= base_url('assets/'); ?>images/favicon.png" type="image/gif">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>app/css/print.css">
    <script src="<?= base_url('assets/'); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            /* background-color: #80afcd; */
            font-family: Arial, Helvetica, sans-serif;
            /* display: flex; */
            justify-content: center;
            /* align-items: center; */
            /* min-height: 100vh; */
            /* line-height: 1.4; */
        }

        .btn-md {
            padding: 1rem 2.4rem;
            font-size: .94rem;
            display: none;
        }

        .swal2-popup {
            font-family: inherit;
            font-size: 1.2rem;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-inverse" style=" background-color: green">
<marquee><h4 style="color: #fff;">SDIT Ruhama Depok</h4></marquee>
</nav>

	</div>
    <!-- <section class='content' id="demo-content"> -->
		<div class="">
			<div class='row'>
				<div class='col-md-6'>
					<div class='box'>
						<div class='box-header'></div>
						<div class='box-body container' style="padding-left: 120px">
							<?php
							$attributes = array('id' => 'button');
							echo form_open('Absen/cek_id', $attributes); ?>
							<div id="sourceSelectPanel" style="display:none">
								<label for="sourceSelect">Change Camera Sources:</label>
								<select id="sourceSelect" style="max-width:400px"></select>
							</div>
							<div class="container">
								<video id="video" width="500" height="400" style="border: 1px solid gray"></video>
							</div>
							<textarea hidden="" name="nip" id="result" readonly></textarea>
							<span> <input type="submit" id="button" class="btn btn-success btn-md" value="Cek Kehadiran"></span>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
				<div class='col-md-6'>
					<div class='box'>
						<div class='box-header'></div>
						<div class='box-body'>
						<div class="panel panel-default">
						<?php
        					date_default_timezone_set("Asia/jakarta");
    					?>
  							<div class="panel-heading">
								
					<?php
					echo $this->session->flashdata('messageAlert');
					$tanggal = date("Y-m-d");
					$day = date('D', strtotime($tanggal));
					$dayList = array(
						'Sun' => 'Minggu',
						'Mon' => 'Senin',
						'Tue' => 'Selasa',
						'Wed' => 'Rabu',
						'Thu' => 'Kamis',
						'Fri' => 'Jumat',
						'Sat' => 'Sabtu'
					);
					?>
								<center><b><p>DATA ABSENSI HARIAN GURU</p> <p><?= $dayList[$day];?> , <?= date("Y-m-d");?></p><span id="jam" style="font-size:24"></span></b></center></div>
  								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>NIP</th>
											<th>Nama</th>
											<th>Tanggal</th>
											<th>Jam Masuk</th>
											<th>Jam Keluar</th>
											<th>Keterangan</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$no=1; foreach ($presensi as $p):
												$jm = date_create($p->jam_masuk);
												$jmm =  date_format($jm,"H:i:s");
									  
												$jk = date_create($p->jam_keluar);
												$jkk =  date_format($jk,"H:i:s");
									  
												$awal  = date_create($p->jam_keluar);
												$akhir = date_create($p->jam_masuk); // waktu sekarang
												$diff  = date_diff( $awal, $akhir );
												$tlk   = $diff->h - 9;
												$tlkk = ($tlk > 1 ? $tlk : 0);
									  
												// if ($p->flag == '0') {
												  if($p->jam_masuk > "06:45:00"){
													$tjknya = $diff->h - 9;
													$ket = "<span class='badge badge-warning' style='background-color:red'>Telat</span>";
													$tjk = "$diff->h jam, $diff->i Menit";
												  }elseif($p->jam_keluar < "14:00:00"){
													$tjknya = $diff->h - 9;
													$ket = "<span class='badge badge-danger'>Jam Pulang Lebih Awal</span>";
													$tjk = "$diff->h jam, $diff->i Menit";
												  }elseif($p->jam_keluar > "15:00:00"){
													$tjknya = $diff->h - 9;
													$ket = "Sudah Absen Pulang";
													$tjk = "$diff->h jam, $diff->i Menit";
												  }else{
													$ket = "Sudah Absen Pulang";
													$tjk = "";
												  }
												// }else{
												//   $ket="";
												//   $tjk = "";
												// }
											  ?> 
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $p->nip ?></td>
												<td><?= $p->nama_guru ?></td>
												<td><?= $p->tanggal ?></td>
												<td><?= $jmm ?></td>
												<td style=<?= $color;?>><?= $jkk ?></td>
												<td><?= $ket?></td>
											</tr>
											<?php endforeach ?> </tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    <!-- </section> -->

    <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/zxing/zxing.min.js"></script>
    <script type="text/javascript">
        window.addEventListener('load', function() {
            let selectedDeviceId;
            let audio = new Audio("assets/audio/beep.mp3");
            const codeReader = new ZXing.BrowserQRCodeReader()
            console.log('ZXing code reader initialized')
            codeReader.getVideoInputDevices()
                .then((videoInputDevices) => {
                    const sourceSelect = document.getElementById('sourceSelect')
                    selectedDeviceId = videoInputDevices[0].deviceId
                    if (videoInputDevices.length >= 1) {
                        videoInputDevices.forEach((element) => {
                            const sourceOption = document.createElement('option')
                            sourceOption.text = element.label
                            sourceOption.value = element.deviceId
                            sourceSelect.appendChild(sourceOption)
                        })
                        sourceSelect.onchange = () => {
                            selectedDeviceId = sourceSelect.value;
                        };
                        const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                        sourceSelectPanel.style.display = 'block'
                    }
                    codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'video').then((result) => {
                        console.log(result)
                        document.getElementById('result').textContent = result.text
                        if (result != null) {
                            audio.play();
                        }
                        $('#button').submit();
                    }).catch((err) => {
                        console.error(err)
                        document.getElementById('result').textContent = err
                    })
                    console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
                })
                .catch((err) => {
                    console.error(err)
                })
        })
		window.onload = function() { jam(); }
       
	   function jam() {
		   var e = document.getElementById('jam'),
		   d = new Date(), h, m, s;
		   h = d.getHours();
		   m = set(d.getMinutes());
		   s = set(d.getSeconds());
	  
		   e.innerHTML = h +':'+ m +':'+ s;
	  
		   setTimeout('jam()', 1000);
	   }
	  
	   function set(e) {
		   e = e < 10 ? '0'+ e : e;
		   return e;
	   }

    </script>

    <script src="<?= base_url('assets/'); ?>plugins/morris/morris.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <!-- SlimScroll -->
    <script src="<?= base_url('assets/'); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/'); ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- page script -->
    <script src="<?= base_url('assets/'); ?>plugins/raphael/raphael-min.js"></script>
    <!-- sweetalert -->
    <script src="<?= base_url('assets/'); ?>plugins/sweetalert/sweetalert.min.js"></script>
    <!-- font awesome picker -->

    <script src="<?= base_url('assets/'); ?>plugins/fapicker/dist/js/fontawesome-iconpicker.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/sweetalert/sweetalert2.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/Bootstrap-validator/validator.js"></script>
    <script src="<?= base_url('assets/'); ?>app/core/alert.js"></script>
    <script src="<?= base_url('assets/'); ?>app/core/iconpicker.js"></script>
    <script>
        <?= $this->session->flashdata('messageAlert'); ?>
    </script>
</body>

</html>
