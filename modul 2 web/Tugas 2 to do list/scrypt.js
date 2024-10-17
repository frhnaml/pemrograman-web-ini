const todoValue = document.getElementById("todo-text");  
const listItems = document.getElementById("list-item");  
const addUpdateClick = document.getElementById("AddUpdateClick");  
let updateText;  

todoValue.addEventListener("keypress", function (e) {  
    if (e.key === "Enter") {  
        addUpdateClick.click();  
    }  
});  

function CreateToDoData() {  
    if (todoValue.value === "") {  
        alert("Masukan catatan!");  
        todoValue.focus();  
        return; // Menghentikan eksekusi jika input kosong  
    }  

    let li = document.createElement("li");  
    const todoItems = `<div ondblclick="CompleteTodoItem(this)">${todoValue.value}</div>  
                       <div>  
                           <img class="edit todo-controls" src="assets/pen.png" />  
                           <img class="delete todo-controls" src="assets/trash.png" />  
                       </div>`;  

    li.innerHTML = todoItems;  
    listItems.appendChild(li);  
    todoValue.value = ""; // Mengosongkan input setelah menambah catatan  

    // Menambahkan event listener untuk ikon edit dan hapus  
    li.querySelector('.edit').addEventListener('click', function() {  
        UpdateToDoItems(this);  
    });  

    li.querySelector('.delete').addEventListener('click', function() {  
        DeleteToDoItems(this);  
    });  
}  

function CompleteTodoItem(e) {  
    const itemDiv = e.parentElement.querySelector("div");  
    itemDiv.style.textDecoration = itemDiv.style.textDecoration === "" ? "line-through" : "";  
}  

function UpdateOnSelectionItems() {  
    if (updateText) {  
        updateText.innerText = todoValue.value;  
        addUpdateClick.setAttribute("onclick", "CreateToDoData()");  
        addUpdateClick.setAttribute("src", "assets/icon add.png");  
        todoValue.value = "";  
    }  
}  

function UpdateToDoItems(e) {  
    const itemDiv = e.parentElement.parentElement.querySelector("div");  
    if (itemDiv.style.textDecoration === "") {  
        todoValue.value = itemDiv.innerText;  
        updateText = itemDiv; 
        addUpdateClick.setAttribute("onclick", "UpdateOnSelectionItems()");  
        addUpdateClick.setAttribute("src", "assets/refresh.png");  
    }  
}  

function DeleteToDoItems(e) {  
    const li = e.closest('li'); 
    if (li) {  
        let deleteValue = e.parentElement.parentElement.querySelector("div").innerText;  
        if (confirm(`Apa kamu yakin menghapus catatan ini? ${deleteValue}`)) {  
            li.remove(); 
        }  
    }  
}