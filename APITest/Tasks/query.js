/**
 * Created by zhouqihang on 2018/3/6.
 */

const {get} = require('../request');
const {host} = require('../config');

get(`${host}/tasks/1`, {}, res => {
    console.log(res);
    console.log('*******');
    res.task_infos.forEach(item => {
        item.p_m_rs.forEach(i => {
            console.log(i);
            console.log('*******');
        })
    })
}, err => {
    console.log(err);
});
