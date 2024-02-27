<html>
    <head>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <style>
              ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: lightblue;
}

li {
  float: left;
  margin-left:30px;
}

li a {
  display: block;
  color: darkmagenta;
  text-align: center;
 
  padding: 14px 15px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color:cornflowerblue;
}

.active {
 color: Salmon;
}
    input[type=text], input[type=number],select,input[type=email],input[type=password],input[type=tel],select {
      width: 170%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type=date] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    .display {
      border-radius: 5px;
      background-color: lightcoral;
      padding: 20px;
      padding-left:50px;
      width:40%;
      margin-left:400px;
    }
       input[type=submit]{
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;        
      }
      .btn1 {width:30%;}
      .heading {text-align:center;color:royalblue;margin-top:40px;margin-left:-100px;}
      
a{
    text-decoration: none;
}
        </style>
    </head>
    <body style="background-color:white;">
        
        <h1 class="text text-center text-capitalize text-primary" style="font-size:40px;margin-top:30px;color:black;">Recommendation Based Online Grocery Shopping Store</h1>
        
         <div style="margin-top:60px;color:whitesmoke">
        <ul>
            <b><li><a class="active" href="customer_welcome.php">Home</a></li></b>
            <b><li><a  href="manage_customer_profile.php"style="color:black;">Manage Profile</a></li></b>
            <b><li><a  href="view_cart.php"style="color:black;">View Cart</a></li></b>
			<b><li><a  href="search.php"style="color:black;">Search Product</a></li></b>
             <b><li><a  href="view_purchase_request.php"style="color:black;">View Purchase Request</a></li></b>
             <b><li><a  href="view_offers.php"style="color:black;">View Offers</a></li></b>
              <b><li><a  href="manage_return_and_exchange.php"style="color:black;">Manage Return And Exchange</a></li></b>
        </ul>
        </div>
