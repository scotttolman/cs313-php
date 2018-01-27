<?php
session_start(); //must be first thing on page
//$_SESSION['name'] = 'Alex'; -- an example of session access
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pokémon Store</title>
<link rel="stylesheet" href="pokestore.css">
<script src="pokestore.js"></script>
</head>
<body onload="showTMs()">
    <div id="banner" class="grid-container5" onmouseover="colorChange()">
        <div>
            <img src="pikachu.png" alt="Pokeball">
        </div>
        <div>
            <img src="charmander.png" alt="Pokeball">
        </div>
        <div id="title">
            <a href="index.php" id="Title">Pokémon Store</a>
        </div>
        <div>
                <img src="bulbasaur.png" alt="Pokeball">
            </div>
            <div>
                <img src="squirtle.png" alt="Pokeball">
            </div>
    </div>
    <div id="menu" class="grid-container">
        <div id="TMs" onmouseover="showTMs()">
            TMs <img src="TMs.jpg" alt="TMs" id="TMpic">
        </div>
        <div id="balls" onmouseover="showBalls()">
            Poké Balls <img src="Pokeball.png" alt="Pokeball" id="pbpic">
        </div>
        <div id="cart" onclick ="sendValues()">
            Cart <img src="backpack.png" alt="backpack" id="backpackpic">
        </div>
    </div>
    <div id="TMCatalog" class="grid-container4">
        <div id="TM1">
            <h3>Mega Drain</h3>
            <p>Mega Drain deals damage and the user will recover 50% of the HP drained</p>
            <img src="MD.png" alt="Mega Drain">
            <input type="text" value="0" id="MD" onkeyup="this.value = MinMax(this.value, 0, 99)" onclick="this.select()">
            <button onclick="addItem('MD')">Add to cart</button>
            <h4>¥ 2000</h4>
        </div>
        <div id="TM2">
            <h3>Fire Blast</h3>
            <p>Fire Blast deals damage and has a 10% chance of burning the target</p>
            <img src="FB.png" alt="Fire Blast">
            <input type="text" value="0" id="FB" onkeyup="this.value = MinMax(this.value, 0, 99)" onclick="this.select()">
            <button onclick="addItem('FB')">Add to cart</button>
            <h4>¥ 2000</h4>
        </div>
        <div id="TM3">
            <h3>Water Gun</h3>
            <p>Water Gun deals damage with no additional effect</p>
            <img src="WG.png" alt="Water Gun">
            <input type="text" value="0" id="WG" onkeyup="this.value = MinMax(this.value, 0, 99)" onclick="this.select()">
            <button onclick="addItem('WG')">Add to cart</button>
            <h4>¥ 2000</h4>
        </div>
        <div id="TM4">
            <h3>Thunderbolt</h3>
            <p>Thunderbolt deals damage and has a 10% chance of paralyzing the target</p>
            <img src="TB.png" alt="Thunderbolt">
            <input type="text" value="0" id="TB" onkeyup="this.value = MinMax(this.value, 0, 99)" onclick="this.select()">
            <button onclick="addItem('TB')">Add to cart</button>
            <h4>¥ 2000</h4>
        </div>
    </div>
    <div id="BallCatalog" class="grid-container4">
        <div id="ball1">
            <h3>Poké Ball</h3>
            <p>A device for ballching wild Pokémon. It is thrown like a ball at the target. It is designed as a capsule system</p>
            <img src="pokeball.png" alt="Poké Ball">
            <input type="text" value="0" id="PB" onkeyup="this.value = MinMax(this.value, 0, 99)" onclick="this.select()">
            <button onclick="addItem('PB')">Add to cart</button>
            <h4>¥ 200</h4>
        </div>
        <div id="ball2">
            <h3>Great Ball</h3>
            <p>A good, high-performance Ball that provides a higher Pokémon catch rate than a standard Poké Ball</p>
            <img src="great.png" alt="Great Ball">
            <input type="text" value="0" id="GB" onkeyup="this.value = MinMax(this.value, 0, 99)" onclick="this.select()">
            <button onclick="addItem('GB')">Add to cart</button>
            <h4>¥ 1,000</h4>
        </div>
        <div id="ball3">
            <h3>Ultra Ball</h3>
            <p>An ultra-performance Ball that provides a higher Pokémon catch rate than a Great Ball</p>
            <br>
            <img src="ultra.png" alt="Ultra Ball">
            <input type="text" value="0" id="UB" onkeyup="this.value = MinMax(this.value, 0, 99)" onclick="this.select()">
            <button onclick="addItem('UB')">Add to cart</button>
            <h4>¥ 5,000</h4>
        </div>
        <div id="ball4">
            <h3>Master Ball</h3>
            <p>The best Ball with the ultimate level of performance. It will catch any wild Pokémon without fail</p>
            <img src="master.png" alt="Master Ball">
            <input type="text" value="0" id="MB" onkeyup="this.value = MinMax(this.value, 0, 1)" onclick="this.select()">
            <button onclick="addItem('MB')">Add to cart</button>
            <h4>¥ 20,000</h4>
        </div>
        <form action="cart.php" method="POST" id="hiddenCart">
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
</body>
</html>