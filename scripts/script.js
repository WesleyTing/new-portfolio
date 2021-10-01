const body = document.body;
const btn = document.querySelector('.hamburger');

btn.addEventListener('click', function(){
    body.classList.toggle('show');
});

function checkWidth() {
    if ($(window).width() < 950) {
        $('#body').removeClass('show');
    }
}

$(window).resize(checkWidth);


