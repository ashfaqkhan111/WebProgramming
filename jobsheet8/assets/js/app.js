function initNavToggle(){

    const toggleBtn = document.getElementById("nav-toggle-btn");
    const nav = document.querySelector("header nav");

    if(!toggleBtn || !nav) return;

    toggleBtn.addEventListener("click", function(){
        nav.classList.toggle("nav-open");
    });

}

document.addEventListener("DOMContentLoaded", function() {
    initNavToggle();
});


// delete data
document.addEventListener("click", function (e) {
    const btn = e.target.closest(".btn-delete");

    if (!btn) return;

    const row = btn.closest("tr");
    const name = row
        ? row.querySelector("td")?.textContent
        : "this data";

    const sure = confirm(
        'Sure wants to delete "' + name + '"?'
    );

    if (sure && row) {
        row.remove();
    }
});

//search data

const searchInput = document.getElementById("search-input");

if (searchInput) {
    searchInput.addEventListener("keyup", function () {

        const searchText = searchInput.value.toLowerCase();
        const rows = document.querySelectorAll("table tbody tr");

        rows.forEach(function (row) {

            const rowText = row.textContent.toLowerCase();

            if (rowText.includes(searchText)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }

        });
    });
}

// add book form

const form = document.getElementById("form-add");

if(form){
    form.addEventListener("submit", function(e){
        let valid = true;

        const title = form.querySelector("[name='title']");
        const author = form.querySelector("[name='author']");
        const stock = form.querySelector("[name='stock']");
        const year = form.querySelector("[name='year']");

        if(title && title.value.trim() === ""){
            showError(title, "this field is required.");
            valid = false;
        }else{
            deleteError(title);
        }

        if(author && author.value.trim() === ""){
            showError(author, "this field is required.");
            valid = false;
        }else {
            deleteError(author);
        }

        if(stock && stock.value.trim() === ""){
            showError(stock, "this field is required.");
            valid = false;
        }else if (stock && Number(stock.value) < 0){
            showError(stock, "stock cannot be negative");
            valid = false;
        }else{
            deleteError(stock);
        }

        if(year){
            const value = parseInt(year.value, 10);

            if(isNaN(value) || value < 1900 || value > 2026){
                showError(year, "Year must be in between 1900-2026");
                valid = false;
            } else{
                deleteError(year);
            }
        }

        if(!valid){
            e.preventDefault();
        }
    });
}

function showError(input, message){
    deleteError(input);

    const span = document.createElement("span");
    span.className = "error-message";
    span.textContent = message;

    input.insertAdjacentElement("afterend", span);
}

function deleteError(input){
    if(!input) return;

    const nextElement = input.nextElementSibling;

    if(nextElement && nextElement.classList.contains("error-message")){
        nextElement.remove();
    }
}

