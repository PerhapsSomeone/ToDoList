let noteDiv = document.getElementById("addNote");

function toggleAddNoteMenu() {
    if (noteDiv.className === "hidden") {
        noteDiv.className = "";
    } else {
        noteDiv.className = "hidden";
    }
}

function loadTodos() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("demo").innerHTML =
                this.responseText;
        }
    };
    xhttp.open("GET", "api/get_todo.php", true);
    xhttp.send();
}

function addNote() {
    $('#addForm').submit(function (e) {
        e.preventDefault();

        if (document.getElementById("newNoteText").value.length < 5) {
            alert("Mindestends 5 Zeichen.");
        }

        $.ajax({
            url: 'api/add_todo.php',
            data: $(this).serialize(),
            success: function (data) {
                document.getElementById("newNoteText").value = "";
                loadTodos();
            }
        });
    });
}

loadTodos();
