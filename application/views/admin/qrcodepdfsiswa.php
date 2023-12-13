<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php foreach($qr as $v){ ?><br><br><br><br><br><br>
		<center>
			<img style="width: 30%;" src="<?php echo base_url().'assets/images/'.$v->gambar;?>">
			<p><?=$v->nisn ?></p>
			<p><?=$v->nama_siswa ?></p>
		</center>
	<?php }?>
	
</body>
</html>
