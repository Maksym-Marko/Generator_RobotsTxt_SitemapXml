<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Genetatot</title>
</head>
	<body>

	<?php	
		$domname = $_POST['domname'];
		$countinput = $_POST['countinput'];

		if( $domname == '' ):?>
		<h2>Введите домен сайта</h2>
		<script>		
			window.onload = function(){
				setTimeout( function(){window.location.href = 'index.php';}, 2000 );
			};
		</script>
		<?	die;
		endif;

		if( ( $_POST['disallow0'] !== '' ) || ( $countinput > 0 ) ):
			for( $i = 0; $i < $countinput + 1; $i++ ){		
				$disallowarr[$i] = 'Disallow: ' . $_POST['disallow' . $i] . " \r\n";
				if( $_POST['disallow' . $i] !== '' ):
					$disallow .= $disallowarr[$i];
				endif;
			}
		else:
			$disallow = '';
		endif;

		$default_robots = 
"User-Agent: *
" . $disallow . "
Host: " . $domname . "
Sitemap: http://" . $domname . "/sitemap.xml";

		if( isset( $_POST['generate'] ) ){

			if( file_exists( '../robots.txt' ) ):
				$generate_file = fopen( '../robots.txt', 'w' );
			endif;	
			
			$open_file = fopen( '../robots.txt', 'a' );
			$add_data_in_file = fwrite( $open_file, $default_robots );
			fclose( $open_file );

		}
	?>

	<h1>Файл robots.txt сгенерирован</h1>

	<script>
		
		window.onload = function(){

			setTimeout( function(){window.location.href = 'index.php';}, 2000 );

		};

	</script>

	</body>
</html>