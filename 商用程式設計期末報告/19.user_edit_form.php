<html>
<head>
    <title>修改使用者</title>
</head>
<body>
<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);

    // 啟動 Session，取得登入資訊
    session_start();

    // 檢查使用者是否已登入
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

        // 查詢指定 id 的使用者資料
        // 從網址(GET)取得 id
        $result = mysqli_query(
            $conn,
            "select * from user where id='{$_GET['id']}'"
        );

        // 取得查詢結果中的一筆資料
        // 並存入陣列 $row
        $row = mysqli_fetch_array($result);

        // 顯示修改表單
        echo "

        <form method=post action=20.user_edit.php>

            <!-- 隱藏欄位：送出時保留原帳號 -->
            <input type=hidden
                   name=id
                   value={$row['id']}>

            <!-- 顯示帳號 -->
            帳號：{$row['id']}
            <br>

            <!-- 可修改密碼 -->
            密碼：
            <input type=text
                   name=pwd
                   value={$row['pwd']}>

            <p></p>

            <!-- 送出修改 -->
            <input type=submit value=修改>

        </form>

        ";
    }

?>
</body>
</html>
