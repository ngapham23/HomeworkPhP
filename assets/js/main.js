// Topbar search dropdown
(function ($) {
    $(function () {
        var $header = $('.aps-topbar');
        var $searchBtn = $header.find('.aps-icon-btn--search');
        var $dropdown = $header.find('.aps-search-dropdown');
        var $close = $dropdown.find('.aps-search-dropdown__close');
        var $input = $dropdown.find('.aps-search-dropdown__input');

        function openSearch() {
            $dropdown.stop(true, true).fadeIn(160).addClass('active');
            $input.focus();
        }
        function closeSearch() {
            $dropdown.stop(true, true).fadeOut(160).removeClass('active');
            $input.val('');
        }

        $searchBtn.on('click', function (e) {
            e.preventDefault();
            if ($dropdown.hasClass('active')) closeSearch(); else openSearch();
        });

        $close.on('click', function (e) {
            e.preventDefault();
            closeSearch();
        });


        $(document).on('click', function (e) {
            if ($dropdown.hasClass('active')) {
                if (!$(e.target).closest('.aps-topbar').length) {
                    closeSearch();
                }
            }
        });
        $(document).on('keydown', function (e) {
            if (e.key === 'Escape' && $dropdown.hasClass('active')) closeSearch();
        });
    });
})(jQuery);


//menu mobile  drop
$(document).ready(function () {
    $('.aps-mobile-toggle').on('click', function () {
        $('.aps-nav').toggleClass('is-open');
    });
});


// Slick Carousel - Featured Locations + Custom Dots
$(document).ready(function () {
    const $slider = $('.aps-cards-inner');
    
    $slider.slick({
        dots: false,
        infinite: true,
        speed: 800,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        arrows: false,
        responsive: [
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    variableWidth: false
                }
            }
        ]
    });

    $slider.on('afterChange', function(event, slick, currentSlide) {
        updateDots(currentSlide);
    });

    $('.aps-dot-circle, .aps-dot-inner').on('click', function(e) {
        e.stopPropagation();
        const slideIndex = parseInt($(this).data('slide'));
        if (!isNaN(slideIndex)) {
            $slider.slick('slickGoTo', slideIndex);
        }
    });

    function updateDots(currentSlide) {
        $('.aps-dot-circle').attr('r', '3.5');
        $('.aps-dot-inner').attr('opacity', '0');
        $(`.aps-dot-circle[data-slide="${currentSlide}"]`).attr('r', '9.5');
        $(`.aps-dot-inner[data-slide="${currentSlide}"]`).attr('opacity', '1');
    }

    updateDots(0);
});




// Slick slider for partners logos
$(document).ready(function () {
    $('.aps-partners__logos').slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 500,
        arrows: false,
        draggable: false,
        swipe: false,
        touchThreshold: 5,
        cssEase: 'ease-out',
        responsive: [
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });
});

// Gallery Lightbox
$(document).ready(function () {
    if (typeof GLightbox !== 'undefined') {
        const lightbox = GLightbox({
            touchNavigation: true,
            loop: true,
            autoplayVideos: true,
            selector: '.glightbox'
        });

        // Hàm cập nhật counter
        const updateCounter = (instance) => {
            const container = document.querySelector('.gcontainer');
            if (!container) return;

            let counter = container.querySelector('.gslide-counter');
            if (!counter) {
                counter = document.createElement('div');
                counter.className = 'gslide-counter';
                container.appendChild(counter);
            }

            // Lấy tổng số ảnh trong Gallery hiện tại (group)
            // GLightbox phân nhóm theo data-gallery
            const currentGallery = instance.activeSlide.querySelector('.gslide-description') ? 
                                 instance.elements[instance.index].gallery : 
                                 instance.elements[instance.index].gallery;
            
            // Tìm tất cả phần tử thuộc cùng gallery group
            const galleryElements = instance.elements.filter(el => el.gallery === currentGallery);
            const total = galleryElements.length;
            
            // Tìm vị trí của ảnh hiện tại trong gallery group
            const index = galleryElements.findIndex(el => el.href === instance.elements[instance.index].href) + 1;
            
            counter.textContent = `${index} / ${total}`;
        };

        lightbox.on('open', () => {
            setTimeout(() => updateCounter(lightbox), 50);
        });

        lightbox.on('slide_changed', () => {
            updateCounter(lightbox);
        });
    }
});




/* Location Gallery Slider  */
jQuery(document).ready(function ($) {
    const $gallerySlider = $('.location-gallery-slider-mobile');

    if ($gallerySlider.length === 0) return;
    $gallerySlider.slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        variableWidth: false,
        adaptiveHeight: false,
        swipe: true,
        swipeToSlide: true,
        draggable: true,
        touchThreshold: 20
    });

    /* --- Custom Dots Logic --- */
    const $dots = $('.location-dot-circle');
    const $dotInners = $('.location-dot-inner');

    // Click to Switch Slide
    $('.location-dot-circle, .location-dot-inner').on('click', function (e) {
        e.stopPropagation();
        const slideIndex = parseInt($(this).data('slide'));

        if (!isNaN(slideIndex)) {
            $gallerySlider.slick('slickGoTo', slideIndex);
        }
    });

    $gallerySlider.on('afterChange', function (event, slick, currentSlide) {
        // Reset all
        $dots.attr('r', '3.5');
        $dotInners.attr('opacity', '0');

        let targetIndex = currentSlide;
        if (targetIndex > 2) targetIndex = 2;

        $(`.location-dot-circle[data-slide="${targetIndex}"]`).attr('r', '9.5');
        $(`.location-dot-inner[data-slide="${targetIndex}"]`).attr('opacity', '1');
    });
});
