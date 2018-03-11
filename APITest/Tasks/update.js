/**
 * Created by zhouqihang on 2018/3/6.
 */

const {put} = require('../request');
const {host} = require('../config');

const params = {
    title: '斌天堂雪梨',
    remark: '测试',
    status: 'waiting',
};

put(`${host}/tasks/1`, params, res => {
    console.log(res);
}, err => {
    console.log(err);
});


