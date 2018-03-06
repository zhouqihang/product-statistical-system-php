/**
 * Created by zhouqihang on 2018/3/6.
 */
const axios = require('axios');


let request = {
    get(url, params, success, error) {
        axios.get(url, params).then(({data}) => {
            success(data);
        }).catch(err => {
            error(err.message);
        })
    },
    post(url, params, success, error) {
        axios.post(url, params).then(({data}) => {
            success(data);
        }).catch(err => {
            error(err.message);
        })
    },
    put(url, params, success, error) {
        axios.put(url, params).then(({data}) => {
            success(data);
        }).catch(err => {
            error(err.message);
        })
    },
    remove(url, params, success, error) {
        axios.delete(url, params).then(({data}) => {
            success(data);
        }).catch(err => {
            error(err.message);
        })
    },
};

module.exports = request;