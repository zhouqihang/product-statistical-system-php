/**
 * Created by zhouqihang on 2018/3/6.
 */

const {post} = require('../request');
const {host} = require('../config');

const params = {
    title: '冰糖雪梨',
    status: 'waiting',
    remark: '统一冰糖雪梨',
};

post(`${host}/tasks`, params, res => {
    console.log(res);
});


