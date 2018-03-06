/**
 * Created by zhouqihang on 2018/3/6.
 */

const {remove} = require('../request');
const {host} = require('../config');

const params = {
    number: 'M-002',
    title: '纯净水',
    unit: 'L',
    danger: 300,
    count: 10000,
    remark: '纯净水22222',
};

remove(`${host}/materials/2`, params, res => {
    console.log(res);
}, err => {
    console.log(err);
});


