<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Genetatot sitemap</title>
</head>
	<body>

	<?php	
		$date = $_POST['date'];
		$countinput = $_POST['countinput'];

		if( $_POST['url0'] == '' ): ?>
			<h2>Нужно ввести адрес страницы</h2>
			<script>		
				window.onload = function(){
					setTimeout( function(){window.location.href = 'generatorsitemap.php';}, 2000 );
				};
			</script>
		<? die;
		endif;

		if( ( $_POST['url0'] !== '' ) || ( $countinput > 0 ) ):
			for( $i = 0; $i < $countinput + 1; $i++ ){		
				$thisurl = $_POST['url' . $i];
				$thispriority = $_POST['priority' . $i];
				$urlarr[$i] =
'<url>
   <loc>' . $thisurl . '</loc>
   <lastmod>' . $date . '</lastmod>
   <changefreq>weekly</changefreq>
   <priority>' . $thispriority . '</priority>
</url>' . "\r\n";

				if( $_POST['url' . $i] !== '' ):
					$urls .= $urlarr[$i];
				endif;				
			}

		endif;

		$default_sitemap = 
'<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">    

' . $urls . '
</urlset>';

		if( isset( $_POST['generate'] ) ){

			if( file_exists( '../sitemap.xml' ) ):
				$generate_file = fopen( '../sitemap.xml', 'w' );
			endif;	
			
			$open_file = fopen( '../sitemap.xml', 'a' );
			$add_data_in_file = fwrite( $open_file, $default_sitemap );
			fclose( $open_file );

		}
	?>

	<h1>Файл sitemap.xml сгенерирован</h1>

	<script>
		
		window.onload = function(){

			setTimeout( function(){window.location.href = 'generatorsitemap.php';}, 2000 );

		};

	</script>

	</body>
</html>