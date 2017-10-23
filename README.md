# tuling
[Vbot](https://github.com/hanson/vbot)  聊天机器人扩展，开启好友陪聊模式，注意：好友聊天自动回复，群聊中需要被@ 才自动回复。

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

* `status` - 聊天机器人开关，默认为 '关'
* `key` - (可选)图灵机器人APIkey，使用默认即可，如果需要自定义机器人请换成自己的
* `error_message` - (可选)服务异常时的提示，默认值为 `图灵机器人失灵了，暂时没法陪聊了，T_T！`

```php
// 配置示范
'tuling' => [
    'status'       => true,
],
```

## 扩展负责人

[雪风](https://github.com/oiuv)

i@oiuv.cn