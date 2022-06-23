<?php require_once "admin/includes/db.php" ?>
<?php require_once "admin/includes/function.php" ?>
<?php session_start() ?>
<?php ob_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bacungan River Cruise</title>
        <link rel = "icon" href="images/logo.png" type = "image/x-icon">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <!-- <div class="input-group date date-icon-container" id="datepicker">
            <div class="input-group-append bg-primary">
                <span class="input-group-text date-picker-icon bg-primary" id="">
                    <i class="fas fa-calendar-check"></i>
                </span>
            </div>
        </div>

         -->
         
         

         <div class="date-picker-icon">
             <a href="" class="btn btn-primary date-picker-btn" title="View calendar reservation">
                <i class="fas fa-calendar-check fa-lg"></i>
             </a>   
             <!-- <button class="btn btn-primary date-picker-btn">
                 
             </button> -->
         </div>


         <div class="date-picker-container">
    
            

             <div id="datepicker" class="bg-white">
                 
                <h5>Calendar reservation</h5>
             </div>
             
         </div>
         