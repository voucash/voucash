VouCash
===========
简体中文 | [English](https://github.com/voucash/voucash/blob/master/README_en.md)

一个简单、易用、强大的支付工具，[VouCash官网](https://voucash.com/zh)

特征:
- 免注册、审核
- 快速接入，低参数
- 匿名，不可追踪
- 丰富的插件支持
- 支持20+虚拟币，比只使用虚拟币支付转化率高

体验地址
------
[地址](https://voucash.com/api/payment?amount=30&currency=CNY&order_id=15b8388d&notify_url=http://localhost/payment/notify/voucash&return_url=https://github.com/voucash/voucash)

测试时，可以将链接中notify_url改成自己的公网回调地址，代金券可以填 old ，回调代码参考`callback.php`。具体使用案例查看[入门指南](https://voucash.github.io/zh/docs/tutorial)。

工作原理
------

消费者使用代金券后，商家将获得新的代金券。

任何人拥有代金券，都可以在[VouCash赎回](https://voucash.com/zh/redeem)套现

支持插件
------

以下插件均根据[官方API](https://voucash.com/cn/merchant)开发

- [独角数卡](https://github.com/voucash/dujiaoka)
- [whmcs](https://github.com/voucash/whmcs)
- [Xboard](https://github.com/voucash/v2board)
- [v2board](https://github.com/voucash/v2board)
- [SSPanel-UIM](https://github.com/voucash/sspanel-uim)

交流与合作
------

 - telegram：[@voucash](https://t.me/voucash)