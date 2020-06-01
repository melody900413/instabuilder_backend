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
        <title>刪除訂單</title>
        <!-- 連結思源中文及css -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">
        <link href="../images/user.jpg" rel="icon">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/menu.css" rel="stylesheet">
        <link href="assets/css/main.css" rel="stylesheet">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="assets/js/sweetalert.min.js" type="text/javascript"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!------------------------->
    </head>

    <body>
        <?php
        if (isset($_SESSION["dele_sure"])) {
            if ($_SESSION["dele_sure"]) {
                echo '<script>  swal({
                    text: "刪除成功！",
                    icon: "success",
                    button: false,
                    timer: 3000,
                }); </script>';
                $_SESSION["dele_sure"] = false;
            }
        }
        $sure = true;
        if (isset($_POST["Reg"])) {
            if (empty($_POST["post_no"])) {
                $nameErr = "姓名是必填的!";
                $sure = false;
            }
            if ($sure) {
                $_SESSION["dele_post_no"] = $_POST["post_no"];
                echo '        <script>
                    swal({
                        title: "確定刪除？",
                        text: "你將無法刪除恢復此資料！",
                        icon: "warning",
                        buttons: {
                            1: {
                                text: "取消",
                                value: "取消",
                            },
                            2: {
                                text: "確定刪除！",
                                value: "確定刪除",
                            },
                        },
        
                    }).then(function (value) {
                        switch (value) {
                            case"取消":
                                window.location.href = "delete.php";
                                break;
                            case"確定刪除":
                                window.location.href = "php/deleteFile.php";
                                break;
                                
        
                        }
                    })
                </script>  ';
            }
        }
        ?>

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
                <li style="margin-top: 0%"><a href="../../maneger/php/logOut.php">登出</a></li>    
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
                        <li><a href="../user/all.php">帳戶總覽</a></li>                 
                        <li><a href="../user/add.php">新增</a></li>                 
                        <li><a href="../user/delete.php">刪除</a></li>
                        <li><a href="../user/change.php">更新</a></li>                     
                    </ul>
                </li>              

                <li class="sub">         
                    <a href="#" style="color:#000; ">Hashtags</a>          
                    <ul style="z-index: 2">          
                        <li><a href="../hashtag/all.php">Hashtags總覽</a></li>
                        <li><a href="../hashtag/add.php">新增</a></li>
                        <li><a href="../hashtag/delete.php">刪除</a></li>
                                           
                    </ul>
                </li>     

                <li class="sub">         
                    <a href="#" style="color:#000; ">貼文管理</a>          
                    <ul style="z-index: 2">          
                        <li><a href="../post/all.php">貼文總覽</a></li>
                        <li><a href="../post/delete.php">刪除</a></li>
                        <li><a href="../post/change.php">更新</a></li>                   
                    </ul>
                </li>   

                <li class="sub">         
                    <a href="#" style="color:#000; ">貼文觸及</a>          
                    <ul style="z-index: 2">          
                        <li><a href="../reach/like.php">按讚數統計查詢</a></li>
                        <li><a href="../reach/comment.php">留言記錄查詢</a></li>
                        <li><a href="../reach/saved.php">珍藏數統計查詢</a></li>
                        </ul>
                </li>   
            </ul>
        </div>
        <!--**************************-->

        <div class="container">          


            <!--~~~~~~~~~~~~~~~~~--> 
            <div class="content">
                <h2>刪除貼文</h2>

                <hr/>

                <form method="post" action="">

                    <div class="6u 12u$(small)"> <p>貼文編號：</p>
                        <input type="text" name="post_no" id="big" value="" placeholder="Number" required>
                        <script>
                            var url = location.href;
                            //之後去分割字串把分割後的字串放進陣列中
                            var ary1 = url.split('?');
                            //此時ary1裡的內容為：
                            //ary1[0] = 'index.aspx'，ary2[1] = 'id=U001&name=GQSM'

                            //下一步把後方傳遞的每組資料各自分割
                            var ary2 = ary1[1].split('&');
                            //此時ary2裡的內容為：
                            //ary2[0] = 'id=U001'，ary2[1] = 'name=GQSM'

                            //最後如果我們要找id的資料就直接取ary[0]下手，name的話就是ary[1]
                            var ary3 = ary2[0].split('=');
                            //此時ary3裡的內容為：
                            //ary3[0] = 'id'，ary3[1] = 'U001'

                            //取得id值
                            var id = ary3[1];
                            var aee = 10;
                            document.getElementById("big").value = id;
                        </script>
                    </div>


                    <div class="12u$">
                        <ul class="actions">
                            <div align="right"  style="margin-right: 5%">

                                <li><input type="submit" name="Reg" value="刪除"></li>

                            </div>
                        </ul>
                    </div>
                </form>


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
