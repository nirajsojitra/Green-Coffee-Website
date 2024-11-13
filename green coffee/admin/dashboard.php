
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
    <title>green coffe admin panel - dashboard page</title>
</head>
<body>
    <?php include '../components/admin_header.php';  ?>



<div class = "main">
    <div class="banner">
        <h1>dashboard</h1>
    </div>
<div class="title2">
    <a href="dashboard.php">home</a><span> / dashboard</span>
</div>

    <section class ="dashboard">
        <h1 class="heading">dashboard</h1>
        <div class="box-container">
            <div class="box">
                <h3>welcome!</h3>
                <p><?=  $fetch_profile['name'];  ?></p>
                <a href="" class="btn">profile</a>
</div>
<div class="box">
    <?php 
    $select_product = $conn->prepare("SELECT * FROM `PRODUCTS`");
    $select_product->execute();
    $num_of_products=$select_product->rowcount();
    ?>
    <h3><?=$num_of_products; ?></h3>
    <p>products added</p>
    <a href="add_products.php" class="btn" >add new products</a>
               
</div>
<div class="box">
    <?php 
    $select_active_product =$conn->prepare("SELECT * FROM `PRODUCTS` WHERE STATUS = ?");
    $select_active_product->execute(['active']);
    $num_of_active_products=$select_active_product->rowcount();
    ?>
    <h3><?=$num_of_active_products; ?></h3>
    <p>total active products </p>
    <a href="active.php" class="btn" >view active products</a>
               
</div>
<div class="box">
    <?php 
    $select_deactive_product =$conn->prepare("SELECT * FROM `PRODUCTS` WHERE STATUS = ?");
    $select_deactive_product->execute(['deactive']);
    $num_of_deactive_products=$select_deactive_product->rowcount();
    ?>
    <h3><?=$num_of_deactive_products; ?></h3>
    <p>total deactive products </p>
    <a href="deactive.php" class="btn" >view deactive products</a>
               
</div>
<div class="box">
    <?php 
    $select_users =$conn->prepare("SELECT * FROM `users`");
    $select_users->execute();
    $num_of_users=$select_users->rowcount();
    ?>
    <h3><?=$num_of_users; ?></h3>
    <p>register users</p>
    <a href="user_account.php" class="btn" >view users</a>
               
</div>
<div class="box">
    <?php 
    $select_admin=$conn->prepare("SELECT * FROM `admin`");
    $select_admin->execute();
    $num_of_admin=$select_admin->rowcount();
    ?>
    <h3><?=$num_of_admin; ?></h3>
    <p>register admin</p>
    <a href="admin_account.php" class="btn" >view admin</a>
               
</div>
<div class="box">
    <?php 
    $select_message=$conn->prepare("SELECT * FROM `message`");
    $select_message->execute();
    $num_of_message=$select_message->rowcount();
    ?>
    <h3><?=$num_of_message; ?></h3>
    <p>unread message</p>
    <a href="admin_message.php" class="btn" >view message</a>
               
</div>
<div class="box">
    <?php 
    $select_orders=$conn->prepare("SELECT * FROM `orders`");
    $select_orders->execute();
    $num_of_orders=$select_orders->rowcount();
    ?>
    <h3><?=$num_of_orders; ?></h3>
    <p>total recieved orders</p>
    <a href="order.php" class="btn" >view orders</a>
               
</div>
<div class="box">
    <?php 
    $select_confirm_orders=$conn->prepare("SELECT * FROM `orders` WHERE status = ?");
    $select_confirm_orders->execute(['complete']);
    $num_of_confirm_orders=$select_confirm_orders->rowcount();
    ?>
    <h3><?=$num_of_confirm_orders; ?></h3>
    <p>total confirm orders </p>
    <a href="complete_order.php" class="btn" >view confirm orders</a>
               
</div>
<div class="box">
    <?php 
    $select_canceled_orders=$conn->prepare("SELECT * FROM `orders` WHERE status = ?");
    $select_canceled_orders->execute(['canceled']);
    $num_of_canceled_orders=$select_canceled_orders->rowcount();
    ?>
    <h3><?=$num_of_canceled_orders; ?></h3>
    <p>total canceled orders </p>
    <a href="cancle_order.php" class="btn" >view canceled orders</a>
               
</div>

<div class="box">
    <?php 
    $select_subscribers=$conn->prepare("SELECT * FROM `subscribers`");
    $select_subscribers->execute();
    $num_of_subscribers=$select_subscribers->rowcount();
    ?>
    <h3><?=$num_of_subscribers; ?></h3>
    <p>total subscribers </p>
    <a href="subscribers.php" class="btn" >view subscribers</a>
               
</div>

<div class="box">
    <?php 
    $select_subscribers=$conn->prepare("SELECT * FROM `organization`");
    $select_subscribers->execute();
    $num_of_subscribers=$select_subscribers->rowcount();
    ?>
    <h3><?=$num_of_subscribers; ?></h3>
    <p>total member of the organization </p>
    <a href="organization.php" class="btn" >view organization member</a>
               
</div>
        
 </section>
</div>

<script src ="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">

    </script>
<script type ="text.javascript" src="./script.js"></script>

<?php include '../components/alert.php';?>












    
</body>
</html>