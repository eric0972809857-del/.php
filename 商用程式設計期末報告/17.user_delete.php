<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 啟動 Session，用來取得登入資訊
    session_start();
    // 檢查是否已登入
    if (!$_SESSION["id"]) {
        // 未登入時顯示提示訊息
        echo "請登入帳號";
        // 3 秒後跳轉回登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {

        // 建立資料庫連線
        // 參數：主機、帳號、密碼、資料庫名稱
        $conn = mysqli_connect(
            "120.105.96.90",
            "immust",
            "immustimmust",
            "immust"
        );
        // 建立刪除資料 SQL 指令
        // 從網址(GET)取得 id 並刪除 user 資料表中對應資料
        // SQL語法：
        // DELETE FROM 表格名稱 WHERE 條件
        $sql = "delete from user
                where id='{$_GET["id"]}'";

        // 顯示 SQL（除錯時可開啟）
        // echo $sql;

        // 執行刪除指令
        if (!mysqli_query($conn, $sql)) {
            // 刪除失敗
            echo "使用者刪除錯誤";
        } else {
            // 刪除成功
            echo "使用者刪除成功";
        }
        // 3 秒後返回使用者管理頁面
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }

?>
