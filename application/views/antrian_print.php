<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<style>
	@media print {
		div.page-break {
			display: block;
			page-break-before: always;
		}
	}

	.struk-no-antrian {
		font-size: 50pt;
		font-weight: 900;
		letter-spacing: 4px;
		line-height: 1.1;
		margin: 3mm 0 2mm;
    }

</style>

<body style="text-align: center;">


	<div>
		<div class="row">
			<div class="col-12">
				<h4 class="page-header">
					PUSKESMAS KEC MATRAMAN
				</h4>
				==========================================================
			</div>
			<!-- /.col -->
		</div>
		Nomor Antrian<br />
		FARMASI<br />
		Asal Poli : <?php echo $antrian[0]['nama_poli']; ?><br />

		<div class="struk-no-antrian"><?php echo $no_antrian; ?></div>
		<!-- <div style="font-size: 20;">
			<h1 class="page-header">
				<b><?php echo $no_antrian; ?></b>
			</h1>
		</div> -->
		<h4><b><?php echo $antrian[0]['created_at']; ?></b></h4>
		
		Silahkan menunggu nomor antrian anda dipanggil
	</div>
	


	<script>
		window.addEventListener("load", window.print());

		window.onafterprint = function() {
			window.close();
		};
	</script>
</body>

</html>
