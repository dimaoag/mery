
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
