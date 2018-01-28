<?php
session_start(); 

if ($_SESSION['item']['MD'])
    $MD = $_SESSION['item']['MD'];
if ($_SESSION['item']['FB'])
    $FB = $_SESSION['item']['FB'];
if ($_SESSION['item']['WG'])
    $WG = $_SESSION['item']['WG'];
if ($_SESSION['item']['TB'])
    $TB = $_SESSION['item']['TB'];
if ($_SESSION['item']['PB'])
    $PB = $_SESSION['item']['PB'];
if ($_SESSION['item']['GB'])
    $GB = $_SESSION['item']['GB'];
if ($_SESSION['item']['UB'])
    $UB = $_SESSION['item']['UB'];
if ($_SESSION['item']['MB'])
    $MB = $_SESSION['item']['MB']; 

if ($_POST["_MD"])    
    $MD = $_POST["_MD"];
if ($_POST["_FB"])  
    $FB = $_POST["_FB"];
if ($_POST["_WG"])  
    $WG = $_POST["_WG"];
if ($_POST["_TB"])  
    $TB = $_POST["_TB"];
if ($_POST["_PB"])  
    $PB = $_POST["_PB"];
if ($_POST["_GB"])  
    $GB = $_POST["_GB"];
if ($_POST["_UB"])  
    $UB = $_POST["_UB"];
if ($_POST["_MB"])  
    $MB = $_POST["_MB"];   

if ($MD)
    $_SESSION['item']['MD'] = $MD;
if ($FB)
    $_SESSION['item']['FB'] = $FB;
if ($WG)
    $_SESSION['item']['WG'] = $WG;
if ($TB)
    $_SESSION['item']['TB'] = $TB;
if ($PB)
    $_SESSION['item']['PB'] = $PB;
if ($GB)
    $_SESSION['item']['GB'] = $GB;
if ($UB)
    $_SESSION['item']['UB'] = $UB;
