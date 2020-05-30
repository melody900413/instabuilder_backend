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
        <title>更新貼文</title>
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
        $contentErr = $announcer_idErr = "";
        $content = $announcer_id = "";
        $sure = true;
        if (isset($_POST["Reg"])) {
            $content = $_POST["content"];
            $announcer_id = $_POST["announcer_id"];
           
            if (empty($_POST["content"])) {
                $contentErr = "內容是必填的!";
                $sure = false;
            }
            if (empty($_POST["announcer_id"])) {
                $announcer_idErr = "announcer是必填的!";
                $sure = false;
            
            }
            
            
            if ($sure) {
                $db = DB();
                $sql = "UPDATE post \n" 
                ."SET post_no = ". $_SESSION['post_no'] .",\n" 
                ."content = '".$_POST['content']."',\n" 
                ."announcer_id = '".$_POST['announcer_id']."'\n".
                "WHERE\n" 
                ."post_no =" . $_SESSION["post_no"]."";

                $db->query($sql);
//                echo 'swal("新增成功！", "回到訂單總覽 或是 訂單新增?", "success").then(function (result) {
//                    
//                    window.location.href = "http://tw.yahoo.com";
//                }); ';
                echo '        <script>
            swal({
                title: "更改成功！",
                text: "回到訂單總覽 或是 更新訂單?",
                icon: "success",
                buttons: {
                    1: {
                        text: "訂單總覽",
                        value: "訂單總覽",
                    },
                    2: {
                        text: "更新訂單",
                        value: "更新訂單",
                    },
                },
            }).then(function (value) {
                switch (value) {
                    case"訂單總覽":
                        window.location.href = "all.php";
                        break;
                    case"更新訂單":
                        window.location.href = "change.php";
                        break;
                        
                }
            })
        </script>  ';
//                header("Location:all.php");
            } else {
                $mes = $$contentErr . $announcer_idErr ;
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





        <div class="container">          


            <!--~~~~~~~~~~~~~~~~~--> 
            <div class="content">
            <h2>更新貼文內容</h2>
                <hr/>
                
                <p>貼文編號:<?php echo $_SESSION["post_no"]; ?></p>
                <br>
                <br>
                
                <form method="post" action="">

                <div class="6u 12u$(small)"> <p>內容:</p>
                        <input type="text" name="content" id="content" value="<?php echo $content; ?>" placeholder="content"" required>
                    </div>

                    <br/>
                    <div class="6u$ 12u$(small)"> 
                        <p>announcer_id:</p>
                        <input type="text" name="announcer_id" id="announcer_id" value="<?php echo $announcer_id; ?>" placeholder="3" required>
                    </div>
                
                    
                    
                    <div class ="Err" style="color:red;">
                        <?php
                        echo "<p>" . $contentErr . "</p>";
                        echo "<p>" . $announcer_idErr . "</p>";
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
            &copy; NTUB GROUP 10     
        </div>  
        <!--**************************-->    
    </body>

</html>