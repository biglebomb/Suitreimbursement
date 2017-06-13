<?php
include('config.php');
session_start();
    if(isset($_POST['user_id'])
    ){
        $id = $_POST['user_id'];
        $ch = curl_init();
        $token = $_SESSION['token'];
        curl_setopt($ch, CURLOPT_URL,"$SERVER/user/$id?token=$token");
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        $resp = json_decode($server_output);


        if($resp != null){
            if ($resp->success == true){
                $nama = $resp->result->nama;
                $username = $resp->result->username;
                $email = $resp->result->email;

                echo "<div class='alert alert-success alert-dismissable'>
                        <strong>$nama</strong>
                    </div>";
            }
            else {
                echo "<div class='alert alert-danger alert-dismissable'>=
                        <strong>Failed to get user id</strong>
                    </div>";
            }
        }
        else{
                echo "<div class='alert alert-danger alert-dismissable'>
                        <strong>Could not connect to the server</strong>
                    </div>";
        }
    }
?>