function clicker() {
    alert("Clicked");
}

function pickColor(clr) {
    document.getElementById("div1").style.backgroundColor = clr;
}

$(document).ready(function(){

    $("#divColor").change(function(){
        $("#div1").css({"background-color": "purple"});
    });

    $("#hide").click(function(){
        $("#div3").hide();
    })
 
 });