VouCash
===========

一个简单、易用、强大的支付工具，[VouCash官网](https://voucash.com/)

特征:
- 免注册、审核
- 快速接入，低参数
- 匿名，不可追踪
- 成熟的插件支持
- 支持20+虚拟币，比只使用虚拟币支付转化率高

体验地址
------
[地址](https://voucash.com/api/payment?amount=30&currency=CNY&order_id=15b8388d&notify_url=http:/localhost/payment/notify/voucash)

你可以将链接中notify_url改成自己的公网回调地址，测试代金券可以填 old ，回调代码参考 callback.php

工作原理
------

消费者购买代金券后，在商家的网站或者APP上使用代金券，原代金券将会删除（相当于匿名），同时VouCash支付系统将生成新的代金券发送给商家的服务器后台（通过回调）。

任何人拥有代金券，都可以在[VouCash赎回](https://voucash.com/zh/redeem)套现

支持插件
------

以下插件均根据[官方API](https://voucash.com/cn/merchant)开发

- [独角数卡](https://github.com/voucash/dujiaoka)
- [whmcs](https://github.com/voucash/whmcs)
- [v2board](https://github.com/voucash/v2board)
- [SSPanel-UIM](https://github.com/voucash/sspanel-uim)

交流与合作
------

 - telegram：[@voucash](https://t.me/voucash)