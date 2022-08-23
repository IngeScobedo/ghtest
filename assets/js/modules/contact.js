export default class Contact {

    static init() {
        this.getLogs()
    }

    static getLogs() {
        document.querySelectorAll('.error-logs li').forEach(e => {
            console.log(e.innerHTML)
        })
    }
}