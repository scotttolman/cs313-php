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