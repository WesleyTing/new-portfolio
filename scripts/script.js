const wrapper = document.querySelector(".wrapper");
const btn = document.querySelector(".hamburger");

btn.addEventListener("click", function () {
  wrapper.classList.toggle("show");
});

function checkWidth() {
  if ($(window).width() < 950) {
    $(".wrapper").removeClass("show");
  }
}

$(window).resize(checkWidth);

var hideTOC = function () {
  var hideThese = document.getElementsByClassName("toc_list");
  for (var i = 0; i < hideThese.length; i++) {
    hideThese[i].style.display = "none";
  }
  document.getElementById("showTOC").style.display = "";
};
var showTOC = function () {
  var showThese = document.getElementsByClassName("toc_list");
  for (var i = 0; i < showThese.length; i++) {
    showThese[i].style.display = "";
  }
  document.getElementById("showTOC").style.display = "none";
};
