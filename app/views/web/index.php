<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<p id="app"></p>
	<script>
		document.getElementById("app").innerHTML = "<?= $as ?>"
	</script>
</body>
</html>