<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 啟動 Session，用來取得登入資訊
    session_start();
    // 檢查使用者是否已登入
    if (!$_SESSION["id"]) {
        // 未登入時顯示訊息
        echo "please login first";

        // 3 秒後自動跳轉回登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {
        // 已登入則顯示新增佈告表單
        echo "
        <html>
            <head>
                <title>新增佈告</title>
            </head>
            <body>
                <!-- 表單送出到 23.bulletin_add.php -->
                <form method=post action=23.bulletin_add.php>

                    <!-- 輸入標題 -->
                    標題：
                    <input type=text name=title>
                    <br>

                    <!-- 輸入佈告內容 -->
                    內容：
                    <br>

                    <textarea
                        name=content
                        rows=20
                        cols=20>
                    </textarea>

                    <br>

                    <!-- 選擇佈告類型 -->
                    佈告類型：

                    <input type=radio
                           name=type
                           value=1>
                    系上公告

                    <input type=radio
                           name=type
                           value=2>
                    獲獎資訊

                    <input type=radio
                           name=type
                           value=3>
                    徵才資訊

                    <br>

                    <!-- 選擇發布日期 -->
                    發布時間：
                    <input type=date name=time>

                    <p></p>

                    <!-- 送出與清除 -->
                    <input type=submit value=新增佈告>

                    <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
