<p align="center">
  <h1 align="center">VouPay</h1>
  <p align="center"><strong>隐私支付网关 SDK — 支持礼品卡、数字货币等匿名方式收款</strong></p>
</p>

---

**演示地址: [点击体验](https://api.voucash.com/test)**

---

## 简介

VouPay 是一套即插即用的前端支付 SDK，商户只需引入一行 `<script>` 即可在网站中嵌入收银台界面，让用户通过礼品卡或数字货币完成支付。

- 🔒 **全程匿名** — 无需注册，匿名收款，加密货币提现，用户隐私零暴露
- ⚡ **高效转化** — 相比于传统的虚拟币支付，获客门槛更低，礼品卡收款转化率更高
- 💸 **低费率** — 收取 **5.5%** 手续费（从购物卡到虚拟币的转化费用），可提现为 USDT 等加密货币,提现无手续费
- 🎴 **多渠道支持** — 京东E卡、Steam 充值卡、USDT (TRC20/ERC20)、BTC 等

---

## SDK 接入

### 弹窗模式

用户点击按钮后弹出毛玻璃风格收银台，右下角自动挂载购物车悬浮按钮用于查看历史记录。完整的后端回调处理示例请参考 [callback.php](callback.php)。

```html
<button id="pay-btn">立即支付</button>

<script src="https://api.voucash.com/voupaysdk.js"></script>
<script>
  VouPaySDK.init({
    orderId: 'order_001',          // 商户订单号（唯一）
    amount: 99.00,                 // 金额
    currency: 'CNY',               // 币种
    callbackUrl: 'https://your-site.com/voucash',  // 回调地址
    lang: 'zh',                    // 'zh' | 'en'，留空自动检测
    trigger: '#pay-btn',           // 触发按钮（CSS 选择器或 DOM 元素）
    // mode: 'debug',              // 测试模式：输入 TEST 自动审批，不产生真实凭证
    onSuccess: function (data) {
      // 前端收到成功通知（仅做 UI 提示用，安全校验请依赖后端回调）
      console.log('支付成功', data);
    },
    onFailure: function (data) {
      console.log('支付失败', data);
    }
  });
</script>
```


---

### 详细参数

| 参数 | 类型 | 必填 | 说明 |
|------|------|:----:|------|
| `orderId` | string | ✅ | 商户唯一订单号 |
| `amount` | number | ✅ | 支付金额 |
| `currency` | string | ✅ | 币种（`CNY` / `USD`） |
| `callbackUrl` | string | ✅ | 支付结果回调地址（你的服务端） |
| `trigger` | string / Element | ✅ | 触发弹窗的按钮（CSS 选择器或 DOM 元素） |
| `lang` | string | — | 强制语言 `zh` / `en`，默认自动检测 |
| `mode` | string | — | 设为 `debug` 开启测试模式 |
| `onSuccess` | function | — | 前端成功回调 `(data) => {}` |
| `onFailure` | function | — | 前端失败回调 `(data) => {}` |

---

### 怎么提现

用户使用礼品卡或数字货币支付后，你的管理后台会收到一个本平台的现金券，凭借此现金券可以前往 [https://api.voucash.com/zh/console](https://api.voucash.com/zh/console) 提现USDT或加密货币。

> ⚠️ **特别注意**：现金券不会第一时间发放，通常会延迟 **3 ~ 5 个工作日**（用于预防用户的不可测行为，如退款、争议等）,在发送现金券前，会发送一个回调通知提醒发货，1到3天内会第二次回调发送现金券或提醒用户退款，具体实现看后端代码或者插件。

---

交流与合作
------

 - telegram：[@voucash](https://t.me/voucash)