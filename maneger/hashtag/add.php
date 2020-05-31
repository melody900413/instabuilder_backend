<!doctype html>
<?php
session_start();
include '../../php/FindOrder.php';
include_once '../../php/DataBase.php';
LogInSure();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>新增員工</title>
        <!-- 連結思源中文及css -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">
        <link href="../../images/user.jpg" rel="icon">
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
        $hashtagErr = $stageErr = "";
        $hashtag = $stage  = "";
        $sure = true;

        if (isset($_POST["Reg"])) {
            
            $hashtag = $_POST["hashtag"];
			$stage = $_POST["stage"];
          
            if (empty($_POST["hashtag"])) {

                $hashtagErr = "hashtag是必填的!";
                $sure = false;
            }

            if (($_POST["stage"])>3) {
                $stageErr = "stage是必填的!";
                $sure = false;
            }

            
            if ($sure) {

                $db = DB();
                $sql = "INSERT INTO hashtagcates (hashtag, stage)
                VALUES ('".$_POST['hashtag']."','".$_POST['stage']."')";

                $db->query($sql);
//                echo 'swal("新增成功！", "回到員工總覽 或是 員工新增?", "success").then(function (result) {
//                    
//                    window.location.href = "http://tw.yahoo.com";
//                }); ';

                    echo '        <script>
            swal({
                title: "新增成功！",
                text: "回到員工總覽 或是 員工新增?",
                icon: "success",
                buttons: {
                    1: {
                        text: "員工總覽",
                        value: "員工總覽",
                    },
                    2: {
                        text: "員工新增",
                        value: "員工新增",
                    },
                },

            }).then(function (value) {
                switch (value) {
                    case"員工總覽":
                        window.location.href = "all.php";
                        break;
                    case"員工新增":
                        window.location.href = "add.php";
                        break;
                        

                }
            })
        </script>  ';


//                header("Location:all.php");
            } else {
                $mes = $hashtagErr . $stageErr ;
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
                <h2>新增Hashtag</h2>
                <hr/>

                <form method="post" action="">

                    <div class="6u 12u$(small)"> <p>Hashtag：</p>
                        <input type="text" name="hashtag" id="hashtag" value="<?php echo $hashtag; ?>" placeholder="好吃" required>
                    </div>

                    <br/>
                    <div class="6u 12u$(small)"> <p>層數：</p>
                        <input type="text" name="stage" id="stage" value="<?php echo $stage; ?>" placeholder="Name" required>
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
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        </div>


        <!--~~~~~~~~~~~~~~~~~--> 
        <div class="footer">
            &copy; NTUB GROUP 10     
        </div>  
        <!--**************************-->    
    </body>

</html>
