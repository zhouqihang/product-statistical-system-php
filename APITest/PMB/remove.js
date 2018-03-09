/**
 * Created by zhouqihang on 2018/3/6.
 */

const {remove} = require('../request');
const {host} = require('../config');

remove(`${host}/pmb/7`, {}, res => {
    console.log(res);
}, err => {
    console.log(err);
});


