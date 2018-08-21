
// owl-carousel in index page
if ($("div").is(".owl-carousel-index")){
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop: true,
            items: 1,
            smartSpeed: 700,
            nav: true,
        });
    });
}


// Initialize and add the map
if ($("div").is(".map")){
    function initMap() {
        // The location of Uluru
        var meri = {lat: 49.235373, lng: 28.489296};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 19, center: meri});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: meri, map: map});
    }
}



// owl-carousel in course page
if ($("div").is(".owl-carousel-course")){
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop: true,
            items: 4,
            smartSpeed: 700,
            nav: true,
            mouseDrag: true,
            dots: false,
            autoplay: true,
            responsiveClass:true,
            responsive:{
                320:{
                    items:1,
                    nav:false,
                    // nav:true
                },
                600:{
                    items:2,
                    nav:false,
                },
                930:{
                    items:3,
                    nav:false
                },
                1200:{
                    items:4,
                    nav:false,
                    loop:false
                }
            },
        });
    });
}

// owl-carousel in course page nearest courses
if ($("div").is(".owl-carousel-nearest-courses")){
    $(document).ready(function(){
        $("#nearest").owlCarousel({
        });
    });
}


// carousel video course page
if ($("div").is(".carousel-video")){
    $(document).ready(function() {
        $("#carousel").waterwheelCarousel({
            // speed: 1000,
            startingItem: 3,
            // autoPlay: 1,
        });
    });
}

//upload image profile
$(document).ready(function ($) {
    var basic;
    $('.add-photo').on('click', function () {
        $("#c_input_24").trigger('click');
        return false;
    });

    $('.js-main-image').on('click', function () {
        basic.croppie('result', 'base64').then(function (html) {
            $.ajaxSetup({
                headers: {
                    // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $.ajax({
                url: path + '/user/upload-photo',
                type: "POST",
                data: 'photo=' + html + "&photo_c=" + $('input[name="photo_c"]').val(),
                dataType: 'json',
            }).done(function (html) {
                if (html.status == 'success'){
                    $('input[name="photo_i"]').val(html.file_mini);
                    $('.perscab-photoedit-img img').attr('src', html.path_mini);
                    $('.profile-modal-photo').arcticmodal('close');
                }
            });
        });
    });

    $("#c_input_24").on('change', function () {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        $.ajaxSetup({
            headers: {
                //headers
            }
        });
        $.ajax({
            url: path + '/user/upload-photo',
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
        }).done(function (html) {
            if (html.status == 'success'){
                $('input[name="photo_c"]').val(html.file_max);
                $('.profile_photo_i').attr('src', html.path_max);

                basic = $('.profile_photo_i').croppie({
                    viewport: {
                        width: 200,
                        height: 200,
                        type: 'circle',
                    }
                });
                $('.profile-modal-photo').arcticmodal({
                    beforeOpen: function () {

                    },
                    afterClose: function () {
                        $('.profile_photo_i').croppie('destroy');
                    },
                });
            }
        });
    });
});
