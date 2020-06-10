export default class Debouncer {

    /**
     *
     * @param {string|Function} closure
     * @param {Number} timeout
     */
    pushClosure(closure, timeout) {
        clearTimeout(this.submit_timeout);
        this.submit_timeout = setTimeout(closure, timeout);
    }
}
