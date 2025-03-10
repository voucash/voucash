**VouCash**  
===========

A simple, easy-to-use, and powerful payment tool. [VouCash Official Website](https://voucash.com/)

Features:
- No registration or verification required
- Quick integration with low parameters
- Anonymous, untraceable
- Rich plugin support
- Supports 20+ crypto currencies, resulting in a higher conversion rate compared to using only crypto currency payments

Experience URL  
------  
[URL](https://voucash.com/api/payment?amount=30&currency=CNY&order_id=15b8388d&notify_url=http://localhost/payment/notify/voucash&return_url=https://github.com/voucash/voucash)

You can replace the `notify_url` in the link with your own public callback address. To test the voucher, you can enter `old`. The callback code is provided in `callback.php`.

How It Works  
------  
After consumers purchase a voucher, they can use it on the merchant’s website or app. The original voucher will be deleted (making it anonymous), and the VouCash payment system will generate a new voucher and send it to the merchant’s server backend (via callback).

Anyone who owns a voucher can redeem it for cash at [VouCash Redemption](https://voucash.com/redeem).

Supported Plugins  
------  
The following plugins are developed based on the [official API](https://voucash.com/merchant):

- [Dujiaoka](https://github.com/voucash/dujiaoka)
- [whmcs](https://github.com/voucash/whmcs)
- [Xboard](https://github.com/voucash/v2board)
- [v2board](https://github.com/voucash/v2board)
- [SSPanel-UIM](https://github.com/voucash/sspanel-uim)

Communication & Collaboration  
------  
- Telegram: [@voucash](https://t.me/voucash)