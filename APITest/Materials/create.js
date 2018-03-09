/**
 * Created by zhouqihang on 2018/3/6.
 */

const {post} = require('../request');
const {host} = require('../config');

const params = {
    number: 'M-004',
    title: '食品添加剂',
    unit: 'g',
    danger: 300,
    count: 10000,
    remark: '食品添加剂',
};

post(`${host}/materials`, params, res => {
    console.log(res);
}, err => {
    console.log(err);
});


