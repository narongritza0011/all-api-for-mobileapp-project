<?php
    require "config.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        #CODE...
        $response = array();
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $query_cek_user = mysqli_query($connection, "SELECT * FROM user WHERE email = '$email'");
        $cek_user_result = mysqli_fetch_array($query_cek_user);

        if ($cek_user_result) {
            #code..
            $query_login = mysqli_query($connection, "SELECT  * FROM user WHERE email = '$email' && password = '$password'");
            if ($query_login) {
                # code...
                $response['value']=1;
                $response['message']="เข้าสู่ระบบสำเร็จ";
                $response['user_id']=$cek_user_result['id_user'];
                $response['name']=$cek_user_result['name'];
                $response['email']=$cek_user_result['email'];
                $response['phone']=$cek_user_result['phone'];
                $response['address']=$cek_user_result['address'];
                $response['created_at']=$cek_user_result['created_at'];
                $response['message']="เข้าสู่ระบบสำเร็จ";
                
                echo json_encode($response);
            } else {
                # code...
                $response['value']=2;
                $response['message']="เข้าสู่ระบบไม่สำเร็จ";
                echo json_encode($response);
            }
        } else {
                # code...
                $response['value']=2;
                $response['message']="ชื่อผู้ใช้นี้ ยังไม่มีในระบบ !";
                echo json_encode($response);
            }
            
        }
    
