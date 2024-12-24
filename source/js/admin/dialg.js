// Show Add Dialog
function showModal(){
    document.getElementById("dialog").showModal();
}

// Close Dialog
var closedialog = document.getElementsByClassName("close_dialog");
for(var j = 0; j < closedialog.length; j++){
    closedialog[j].addEventListener('click', function(){
        document.getElementById("dialog").close();
        window.location.href = "product.php";
        // location.reload();
    });
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    var dialogs = document.getElementsByClassName("dialog");
    for(let i = 0; i < dialogs.length; i++){
        if (event.target == dialogs[i]) {
            dialogs[i].close();
            window.location.href = "product.php";
        }
    }
}

// Edit Product
function addModal(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const dialog = document.querySelector("#edit_dialog");
            dialog.innerHTML = this.responseText;
            // console.log("ID: " + id);
            dialog.showModal();

            const closeBtn = dialog.querySelector(".close_editprd_dialog");
            if (closeBtn) {
                closeBtn.addEventListener("click", () => {
                    dialog.close();
                });
            }
        }
    };
    xhttp.open("GET", "includes/add_dialog.php", true);
    xhttp.send();
}

// Edit Product
function editModal(id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const dialog = document.querySelector("#edit_dialog");
            dialog.innerHTML = this.responseText;
            // console.log("ID: " + id);
            dialog.showModal();

            const closeBtn = dialog.querySelector(".close_editprd_dialog");
            if (closeBtn) {
                closeBtn.addEventListener("click", () => {
                    dialog.close();
                });
            }
        }
    };
    xhttp.open("GET", "includes/edit_dialog.php?prdID="+id, true);
    xhttp.send();
}