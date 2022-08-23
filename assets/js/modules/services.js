export default class Services {

    static init() {
        this.carousels()
    }

    static carousels() {
        document.querySelectorAll('.splide').forEach(e => {
            new Splide(`#${e.id}`, {
                type: 'fade',
                rewind: true,
                autoplay: true,
                interval: 3000,
                lazyLoad: 'nearby',
                arrows: false
            }).mount()
        })
    }
}