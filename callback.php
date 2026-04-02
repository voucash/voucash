<?php
/**
 * VouPay 商户回调示例
 * 
 * 将此文件部署到你的 callbackUrl 对应的路由上。
 * VouPay 会在订单状态变更时向此地址发送 POST 请求。
 * 
 */

// 1. 读取 VouPay 推送的 JSON 数据
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!$data || empty($data['orderId'])) {
    http_response_code(400);
    echo 'invalid payload';
    exit;
}

// 处理 completed（已完成）、paid（已支付）和 rejected（已拒绝）状态
$status = $data['status'];
if (!in_array($status, ['completed', 'paid', 'rejected'])) {
    echo 'ignored status: ' . $status;
    exit;
}

// 2. 调用 VouPay 验证接口，确认回调真实性（务必执行，防伪造）
$ch = curl_init('https://api.voucash.com/api/verify');
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 30,
    CURLOPT_POSTFIELDS     => $raw,
    CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
]);

$response  = curl_exec($ch);
$httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200) {
    http_response_code(500);
    echo "verify failed: HTTP $httpCode";
    exit;
}

$verify = json_decode($response, true);

if (!isset($verify['valid']) || $verify['valid'] !== true) {
    http_response_code(403);
    echo 'invalid verification';
    exit;
}

// 3. 校验金额和币种是否与本地订单一致
$orderId     = $data['orderId'];
$amount      = floatval($data['amount']);
$currency    = $data['currency'];
$voucherCode = $data['voucherCode'] ?? '';

// --- 从数据库查询本地订单，验证金额和币种 ---
// $order = $db->get_where('orders', ['order_id' => $orderId])->row_array();
// if (empty($order)) {
//     http_response_code(404);
//     echo 'order not found';
//     exit;
// }
// if (abs($order['price'] - $amount) > 0.01 || $order['currency'] !== $currency) {
//     http_response_code(400);
//     echo 'amount or currency mismatch';
//     exit;
// }

// 4. 根据状态分别处理业务逻辑，completed表示平台已放款，paid表示用户已完成付款（还需要平台最终确认）
if ($status === 'completed' || $status === 'paid') {

    // --- 支付成功：标记订单为已支付、发货等 ---
    // $db->update('orders', ['paid' => 1, 'voucher' => $voucherCode], ['order_id' => $orderId]);                                                                                     
    echo 'success';//必须返回success！！！

} elseif ($status === 'rejected') {
    // --- 支付被拒：用户投诉、举报等 ---
    $rejectMessage = $data['message'] ?? '支付审核未通过';
    // $db->update('orders', ['paid' => -1, 'remark' => $rejectMessage], ['order_id' => $orderId]);
    echo 'rejected handled';
}
