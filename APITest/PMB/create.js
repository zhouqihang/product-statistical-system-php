/**
 * Created by zhouqihang on 2018/3/6.
 */

const {post} = require('../request');
const {host} = require('../config');

const params = {
    product: 3,
    material: 4,
    count: 4,
    remark: '统一冰糖雪梨material',
};

post(`${host}/pmb/create`, params, res => {
    console.log(res);
});


