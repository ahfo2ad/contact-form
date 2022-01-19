<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $user  = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $mail  = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST["phonecell"], FILTER_SANITIZE_NUMBER_INT);
        $msg   = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

        $userError = "";
        $msgError = "";

        // if(strlen($user) <= 3) {

        //     $userError = "username must be more than 3 char";
        // }
        // if(strlen($msg) <= 10 ) {

        //     $msgError = "message must be more than 10 char";
        // }

        $formErrors = array();

        if(strlen($user) <= 3) {

            $formErrors[] = "username must be more than 3 char";
        }
        if(strlen($msg) <= 10 ) {

            $formErrors[] = "message must be more than 10 char";
        }

        $headers = "From:" . $mail . "\r\n";
        $myemail = "ahfouad12@gmail.com";
        $subj = "contact form";

        if(empty($formErrors)) {

            mail($myemail, $subj, $msg, $headers);

            $user = "";
            $mail = "";
            $phone = "";
            $msg = "";
            
            $success = '<div class="alert alert-success" role="alert">
                Your Message Sent Successfully
            </div>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;700;800;900&display=swap" rel="stylesheet">
    <title>contact form</title>
</head>
<body>

    <div class="container">
        <h1 class="text-center">contact me</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" class="cont-form">
                <?php if(!empty($formErrors)) { ?>
                    <div class="alert alert-danger alert-dismissible" role="start">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <?php
                            foreach($formErrors as $error) {

                                echo $error . "<br>";
                            }
                        ?>
                    </div>
                <?php } ?>
                <?php if(isset($success)) { echo $success;} ?>
            <div class="form-group">   
                <input class="userName form-control" 
                type="text" 
                name="username" 
                placeholder="username"
                value="<?php if(isset($user)) { echo $user; } ?>">
                <i class="fas fa-user"></i>
                <span class="astrix"> * </span>
                <div class="alert alert-danger custom-alert">
                    username must be more than 3 char
                </div>
            </div>
            <!-- <?php
                // if(isset($userError)) {

                //     echo $userError;
                // }
            ?>  -->
            <div class="form-group"> 
                <input class="email form-control" 
                type="email" 
                name="email" 
                placeholder="email"
                value="<?php if(isset($mail)) { echo $mail; } ?>">
                <i class="far fa-envelope fa-fw"></i>
                <span class="astrix"> * </span>
                <div class="alert alert-danger custom-alert">
                    enter valid mail
                </div>
            </div>
            <input class="form-control"
            type="text"
            name="phonecell" 
            placeholder="phone"
            value="<?php if(isset($phone)) { echo $phone; } ?>">
            <i class="fas fa-phone fa-fw"></i>

            <textarea name="message" 
            class="msge form-control" 
            placeholder="message"><?php if(isset($phone)) { echo $phone; } ?></textarea>
            <div class="alert alert-danger custom-alert">
                    message must be more than 10 char
            </div>

            <!-- <?php if(isset($phone)) { echo $phone; } ?></textarea> -->
            <!-- <?php
                // if(isset($msgError)) {

                //     echo $msgError;
                // }
            ?> -->
            <input class="btn btn-success" type="submit" value="send message">
            <i class="fas fa-paper-plane"></i>
        </form>
    </div>


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/form.js"></script>
    
</body>
</html>