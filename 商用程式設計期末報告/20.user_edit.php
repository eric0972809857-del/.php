<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 啟動 Session，用來取得登入資訊
    session_start();
    // 檢查使用者是否已登入
    if (!$_SESSION["id"]) {

        // 未登入時顯示提示訊息
        echo "請登入帳號";

        // 3 秒後跳轉到登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {

        // 建立 MySQL 資料庫連線
        // 參數：主機、帳號、密碼、資料庫名稱
        $conn = mysqli_connect(
            "120.105.96.90",
            "immust",
            "immustimmust",
            "immust"
        );

        // 執行修改資料(SQL UPDATE)
        // 將指定 id 的使用者密碼更新成表單送來的新密碼
        //
        // SQL語法：
        // UPDATE 表格名稱
        // SET 欄位=新值
        // WHERE 條件
        if (
            !mysqli_query(
                $conn,
                "update user
                 set pwd='{$_POST['pwd']}'
                 where id='{$_POST['id']}'"
            )
        ) {

            // 修改失敗
            echo "修改錯誤";

            // 3 秒後返回使用者管理頁面
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";

        } else {

            // 修改成功
            echo "修改成功，三秒鐘後回到網頁";

            // 3 秒後返回使用者管理頁面
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }
    }
?>
