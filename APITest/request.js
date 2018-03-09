/**
 * Created by zhouqihang on 2018/3/6.
 */
const axios = require('axios');


let request = {
    get(url, params, success, error) {
        axios.get(url, params).then(({data}) => {
            success(data);
        }).catch(err => {
            console.log(err.message, err.response && err.response.data);
            error && error(err.message, err.response && err.response.data);
        })
    },
    post(url, params, success, error) {
        axios.post(url, params).then(({data}) => {
            success(data);
        }).catch(err => {
            console.log(err.message, err.response && err.response.data);
            error && error(err.message, err.response && err.response.data);
        })
    },
    put(url, params, success, error) {
        axios.put(url, params).then(({data}) => {
            success(data);
        }).catch(err => {
            console.log(err.message, err.response && err.response.data);
            error && error(err.message, err.response && err.response.data);
        })
    },
    remove(url, params, success, error) {
        axios.delete(url, params).then(({data}) => {
            success(data);
        }).catch(err => {
            console.log(err.message, err.response && err.response.data);
            error && error(err.message, err.response && err.response.data);
        })
    },
    patch(url, params, success, error) {
        axios.patch(url, params).then(({data}) => {
            success(data);
        }).catch(err => {
            console.log(err.message, err.response && err.response.data);
            error && error(err.message, err.response && err.response.data);
        })
    },
};

module.exports = request;