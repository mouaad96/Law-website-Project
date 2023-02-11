let tog = document.getElementById("toggle");
let sidebar = document.getElementById("sidebar");

//? adding onclick event to the mobile menu button
tog.addEventListener("click", () => {
    tog.classList.toggle("active");
    sidebar.classList.toggle("active");
});

// ? remove the class 'active' from the sidebar menu and the hamburger button
document.onclick = (e) => {
    if (e.target.id !== "sidebar" && e.target.id !== "toggle") {
        sidebar.classList.remove("active");
        tog.classList.remove("active");
    }
};