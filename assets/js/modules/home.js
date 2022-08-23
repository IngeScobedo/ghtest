export default class Home {

	static init() {
		this.hideLoader()
		this.autocomplete()
		//this.carousel()
		//this.companies()
		//this.products()
	}

	static hideLoader() {
		const loader = document.getElementById('loader').classList
		loader.add('hideLoader')
		setTimeout(() => loader.add('hide'), 1000)
	}

	static carousel() {
		document.querySelectorAll('#home-carousel .splide__slide').forEach(slide => {
			window.innerWidth < 768 ?
				slide.removeChild(slide.querySelector('.slide-img')) :
				slide.removeChild(slide.querySelector('.slide-imgRes'))
		})

		new Splide('#home-carousel', {
			type: 'loop',
			height: '600px',
			autoplay: true,
			interval: 3000,
			pauseOnHover: false,
			lazyLoad: 'sequential',
			breakpoints: {
				1440: {
					height: '65vh',
				},
				768: {
					height: '50vh',
				}
			}
		}).mount()
	}

	static companies() {
		new Splide('#companies-carousel', {
			type: 'loop',
			interval: 2000,
			perPage: 4,
			perMove: 1,
			pagination: false,
			arrows: false,
			breakpoints: {
				768: {
					autoplay: true,
					arrows: true,
					perPage: 1
				}
			}
		}).mount()
	}

	static products() {
		new Splide('#products-carousel', {
			type: 'loop',
			interval: 2000,
			perPage: 4,
			perMove: 1,
			pagination: false,
			arrows: false,
			breakpoints: {
				768: {
					autoplay: true,
					arrows: true,
					perPage: 1
				}
			}
		}).mount()
	}

	static autocomplete() {
		// The autoComplete.js Engine instance creator
		const autoCompleteJS = new autoComplete({
			data: {
				src: async () => {
					try {
						// Loading placeholder text
						let autocompleteInstance = document
							.getElementById("autoComplete");

						autocompleteInstance.setAttribute("placeholder", "Loading...");

						let query = autocompleteInstance.value || "México";
						console.log(query);

						// Fetch External Data Source
						const source = await fetch(`http://44.207.124.43:8830/paxissb/web/system/filtros/ubicacion?ubicacion=${query}`, {
							method: "GET",
							headers: {
								"Content-Type": "application/json",
								"Authorization": "Basic " + btoa("servext:s3rv3xt12345")
							},
						});
						const data = await source.json();
						// Post Loading placeholder text
						document
							.getElementById("autoComplete")
							.setAttribute("placeholder", autoCompleteJS.placeHolder);
						// Returns Fetched data
						console.log('data', data.ttFiltUbic);
						return data.ttFiltUbic;
					} catch (error) {
						return error;
					}
				},
				keys: ["cFiltRes"],
				cache: true,
				filter: (list) => {
					console.log('list', list);
					// Filter duplicates
					// incase of multiple data keys usage
					const filteredResults = Array.from(
						new Set(list.map((value) => value.match))
					).map((food) => {
						return list.find((value) => value.match === food);
					});
					console.log('filteredResults', filteredResults);
					return filteredResults;
				}
			},
			placeHolder: "Buscar...",
			resultsList: {
				element: (list, data) => {
					// const info = document.createElement("p");
					// if (data.results.length > 0) {
					// 	info.innerHTML = `Displaying <strong>${data.results.length}</strong> out of <strong>${data.matches.length}</strong> results`;
					// } else {
					// 	info.innerHTML = `Found <strong>${data.matches.length}</strong> matching results for <strong>"${data.query}"</strong>`;
					// }
					// list.prepend(info);
				},
				noResults: true,
				maxResults: 15,
				tabSelect: true
			},
			resultItem: {
				element: (item, data) => {
					// Modify Results Item Style
					item.style = "display: flex; justify-content: space-between;";
					// Modify Results Item Content
					item.innerHTML = `
      <span style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
        ${data.match}
      </span>
      <span style="display: flex; align-items: center; font-size: 12px; font-weight: 100; text-transform: uppercase; color: white;">
        ${data.key}
      </span>`;
				},
				highlight: true
			},
			events: {
				input: {
					focus: () => {
						if (autoCompleteJS.input.value.length) autoCompleteJS.start();
					}
				}
			}
		});

		// autoCompleteJS.input.addEventListener("init", function (event) {
		//   console.log(event);
		// });

		// autoCompleteJS.input.addEventListener("response", function (event) {
		//   console.log(event.detail);
		// });

		// autoCompleteJS.input.addEventListener("results", function (event) {
		//   console.log(event.detail);
		// });

		// autoCompleteJS.input.addEventListener("open", function (event) {
		//   console.log(event.detail);
		// });

		// autoCompleteJS.input.addEventListener("navigate", function (event) {
		//   console.log(event.detail);
		// });

		autoCompleteJS.input.addEventListener("selection", function (event) {
			const feedback = event.detail;
			autoCompleteJS.input.blur();
			// Prepare User's Selected Value
			const selection = feedback.selection.value[feedback.selection.key];
			// Render selected choice to selection div
			// TODO: Add selected choice to selection div
			console.log(selection);
			// document.querySelector(".selection").innerHTML = selection;
			// Replace Input value with the selected value
			autoCompleteJS.input.value = selection;
			// Console log autoComplete data feedback
			console.log(feedback);
		});

		// autoCompleteJS.input.addEventListener("close", function (event) {
		//   console.log(event.detail);
		// });

		// Toggle Search Engine Type/Mode
		// document.querySelector(".toggler").addEventListener("click", () => {
		// 	// Holds the toggle button selection/alignment
		// 	const toggle = document.querySelector(".toggle").style.justifyContent;

		// 	if (toggle === "flex-start" || toggle === "") {
		// 		// Set Search Engine mode to Loose
		// 		document.querySelector(".toggle").style.justifyContent = "flex-end";
		// 		document.querySelector(".toggler").innerHTML = "Loose";
		// 		autoCompleteJS.searchEngine = "loose";
		// 	} else {
		// 		// Set Search Engine mode to Strict
		// 		document.querySelector(".toggle").style.justifyContent = "flex-start";
		// 		document.querySelector(".toggler").innerHTML = "Strict";
		// 		autoCompleteJS.searchEngine = "strict";
		// 	}
		// });

		// Blur/unBlur page elements
		const action = (action) => {
			const mode = document.querySelector(".mode");
			const selection = document.querySelector(".selection");
			const footer = document.querySelector(".footer");

			// if (action === "dim") {
			// 	mode.style.opacity = 1;
			// 	selection.style.opacity = 1;
			// } else {
			// 	mode.style.opacity = 0.2;
			// 	selection.style.opacity = 0.1;
			// }
		};

		// Blur/unBlur page elements on input focus
		["focus", "blur"].forEach((eventType) => {
			autoCompleteJS.input.addEventListener(eventType, () => {
				// Blur page elements
				if (eventType === "blur") {
					action("dim");
				} else if (eventType === "focus") {
					// unBlur page elements
					action("light");
				}
			});
		});

	}
}