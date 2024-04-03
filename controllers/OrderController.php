<?php

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}

function orderPurchase()
{
    if (!empty($_POST)) {
        $data = [
            'id_tk' => $_POST['id_tk'] ?? null,
            'ho_va_ten' => $_POST['ho_va_ten'] ?? null,
            'email' => $_POST['email'] ?? null,
            'so_dien_thoai' => $_POST['so_dien_thoai'] ?? null,
            'dia_chi' => $_POST['dia_chi'] ?? null,
            'tong_tien' => $_SESSION['totalPrice'],
            'thanh_toan' => $_POST['thanh_toan'] ?? null,
        ];
        validateOrder($data);

        

        if ($data['thanh_toan'] == 'payUrl') {
            $data['thanh_toan'] = 1;
            $_SESSION['order'] = $data;
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = $_SESSION['totalPrice'];
            $orderId = time() . "";
            $redirectUrl = BASE_URL . "?act=check-order";
            $ipnUrl = BASE_URL . "?act=check-order";
            $extraData = "";

            // test momo:
            // NGUYEN VAN A
            // 9704 0000 0000 0018
            // 03/07
            // OTP

            // $partnerCode = $partnerCode;
            // $accessKey = $_POST["accessKey"];
            $serectkey = $secretKey;
            // $orderId = $_POST["orderId"]; // Mã đơn hàng
            // $orderInfo = $_POST["orderInfo"];
            // $amount = $_POST["amount"];
            // $ipnUrl = $_POST["ipnUrl"];
            // $redirectUrl = $_POST["redirectUrl"];
            // $extraData = $_POST["extraData"];

            $requestId = time() . "";
            $requestType = "payWithATM";
            $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there

            header('Location: ' . $jsonResult['payUrl']);
            exit();
        }
        $products = listProductByIdCart($_SESSION['cartID']);
        $idBill = insert_get_last_id('tb_don_hang',$data);
        
        foreach($products as $item){
            // debug($item);
            $data1 = [
                'id_sp' => $item['id_sp'],
                'id_don_hang' => $idBill,
                'so_luong' => $item['quantity'],
                'gia_sp' => $item['price'],
                'mau' => $item['mau'],
                'size' => $item['size'],
                'thanh_tien' => $item['quantity'] * $item['price'],
            ];
            insert('tb_chi_tiet_don_hang', $data1);
        }
        
        deleteDetailCartByCartID($_SESSION['cartID']);
        delete2('tb_gio_hang', $_SESSION['cartID']);

        unset($_SESSION['order']);
        unset($_SESSION['cartID']);
        unset($_SESSION['totalPrice']);
        unset($_SESSION['voucher']);
        header('location: '. BASE_URL . '?act=thank&id_bill='. $idBill);
        exit();
    }

}

function validateOrder($data)
{
    $errors = [];
    if (empty($data['ho_va_ten'])) {
        $errors[] = "Vui lòng nhập tên của bạn!";
    }

    if (empty($data['email'])) {
        $errors[] = "Vui lòng nhập email của bạn!";
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email của bạn không hợp lệ!";
    }

    if (empty($data['so_dien_thoai'])) {
        $errors[] = "Vui lòng nhập số điện thoại của bạn!";
    } else if (strlen($data['so_dien_thoai']) > 11) {
        $errors[] = "Số điện thoại của bạn không hợp lệ!";
    }
    if (empty($data['dia_chi'])) {
        $errors[] = "Vui lòng nhập địa chỉ của bạn!";
    }
    if ($data['thanh_toan'] == null) {
        $errors[] = "Vui lòng chọn phương thức thanh toán!";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('location: ' . BASE_URL . '?act=checkout');
        exit();
    }
}

function thank($idBill)
{
    $views = 'thank';
    $bill = showOne('tb_don_hang', $idBill);
    $detailBills = showAllDetailBillByIdBill($idBill);
    require_once PATH_VIEW . 'layouts/master.php';
}

function checkOrder($resultCode)
{
    if($resultCode == 0){
        $products = listProductByIdCart($_SESSION['cartID']);
        $idBill = insert_get_last_id('tb_don_hang', $_SESSION['order']);
        
        foreach($products as $item){
            // debug($item);
            $data = [
                'id_sp' => $item['id_sp'],
                'id_don_hang' => $idBill,
                'so_luong' => $item['quantity'],
                'gia_sp' => $item['price'],
                'mau' => $item['mau'],
                'size' => $item['size'],
                'thanh_tien' => $item['quantity'] * $item['price'],
            ];
            insert('tb_chi_tiet_don_hang', $data);
        }
        
        deleteDetailCartByCartID($_SESSION['cartID']);
        delete2('tb_gio_hang', $_SESSION['cartID']);

        unset($_SESSION['order']);
        unset($_SESSION['cartID']);
        unset($_SESSION['totalPrice']);
        unset($_SESSION['voucher']);
        header('location: '. BASE_URL . '?act=thank&id_bill='. $idBill);
        exit();
    }
    
}


