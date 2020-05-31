<!doctype html>
<?php
session_start();
include '../../php/FindOrder.php';

LogInSure();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>查詢訂單</title>
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
            <div class="logo"><a href="../index/index.html">Instabuilder <span>Backend</span></a></div>
            <a href="#menu">Menu</a> 
        </header>

        <!-- Nav -->
        
        <nav id="menu">
            <ul class="links">
                <!--
                <li><a href="../../news/news.html">最新消息</a></li>
                <li><a href="../../room/room.php">訂房服務</a></li>
                <li><a href="../room/roomSpace.php">查詢空房</a></li>
                <li><a href="../../search/search.php">查詢訂房</a></li>
                <li><a href="../../about/about.html">關於我們</a></li>
                <li><a href="../../information/information.php">聯絡資訊</a></li>
                -->
                <li style="margin-top: 200%"><a href="../maneger/maneger.php">管理者介面</a></li>
                <li style="margin-top: 0%"><a href="../maneger/php/logOut.php">登出</a></li>    
            </ul>
        </nav>
        
        <section id="One" class="wrapper style3">
            <div class="inner" style="z-index: 1">
                <header class="align-center">
                    <h2>後端管理</h2>
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
                        <li><a href="user/all.php">帳戶總覽</a></li>                 
                        <li><a href="user/add.php">新增</a></li>                 
                        <li><a href="user/delete.php">刪除</a></li>
                        <li><a href="user/change.php">更新</a></li>                     
                    </ul>
                </li>              

                <li class="sub">         
                    <a href="#" style="color:#000; ">Hashtags</a>          
                    <ul style="z-index: 2">          
                        <li><a href="hashtag/all.php">Hashtags總覽</a></li>
                        <li><a href="hashtag/add.php">新增</a></li>
                        <li><a href="hashtag/delete.php">刪除</a></li>
                                           
                    </ul>
                </li>     

                <li class="sub">         
                    <a href="#" style="color:#000; ">貼文管理</a>          
                    <ul style="z-index: 2">          
                        <li><a href="post/all.php">貼文總覽</a></li>
                        <li><a href="post/delete.php">刪除</a></li>
                        <li><a href="post/change.php">更新</a></li>                   
                    </ul>
                </li>   

                <li class="sub">         
                    <a href="#" style="color:#000; ">貼文觸及</a>          
                    <ul style="z-index: 2">          
                        <li><a href="like.php">按讚數統計查詢</a></li>
                        <li><a href="comment.php">留言記錄查詢</a></li>
                        <li><a href="saved.php">珍藏數統計查詢</a></li>
                        </ul>
                </li>   
            </ul>
        </div>
        <!--**************************-->




            <!--~~~~~~~~~~~~~~~~~--> 
            <div class="container">          


            <!--~~~~~~~~~~~~~~~~~--> 
            <div class="content">
                <h2>貼文珍藏數量統計</h2>
                <hr/>
                <?php
                $db = DB();
                $sql = "SELECT b.account_id ,c.account_name,a.post_no,count(saved_account)貼文珍藏數量
                        FROM instabuilder.saved as a 
                        join userpost as b on a.post_no = b.post_no
                        join instaaccount as c on c.account_id = b.account_id
                        group by post_no
                        order by account_id,post_no";
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
                <P> 搜尋帳號編號：</p><input type="search" class="light-table-filter" data-table="order-table" placeholder="請輸入關鍵字">


                <table id="table-3" class="order-table"   >
                    <thead>
                        <!--必填-->

                        <tr>
                        <th >帳號編號</th>
                        <th >帳號名稱</th>
                        <th >貼文編號</th>
                        <th >貼文珍藏數量</th>
                    </tr>
                </thead>
            <tbody>

                <?php
                    while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                    //PDO::FETCH_OBJ 指定取出資料的型態
                    echo '<tr>';
                        echo '<td>' . $row->account_id . "</td>"
                        . "<td>" . $row->account_name. "</td>"
                        . "<td>" . $row->post_no. "</td>"
                        . "<td>" . $row->貼文珍藏數量 . "</td>";

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

        </div>


        <!--~~~~~~~~~~~~~~~~~--> 
        <div class="footer">
            &copy; NTUB GROUP 10     
        </div>  
        <!--**************************-->    
    </body>

</html>
