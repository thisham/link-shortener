<br>
<div class="container">
	<div class="card">
		<div class="card-content">
			<form method="post" id="fr_shorten">
				<div class="input-field">
					<input type="text" name="longLink" id="longLink">
					<label for="longLink">Insert your link...</label>
				</div>
				<div class="input-field">
					<input type="text" name="shortLink" id="shortLink">
					<label for="shortLink">Short Link...</label>
					<small id="result_url"></small>
				</div>
				<div class="input-field">
					<input type="password" name="appCode" id="appCode">
					<label for="appCode">App Code...</label>
				</div>
				<div class="input-field center">
					<button class="btn btn-large indigo waves-effect waves-light" id="url_submit">Shorten your link!</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="link-list"></div>

<script>
	function base_url(url = null) {
		return (url == null)?
			"<?= base_url() ?>":
			"<?= base_url() ?>/" + url;
	}
</script>

<script src="<?= base_url("assets/js/mainPage.js") ?>"></script>