<!doctype html>
<?php
session_start();
include '../../php/FindOrder.php';
include_once '../../php/DataBase.php';
@logInSure();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>新增客戶</title>
        <!-- 連結思源中文及css -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">
        <link href="../../images/user.jpg" rel="icon">
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
        $user_nameErr = $signup_datetimeErr = $signup_emailErr = $login_pasErr = $privilegeErr = "";
        $user_name = $signup_datetime = $signup_email = $login_pas = $privilege  = "";
        $sure = true;
    
        if (isset($_POST["Reg"])) {
            $user_name = $_POST["user_name"];
            $signup_datetime = $_POST["signup_datetime"];
            $signup_email = $_POST["signup_email"];
            $login_pas = $_POST["login_pas"];
            $privilege = $_POST["privilege"];

            if (empty($_POST["user_name"])) {

                $nameErr = "姓名是必填的!";
                $sure = false;
            }

            if (empty($_POST["signup_datetime"])) {
                $signup_datetimeErr = "日期是必填的!";
                $sure = false;
            } 

            if (empty($_POST["signup_email"])) {
                $signup_emailErr = "email是必填的!";
                $sure = false;
            } 

            if (empty($_POST["login_pas"])) {
                $login_pasErr = "login_pas是必填的!";
                $sure = false;
            }

            if (empty($_POST["privilege"])) {
                $privilegeErr = "權限是必填的!";
                $sure = false;
            }
            if ($sure) {

                $db = DB();
                $sql = "INSERT INTO user (user_name, signup_datetime, signup_email,login_pas,privilege)
                VALUES ('".$_POST['user_name']."','".$_POST['signup_datetime']."','".$_POST['signup_email']."','".$_POST['login_pas']."','".$_POST['privilege']."')";
                
                $db->query($sql);
//                echo 'swal("新增成功！", "回到客戶總覽 或是 客戶新增?", "success").then(function (result) {
//                    
//                    window.location.href = "http://tw.yahoo.com";
//                });

                    echo '        <script>
            swal({
                title: "新增成功！",
                text: "回到客戶總覽 或是 客戶新增?",
                icon: "success",
                buttons: {
                    1: {
                        text: "客戶總覽",
                        value: "客戶總覽",
                    },
                    2: {
                        text: "客戶新增",
                        value: "客戶新增",
                    },
                },
            }).then(function (value) {
                switch (value) {
                    case"客戶總覽":
                        window.location.href = "all.php";
                        break;
                    case"客戶新增":
                        window.location.href = "add.php";
                        break;
                        
                }
            })
        </script>  ';

//                header("Location:all.php");
            } else {
                $mes = $user_nameErr . $signup_datetimeErr . $signup_emailErr . $login_pasErr .$privilegeErr ;
                echo '<script>  swal({
                text: "' . $mes . '",
                icon: "error",
                button: false,
                timer: 3000,
            }); </script>';
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
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
                <li><a href="../userIndex.php" style="color:#dfadff; ">主頁</a></li>            

                <li class="sub">         
                    <a href="#" style="color:#dfadff; ">帳戶管理</a>          
                    <ul style="z-index: 2; ">          
                        <li><a href="../user/all.php">帳戶總覽</a></li>                 
                        <li><a href="../user/add.php">新增</a></li>                 
                        <li><a href="../user/delete.php">刪除</a></li>
                        <li><a href="../user/change.php">更新</a></li>                     
                    </ul>
                </li>              

                <li class="sub">         
                    <a href="#" style="color:#dfadff; ">Hashtags</a>          
                    <ul style="z-index: 2">          
                        <li><a href="../hashtag/all.php">Hashtags總覽</a></li>
                        <li><a href="../hashtag/add.php">新增</a></li>
                        <li><a href="../hashtag/delete.php">刪除</a></li>
                                           
                    </ul>
                </li>     

                <li class="sub">         
                    <a href="#" style="color:#dfadff; ">貼文管理</a>          
                    <ul style="z-index: 2">          
                        <li><a href="../post/all.php">貼文總覽</a></li>
                        <li><a href="../post/delete.php">刪除</a></li>
                        <li><a href="../post/change.php">更新</a></li>                   
                    </ul>
                </li>   

                <li class="sub">         
                    <a href="#" style="color:#dfadff; ">貼文觸及</a>          
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
                <h2>新增系統帳戶</h2>
                <hr/>

                <form method="post" action="">

                    <div class="6u 12u$(small)"> <p>姓名：</p>
                        <input type="text" name="user_name" id="user_name" value="<?php echo $user_name; ?>" placeholder="Name" required>
                    </div>

                    <br/>
                    <div class="6u$ 12u$(small)"> 
                        <p>新增日期：</p>
                        <input type="date" name="signup_datetime" id="signup_datetime" value="<?php echo $signup_datetime; ?>" placeholder="yyyy-mm-dd" required>
                    </div>
                
                    <br/>
                    
                    <div class="6u$ 12u$(xsmall)" ><p>E-mail：</p>
                        <input type="email" name="signup_email" id="signup_email" value="<?php echo $signup_email; ?>" placeholder="email" required>
                    </div>

                    <div class="6u 12u$(xsmall)" ><p>密碼</p>
                        <input type="text" name="login_pas" id="login_pas" value="<?php echo $login_pas; ?>" placeholder="login_pas" required>
                    </div>

                    <br/>
                    
                    <div class="6u 12u$(small)"> <p>權限</p>
                        <input type="text" name="privilege" id="privilege" value="<?php echo $privilege; ?>" placeholder="privilege" required>
                    </div>	

                
                    <div class ="Err" style="color:red;">
                        <?php
                        echo "<p>" . $user_nameErr . "</p>";
                        echo "<p>" . $signup_datetimeErr . "</p>";
                        echo "<p>" . $signup_emailErr . "</p>";
                        echo "<p>" . $login_pasErr . "</p>";
                        echo "<p>" . $privilegeErr . "</p>";
                        ?>
                    </div>

                    <div class="12u$">
                        <ul class="actions">
                            <div align="right"  style="margin-right: 5%">

                                <li><input type="submit" name="Reg" value="ADD"></li>

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
            &copy; NTUB GROUP 109501     
        </div>  
        <!--**************************-->    
    </body>


</html>
