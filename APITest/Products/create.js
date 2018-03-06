/**
 * Created by zhouqihang on 2018/3/6.
 */

const {post} = require('../request');
const {host} = require('../config');

const params = {
    number: 'P-008',
    title: '优酸乳2',
    unit: '瓶',
    count: 500,
    remark: '第二个优酸乳'
};

post(`${host}/products`, params, res => {
    console.log(res);
}, err => {
    console.log(err);
});


