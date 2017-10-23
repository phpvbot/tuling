# tuling
[Vbot](https://github.com/hanson/vbot)  聊天机器人扩展，开启好友陪聊模式，注意：好友聊天自动回复，群聊中需要被@ 才自动回复。

机器人除了聊天，自带“智能工具”（如数学计算、问答百科、中英互译）、“休闲娱乐”（如成语接龙）和“生活服务”（如天气查询、快递查询）功能，直接聊天自动应答。

## 安装

```
composer require vbot/tuling
```

## 扩展属性

```php
name: tuling
zhName: 图灵机器人
author: 雪风
```

## 触发关键字

(开启后所有聊天对话自动触发)

## 扩展配置

* `status` - (可选)聊天机器人开关，默认为 `true`，管理员可以向机器人回复 `tuling on/off` 开关
* `key` - (可选)图灵机器人APIkey，如果需要自定义机器人请换成自己的图灵APIKey
* `error_message` - (可选)服务异常时的提示，默认值为 `图灵机器人失灵了，暂时没法陪聊了，T_T！`

```php
// 配置示范
'tuling' => [
    'status'        => true,
    'key'           => '2b700ebfec6593f3e2f452b3bcb8be6e',
    'error_message' => '图灵机器人失灵了，暂时没法陪聊了，T_T！',
],
```

## 扩展负责人

[雪风](https://github.com/oiuv)

i@oiuv.cn