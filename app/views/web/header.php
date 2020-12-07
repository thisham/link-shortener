<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<style>
		body {
			font-family: 'Ubuntu', sans-serif;
			display: flex;
			min-height: 100vh;
			flex-direction: column;
		}

		main {
			flex: 1 0 auto;
		}

		.input-field input:focus + label {
			color: #536dfe !important;
		}

		.input-field input:focus {
			border-bottom: 1px solid #536dfe !important;
			box-shadow: 0 1px 0 0 #536dfe !important;
		}

		.input-field .prefix.active {
			color: #536dfe;
		}
	</style>
</head>
<body>
	