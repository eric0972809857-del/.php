<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 啟動 Session，讀取登入資訊
    session_start();
    // 檢查使用者是否已登入
    if (!$_SESSION["id"]) {
        // 未登入時顯示提示訊息
        echo "please login first";
        // 3 秒後返回登入頁面
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

        // 建立新增佈告 SQL 指令
        // 將表單資料寫入 bulletin 資料表
        //
        // title   → 標題
        // content → 內容
        // type    → 佈告類型
        // time    → 發布日期
        $sql = "

        insert into bulletin
        (
            title,
            content,
            type,
            time
        )

        values
        (
            '{$_POST['title']}',
            '{$_POST['content']}',
            {$_POST['type']},
            '{$_POST['time']}'
        )
        ";
        // 執行新增 SQL 指令
        if (!mysqli_query($conn, $sql)) {

            // 新增失敗
            echo "新增命令錯誤";

        }
        else {
            // 新增成功
            echo "新增佈告成功，三秒鐘後回到網頁";

            // 3 秒後返回佈告頁面
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }

?>
