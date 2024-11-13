<?php
    
    if(isset($_POST['sub-btn'])){
        $email = $_POST['subemail'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        
        $select_subscribers = $conn->prepare( "SELECT * FROM `subscribers` WHERE user_id = ?");
        $select_subscribers->execute([$user_id]);
        
        if($select_subscribers->rowCount() > 0){
           $warning_msg[] = 'You Are Already Subscribed!';
        }else{
        
            $insert_subscribers = $conn->prepare( "INSERT INTO `subscribers`(user_id,email) VALUES(?,?)");
            $insert_subscribers->execute([$user_id, $email]);
            $success_msg[] = 'Thank You For Subscribing!';
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="top-footer">
        <h2><i class="bx bx-envelope"></i>Sign Up For Newslatter</h2>
        <form action="" method="post">
        <div class="input-field">
        <input type="email" name="subemail" maxlength="50" required placeholder="enter your email" oninput="this.value.replace(/\s/g,'')">
            <button type="submit" value="sub-btn" name="sub-btn" class="btn">Subscribe</button>
        </div>
        </form>
    </div>
    <footer>
        <div class="overlay"></div>
        <div class="footer-content">
            <div class="img-box">
                <img src="./img/footer_logo.png"></img>
            </div>
            <div class="inner-footer">
                <div class="card">
                    <h3>About Us</h3>
                    <ul>
                        <li>About Us</li>
                        <li>Our Difference</li>
                        <li>Community Matters</li>
                        <li>Press</li>
                        <li>Blog</li>
                        <li>Bouqs Video</li>
                    </ul>
                </div>
                <div class="card">
                    <h3>Services</h3>
                    <ul>
                        <li>Order</li>
                        <li>Help Center</li>
                        <li>Shipping</li>
                        <li>Term Of Use</li>
                        <li>Account Detail</li>
                        <li>My Account</li>
                    </ul>
                </div>
                <div class="card">
                    <h3>Local</h3>
                    <ul>
                        <li>Vadodara</li>
                        <li>Rajkot</li>
                        <li>Surat</li>
                        <li>Ahmedabad</li>
                        <li>Gandhinagar</li>
                        <li>Jamnagar</li>
                    </ul>
                </div>
                <div class="card">
                    <h3>Newsletter</h3>
                    <p>Sign Up For Newsletter</p>
                    <div class="social-links">
                        <i class="bx bxl-instagram"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-behance"></i>
                        <i class="bx bxl-youtube"></i>
                        <i class="bx bxl-whatsapp"></i>
                    </div>
                </div>
            </div>
            <div class="bottom-footer">
                <p>All Right Reserved - Green Coffee</p>
            </div>
        </div>
    </footer>
    
</body>
</html>