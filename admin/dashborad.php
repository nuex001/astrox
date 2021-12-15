<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User DashBoard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="/assests/fa/css/font-awesome.css">
    <link rel="stylesheet" href="assets\fa\css\font-awesome.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="menu">
                <li class="fa fa-bars" id="bars"></li>
                <a href="#"><img src="assets/img/logo_01.png" alt=""></a>
            </div>
          <div class="user-info">
              <div class="name">Wellcome Admin</div>
              <div class="notification">
                 <span></span>  
                <li class="fa fa-bell"  id="notification-btn"></li>
                <div class="nofification-cont">
                    <h1>NOTIFICATION</h1>
                    <a href="#" class="box">
                        <img src="/assests/images/sidekix-media-KiUg-4xmTwo-unsplash.jpg" alt="">
                        <div class="text">
                            <h2>New Creation Has Created
                                <date>10/20th/20</date>
                            </h2>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </a>
                </div>
            </div>
            <?php include_once "includes\dp.php" ?>
            
            </div>

        </div>
        <div class="body-cont">
        <?php include_once "includes\side-bar.php" ?>
        <div class="body">
            <h1>payment address</h1>
           
            <div class="child">'
            <!-- 1' -->
            <div class="box">
                <h3>Bitcion</h3>
                <input style="opacity:0; width:0px;Height:0px" readonly type="text" value="neuekeekekke1"  id="addreess">
              <button data-index="1">copy</button>
            </div>
                <!-- 2' -->
            <div class="box">
                <h3>litcum</h3>
                <input style="opacity:0; width:0px;Height:0px" readonly type="text" value="neuekeekekke2"  id="addreess">
              <button data-index="2">copy</button>
            </div>
                <!-- 3' -->
            <div class="box">
                <h3>minecoin</h3>
                <input style="opacity:0; width:0px;Height:0px" readonly type="text" value="neuekeekekke3"  id="addreess">
              <button data-index="3">copy</button>
            </div>
                <!-- 4' -->
            <div class="box">
                <h3>paypal</h3>
                <input style="opacity:0; width:0px;Height:0px" readonly type="text" value="neuekeekekke4"  id="addreess">
              <button data-index="4">copy</button>
            </div>
            </div>
            <h1>payment</h1>
            <form action="">
                <select name="" id="">
                    <option value="currency">currency</option>
                    <option value="Bitcion">Bitcoin</option>
                    <option value="Bitcion">Bitcoin</option>
                    <option value="Bitcion">Bitcoin</option>
                </select>
                <input type="text" placeholder="Ammount">
                <input type="file" accept="\*images">
                <input type="submit" value="submit">
            </form>
        </div>
        </div>
    </div>
</body>
 <script src="dashboard.js"></script>
</html>