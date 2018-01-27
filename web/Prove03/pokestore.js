// TMs
var MD = 0, FB = 0, WG = 0, TB = 0;
// Balls
var PB = 0, GB = 0, UB = 0, MB = 0;


function colorChange() {
    switch(document.getElementById("banner").style.backgroundColor){
        case "yellow":
            document.getElementById("banner").style.backgroundColor = "red";
            break;
        case "red":
            document.getElementById("banner").style.backgroundColor = "green";
            break;
        case "green":
            document.getElementById("banner").style.backgroundColor = "blue";
            break;
        case "blue":
            document.getElementById("banner").style.backgroundColor = "yellow";
            break;
        default:
            document.getElementById("banner").style.backgroundColor = "yellow";
    }
}

function showTMs() {
    document.getElementById("TMCatalog").style.display = "grid";
    document.getElementById("BallCatalog").style.display = "none";
}

function showBalls() {
    document.getElementById("TMCatalog").style.display = "none";
    document.getElementById("BallCatalog").style.display = "grid";
}

function MinMax(val, min, max) {
    if (val > max) {
        return max;
    }
    else if (val < min) {
        return min;
    }
    else {
        return val;
    }
}

function addItem(id) {
    var qt = document.getElementById(id).value;
    switch (id) {
        case "MD":
            MD = qt;
            break;
        case "FB":
            FB = qt;
            break;
        case "WG":
            WG = qt;
            break;
        case "TB":
            TB = qt;
            break;
        case "PB":
            PB = qt;
            break;
        case "GB":
            GB = qt;
            break;
        case "UB":
            UB = qt;
            break;
        case "MB":
            MB = qt;
            break;
    }
}

function sendValues() {
    document.getElementById("_MD").value = MD;
    document.getElementById("_FB").value = FB;
    document.getElementById("_WG").value = WG;
    document.getElementById("_TB").value = TB;
    document.getElementById("_PB").value = PB;
    document.getElementById("_GB").value = GB;
    document.getElementById("_UB").value = UB;
    document.getElementById("_MB").value = MB;
    document.forms['hiddenCart'].submit();        
}