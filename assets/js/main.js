const imports = [
	'general'
]

class App {
	constructor() {
		const main = document.querySelector('main')
		if(main && main.id) import(`./modules/${main.id}.js`).then(m => m.default.init())

		imports.forEach(module => import(`./modules/${module}.js`).then(m => m.default.init()))
	}
	
}

window.addEventListener('load', () => {
	const app = new App()
})