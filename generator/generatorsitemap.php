<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Genetatot sitemap.xml</title>
	<style>
		.link{
			width: 500px;
			margin: 0px auto;
			text-align: right;
		}
		.plus span{
			font-size: 20px;
			font-weight: bold;
			cursor: pointer;
		}
		.ready{
			text-align: center;
		}
	</style>
</head>
<body>

	<?
	if( file_exists( '../robots.txt' ) && file_exists( '../sitemap.xml' ) ):
	?>
		<h1 class="ready">Ваш сайт готов к индексации</h1>
	<?
	endif;
	?>

	<div class="link">
		<a href="index.php">Управение robots.txt</a>
	</div>
	<?	
	if( !file_exists( '../sitemap.xml' ) ):
	?>	

		<h3>
			Создать файл "sitemap.xml"
		</h3>

		<form action="set_sitemap.php" method="post">

			<label>Укажите адреса, для индексации (пример: http://example.com/news.php) и приоритет (1.0 - самый высокий, 0.1 - самый низкий)</label>
			<div class="UrlWrap">
				<input type='text' name='url0' class='url' value='' />	
				<select name="priority0" class="priority">					
					<option value="1.0">1.0</option>
					<option value="0.9">0.9</option>
					<option value="0.8">0.8</option>
					<option value="0.7">0.7</option>
					<option value="0.6">0.6</option>
					<option value="0.5">0.5</option>
					<option value="0.4">0.4</option>
					<option value="0.3">0.3</option>
					<option value="0.2">0.2</option>
					<option value="0.1">0.1</option>
				</select>	
			</div>
			<div class="plus" title="Добавить URL"><span>+</span></div><br />	
			
			<input type="hidden" name="date" value='<?= date(DATE_ATOM); ?>' />

			<input type="hidden" name="countinput" id="countinput" value='0' />			

			<input type="submit" name="generate" value="Создать sitemap.xml" />	

		</form>

		<br /><br /><br />

	<?
	endif;

	if( file_exists( '../sitemap.xml' ) ):
		echo "<h2>Содержимое файла</h2>";
		
		$lines = file( '../sitemap.xml' );
		foreach( $lines as $line ){
			echo htmlspecialchars( $line ) . "<br>";
		}

		echo "<br><a href='deletesitemap.php'>Удалить и перезаписать файл</a><br>";

	else:
		echo '<h3>Файл sitemap.xml еще не создан!</h3>';
	endif;
	?>

	<script src="js/jquery-1.11.3.js"></script>

	<script>

		$( document ).ready( function(){		

			$( '.plus span' ).click( function(){
				var CountInput = $( '.url' ).length;
				$( "<br><br><input type='text' name='url" + CountInput + "' class='url' value='' />" ).appendTo( '.UrlWrap' );
				
				$( "<select name='priority" + CountInput + "' class='priority'><option value='1.0'>1.0</option><option value='0.9'>0.9</option><option value='0.8'>0.8</option><option value='0.7'>0.7</option><option value='0.6'>0.6</option><option value='0.5'>0.5</option><option value='0.4'>0.4</option><option value='0.3'>0.3</option><option value='0.2'>0.2</option><option value='0.1'>0.1</option></select>" ).appendTo( '.UrlWrap' );



				$( '#countinput' ).val( CountInput );
			} );

		} );

	</script>
	
</body>
</html>