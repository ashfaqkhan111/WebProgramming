async function loadBookList() {
    const tbody = document.querySelector(".table-responsive table tbody");
    const loading = document.getElementById("loading-indicator");

    if (!tbody) return;

    loading.style.display = "block";
    tbody.innerHTML = "";

    try {
        await new Promise((resolve) => setTimeout(resolve, 600));
        const res = await fetch("../data/book.json");

        if (!res.ok){
            throw new Error("failed to retrive data (status"+ res.status+")");
        }
        
        const listBook = await res.json();

        listBook.forEach(function (book) {
            const tr = document.createElement("tr");

            tr.innerHTML = 
            "<td>"+ book.title + "</td>"+
            "<td>"+ book.author + "</td>"+
            "<td>"+ book.year + "</td>"+
            "<td>"+ book.stock + "</td>"+
            "<td>"+
            "<button type=\"button\"> Edit</button>"+
            "<button type=\"button\" class=\"btn-delete\">Delete</button>"+
            "</td>"

            tbody.appendChild(tr);

        });
    } catch (err){
        tbody.innerHTML = "<tr><td colspan=\"5\">Faild to load data: "+ err.message + "</td></tr>";
    }finally{
        loading.style.display= "none";

    }
    
    

}
document.addEventListener("DOMContentLoaded", loadBookList);