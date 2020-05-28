

<!doctype html>
<?php
session_start();
include '../php/FindOrder.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>管理者介面</title>
        <!-- 連結思源中文及css -->

        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">
        <link href="../images/user.jpg" rel="icon">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/menu.css" rel="stylesheet">
        <link href="assets/css/main.css" rel="stylesheet">
        <script src="assets/js/sweetalert.min.js" type="text/javascript"></script>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!------------------------->
    </head>

    <body>
        <?php
        if(isset($_SESSION["unLog"])){
            if($_SESSION["unLog"]){
                echo '<script>  swal({
                text: "未登入或登入逾時！",
                icon: "error",
                button: false,
                timer: 2000,
                }); </script>';
                session_unset();
            }   
        }

        
        
        if (isset($_POST["next"])) {
            findUser($_POST["signup_email"], $_POST["login_pas"]);
        }
        ?>


        <!-- Header -->
        <header id="header" class="alt">
            <div class="logo"><a href="../index/index.html">渡假村 <span>RESORT</span></a></div>
            <a href="#menu">Menu</a>
        </header>

        <!-- Nav -->
        <nav id="menu">
            <ul class="links">
                <li><a href="../news/news.html">最新消息</a></li>
                <li><a href="../room/room.php">訂房服務</a></li>
                <li><a href="../room/roomSpace.php">查詢空房</a></li>
                <li><a href="../search/search.php">查詢訂房</a></li>
                <li><a href="../about/about.html">關於我們</a></li>
                <li><a href="../information/information.php">聯絡資訊</a></li>

                <li style="margin-top: 200%"><a href="../maneger/maneger.php">管理者介面</a></li>
                <li style="margin-top: 0%"><a href="../maneger/php/logOut.php">登出</a></li>    
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
                <li><a href="userIndex.php" style="color:#000; ">主頁</a></li>            

                <li class="sub">         
                    <a href="#" style="color:#000; ">客戶</a>          
                    <ul style="z-index: 2; ">          
                        <li><a href="customer/all.php">客戶總覽</a></li>                 
                        <li><a href="customer/add.php">新增</a></li>                 
                        <li><a href="customer/delete.php">刪除</a></li>
                        <li><a href="customer/change.php">更新</a></li>                     
                    </ul>
                </li>              

                <li class="sub">         
                    <a href="#" style="color:#000; ">員工</a>          
                    <ul style="z-index: 2">          
                        <li><a href="employee/all.php">員工總覽</a></li>
                        <li><a href="employee/add.php">新增</a></li>
                        <li><a href="employee/delete.php">刪除</a></li>
                        <li><a href="employee/change.php">更新</a></li>                      
                    </ul>
                </li>     

                <li class="sub">         
                    <a href="#" style="color:#000; ">訂單</a>          
                    <ul style="z-index: 2">          
                        <li><a href="order/all.php">訂單總覽</a></li>
                        <li><a href="order/delete.php">刪除</a></li>
                        <li><a href="order/change.php">更新</a></li>                   
                    </ul>
                </li> 
                

                   

            </ul>
        </div>



        <div class="container">          


            <!--~~~~~~~~~~~~~~~~~--> 
            <div class="content">
                <h2>管理者登入</h2>

                <form method="post" action="">

                    <div class="6u 12u$(small)" style="margin-left: 20%"> 
                        <p>帳號：</p>
                        <input type="text" name="signup_email" id="id" value="" placeholder="" required>
                    </div>
                    <br/>
                    <div class="6u$ 12u$(small)"  style="margin-left: 20%"> 
                        <p>密碼：</p>											
                        <input type="password" name="login_pas" id="password" value="" placeholder="" required>
                    </div>  

                    <div class="12u$">
                        <ul class="actions">
                            <div align="right"  style="margin-right: 5%">

                                <li><input type="submit" name="next" value="ENTER"></li>

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
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </div>


        <!--~~~~~~~~~~~~~~~~~--> 
        <div class="footer">
            &copy; NTUB GROUP 10     
        </div>  
        <!--**************************-->    
    </body>

</html>
