# ProductsMaterialsBase

## POST /api/pmb

| param | type | required | default | description |
| ----- | ---- | -------- | ------- | ----------- |
| product | string | no | '' | 产品编号 |
| material | string | no | '' | 原料名称 |
| count | integer | yes | 0 | 原料消耗量 |
| remark | string | no | '' | 备注 |

## PATCH /api/pmb/{id}

| param | type | required | default | description |
| ----- | ---- | -------- | ------- | ----------- |
| count | integer | yes | 0 | 原料消耗量 |
| remark | string | no | '' | 备注 |

## DELETE /api/pmb/{id}