// Toggle Sidebar
var sidebar = document.getElementById("sidebar");
document.getElementById("togglehamburger").addEventListener("click", function(e){
    if(sidebar.style.display == "flex"){
        sidebar.style.display = "none";
    } else {
        sidebar.style.display = "flex";
    }
})


// Display Profile Options by clicking the image
var pfpmenu = document.getElementById("userpfp");
document.getElementById("userimg").addEventListener('click', function(){
    if(pfpmenu.style.display === "flex"){
        pfpmenu.style.display = "none";
    } else {
        pfpmenu.style.display = "flex";
    }
});

// Dropdown
var dropdown = document.getElementsByClassName("dropdown");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active-link");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}

// While the page is active in dropdown section, the dropdown will always open
var activeTabs = document.getElementsByClassName("active");
for (var i = 0; i < activeTabs.length; i++) {
    var parentElement = activeTabs[i].parentElement;
    if (parentElement) {
        parentElement.style.display = "block";
    }
}

// For Category, when selected category, it filter what subcategory in the category
function ctgDISPsubctg(id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const subctg = document.querySelector(".input_subcategory");
            subctg.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "process/subctg_display.php?id=" + id, true);
    xhttp.send();
}

// Add another input field
function addInputField(){
    var multiple_input_container = document.querySelector("#multiple_input_container");
    var inputelement = '\
    <div class="flex-rowdirection">\
        <div class="input">\
            <div class="inp">\
                <input id="option_variation_name" type="text" name="option_variation_name[]" placeholder="Option name" required>\
            </div>\
        </div>\
        <img src="../source/images/icon/svg/delete.svg" class="btn imageMediumSmall" alt="addanotherinput" onclick="delInputField(this)">\
    </div>\
    ';
    multiple_input_container.insertAdjacentHTML('afterbegin', inputelement);
}

function delInputField(delbtn){
    delbtn.closest('.flex-rowdirection').remove();
}