// import axios from "./axios.min.js"

// axios.default.baseURL = base_url()

document.addEventListener("DOMContentLoaded", function () {
	fetch(base_url("url"))
		.then(res => res.json())
		.then(asd => {
			document.getElementById("link-list").innerHTML = ""

			asd.response.forEach(element => {
				document.getElementById("link-list").innerHTML += `
					<div class="container">
						<div class="card">
							<div class="card-content">
									<h6>` + base_url(element.shortened) + `</h6>
								<p><a href="` + element.target_url + `">` + element.target_url + `</a></p>
								<br>
								<small>Created at : ` + element.date_created + ` UTC</small>
							</div>
						</div>
					</div>`
			});
		})
		.catch(err => console.error(err))

	document.getElementById("shortLink").addEventListener("change", () => {
		document.getElementById("result_url").innerHTML = "It will be : " + base_url(document.getElementById("shortLink").value)
	})

	document.getElementById("url_submit").addEventListener("click", function (e) {
		e.preventDefault()
		let form = document.getElementById('fr_shorten')
		const data = new URLSearchParams()
		for (const p of new FormData(form)) {
			data.append(p[0], p[1])
		}

		const options = {
			method: 'POST',
			body: data
		}

		fetch(base_url("url/post"), options)
			.then(res => res.json())
			.then(asd => {
				document.getElementById("link-list").innerHTML = ""
				switch (asd.status) {
					case 200:
						M.toast({html: 'URL added!'})
						break;

					case 304: 
						M.toast({html: 'Can\'t add URL! Try change shortened URL destination.'})
						break;

					default:
						break;
				}

				asd.response.forEach(element => {
					document.getElementById("link-list").innerHTML += `
						<div class="container">
							<div class="card">
								<div class="card-content">
									<h6>` + base_url(element.shortened) + `</h6>
									<p><a href="` + element.target_url + `">` + element.target_url + `</a></p>
									<br>
									<small>Created at : ` + element.date_created + ` UTC</small>
								</div>
							</div>
						</div>`
				})
			})
			.catch(err => console.error(err))
				
	})
})