export default class ApiService {

  constructor() {
    this.apiUrl = 'http://localhost:8080/api';
    this.xhr = new XMLHttpRequest();
  }

  updateAddress(address) {
    let data = new FormData();
    return new Promise((resolve, reject) => {
      for (let key in address) {
        data.append(key, address[key]);
      }
      this.xhr.open('POST', this.apiUrl + '/update/address');
      this.xhr.onload = () => {
        resolve(JSON.parse(this.xhr.responseText));
      };
      this.xhr.send(data);
    });
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
      };
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
      };
      this.xhr.send();
    })
  }
}