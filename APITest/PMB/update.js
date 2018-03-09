/**
 * Created by zhouqihang on 2018/3/6.
 */

const {patch} = require('../request');
const {host} = require('../config');

const params = {
    count: 4.5,
    remark: '统一冰糖添加剂',
};

patch(`${host}/pmb/7`, params, res => {
    console.log(res);
});


