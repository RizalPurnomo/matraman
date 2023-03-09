<html>

<head></head>

<body>
	<audio controls id="au" autoplay="autoplay">
		<source src="<?php echo base_url() ?>assets\upload\dubbing\menuju ke kolom 1\di Counter.mp3" type="audio/mpeg" />
		Your browser does not support this audio format.
	</audio>

	<script>
		var c = 0; /*from w  w  w  . j a va  2s  .  c o  m*/
		var songs = ["<?php echo base_url() ?>assets\upload\dubbing\menuju ke kolom 1\Kasir.mp3", "<?php echo base_url() ?>assets\upload\dubbing\menuju ke kolom 1\di Counter.mp3", "C.mp3"];
		var a = document.getElementById("au");
		a.addEventListener("ended", function() {
			document.getElementById("au").src = songs[c];
			a.load();
			console.log(c);
			c++;
			if (c >= songs.length) {
				c = 0;
			}
		});
	</script>
</body>

</html>
