document.getElementById("menu").addEventListener('click', function(){

});

function selects(checkbox, name){ 
    var ele = document.getElementsByName(name + '[]');  
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
}

function updateCartQuantity(id, value){
    console.log(id + " : " + value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    xhttp.open("GET", "process/cart_process.php?quantity=" + id + "&value=" + value, true);
    xhttp.send();
}

const incrementbtn = document.querySelectorAll('.incr');
const decrementbtn = document.querySelectorAll('.decr');

incrementbtn.forEach(btn => btn.addEventListener('click', event => {
    var btnClicked = event.target;
    
    var input = btnClicked.parentElement.querySelector('input');
    var id = input.dataset.productId;
    var inputvalue = input.value;

    var newValue = parseInt(inputvalue) + 1
    input.value = newValue;

    updateCartQuantity(id, newValue);
}));

decrementbtn.forEach(btn => btn.addEventListener('click', event => {
    var btnClicked = event.target;
        
    var input = btnClicked.parentElement.querySelector('input');
    var id = input.dataset.productId;
    var inputvalue = input.value;
    
    var newValue = parseInt(inputvalue) - 1
    input.value = newValue;
    
    if(newValue < 1){
        input.value = 1;
    } else {
        input.value = newValue;
        updateCartQuantity(id, newValue);
    }
}));