<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 啟動 Session，用來取得登入資訊
    session_start();
    // 檢查使用者是否已登入
    if (!$_SESSION["id"]) {
        // 未登入時顯示提示訊息
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
        // 執行修改佈告 SQL 指令
        // 更新指定 bid 的佈告內容
        //
        // UPDATE 表格名稱
        // SET 欄位=值
        // WHERE 條件
        if (
            !mysqli_query(
                $conn,

                "
                update bulletin
                set
                    title='{$_POST['title']}',
                    content='{$_POST['content']}',
                    time='{$_POST['time']}',
                    type={$_POST['type']}

                where bid='{$_POST['bid']}'

                "
            )

        ) {
            // 修改失敗
            echo "修改錯誤";

            // 3 秒後返回佈告列表
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
        else {
            // 修改成功
            echo "修改成功，三秒鐘後回到佈告欄列表";
            // 3 秒後返回佈告列表
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }

?>
