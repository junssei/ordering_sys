// Display Profile Options by clicking the image
var pfpmenu = document.getElementById("userpfp");
document.getElementById("userimg").addEventListener('click', function(){
    if(pfpmenu.style.display == "flex"){
        pfpmenu.style.display = "none";
    } else {
        pfpmenu.style.display = "flex";
    }
});

// Dropdown
var dropdown = document.getElementsByClassName("dropdown");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function(e) {
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