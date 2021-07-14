document.querySelector('.dropdown-btn').addEventListener("click", function () {
    let list = document.getElementById("project-list");

    if (!list.style.display || list.style.display === "none") {
        list.style.display = "inline-block";
    } else {
        list.style.display = "none";
    }
});

// Add a project option
function addProject() {
    let addButton = document.querySelector('.addition');
    if (!addButton.style.display || addButton.style.display === "none") {
        addButton.style.display = "block";
    } else {
        addButton.style.display = "none";
    }

}
function addProjectTitle() {
    let li = document.createElement("li");
    let inputValue = document.querySelector('.project-name').value;
    let t = document.createTextNode(inputValue);
    li.appendChild(t);
    if (inputValue === '') {}
    else {
        document.getElementById("project-list").appendChild(li);
        document.querySelector('.addition').style.display = "none";
        document.getElementById("project-list").style.display = "inline-block";
    }
    document.querySelector('.project-name').value = "";
}
function logOut() {
    alert("Successfully Logged out");
}
function askToLogIn() {
    alert("Log in to create Projects");
}