/**
 * Created by zhouqihang on 2018/3/6.
 */

const {post} = require('../request');
const {host} = require('../config');

const params = {
    number: 'P-002',
    title: '冰糖雪梨改良',
    unit: '瓶',
    count: 500,
    remark: '统一冰糖雪梨第二代',
    materials: [
        {id: 1, count: 20, remark: ''},
        {id: 4, count: 8, remark: ''},
        {id: 3, count: 5, remark: ''},
    ]
};

post(`${host}/products`, params, res => {
    console.log(res);
});


