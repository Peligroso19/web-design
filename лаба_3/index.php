<?php
if (isset($_GET["iv_color"]))
	print_r($_GET["iv_color"]);

$bg_color = "#ffffff";
if (isset ($_POST["iv_color"]))
	{
		$bg_color=$_POST["iv_color"];
	};
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body	style="background-color:<?=$bg_color?>">
		
  
    <h1>Выберите цвет</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	
	
	<form action=" " method="POST" >
	
	<label for="exampleColorInput" class="form-label">Тут выбираем цвет</label>
<input name="iv_color" type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">
  
  <button type="submit" class="btn btn-primary btn-sm">Изменить цвет</button>
	
	</form>
	
  </body>
</html>