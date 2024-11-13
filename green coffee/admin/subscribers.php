
<?php
    include '../components/connect.php';

    session_start();
    $admin_id = $_SESSION['admin_id'];

    if (!isset($admin_id)){
        header('location: login.php');  
    }

   
        
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="admin_style.css?v=<?php echo time(); ?>">
    <title>green coffe admin panel - subscribers page</title>
</head>
<body>
    <?php include '../components/admin_header.php';  ?>



<div class = "main">
    <div class="banner">
        <h1>subscribers</h1>
     </div>
<div class="title2">
    <a href="dashboard.php">dashboard</a><span>  / SUbscribers</span>
</div>

    <section class ="accounts">
        <h1 class="heading">Subscribers</h1>
        <div class="box-container">

        <?php
        $select_sub = $conn->prepare("SELECT * FROM `subscribers` ");
        $select_sub->execute();


        if($select_sub->rowcount() > 0){
            while($fetch_sub = $select_sub->fetch(PDO::FETCH_ASSOC)){
                $user_id = $fetch_sub['user_id'];





                ?>
                <div class="box">
                    
            <p>user id : <span><?= $user_id; ?></span></p>
            <p>subscribers email : <span><?= $fetch_sub['email']; ?></span></p>
            </div>
                <?php
            }
        }else{


        echo '
        <div class="empty">
             <p>no subscribers yet!</p>
   
        </div>
        ';
        }


        ?>
            
</div>
        
 </section>
</div>

<script src ="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">

    </script>
<script type ="text.javascript" src="./script.js"></script>

<?php include '../components/alert.php';?>












    
</body>
</html>