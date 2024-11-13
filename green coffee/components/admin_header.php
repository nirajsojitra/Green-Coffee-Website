<html>
    <body>

<header class ="header">
    <div class="flex">
        <a href="dashboard.php" class="logo"><img src="../img/header_logo.png"></a>
        <nav class="navbar">
            <a href="dashboard.php">dashboard</a>
            <a href="add_products.php">add product</a>
            <a href="view_product.php">view product</a>
            <a href="user_account.php">accounts</a>
</nav>
<div class="icons">
    <i class =" bx bxs-user" id="user-btn"></i> 
    <i class =" bx bx-list-plus" id="menu-btn"></i>
</div>
<div class="profile-detail">
    <?php
    $select_profile = $conn->prepare("SELECT * FROM `admin`  WHERE admin_id = ?");
    $select_profile->execute([$admin_id]);

    if($select_profile->rowcount() > 0 )  {
        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);


    ?>
        <div class="profile">
            <img src="../img/<?= $fetch_profile['profile']; ?>" class="logo-img">
            <p><?= $fetch_profile['name'];  ?></p>
    </div>
    <div class="flex-btn">
        <a href="profile.php" class="btn">profile</a>
        <a href="../components/admin_logout.php" onclick="return confirm('logout from this website');" class="btn">logout</a>
    </div>
        <?php
    }
?>
</div>
</div>
</header>
<script>
    const header = document.querySelector('header');

function fixedNavbar(){
    header.classList.toggle('scrolled', window.pageYOffset > 0)
}

fixedNavbar();
window.addEventListener('scroll',fixedNavbar);

let menu = document.querySelector('#menu-btn');

menu.addEventListener('click',function(){
    let nav = document.querySelector('.navbar');
    nav.classList.toggle('active');
})

let userBtn= document.querySelector('#user-btn');


userBtn.addEventListener('click',function(){
    let userBox = document.querySelector('.profile-detail');
    userBox.classList.toggle('active');
});
</script>
</body>
</html>