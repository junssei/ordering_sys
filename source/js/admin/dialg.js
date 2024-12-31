// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    var dialogs = document.getElementsByClassName("dialog");
    for(let i = 0; i < dialogs.length; i++){
        if (event.target == dialogs[i]) {
            dialogs[i].close();
        }
    }
}

function displayImageModal(){ // *Upload Image -> Display Image
    let imagedisp_modal = document.getElementsByClassName("imagedisp"); //img
    let imageUpload_modal = document.getElementsByClassName("imageupld"); //button

    for(let i = 0; i < imageUpload_modal.length; i++){
        imageUpload_modal[i].onchange = function(){
            if(imageUpload_modal[i].files && imageUpload_modal[i].files[0]){
                imagedisp_modal[i].src = URL.createObjectURL(imageUpload_modal[i].files[0]);
            } else {
                imagedisp_modal[i].src = "../source/images/upload/products/gallery.png";
            }
        }
    }
}

// Modal Close button
function closeModal(){
    const closeBtn = dialog.querySelector(".close_dialog");
    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            dialog.close();
        });
    }
}

// Add(1)
function addModal(page){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const dialog = document.querySelector("#dialog");
            dialog.innerHTML = this.responseText;
            displayImageModal();
            dialog.showModal();
            closeModal();
        }
    };
    xhttp.open("GET", "includes/add_dialog.php?page=" + page, true); //get depends category or product
    xhttp.send();
}

// Add(2)
function addModal2(page, id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const dialog = document.querySelector("#dialog");
            dialog.innerHTML = this.responseText;
            displayImageModal();
            dialog.showModal();
            closeModal();
        }
    };
    xhttp.open("GET", "includes/add_dialog.php?page=" + page + "&" + "id=" + id, true);
    xhttp.send();
}

// Edit(2)
function editModal(page, id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const dialog = document.querySelector("#dialog");
            dialog.innerHTML = this.responseText;
            displayImageModal();
            dialog.showModal();
            closeModal();
        }
    };
    xhttp.open("GET", "includes/edit_dialog.php?page=" + page + "&" + "id=" +id, true);
    xhttp.send();
}

// Delete(2)
function deltModal(page, id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const dialog = document.querySelector("#dialog");
            dialog.innerHTML = this.responseText;
            displayImageModal();
            dialog.showModal();
            closeModal();
        }
    };
    xhttp.open("GET", "includes/delt_dialog.php?page=" + page + "&" + "id=" + id, true);
    xhttp.send();
}