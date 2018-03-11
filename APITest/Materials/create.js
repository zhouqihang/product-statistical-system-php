/**
 * Created by zhouqihang on 2018/3/6.
 */

const {post} = require('../request');
const {host} = require('../config');

const params1 = {
    number: 'M-001',
    title: '纯净水',
    unit: 'L',
    danger: 300,
    count: 10000,
    remark: '纯净水',
};
const params2 = {
    number: 'M-002',
    title: '冰糖',
    unit: 'G',
    danger: 300,
    count: 10000,
    remark: '冰糖',
};
const params3 = {
    number: 'M-003',
    title: '雪梨',
    unit: '个',
    danger: 300,
    count: 10000,
    remark: '雪梨',
};
const params4 = {
    number: 'M-004',
    title: '食品添加剂',
    unit: 'G',
    danger: 300,
    count: 10000,
    remark: '食品添加剂',
};

post(`${host}/materials`, params4, res => {
    console.log(res);
}, err => {
    console.log(err);
});


