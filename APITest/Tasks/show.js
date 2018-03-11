/**
 * Created by zhouqihang on 2018/3/6.
 */

const {get} = require('../request');
const {host} = require('../config');

get(`${host}/tasks`, {}, res => {
    console.log(res);
}, err => {
    console.log(err);
});
