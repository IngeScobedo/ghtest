export default class General {

	searchOptionsCanClose = true
	searchQuery = ''

	static init() {
		this.navigation()
		//this.mediaVideo()
		this.pipes()
		AOS.init()
	}

	static get(elementId) {
		return document.getElementById(elementId)
	}

	static navigation() {
		document.querySelectorAll('.toggle-menu').forEach(toggler => {
			toggler.addEventListener('click', () => {
				this.get('responsive-menu').classList.toggle('open')
			})
		})
	}

	static mediaVideo() {
		document.querySelectorAll('.media-video').forEach(v => {
			try {
				v.muted = true
				v.load()
				v.play()
			} catch (e) {
				alert('Cannot play', v.src, ': ', e)
				v.controls = true
			}
		})
	}

	static pipes() {
		// currency
		const currency = Intl.NumberFormat("es-MX", {
			style: "currency",
			currency: "MXN",
		})
		document.querySelectorAll('.currency-pipe').forEach(e => {
			e.innerHTML = currency.format(e.innerHTML.replace(/[^0-9\.-]+/g, ""))
		})
	}

}