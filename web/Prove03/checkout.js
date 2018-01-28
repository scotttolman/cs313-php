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