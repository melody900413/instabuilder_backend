<!doctype html>
<?php
session_start();
include '../../php/FindOrder.php';
@include '../../DataBase.php';
@logInSure();
?>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>新增訂單</title>
        <!-- 連結思源中文及css -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">
        <link href="../../images/user.jpg" rel="icon">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/menu.css" rel="stylesheet">
        <link href="assets/css/main.css" rel="stylesheet">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!------------------------->


    </head>

    <body>

        <!-- Header -->
        <header id="header" class="alt">
            <div class="logo"><a href="../../index/index.html">渡假村 <span>RESORT</span></a></div>
            <a href="#menu">Menu</a>
        </header>

        <!-- Nav -->
        <nav id="menu">
            <ul class="links">
                <li><a href="../../news/news.html">最新消息</a></li>
                <li><a href="../../room/room.php">訂房服務</a></li>
                <li><a href="../../room/roomSpace.php">查詢空房</a></li>
                <li><a href="../../search/search.php">查詢訂房</a></li>
                <li><a href="../../about/about.html">關於我們</a></li>
                <li><a href="../../information/information.php">聯絡資訊</a></li>

                <li style="margin-top: 200%"><a href="../maneger/maneger.php">管理者介面</a></li>
                <li style="margin-top: 0%"><a href="../php/logOut.php">登出</a></li>
            </ul>
        </nav>

        <section id="One" class="wrapper style3">
            <div class="inner" style="z-index: 1">
                <header class="align-center">
                    <h2>Maneger Page</h2>
                </header>
            </div>
        </section>

        <!--**************************-->
        <div class ="nav">
            <ul id="navigation" style="z-index: 2; background:#F1EEC2;">        
                <li><a href="../userIndex.php" style="color:#000; ">主頁</a></li>            

                <li class="sub">         
                    <a href="#" style="color:#000; ">帳戶管理</a>          
                    <ul style="z-index: 2; ">          
                        <li><a href="../customer/all.php">帳戶總覽</a></li>
                        <li><a href="../customer/add.php">新增</a></li>                 
                        <li><a href="../customer/delete.php">刪除</a></li>
                        <li><a href="../customer/change.php">更新</a></li>                       
                    </ul>
                </li>              

                <li class="sub">         
                    <a href="#" style="color:#000; ">Hashtags</a>          
                    <ul style="z-index: 2">          
                        <li><a href="../employee/all.php">Hashtags總覽</a></li>
                        <li><a href="../employee/add.php">新增</a></li>
                        <li><a href="../employee/delete.php">刪除</a></li>
                        <li><a href="../employee/change.php">更新</a></li>                   
                    </ul>
                </li>     

                <li class="sub">         
                    <a href="#" style="color:#000; ">貼文管理</a>          
                    <ul style="z-index: 2">          
                        <li><a href="../order/all.php">貼文總覽</a></li>
                        <li><a href="../order/delete.php">刪除</a></li>
                        <li><a href="../order/change.php">更新</a></li>                   
                    </ul>
                </li>   
            </ul>
        </div>





        <div class="container">          


            <!--~~~~~~~~~~~~~~~~~--> 
            <div class="content">
                <h2>貼文總覽</h2>
                <hr/>
                <?php
                $db = DB();
                $sql = "SELECT * FROM post ORDER BY post_no";
                $result = $db->query($sql);
//        echo '<table  border="1">';
//        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
////PDO::FETCH_OBJ 指定取出資料的型態
//            echo '<tr>';
//            echo '<td>' . $row->顧客編號 . "</td><td>" . $row->顧客名稱 . "</td>";
//            echo '</tr>';
//        }
//        echo '</table>';
                ?>
                <P> 搜尋貼文：</p><input type="search" class="light-table-filter" data-table="order-table" placeholder="請輸入關鍵字">


                <table id="table-3" class="order-table"   >
                    <thead>
                        <!--必填-->

                        <tr>
                            <th>總貼文編號</th>
                            <th >貼文編號</th>
                            <th >貼文內文</th>
                            <th>發布者</th>
                            <th>發布時間</th>
                            
                            <th>更新時間</th>
                            <th>更新</th>
                            <th>刪除</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                            //PDO::FETCH_OBJ 指定取出資料的型態
                            echo '<tr>';
                            
                            echo '<td>' . $row->post_no . "</td>"
                            . "<td>" . $row->insta_post_id . "</td>"
                            . "<td>" . $row->content . "</td>"
                            . "<td>" . $row->announcer_id . "</td>"
                            . "<td>" . $row->announce_time . "</td>"
                            
                            . "<td>" . $row->update_time . "</td>"
                            . "<td> <button type=\"button\" onclick='location.href=\"change.php?id=" . $row->post_no . "\"'>更新</button></td>"
                            . "<td> <button type=\"button\" onclick='location.href=\"delete.php?id=" . $row->post_no . "\"'>刪除</button></td>";

                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>


            </div>       

            <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
            <script language="javascript">

            </script>

        </div>


        <!--~~~~~~~~~~~~~~~~~--> 
        <div class="footer">
            &copy; NTUB GROUP 10     
        </div>  
        <!--**************************-->    

        <script>
            (function (document) {
                'use strict';

                // 建立 LightTableFilter
                var LightTableFilter = (function (Arr) {

                    var _input;

                    // 資料輸入事件處理函數
                    function _onInputEvent(e) {
                        _input = e.target;
                        var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
                        Arr.forEach.call(tables, function (table) {
                            Arr.forEach.call(table.tBodies, function (tbody) {
                                Arr.forEach.call(tbody.rows, _filter);
                            });
                        });
                    }

                    // 資料篩選函數，顯示包含關鍵字的列，其餘隱藏
                    function _filter(row) {
                        var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
                        row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
                    }

                    return {
                        // 初始化函數
                        init: function () {
                            var inputs = document.getElementsByClassName('light-table-filter');
                            Arr.forEach.call(inputs, function (input) {
                                input.oninput = _onInputEvent;
                            });
                        }
                    };
                })(Array.prototype);

                // 網頁載入完成後，啟動 LightTableFilter
                document.addEventListener('readystatechange', function () {
                    if (document.readyState === 'complete') {
                        LightTableFilter.init();
                    }
                });

            })(document);
        </script>
    </body>

</html>
