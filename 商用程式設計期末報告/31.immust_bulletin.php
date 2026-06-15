<html>
<head>
    <!-- 網頁標題 -->
    <title>明新科技大學資訊管理系</title>
    <!-- 設定網頁編碼，避免中文亂碼 -->
    <meta charset="utf-8">
    <!-- 載入 FlexSlider 輪播 CSS -->
    <link
        href="https://cdn.bootcss.com/flexslider/2.6.3/flexslider.min.css"
        rel="stylesheet">
    <!-- 載入 jQuery -->
    <script src="https://cdn.bootcss.com/jquery/2.2.2/jquery.min.js"></script>
    <!-- 載入 FlexSlider 套件 -->
    <script src="https://cdn.bootcss.com/flexslider/2.6.3/jquery.flexslider-min.js"></script>

    <script>

        // 網頁載入完成後啟動輪播
        $(window).load(function () {

            $('.flexslider').flexslider({

                // 使用滑動效果
                animation: "slide",

                // 由右往左輪播
                rtl: true

            });

        });
    </script>
    <style>
        /* ===================
           全域樣式
        =================== */
        *{
            margin:0;
            color:gray;
            text-align:center;
        }
        /* ===================
           頁首區(top)
        =================== */

        /* LOGO 與導覽列 */

        /* ===================
           導覽列(nav)
        =================== */

        /* 設定選單樣式 */

        /* ===================
           下拉式選單
        =================== */

        /* 滑鼠移入顯示內容 */

        /* ===================
           輪播區(slider)
        =================== */

        /* 顯示首頁圖片輪播 */

        /* ===================
           系所介紹區(banner)
        =================== */

        /* 顯示系所特色 */

        /* ===================
           師資介紹(faculty)
        =================== */

        /* 教師照片與資訊 */

        /* ===================
           聯絡資訊(contact)
        =================== */

        /* 地址與地圖 */

        /* ===================
           頁尾(footer)
        =================== */

        /* 版權資訊 */

        /* ===================
           登入視窗(modal)
        =================== */

        /* 彈出式登入畫面 */

        /* ===================
           佈告欄(bulletin)
        =================== */

        /* 公告列表樣式 */

    </style>

</head>

<body>

<!-- ===================
     頁首
=================== -->
<div class="top">
    <!-- LOGO -->
    <!-- 顯示學校圖片與系所名稱 -->

    <!-- 導覽列 -->
    <!-- 包含登入功能 -->
</div>
<!-- ===================
     導覽選單
=================== -->
<div class="nav">
<!-- 首頁 -->
<!-- 系所簡介 -->
<!-- 師資介紹 -->
<!-- 相關資訊 -->
</div>
<!-- ===================
     輪播圖片
=================== -->
<div class="slider">
<!-- 使用 FlexSlider 顯示圖片輪播 -->
</div>
<!-- ===================
     佈告欄
=================== -->
<div class="bulletin">
<h1>最新公告</h1>
<?php
    // 建立資料庫連線
    $conn = mysqli_connect(
        "120.105.96.90",
        "immust",
        "immustimmust",
        "immust"
    );

    // 查詢所有公告資料
    $result = mysqli_query(
        $conn,
        "select * from bulletin"
    );

    // 建立表格標題列
    echo "
        <table border=2>
        <tr>
            <th>佈告編號</th>
            <th>佈告類別</th>
            <th>標題</th>
            <th>佈告內容</th>
            <th>發佈時間</th>
        </tr>
    ";
    // 逐筆讀取公告資料
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        // 顯示編號
        echo "<td>";
        echo $row["bid"];
        echo "</td>";
        // 顯示公告類型
        echo "<td>";
        if ($row["type"] == 1)
            echo "系上公告";

        if ($row["type"] == 2)
            echo "獲獎資訊";

        if ($row["type"] == 3)
            echo "徵才資訊";
        echo "</td>";
        // 顯示標題
        echo "<td>";
        echo $row["title"];
        echo "</td>";
        // 顯示內容
        echo "<td>";
        echo $row["content"];
        echo "</td>";

        // 顯示發布日期
        echo "<td>";
        echo $row["time"];
        echo "</td>";
        echo "</tr>";
    }
    // 結束表格
    echo "</table>";
?>
</div>
<!-- ===================
     系所介紹
=================== -->
<div class="banner">
<!-- 顯示系所特色文字 -->
</div>
<!-- ===================
     師資介紹
=================== -->
<div class="faculty">
<!-- 顯示教師圖片與姓名 -->
</div>
<!-- ===================
     聯絡資訊
=================== -->
<div class="contact">
<!-- 地址 -->
<!-- 電話 -->
<!-- Google 地圖 -->
</div>
<!-- ===================
     頁尾
=================== -->
<div class="footer">
版權資訊
</div>
</body>
</html>
