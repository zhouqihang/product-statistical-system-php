/**
 * Created by zhouqihang on 2018/3/6.
 */

const {post} = require('../request');
const {host} = require('../config');

const params = {
    product: 5,
    remark: '',
    materials: [
        {
            id: 1,
            count: 10,
            remark: ''
        },
        {
            id: 2,
            count: 4,
            remark: ''
        }
    ]
};

post(`${host}/tasks/1/info`, params, res => {
    console.log(res);
});