if ($MB)
    $_SESSION['item']['MB'] = $MB;

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pokémon Store</title>
<link rel="stylesheet" href="checkout.css">
<script src="checkout.js"></script>
</head>
<body>
        
    <?php
    echo "MD = $MD";
    echo " FB = $FB";
    echo " WG = $WG";
    echo " TB = $TB";
    echo " PB = $PB";
    echo " GB = $GB";
    echo " UB = $UB";
    echo " MB = $MB";
    ?>

    <div id="banner" class="grid-container5" onmouseover="colorChange()">
        <div>
            <img src="pikachu.png" alt="Pokeball">
        </div>
        <div>
            <img src="charmander.png" alt="Pokeball">
        </div>
        <div id="title">
            <a href="index.php" id="Title">Poké Checkout</a>
        </div>
        <div>
                <img src="bulbasaur.png" alt="Pokeball">
            </div>
            <div>
                <img src="squirtle.png" alt="Pokeball">
            </div>
    </div>
    <div id="TMCatalog" class="grid-container2">
        <?php
        if ($MD > 0) {
        $MDT = $MD * 2000;
        echo "
        <div id='TM1'>
            <h3>Mega Drain</h3>
            <p>Mega Drain deals damage and the user will recover 50% of the HP drained</p>
            <img src='MD.png' alt='Mega Drain'>            
        </div>
        <div id='TM1Cart'>
            <h2>Quantity</h2>
            <p>$MD</p>
            <br>
            <br>
            <h2>Price</h2>
            <p>$MDT</p>
            ";}
        ?>
        </div>

        <?php
        if ($FB > 0) {
        $FBT = $FB * 2000;
        echo "
        <div id='TM2'>
            <h3>Fire Blast</h3>
            <p>Fire Blast deals damage and has a 10% chance of burning the target</p>
            <img src='FB.png' alt='Fire Blast'>           
        </div>
        <div id='TM2Cart'>
            <h2>Quantity</h2>
            <p>$FB</p>
            <br>
            <br>
            <h2>Price</h2>
            <p>$FBT</p>
            ";}
        ?>
        </div>

        <?php
        if ($TB > 0) {
        $WGT = $WG * 2000;
        echo "
        <div id='TM3'>
            <h3>Water Gun</h3>
            <p>Water Gun deals damage with no additional effect</p>
            <img src='WG.png' alt='Water Gun'>           
        </div>
        <div id='TM3Cart'>
            <h2>Quantity</h2>
            <p>$WG</p>
            <br>
            <br>
            <h2>Price</h2>
            <p>$WGT</p>
            ";}
        ?>
        </div>

        <?php
        if ($TB > 0) {
        $TBT = $TB * 2000;
        echo "
        <div id='TM4'>
            <h3>Thunderbolt</h3>
            <p>Thunderbolt deals damage and has a 10% chance of paralyzing the target</p>
            <img src='TB.png' alt='Thunderbolt'>           
        </div>
        <div id='TM4Cart'>
            <h2>Quantity</h2>
            <p>$TB</p>
            <br>
            <br>
            <h2>Price</h2>
            <p>$TBT</p>
            ";}
        ?>
        </div>                
    </div>
    <div id="BallCatalog" class="grid-container2">

            <?php
            if ($PB > 0) {
            $PBT = $PB * 2000;
            echo "
            <div id='ball1'>
            <h3>Poké Ball</h3>
            <p>A device for ballching wild Pokémon. It is thrown like a ball at the target. It is designed as a capsule system</p>
            <img src='pokeball.png' alt='Poké Ball'>
        </div>
            <div id='Ball1Cart'>
                <h2>Quantity</h2>
                <p>$PB</p>
                <br>
                <br>
                <h2>Price</h2>
                <p>$PBT</p>
                ";}
            ?>
            </div>
            
        <?php
        if ($GB > 0) {
        $GBT = $GB * 2000;
        echo "
        <div id='ball2'>
            <h3>Great Ball</h3>
            <p>A good, high-performance Ball that provides a higher Pokémon catch rate than a standard Poké Ball</p>
            <img src='great.png' alt='Great Ball'>
        </div>
        <div id='Ball2Cart'>
            <h2>Quantity</h2>
            <p>$GB</p>
            <br>
            <br>
            <h2>Price</h2>
            <p>$GBT</p>
            ";}
        ?>
        </div>        
        
        <?php
        if ($UB > 0) {
        $UBT = $UB * 2000;
        echo "
        <div id='ball3'>
            <h3>Ultra Ball</h3>
            <p>An ultra-performance Ball that provides a higher Pokémon catch rate than a Great Ball</p>
            <br>
            <img src='ultra.png' alt='Ultra Ball'>
        </div>
        <div id='Ball3Cart'>
            <h2>Quantity</h2>
            <p>$UB</p>
            <br>
            <br>
            <h2>Price</h2>
            <p>$UBT</p>
            ";}
        ?>
        </div>        
        
        <?php
        if ($MB > 0) {
        $MBT = $MB * 2000;
        echo "
        <div id='ball4'>
            <h3>Master Ball</h3>
            <p>The best Ball with the ultimate level of performance. It will catch any wild Pokémon without fail</p>
            <img src='master.png' alt='Master Ball'>>
        </div>
        <div id='Ball4Cart'>
            <h2>Quantity</h2>
            <p>$MB</p>
            <br>
            <br>
            <h2>Price</h2>
            <p>$MBT</p>
            ";}
        ?>
        </div>
        <div id="Total">            
            <h1>Total</h1>
            <br>
            <?php
            $sesh = $_SESSION['item'];
            $total = $MDT + $FBT + $WGT + $TBT + $PBT + $GBT + $UBT + $MBT;
            echo "
            <h2>$total</h2>";
            ?>            
        </div>
        <div class="grid-container5-5">
            <form action="index.php">
                <input type="submit" class="submit" value="Back to store">
            </form>
            <form action="confirmation.php">
                <input type="submit" class="submit" value="Place Order">
            </form>
        </div>
        
    </div>
</body>
</html>

