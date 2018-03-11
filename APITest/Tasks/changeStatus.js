/**
 * Created by zhouqihang on 2018/3/6.
 */

const {patch} = require('../request');
const {host} = require('../config');

const params = {
    status: 'underway',
};

patch(`${host}/tasks/1/status`, params, res => {
    console.log(res);
});


