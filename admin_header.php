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
  background-color: lightblue ;
}

li {
  float: left;
  margin-left:50px;
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
    input[type=text], input[type=number],select,input[type=email],input[type=password],input[type=tel] {
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
      background-color: MistyRose;
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
      body {
   background-color:white;
  background-repeat: no-repeat;
   background-size: cover;
   background-attachment:fixed;
}
a{
    text-decoration: none;
}
        </style>
         
    </head>
   

    <body style="background-color:white;" >
        
        <h1 class="text text-center text-capitalize text-primary" style="font-size:40px;margin-top:30px;color:black;">Recommendation Based Online Grocery Shopping Store</h1>
       
         <div style="margin-top:60px;">
        <ul>
            <li><a class="active" href="adminwelcome.php" >Home</a></li>
            <li><a  href="manage_product.php"style="color: Black">Manage Products</a></li>
          <li><a  href="manage_sales.php"style="color: Black">Manage Sales</a></li>
          <li><a  href="manage_shipment.php"style="color: Black">Manage Shipment</a></li>
          <li><a  href="manage_payment.php"style="color: Black">Manage Payment</a></li>
          <li><a  href="manage_offers.php"style="color: Black">Manage Products Offers</a></li>
          <li><a  href="manage_return_exchange.php"style="color: Black">Manage Return and Exchange</a></li>
          <li><a  href="manage_gifts.php"style="color: Black">Manage Gifts</a></li>
        </ul>
        </div>
