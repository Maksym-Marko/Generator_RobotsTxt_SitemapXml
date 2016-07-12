<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Delete file</title>
</head>
<body>

	<?
		unlink( '../robots.txt' );
	?>
	<h1>Файл robots.txt удалено</h1>
	<script>
		
		window.onload = function(){

			setTimeout( function(){window.location.href = 'index.php';}, 2000 );

		};

	</script>

</body>
</html>