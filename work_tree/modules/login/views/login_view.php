<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Page d'authentification ong ivoire ménage">
    

    <!-- Title -->
    <title>Page d'authentification administration prixkdo</title>

    <!-- Favicon -->
    <link href="<?php echo base_url(); ?>assets/administration/img/brand/favicon.png" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

    <!-- Icons -->
    <link href="<?php echo base_url(); ?>assets/administration/css/icons.css" rel="stylesheet">

    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/administration/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Ansta CSS -->
    <link href="<?php echo base_url(); ?>assets/administration/css/dashboard.css" rel="stylesheet" type="text/css">

    <!-- Single-page CSS -->
    <link href="<?php echo base_url(); ?>assets/administration/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">

</head>

<body class="bg-gradient-primary">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-5">
 
              <?php echo form_open('login'); ?>

                <form class="login100-form validate-form">
                    <span class="login100-form-title">
                        Administration
                    </span>

                    
            <?php 
                if(isset($mot_de_passe_erronee)){

                    if($mot_de_passe_erronee="erreur"){ ?>
                    <center>
                        <h5><b> <font color="red">login ou mot de passe incorrect</font> </b></h5>
                    </center>

                    <?php }

                 } 
            ?>
            

           
            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="login" placeholder="Email">
                        <?php echo form_error('login','<font color="red">','</font>'); ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Mot de passe">
                        <?php echo form_error('pass','<font color="red">','</font>'); ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">

                        <input type="submit" value="Se connecter" class="login100-form-btn btn-primary">
                      
                    </div>
           

                    

                   
                </form>
                 <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <!-- Ansta Scripts -->
    <!-- Core -->
    <script src="<?php echo base_url(); ?>assets/administration/plugins/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/administration/js/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/administration/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>


</html>