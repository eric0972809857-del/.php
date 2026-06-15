<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);

    // 啟動 Session，用來取得登入資訊
    session_start();

    // 檢查是否已登入
    if (!$_SESSION["id"]) {

        // 未登入顯示提示訊息
        echo "請登入帳號";

        // 3 秒後跳轉回登入頁面
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
        // 建立刪除佈告 SQL 指令
        // 從網址取得 bid (佈告編號)
        //
        // SQL語法：
        // DELETE FROM 表格名稱
        // WHERE 條件
        $sql = "

            delete from bulletin
            where bid='{$_GET["bid"]}'

        ";
        // 顯示 SQL 指令（除錯時可取消註解）
        // echo $sql;
        // 執行刪除指令
        if (!mysqli_query($conn, $sql)) {

            // 刪除失敗
            echo "佈告刪除錯誤";

        } else {

            // 刪除成功
            echo "佈告刪除成功";
        }
        // 3 秒後返回佈告列表頁
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }

?>
