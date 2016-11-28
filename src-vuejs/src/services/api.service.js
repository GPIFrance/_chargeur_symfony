export default class ApiService {

  constructor() {
    this.apiUrl = 'http://localhost:8000/api';
    this.xhr = new XMLHttpRequest();
  }

  getAdresses() {
    return new Promise((resolve, reject) => {
      this.xhr.open('GET', this.apiUrl + '/get/address');
      this.xhr.onload = () => {
        let res = JSON.parse(this.xhr.responseText);
        if (!res.success) {
          reject(res.message);
        }
        resolve(res.data);
      }
      this.xhr.send();
    });
  }

  getSchema(table) {
    return new Promise((resolve, reject) => {
      this.xhr.open('GET', this.apiUrl + '/getschema/' + table);
      this.xhr.onload = () => {
        let res = JSON.parse(this.xhr.responseText);
        if(!res.success) {
          reject(res.message);
        }
        resolve(res.data);
      }
      this.xhr.send();
    })
  }
}