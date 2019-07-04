<?php
    include ('header.php');
?>


<div class="hero-sm">

        <header>
            <div class="nav-container">
                <div class="logo">
                    <a href="index.php"><span>ARTIFY</span></a> 
                </div>
                <div class="main-nav">
                    <nav>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="Cart/index.php">Art</a></li>
                            <li><a href="galleries.php">Galleries</a></li>
                            <li><a href="artist.php">Artist</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a href="admin/index.php">Sign In/Register</a></li>
                        </ul>
                    </nav>
                </div>
                <a href="#" class="nav-trigger ">
                        Menu
                        <span aria-hidden="true"></span>
                    </a>
    
            </div>
            


            <div class="hero-textboxsm">
                <div class="hero-heading">
                    <h1>Contact US</h1>
                </div>
                
            </div>

        </header>
    </div>


<?php

function has_header_injection($str){
    return preg_match("/[\r\n]/", $str);
}
if(isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $tele = trim($_POST['telephone']);
    $msg = $_POST['message'];

    if(has_header_injection($name) || has_header_injection($email)){
        die();
    }

    if( !$name || !$email || !$msg ){
        echo "All Fields Required";
        ?> <a href="contact.php">Go Back</a><?php
        exit;
    }
    $to = "info@thetechnolover.com";
    $subject = "Message From Contact Form";
    $message = "Name : $name\r\n";
    $message .= "Email : $email\r\n";
    $message .= "Mobile Number : $tele\r\n";
    $message .= "Message : \r\n$msg\r\n";

    $message = wordwrap($message, 72);

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
    $headers .= "From: $name <$email>\r\n";
    $headers .= "X-Priority: 1\r\n";
    $headers .= "X-MSMail-Priority: High\r\n\r\n";

    mail($to, $subject, $message, $headers);
    echo 'success'; ?>
    <?php


}else{?>
    

<div id="container">
  <h1 class="headform">&bull; Keep in Touch &bull;</h1>
  <div class="underline">
  </div>
  
  <form method="post" action="" id="contact_form">
    <div class="name">
      <label for="name"></label>
      <input type="text" placeholder="Name" name="name" id="name_input" required>
    </div>
    <div class="email">
      <label for="email"></label>
      <input type="email" placeholder="Email" name="email" id="email_input" required>
    </div>
    <div class="telephone">
      <label for="telephone"></label>
      <input type="text" placeholder="Mobile Number" name="telephone" id="telephone_input" >
    </div>
    
    <div class="message">
      <label for="message"></label>
      <textarea name="message" placeholder="I'd like to chat about" id="message_input" cols="30" rows="5" required></textarea>
    </div>
    <div class="submit">
      <input type="submit" name="submit" value="Send Message" id="form_button" />
    </div>
  </form><!-- // End form -->
</div><!-- // End #container -->
<?php
}
    include ('footer.php');
?>