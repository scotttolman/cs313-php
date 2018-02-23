window.addEventListener("load", store);
var gList = {slot:[]};
var listCount = 0;

function store() {
    var mem = document.getElementsByClassName("memory");
    for (var i = 0; i < mem.length; i++) {
        mem[i].addEventListener("blur", storage);
    }
    for (var i = 0; i < mem.length; i++) {
        mem[i].addEventListener("focus", restore);
    }
}

function addToList(item) {
    var parent = document.getElementById("list");
    var elem = document.createElement("li");
    elem.id = item;
    var up = document.createElement("button");
    up.id = item + "up";
    up.innerHTML = "up";
    up.addEventListener("click", moveUp);
    var rm = document.createElement("button");
    rm.id = item + "rm";
    rm.innerHTML = "remove";
    rm.addEventListener("click", remove)
    var txt = document.createTextNode(item);
    elem.appendChild(up);
    elem.appendChild(txt);
    elem.appendChild(rm);
    parent.appendChild(elem);
}

function moveUp() {
    var parent = document.getElementById(event.target.id).parentNode;
    var BigBrother = parent.previousSibling;
    var Grandpa = parent.parentNode;
    Grandpa.insertBefore(parent, BigBrother);
}

function remove() {
    var parent = document.getElementById(event.target.id).parentNode.parentNode;
    var child = document.getElementById(event.target.id).parentNode;
    parent.removeChild(child);
}

// local storage to save form as typing to prevent losing work done typing

function storage() {
    var el = document.getElementById(event.target.id);
    localStorage.setItem(el.id, el.value);
}

function restore() {
    var mem = document.getElementById("memForm");
    for (var i = 0; i < mem.length -2; i++) {
        if (localStorage.getItem(mem[i].id) != ""){
            document.getElementById(mem[i].id).value = localStorage.getItem(mem[i].id);
        }
    }
}

function storeList() {
    gList = {slot:[]};
    var list = document.getElementById("list");
    for (var i = 1; i <= list.childElementCount; i++) {
        gList.slot.push(list.childNodes[i].childNodes[1].nodeValue);
    }
    var mem = document.getElementsByClassName("memory");
    for (var i = 0; i < mem.length; i++) {
        gList[mem[i].id] = mem[i].value;
    }
    var jList = JSON.stringify(gList);
    document.getElementById("jString").value = jList;
    localStorage.setItem('jsonString', jList);
    console.log(localStorage.getItem('jsonString'));
}
    
// Use AJAX to send data
function ajaxSend() {
    document.getElementById("alert").innerHTML = ""
    var json = document.getElementById("jString").value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax.php', true);
    xhr.onload = function() {
        document.getElementById("alert").innerHTML = "List Saved"
    }
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send("x=" + json);
}    

// Use AJAX to receive data
function ajaxGet() {
    document.getElementById("alert2").innerHTML = "Getting List"
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'ajaxGet.php', true);
    xhr.onload = function() {
        if(this.status == 200) {
            console.log(this.responseText);
            var listString = this.responseText;
            var listObj = JSON.parse(listString);
            var items = listObj.slot;
            for (i = 0; i < items.length; i++) {
                addToList(items[i]);
            }
            document.getElementById("first2").value = listObj.first;
            document.getElementById("last2").value = listObj.last;
            document.getElementById("address2").value = listObj.address;
            document.getElementById("city2").value = listObj.city;
            document.getElementById("state2").value = listObj.state;
            document.getElementById("zip2").value = listObj.zip;
            document.getElementById("instructions2").value = listObj.instructions;
            document.getElementById("alert2").innerHTML = ""
        }
    }
    xhr.send();
}