<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 啟動 Session，取得登入資訊
    session_start();
    // 檢查是否已登入
    if (!$_SESSION["id"]) {
        // 未登入顯示提示訊息
        echo "please login first";
        // 3 秒後跳轉回登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {
        // 建立資料庫連線
        $conn = mysqli_connect(
            "120.105.96.90",
            "immust",
            "immustimmust",
            "immust"
        );

        // 查詢指定佈告資料
        // 從網址取得 bid (佈告編號)
        $result = mysqli_query(
            $conn,
            "select * from bulletin where bid={$_GET["bid"]}"
        );
        // 取得查詢結果的一筆資料
        $row = mysqli_fetch_array($result);
        // 初始化 radio 按鈕選取狀態
        $checked1 = "";
        $checked2 = "";
        $checked3 = "";
        // 根據資料庫中的 type 設定預設勾選
        if ($row['type'] == 1)
            $checked1 = "checked";
        if ($row['type'] == 2)
            $checked2 = "checked";
        if ($row['type'] == 3)
            $checked3 = "checked";
        // 顯示修改表單
        echo "
        <html>
            <head>
                <title>新增佈告</title>
            </head>
            <body>
                <!-- 修改後送到 27.bulletin_edit.php -->
                <form method=post action=27.bulletin_edit.php>

                    <!-- 顯示佈告編號 -->
                    佈告編號：
                    {$row['bid']}

                    <!-- 隱藏欄位：送出時保留 bid -->
                    <input
                        type=hidden
                        name=bid
                        value={$row['bid']}>
                    <br>
                    <!-- 標題 -->
                    標題：
                    <input
                        type=text
                        name=title
                        value={$row['title']}>
                    <br>
                    <!-- 內容 -->
                    內容：
                    <br>
                    <textarea
                        name=content
                        rows=20
                        cols=20>

{$row['content']}
                    </textarea>
                    <br>
                    <!-- 佈告類型 -->
                    佈告類型：
                    <input
                        type=radio
                        name=type
                        value=1
                        {$checked1}>
                    系上公告
                    <input
                        type=radio
                        name=type
                        value=2
                        {$checked2}>
                    獲獎資訊
                    <input
                        type=radio
                        name=type
                        value=3
                        {$checked3}>
                    徵才資訊
                    <br>

                    <!-- 發布日期 -->
                    發布時間：
                    <input
                        type=date
                        name=time
                        value={$row['time']}>
                    <p></p>
                    <!-- 修改與清除 -->
                    <input
                        type=submit
                        value=修改佈告>
                    <input
                        type=reset
                        value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
