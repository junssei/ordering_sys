function selects(checkbox, name){ 
    var ele=document.getElementsByName(name + '[]');  
    if(checkbox.checked == true){
        for(var i=0; i<ele.length; i++){  
            if(ele[i].type=='checkbox')  
                ele[i].checked=true;  
        }
    } else {
        for(var i=0; i<ele.length; i++){  
            if(ele[i].type=='checkbox')  
                ele[i].checked=false;
        }
    }
}

function select_product(checkbox, price){
    
}

function addtoCart(type, pid, vid, user){
    if(user === 0){
        window.location.href = "login.php?auth=login";
    } else {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("cart_count").innerHTML = this.responseText;
            displayCart(user);
        }
    };
    xhttp.open("GET", "process/cart_process.php?type="+ type +"&pid=" + pid + "&vid=" + vid + "&uid=" + user, true);
    xhttp.send();
    }
}

function displayCart(user){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("cart_items").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "include/cart_items.php?uid=" + user, true);
    xhttp.send();
}

function deleteCart(id, user){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("cart_count").innerHTML = this.responseText;
            displayCart(user);
        }
    };
    xhttp.open("GET", "process/cart_process.php?cartItem=" + id + "&uid=" + user, true);
    xhttp.send();
}

function updateCart(id){
    console.log(id);
    // var quantity = document.getElementById("quantity_" + id).value;
    // var xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
    //     if (this.readyState == 4 && this.status == 200) {
    //         document.getElementById("cart_count").innerHTML = this.responseText;
    //         displayCart(user);
    //     }
    // };
    // xhttp.open("GET", "process/cart_process.php?cartItem=" + id + "&quantity=" + quantity + "&uid=" + user, true);
    // xhttp.send();
}

var incrementbtn = document.getElementsByClassName('incr');
var decrementbtn = document.getElementsByClassName('decr');

for(let i = 0; i < incrementbtn.length; i++){
    var btn = incrementbtn[i];
    btn.addEventListener('click', function(event){
        var btnClicked = event.target;

        var input = btnClicked.parentElement.querySelector('input');
        var inputvalue = input.value;

        var newValue = parseInt(inputvalue) + 1
        input.value = newValue;
    })
}

for(let i = 0; i < decrementbtn.length; i++){
    var btn = decrementbtn[i];
    btn.addEventListener('click', function(event){
        var btnClicked = event.target;
        
        var input = btnClicked.parentElement.querySelector('input');
        var inputvalue = input.value;
        
        var newValue = parseInt(inputvalue) - 1
        input.value = newValue;
        
        if(newValue < 1){
            input.value = 1;
        } else {
            input.value = newValue;
        }
    })
}