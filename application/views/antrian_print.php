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
		FARMASI
		<br />
		<div style="font-size: 20;">
			<h1 class="page-header">
				<b><?php echo $antrian[0]['no_antrian']; ?></b>
			</h1>
		</div>
		<h4><b><?php echo $antrian[0]['created_at']; ?></b></h4>
		Silahkan menunggu nomor antrian anda dipanggil
	</div>


	<script>
		window.addEventListener("load", window.print());

		window.onafterprint = function() {
			// window.onfocus = function() {
				window.close();
			// }
		};
		window.onmouseover = function() {
			window.close();
		}
		setTimeout(function(){
			window.close();
		}, 500)
	</script>
</body>

</html>
