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
            document.getElementById("_MD").value = MD;
            break;
        case "FB":
            FB = qt;
            document.getElementById("_FB").value = FB;
            break;
        case "WG":
            WG = qt;
            document.getElementById("_WG").value = WG;
            break;
        case "TB":
            TB = qt;
            document.getElementById("_TB").value = TB;
            break;
        case "PB":
            PB = qt;
            document.getElementById("_PB").value = PB;
            break;
        case "GB":
            GB = qt;
            document.getElementById("_GB").value = GB;
            break;
        case "UB":
            UB = qt;
            document.getElementById("_UB").value = UB;
            break;
        case "MB":
            MB = qt;
            document.getElementById("_MB").value = MB; 
            break;
    }
    document.forms['hiddenCartUpdate'].submit();
}