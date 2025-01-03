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

function addVariationField(page){
    var container = document.getElementById(page);
    var value = container.querySelector(".select_product_variant").value;
    if(value != "" || value != 0){
        console.log(page);
        console.log(value);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var multiple_variant_field = document.querySelector("#multiple_variant_field");
                multiple_variant_field.insertAdjacentHTML('afterbegin', this.responseText);
                displayImageModal();
            }
        };
        xhttp.open("GET", "includes/addvariantfield.php?id=" + value, true);
        xhttp.send();
    }
}

// Add another input field
function addInputField(page){
    var multiple_input_container = document.querySelector("#multiple_input_container");
    var inputelement = '\
    <div class="flex-rowdirection mainrowdirection">\
        <div class="input">\
            <div class="inp">\
                <input id="' + page + '_name" type="text" name="' + page + '_name[]" placeholder="Option name" required>\
            </div>\
        </div>\
        <img src="../source/images/icon/svg/delete.svg" class="btn imageMediumSmall" alt="addanotherinput" onclick="delInputField(this)">\
    </div>\
    ';
    multiple_input_container.insertAdjacentHTML('afterbegin', inputelement);
}

function delInputField(delbtn){
    delbtn.closest('.mainrowdirection').remove();
}

// Filter
function filterTable(page){
    var container = document.getElementById(page);

    if(container.querySelector(".sort_category")){
        var value = container.querySelector(".sort_category").value;
    }

    if(container.querySelector(".sort_chronological")){
        var sort = container.querySelector(".sort_chronological").value;
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(page + "table").innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "includes/display_filter.php?value=" + value + "&sort=" + sort + "&page=" + page, true);
    xhttp.send();
}

function searchFilter(page){
    var container = document.getElementById(page);

    var table = container.querySelector('.table'),
    input = container.querySelector('.search_field'),
    filter = input.value.toUpperCase(),
    tr = table.getElementsByTagName("tr"),
    td, i, txtValue;

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
}

// For all input fields that has a text or input, it will set the width to max/limit 200px
var search_fields = document.getElementsByClassName("search_field");
for (let i = 0; i < search_fields.length; i++) {
    search_fields[i].addEventListener("input", function () {
        if (this.value.trim() !== "") {
            this.parentElement.style.width = "200px";
        } else {
            this.parentElement.style.width = "";
        }
    });
}
