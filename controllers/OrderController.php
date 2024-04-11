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
        } else if ($data['thanh_toan'] == 'redirect') {
            $data['thanh_toan'] = 1;
            $_SESSION['order'] = $data;
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = BASE_URL . "?act=check-orderVnpay";
            $vnp_TmnCode = "8TCNRRYL";//Mã website tại VNPAY 
            $vnp_HashSecret = "KVNUGRSQVIWMRZLNCKTQGVGGYMTLHDYG"; //Chuỗi bí mật

            $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Noi dung thanh toan';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $_SESSION['totalPrice'] * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $currentDateTime = new DateTime();
            // Thêm 15 phút vào thời gian hiện tại
            $currentDateTime->add(new DateInterval('PT15M'));
            // Format lại thành chuỗi ngày tháng năm giờ phút giây
            $vnp_ExpireDate = $currentDateTime->format('YmdHis');
            // debug($vnp_ExpireDate);
            //Add Params of 2.0.1 Version
            // $vnp_ExpireDate = ;
            //Billing
            // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
            // $vnp_Bill_Email = $_POST['txt_billing_email'];
            // $fullName = trim($_POST['txt_billing_fullname']);
            // if (isset($fullName) && trim($fullName) != '') {
            //     $name = explode(' ', $fullName);
            //     $vnp_Bill_FirstName = array_shift($name);
            //     $vnp_Bill_LastName = array_pop($name);
            // }
            // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
            // $vnp_Bill_City = $_POST['txt_bill_city'];
            // $vnp_Bill_Country = $_POST['txt_bill_country'];
            // $vnp_Bill_State = $_POST['txt_bill_state'];
            // // Invoice
            // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
            // $vnp_Inv_Email = $_POST['txt_inv_email'];
            // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
            // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
            // $vnp_Inv_Company = $_POST['txt_inv_company'];
            // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
            // $vnp_Inv_Type = $_POST['cbo_inv_type'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,

                "vnp_ExpireDate" => $vnp_ExpireDate,
                // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
                // "vnp_Bill_Email" => $vnp_Bill_Email,
                // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
                // "vnp_Bill_LastName" => $vnp_Bill_LastName,
                // "vnp_Bill_Address" => $vnp_Bill_Address,
                // "vnp_Bill_City" => $vnp_Bill_City,
                // "vnp_Bill_Country" => $vnp_Bill_Country,
                // "vnp_Inv_Phone" => $vnp_Inv_Phone,
                // "vnp_Inv_Email" => $vnp_Inv_Email,
                // "vnp_Inv_Customer" => $vnp_Inv_Customer,
                // "vnp_Inv_Address" => $vnp_Inv_Address,
                // "vnp_Inv_Company" => $vnp_Inv_Company,
                // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
                // "vnp_Inv_Type" => $vnp_Inv_Type
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            // }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00'
                ,
                'message' => 'success'
                ,
                'data' => $vnp_Url
            );
            if ($_POST['thanh_toan'] == 'redirect') {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            debug($data);
        }
        $products = listProductByIdCart($_SESSION['cartID']);
        $idBill = insert_get_last_id('tb_don_hang', $data);

        foreach ($products as $item) {
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
        header('location: ' . BASE_URL . '?act=thank&id_bill=' . $idBill);
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

    if ($resultCode == 0) {
        $products = listProductByIdCart($_SESSION['cartID']);
        $_SESSION['order']['ma_thanh_toan'] = $_GET['orderId'];
        $idBill = insert_get_last_id('tb_don_hang', $_SESSION['order']);

        foreach ($products as $item) {
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
        header('location: ' . BASE_URL . '?act=thank&id_bill=' . $idBill);
        exit();
    }else{
        header('location: ' . BASE_URL);
    }

}

function checkOrderVnPay()
{
    // debug($_GET['vnp_TxnRef']);
    if (isset($_GET['vnp_ResponseCode']) && $_GET['vnp_ResponseCode'] == '00') {
        // debug(1);
        $products = listProductByIdCart($_SESSION['cartID']);
        $_SESSION['order']['ma_thanh_toan'] = $_GET['vnp_TxnRef'];
        $idBill = insert_get_last_id('tb_don_hang', $_SESSION['order']);

        foreach ($products as $item) {
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
        header('location: ' . BASE_URL . '?act=thank&id_bill=' . $idBill);
        exit();
    }else{
        header('location: ' . BASE_URL);
    }
}


