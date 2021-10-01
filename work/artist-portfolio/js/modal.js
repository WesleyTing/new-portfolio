jQuery(document).ready(function($) {
    let closeDur = 100;

    var grid = $('.grid').isotope({
        itemSelector: '.grid-item',        
        percentPosition: true,
        masonry: {
            gutter: 20,            
        }
      });

      grid.imagesLoaded().progress(function() {
        grid.isotope('layout');
      });
    
    $("img[class^='fig-mdl-img-']").click(function() {
        let classname = $(this).attr('class');
        classname = `.${classname.replace('fig-mdl-img-','modal-box-')}`;
        $('.modal-backdrop').fadeIn(150);
        $(classname).fadeIn(150);
        $('body').css('overflow','hidden');
    });

    $('.modal-backdrop').click(function() {
        closeModal(closeDur);
    });

    $('.cls').click(function() {
        closeModal(closeDur);
    });

    function closeModal(dur) {
        $('.modal-backdrop').fadeOut(dur);
        $("div[class^='modal-box-']").fadeOut(dur);
        $('body').css('overflow','auto');
    }
});