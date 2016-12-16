import Axios from 'axios'

export default class ApiService {

    constructor() {
        this.apiUrl = window.location.origin+'/api';
        this.axios = Axios;
    }

    updateAddress(address) {
        return this.axios.post(this.apiUrl + '/update/address', address);
    }

    getAddresses() {
        return this.axios.get(this.apiUrl + '/get/address');
    }

    getSchema(table) {
        return this.axios.get(this.apiUrl + '/getschema/' + table);
    }
}