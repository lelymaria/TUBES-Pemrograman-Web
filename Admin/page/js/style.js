const btnToggle = document.querySelector(".navbar #btn-toggle");
const sidebar = document.querySelector(".sidebar");
const content = document.querySelector(".content-wrapper");
btnToggle.addEventListener("click", function () {
	sidebar.classList.toggle("hide");
	content.classList.toggle("hide");
});

const dropdownToggle = document.getElementsByClassName("dropdown-toggle");
const dropdown = document.querySelector(".sidebar .dropdown");
for (let i = 0; i < dropdownToggle.length; i++) {
	dropdownToggle[i].addEventListener("click", function () {
		dropdown.classList.toggle("show");
		var dropdownContent = this.nextElementSibling;
		if (dropdownContent.style.display === "block") {
			dropdownContent.style.display = "none";
		} else {
			dropdownContent.style.display = "block";
		}
	});
};