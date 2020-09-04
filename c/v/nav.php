<?php 


 $Pack = $_SESSION['package'];
 $CDate = Date("Y-m-d");
 
 
  if( $Pack == $CDate ){
 
 echo "Expired Today,"; 
                    
 } else if( $Pack < $CDate ){
 
 
 $alert="Dear Client,Your Monthly Package Is Already Expired,Please Renew It To Keep Your Account Active";  
                   
 } else if( $Pack > $CDate ){
 
 
 $alert="Dear Client Your Package Is Valid For One Month";
                     
 }else if( $Pack <= $CDate ){
 
 
 $alert="Your Package Is Expiring Please Renew It Soon";                    
 }                        
                    
 ?>
 



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HealCura</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>

        <style>
            html, body {
                border: 0;
                padding: 0;
                margin: 0;
                height: 100%;
            }
            body {
                background: white;
                font-size: 16px;
                background-color: #ffffff; 
                font-family: Arial;
                font-size: 18px;
                padding: 0px;
            }
            .container {
                align-items: center;
               
                background-color: #ffffff;
                padding: 10px 10px 10px 10px;
                border-radius: 0px;
            }
            .row {
                display: -ms-flexbox; /* IE10 */
                display: flex;
                -ms-flex-wrap: wrap; /* IE10 */
                flex-wrap: wrap;
                margin: 0 -16px;
            }
            .col-25 {
                -ms-flex: 25%; /* IE10 */
                flex: 25%;
            }
            .col-10 {
                -ms-flex: 15%; /* IE10 */
                flex: 15%;
            }
            .col-50 {
                -ms-flex: 50%; /* IE10 */
                flex: 50%;
            }
            .col-75 {
                -ms-flex: 75%; /* IE10 */
                flex: 75%;
            }
            .col-25,
            .col-50,
            .col-75 {
                padding: 0 16px;
            }
            .table-responsive {
                border-collapse: collapse;
                border-spacing: 0;
                width: 80%;
                box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.2);
                font-family: lato;
                position: relative;
                color: #333;
                border-radius: 10px;
            }
            .w3-bar{
                 box-shadow: 0px 0px 18px rgba(0, 0, 0, 0.2);
                 border-radius: 4px;
            }
            .w3-sidebar{
                 box-shadow: 0px 0px 18px rgba(0, 0, 0, 0.2);
                 border-radius: 10px;
                 border: 3px;  
            }
            .w3-red{
                
               color: #ff3333;
            }
            .table-responsive{
                -sm|-md|-lg|-xl
            }

            th, td {
                text-align: left;
                padding: 10px;
            }
            th:first-child, td:first-child {
                text-align: center;
            }
            tr:nth-child(even) {
                background-color:#ffffff
            }
            input[type=text] {
                width: 30%;
                margin-bottom: 20px;
                padding: 12px;
                border: 3px;
                border-radius: 1px;
                background: white;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
                font-family: lato;
                position: relative;
                color: #333;
                border-radius: 7px;
            }
            input[type=text-half] {
                width: 25%;
                margin-bottom: 20px;
                padding: 10px;
                border: 3px;
                border-radius: 1px;
                background: white;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
                font-family: lato;
                position: relative;
                color: #333;
                border-radius: 7px;
            }
             .sel {
                width: 20%;
                margin-bottom: 20px;
                padding: 10px;
                border: 3px;
                border-radius: 1px;
                background: white;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
                font-family: lato;
                position: relative;
                color: #333;
                border-radius: 7px;
            }
            .btn {
                background-color: red;
                width: 20%;
                padding: 12px;
                height: 50px;
                font-family: 'Roboto', sans-serif;
                font-size: 24pxpx;
                text-transform: uppercase;
                letter-spacing: 2.5px;
                font-weight: 500;
                color: #fff;
                border: 3px;
                border-radius: 10px;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
                transition: all 0.3s ease 0s;
                cursor: pointer;
                outline: none;
            }


            .wrap {
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .btn:hover {
                background-color: red;
                box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
                color: #fff;
                transform: translateY(0px);
            }
            .alert{
                
               font-weight: 100;
                color: red;
                letter-spacing: 2.5px;
                padding: 12px;
                border-radius: 10px;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
                width: 60%;
                padding: 5px 15px;
                margin-top: 30px;
                margin-bottom: 30px;
            
            }
            h1,h2,h3,h4,h5,h6,h7,h8{

                font-weight: 100;
                letter-spacing: 2.5px;
                padding: 12px;
                border-radius: 10px;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
                width: 60%;
                padding: 5px 15px;
                margin-top: 30px;
                margin-bottom: 30px;
            }
            label {
                margin-bottom: 10px;
                display: block;
            }
            a {
                color: #2196F3;
            }
            hr {
                border: 1px solid lightgrey;
            }
            span {
                float: right;
                color: black;
            }

            @media screen and (max-width: 900px) and (min-width: 600px), (max-width: 1100px),(min-width: 1500px),(min-width: 1900px),(min-width: 2000px),(min-width: 2800px),(min-width: 2700px) {
                .table-responsive {
                    border-collapse: collapse;
                    border-spacing: 0;
                    width: 100%;
                    box-shadow: 0px 0px 18px rgba(0, 0, 0, 0.2);
                    font-family: lato;
                    position: relative;
                    color: #333;
                    border-radius: 10px;
                }
                .table-responsive{
                    -sm|-md|-lg|-xl
                }

                th, td {
                    text-align: left;
                    padding: 10px;
                }
                th:first-child, td:first-child {
                    text-align: center;
                }
                tr:nth-child(even) {
                    background-color:#ffffff
                }
                input[type=text-half] {
                width: 50%;
                margin-bottom: 20px;
                padding: 10px;
                border: 3px;
                border-radius: 1px;
                background: white;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
                font-family: lato;
                position: relative;
                color: #333;
                border-radius: 7px;
            }
             .sel {
                width: 20%;
                margin-bottom: 20px;
                padding: 10px;
                border: 3px;
                border-radius: 1px;
                background: white;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
                font-family: lato;
                position: relative;
                color: #333;
                border-radius: 7px;
            }
                input[type=text] {
                    width: 100%;
                    margin-bottom: 20px;
                    padding: 12px;
                    border: 3px;
                    border-radius: 1px;
                    background: white;
                    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
                    font-family: lato;
                    position: relative;
                    color: #333;
                    border-radius: 7px;
                }
                .btn {
                    background-color: red;
                    width: 100%;
                    padding: 12px;
                    height: 50px;
                    font-family: 'Roboto', sans-serif;
                    font-size: 24pxpx;
                    text-transform: uppercase;
                    letter-spacing: 2.5px;
                    font-weight: 500;
                    color: #fff;
                    border: 3px;
                    border-radius: 10px;
                    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
                    transition: all 0.3s ease 0s;
                    cursor: pointer;
                    outline: none;
                }
                .title{

                    font-weight: 100;
                    letter-spacing: 2.5px;
                    padding: 12px;
                    border-radius: 10px;
                    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
                    width: 100%;
                    padding: 5px 15px;
                    margin-top: 30px;
                    margin-bottom: 30px;
                }

            }

        </style>

    <body>

        <!-- Top container -->
        <div class="w3-bar w3-top w3-red w3-large" style="z-index:4">
            <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
            <span class="w3-bar-item w3-right">HealCura</span>
        </div>
        <br>
        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:240px;" id="mySidebar"><br>
            <div class="w3-container w3-row">
                <div class="w3-col s4">
                    <img src="/c/images/logo2.png" class="w3-circle w3-margin-right" style="width:46px">
                </div>
                <div class="w3-col s8 w3-bar">
                    <span><?PHP  echo $_SESSION['name'];?></span><br>
                   
                    
                    <a href="http://www.irontin.com/#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>

                    <a href="/mpages/profile.php" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
                    
                    
                </div>
            </div>
            <hr>

            <div class="w3-bar-block">
                <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
                <a href="/home/home.php" class="w3-bar-item w3-button w3-padding">Home</a>
                <a href="/inventory/inventory.php" class="w3-bar-item w3-button w3-padding">Inventory</a>
                 <a href="/inventory/expiry.php" class="w3-bar-item w3-button w3-padding">Expiry</a>
                 <hr>
                <a href="/register/products.php" class="w3-bar-item w3-button w3-padding">Purchase Entry</a>
                <a href="/register/import.php" class="w3-bar-item w3-button w3-padding">Import Purchase</a>  
                <a href="/register/history.php" class="w3-bar-item w3-button w3-padding"> Purchase History</a>
                <hr>
                <a href="/sales/sales.php" class="w3-bar-item w3-button w3-padding">Sales Entry</a>
                <a href="/purchase/purchase_list.php" class="w3-bar-item w3-button w3-padding">Purchase List</a>
                <hr>
                <a href="/u/logout.php" class="w3-bar-item w3-button w3-padding">Sign Out</a>
            </div>
        </nav>


        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>



        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:320px;margin-top:43px;">
        
        
       <div class=""> 
       <?PHP
 
        //echo $alert;
 
         ?>
         </div>