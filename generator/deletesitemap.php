<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Delete file</title>
</head>
<body>

	<?
		unlink( '../sitemap.xml' );
	?>
	<h1>Файл sitemap.xml удалено</h1>
	<script>
		
		window.onload = function(){

			setTimeout( function(){window.location.href = 'generatorsitemap.php';}, 2000 );

		};

	</script>

</body>
</html>