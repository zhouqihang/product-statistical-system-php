# Products

## GET /api/products

| param | type | required | default | description |
| ----- | ---- | -------- | ------- | ----------- |
| page | integer | no | 1 | 请求页码 |
| pagesize | integer | no | 10 | 每页请求数量 |
| number | string | no | '' | 查询产品编号 |
| title | string | no | '' | 查询产品名称 |
| unit | string | no | '' | 查询产品计量单位 |
| countBegin | integer | no | null | 按最小产品库存量查询 |
| countEnd | integer | no | null | 按最大产品库存量查询 |
| sortField | string | no | created_at | 按产品登记时间查询 |
| sortord | string | no | desc | 排序方式，可选有`asc` |

## POST /api/products

| param | type | required | default | description |
| ----- | ---- | -------- | ------- | ----------- |
| number | string | no | '' | 产品编号 |
| title | string | no | '' | 产品名称 |
| unit | string | yes | '' | 产品计量单位 |
| count | integer | yes | 0 | 产品库存量 |
| remark | string | no | '' | 备注 |
| materials | [] | yes | [] | 原料组成 |

### materials
| param | type | required | default | description |
| ----- | ---- | -------- | ------- | ----------- |
| product | integer | yes | 0 | 产品编号 |
| material | integer | yes | 0 | 原料编号 |
| count | float | yes | 0 | 原料数量 |

> tips: number和title至少必须填写一个！

## GET /api/products/{id}

## PUT /api/products/{id}

| param | type | required | default | description |
| ----- | ---- | -------- | ------- | ----------- |
| number | string | no | '' | 产品编号 |
| title | string | no | '' | 产品名称 |
| unit | string | yes | '' | 产品计量单位 |
| count | integer | yes | 0 | 产品库存量 |
| remark | string | no | '' | 备注 |

## DELETE /api/products/{id}