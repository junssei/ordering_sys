// For all input fields that has a text or input, it will set the width to max/limit 200px
var search_fields = document.getElementsByClassName("search_field");
for (let i = 0; i < search_fields.length; i++) {
    search_fields[i].addEventListener("input", function () {
        if (this.value.trim() !== "") {
            this.parentElement.style.width = "200px";
            this.parentElement.style.backgroundColor = "white";
        } else {
            this.parentElement.style.width = "";
            this.parentElement.style.backgroundColor = "rgba(149, 191, 255, 0.1)";
        }
    });
}