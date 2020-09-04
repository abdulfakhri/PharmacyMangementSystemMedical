<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RGU Technology</title>
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
                background-color: #ffffff;
                padding: 10px 10px 10px 10px;
                border-radius: 0px;
                width: 100%;
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
                width: 60%;
                box-shadow: 0px 0px 18px rgba(0, 0, 0, 0.2);
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

            .topnav {
                overflow: hidden;
                background-color: red;
                width: 100%;
            }

            .topnav a {
                float: left;
                display: block;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
            }

            .topnav a:hover {
                background-color: #ddd;
                color: black;
            }

            .topnav a.active {
                background-color: black;
                color: white;
            }

            .topnav .icon {
                display: none;
            }

            @media screen and (max-width: 600px) {
                .topnav a:not(:first-child) {display: none;}
                .topnav a.icon {
                    float: right;
                    display: block;
                }
            }

            @media screen and (max-width: 600px) {
                .topnav.responsive {position: relative;}
                .topnav.responsive .icon {
                    position: absolute;
                    right: 0;
                    top: 0;
                }
                .topnav.responsive a {
                    float: none;
                    display: block;
                    text-align: left;
                }
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
                
                .h1,.h2,.h3,.h4,.h5,.h6,.h7,.h8{

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
        <div class="topnav" id="myTopnav">
            <a href="/store/store.php" class="active">Home Pharma Store</a>
            <a href="/spages/login.php">Login As Pharmacy</a>
            <a href="#contact">Contact Us</a>
            <a href="#about">About Us</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
        </script>