document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("inputMyInfo");
    var formElements = form.elements;

    for (var i = 0; i < formElements.length; i++) {
        if (formElements[i].type !== "button" || formElements[i].id !== "editButton") {
        formElements[i].disabled = true;
        }
    }

    document.getElementById("editButton").addEventListener("click", function() {
    var form = document.getElementById("inputMyInfo");
    var formElements = form.elements;

    for (var i = 0; i < formElements.length; i++) {
        formElements[i].disabled = false;
    }
    });
});