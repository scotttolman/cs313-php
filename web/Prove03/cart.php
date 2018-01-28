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
<link rel="stylesheet" href="cart.css">
<script src="cart.js"></script>
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

    <script>
        // TMs
        var MD = <?php echo "$MD"; ?>, 
        FB = <?php echo "$FB"; ?>, 
        WG = <?php echo "$WG"; ?>, 
        TB = <?php echo "$TB"; ?>,
        // Balls
        PB = <?php echo "$PB"; ?>, 
        GB = <?php echo "$GB"; ?>, 
        UB = <?php echo "$UB"; ?>, 
        MB = <?php echo "$MB"; ?>;
        console.log(MD);
        console.log(FB);
        console.log(WG);
        console.log(TB);
        console.log(PB);
        console.log(GB);
        console.log(UB);
        console.log(MB);
    </script>
    

    <div id="banner" class="grid-container5" onmouseover="colorChange()">
        <div>
            <img src="pikachu.png" alt="Pokeball">
        </div>
        <div>
            <img src="charmander.png" alt="Pokeball">
        </div>
        <div id="title">
            <a href="index.php" id="Title">Poké Cart</a>
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
            <input type='number' value=$MD id='MD' onkeyup='this.value = MinMax(this.value, 0, 99)' onclick='this.select()'>
            <button onclick='addItem(\"MD\")'>Update quantity</button>
            <h4>2000</h4>
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
            <input type='number' value=$FB id='FB' onkeyup='this.value = MinMax(this.value, 0, 99)' onclick='this.select()'>
            <button onclick='addItem('FB')'>Update quantity</button>
            <h4>2000</h4>
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
            <input type='number' value=$WG id='WG' onkeyup='this.value = MinMax(this.value, 0, 99)' onclick='this.select()'>
            <button onclick='addItem('WG')'>Update quantity</button>
            <h4>2000</h4>
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
            <input type='number' value=$TB id='TB' onkeyup='this.value = MinMax(this.value, 0, 99)' onclick='this.select()'>
            <button onclick='addItem('TB')'>Update quantity</button>
            <h4>2000</h4>
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
            $PBT = $PB * 200;
            echo "
            <div id='ball1'>
            <h3>Poké Ball</h3>
            <p>A device for catching wild Pokémon. It is thrown like a ball at the target. It is designed as a capsule system</p>
            <img src='pokeball.png' alt='Poké Ball'>
            <input type='number' value=$PB id='PB' onkeyup='this.value = MinMax(this.value, 0, 99)' onclick='this.select()'>
            <button onclick='addItem('PB')'>Update quantity</button>
            <h4>200</h4>
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
        $GBT = $GB * 1000;
        echo "
        <div id='ball2'>
            <h3>Great Ball</h3>
            <p>A good, high-performance Ball that provides a higher Pokémon catch rate than a standard Poké Ball</p>
            <img src='great.png' alt='Great Ball'>
            <input type='number' value=$GB id='GB' onkeyup='this.value = MinMax(this.value, 0, 99)' onclick='this.select()'>
            <button onclick='addItem('GB')'>Update quantity</button>
            <h4>1,000</h4>
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
        $UBT = $UB * 5000;
        echo "
        <div id='ball3'>
            <h3>Ultra Ball</h3>
            <p>An ultra-performance Ball that provides a higher Pokémon catch rate than a Great Ball</p>
            <br>
            <img src='ultra.png' alt='Ultra Ball'>
            <input type='number' value=$UB id='UB' onkeyup='this.value = MinMax(this.value, 0, 99)' onclick='this.select()'>
            <button onclick='addItem('UB')'>Update quantity</button>
            <h4>5,000</h4>
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
        $MBT = $MB * 20000;
        echo "
        <div id='ball4'>
            <h3>Master Ball</h3>
            <p>The best Ball with the ultimate level of performance. It will catch any wild Pokémon without fail</p>
            <img src='master.png' alt='Master Ball'>
            <input type='number' value=$MB id='MB' onkeyup='this.value = MinMax(this.value, 0, 1)' onclick='this.select()'>
            <button onclick='addItem('MB')'>Update quantity</button>
            <h4>20,000</h4>
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
            <form action="index.php" method="POST" id="hiddenCartCancel">
                    <input type="hidden" name="_MD" id="_MD">
                    <input type="hidden" name="_FB" id="_FB">
                    <input type="hidden" name="_WG" id="_WG">
                    <input type="hidden" name="_TB" id="_TB">
                    <input type="hidden" name="_PB" id="_PB">
                    <input type="hidden" name="_GB" id="_GB">
                    <input type="hidden" name="_UB" id="_UB">
                    <input type="hidden" name="_MB" id="_MB">
                    <button onclick ="sendValues()">Keep Shopping</button>
            </form>
            <form action="checkout.php" method="POST" id="hiddenCartConfirm">
                    <input type="hidden" name="_MD" id="_MD">
                    <input type="hidden" name="_FB" id="_FB">
                    <input type="hidden" name="_WG" id="_WG">
                    <input type="hidden" name="_TB" id="_TB">
                    <input type="hidden" name="_PB" id="_PB">
                    <input type="hidden" name="_GB" id="_GB">
                    <input type="hidden" name="_UB" id="_UB">
                    <input type="hidden" name="_MB" id="_MB">
                    <button onclick ="sendValues()">Checkout</button>
            </form>      
            <form action="cart.php" method="POST" id="hiddenCartUpdate">
                    <input type="hidden" name="_MD" id="_MD">
                    <input type="hidden" name="_FB" id="_FB">
                    <input type="hidden" name="_WG" id="_WG">
                    <input type="hidden" name="_TB" id="_TB">
                    <input type="hidden" name="_PB" id="_PB">
                    <input type="hidden" name="_GB" id="_GB">
                    <input type="hidden" name="_UB" id="_UB">
                    <input type="hidden" name="_MB" id="_MB">
            </form>        
        </div>       
    </div>
</body>
</html>