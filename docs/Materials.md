# Materials

## GET /api/materials/show

| param | type | required | default | description |
| ----- | ---- | -------- | ------- | ----------- |
| page | integer | no | 1 | 请求页码 |
| pagesize | integer | no | 10 | 每页请求数量 |
| number | string | no | '' | 查询原料编号 |
| title | string | no | '' | 查询原料名称 |
| unit | string | no | '' | 查询原料计量单位 |
| countBegin | integer | no | null | 按最小原料库存量查询 |
| countEnd | integer | no | null | 按最大原料库存量查询 |
| sortField | string | no | created_at | 按原料登记时间查询 |
| sortord | string | no | desc | 排序方式，可选有`asc` |


## POST /api/materials/create

| param | type | required | default | description |
| ----- | ---- | -------- | ------- | ----------- |
| number | string | no | '' | 原料编号 |
| title | string | no | '' | 原料名称 |
| unit | string | yes | '' | 原料计量单位 |
| count | integer | yes | 0 | 原料库存量 |
| danger | integer | yes | 0 | 原料报警数量 |
| remark | string | no | '' | 备注 |

> tips: number和title至少必须填写一个！