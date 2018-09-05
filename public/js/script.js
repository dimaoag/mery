
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
if ($("div").is("#map")){
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

if ($("div").is(".nearest_courses")) {
    $(document).ready(function () {
        $('.nearest_courses').slick({
            autoplay: true,
            autoplaySpeed: 2000,
            // easing: "ease",
            cssEase: 'ease',
            infinite: true,
            dots: false,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
}

// carousel video course page
if ($("div").is(".glide")) {
    $(document).ready(function () {
        $('.glide').slick({
            autoplay: true,
            autoplaySpeed: 2000,
            // easing: "ease",
            cssEase: 'ease',
            infinite: true,
            dots: false,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
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
    $('.js-main-image-registration').on('click', function () {
        basic.croppie('result', 'base64').then(function (html) {
            $.ajaxSetup({
                headers: {
                    // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $.ajax({
                url: path + '/user/upload-photo',
                type: "POST",
                data: 'photo=' + html + "&photo_origin=" + $('input[name="photo_origin"]').val(),
                dataType: 'json',
            }).done(function (html) {
                if (html.status == 'success') {
                    $('input[name="photo_profile"]').val(html.file_mini);
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
            if (html.status == 'success') {
                $('input[name="photo_origin"]').val(html.file_max);
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




//mask
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)}(function(a){var b,c=navigator.userAgent,d=/iphone/i.test(c),e=/chrome/i.test(c),f=/android/i.test(c);a.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},autoclear:!0,dataName:"rawMaskFn",placeholder:"_"},a.fn.extend({caret:function(a,b){var c;if(0!==this.length&&!this.is(":hidden"))return"number"==typeof a?(b="number"==typeof b?b:a,this.each(function(){this.setSelectionRange?this.setSelectionRange(a,b):this.createTextRange&&(c=this.createTextRange(),c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),c.select())})):(this[0].setSelectionRange?(a=this[0].selectionStart,b=this[0].selectionEnd):document.selection&&document.selection.createRange&&(c=document.selection.createRange(),a=0-c.duplicate().moveStart("character",-1e5),b=a+c.text.length),{begin:a,end:b})},unmask:function(){return this.trigger("unmask")},mask:function(c,g){var h,i,j,k,l,m,n,o;if(!c&&this.length>0){h=a(this[0]);var p=h.data(a.mask.dataName);return p?p():void 0}return g=a.extend({autoclear:a.mask.autoclear,placeholder:a.mask.placeholder,completed:null},g),i=a.mask.definitions,j=[],k=n=c.length,l=null,a.each(c.split(""),function(a,b){"?"==b?(n--,k=a):i[b]?(j.push(new RegExp(i[b])),null===l&&(l=j.length-1),k>a&&(m=j.length-1)):j.push(null)}),this.trigger("unmask").each(function(){function h(){if(g.completed){for(var a=l;m>=a;a++)if(j[a]&&C[a]===p(a))return;g.completed.call(B)}}function p(a){return g.placeholder.charAt(a<g.placeholder.length?a:0)}function q(a){for(;++a<n&&!j[a];);return a}function r(a){for(;--a>=0&&!j[a];);return a}function s(a,b){var c,d;if(!(0>a)){for(c=a,d=q(b);n>c;c++)if(j[c]){if(!(n>d&&j[c].test(C[d])))break;C[c]=C[d],C[d]=p(d),d=q(d)}z(),B.caret(Math.max(l,a))}}function t(a){var b,c,d,e;for(b=a,c=p(a);n>b;b++)if(j[b]){if(d=q(b),e=C[b],C[b]=c,!(n>d&&j[d].test(e)))break;c=e}}function u(){var a=B.val(),b=B.caret();if(o&&o.length&&o.length>a.length){for(A(!0);b.begin>0&&!j[b.begin-1];)b.begin--;if(0===b.begin)for(;b.begin<l&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}else{for(A(!0);b.begin<n&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}h()}function v(){A(),B.val()!=E&&B.change()}function w(a){if(!B.prop("readonly")){var b,c,e,f=a.which||a.keyCode;o=B.val(),8===f||46===f||d&&127===f?(b=B.caret(),c=b.begin,e=b.end,e-c===0&&(c=46!==f?r(c):e=q(c-1),e=46===f?q(e):e),y(c,e),s(c,e-1),a.preventDefault()):13===f?v.call(this,a):27===f&&(B.val(E),B.caret(0,A()),a.preventDefault())}}function x(b){if(!B.prop("readonly")){var c,d,e,g=b.which||b.keyCode,i=B.caret();if(!(b.ctrlKey||b.altKey||b.metaKey||32>g)&&g&&13!==g){if(i.end-i.begin!==0&&(y(i.begin,i.end),s(i.begin,i.end-1)),c=q(i.begin-1),n>c&&(d=String.fromCharCode(g),j[c].test(d))){if(t(c),C[c]=d,z(),e=q(c),f){var k=function(){a.proxy(a.fn.caret,B,e)()};setTimeout(k,0)}else B.caret(e);i.begin<=m&&h()}b.preventDefault()}}}function y(a,b){var c;for(c=a;b>c&&n>c;c++)j[c]&&(C[c]=p(c))}function z(){B.val(C.join(""))}function A(a){var b,c,d,e=B.val(),f=-1;for(b=0,d=0;n>b;b++)if(j[b]){for(C[b]=p(b);d++<e.length;)if(c=e.charAt(d-1),j[b].test(c)){C[b]=c,f=b;break}if(d>e.length){y(b+1,n);break}}else C[b]===e.charAt(d)&&d++,k>b&&(f=b);return a?z():k>f+1?g.autoclear||C.join("")===D?(B.val()&&B.val(""),y(0,n)):z():(z(),B.val(B.val().substring(0,f+1))),k?b:l}var B=a(this),C=a.map(c.split(""),function(a,b){return"?"!=a?i[a]?p(b):a:void 0}),D=C.join(""),E=B.val();B.data(a.mask.dataName,function(){return a.map(C,function(a,b){return j[b]&&a!=p(b)?a:null}).join("")}),B.one("unmask",function(){B.off(".mask").removeData(a.mask.dataName)}).on("focus.mask",function(){if(!B.prop("readonly")){clearTimeout(b);var a;E=B.val(),a=A(),b=setTimeout(function(){B.get(0)===document.activeElement&&(z(),a==c.replace("?","").length?B.caret(0,a):B.caret(a))},10)}}).on("blur.mask",v).on("keydown.mask",w).on("keypress.mask",x).on("input.mask paste.mask",function(){B.prop("readonly")||setTimeout(function(){var a=A(!0);B.caret(a),h()},0)}),e&&f&&B.off("input.mask").on("input.mask",u),A()})}})});


((function ($) {
    $(function(){

        $(document).ready(function() {
            $("[data-mask='callback-catalog-phone']").mask("+3 80 9 9  9 9 9  9 9  9 9");
        });
    })
})(jQuery));


$(document).ready(function(){
    $('.js-iframe').on('click', function(e){
        e.preventDefault();
        var $target = $(this);
        var src = $(this).attr('href');
        var $iframe = $target.find('iframe');
        if ($iframe.length > 0) {
            $iframe.attr('src', src);
        } else {
            $target.append('<iframe src=' + src +'></iframe>');
            $target.addClass('hide-bg');
        }
    });

});


//reviews
$(document).ready(function () {
    $('#review_form').on('submit', function (event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: path + '/review',
            method: 'POST',
            data: form_data,
            dataType: 'JSON',
            success: function (data) {
                  if (data.error != ''){
                        $('#review_form')[0].reset();
                        $('#review_message').html(data.error);
                        load_review();
                  }
            },
        });
    });

    load_review();
    function load_review() {
        $.ajax({
            url: path + '/review/load',
            method: 'POST',
            success: function (data) {
                $('#reviews_container').html(data);
            },
        });
    }

});

// comments
$(document).ready(function () {
    $('#comment_form').on('submit', function (event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: path + '/comment/add',
            method: 'POST',
            data: form_data,
            dataType: 'JSON',
            success: function (data) {
                if (data.error != ''){
                    $('#comment_form')[0].reset();
                    $('#comment_message').html(data.error);
                    load_comment();
                }
            },
        });
    });

    load_comment();
    function load_comment() {
        $.ajax({
            url: path + '/comment/load',
            method: 'POST',
            success: function (data) {
                $('#comments_container').html(data);
            },
        });
    }

});

//add products to cart
$('.modal-body').on('click', '.add-order', function (e) {
    e.preventDefault();
    var price = $(this).data('price'),
        course_id = $(this).data('course_id');
    $.ajax({
        url: '/order/add',
        data: {
            price: price,
            course_id: course_id,
        },
        type: 'POST',
        success: function(res){
            $('.fade').hide();
            showModal();
        },
        error: function () {
            alert("Ошибка. Свяжитесь с нами по телефону.");
        }
    });
});


//show modal after add order

function showModal() {
    $('.order-modal').arcticmodal();
}


$('.order-modal').on('click', '.close_modal', function (e) {
    e.preventDefault();
    $.arcticmodal('close');
    location.reload();
});


$('.modal-body').on('click', '.unreg', function (e) {
    e.preventDefault();
    var price = $(this).data('price'),
        course_id = $(this).data('course_id'),
        course = $('.hidden-fields .course_id'),
        price_field = $('.hidden-fields .price');

    course.val(course_id);
    price_field.val(price);
    $('.fade').hide();
    $('.order-modal-unreg').arcticmodal();

    $('#form-unreg').on('submit', function (event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: path + '/order/add-unreg',
            method: 'POST',
            data: form_data,
            dataType: 'JSON',
            success: function (data) {
                if (data.error != ''){
                    $.arcticmodal('close');
                    showModal();
                }
            },
        });
    });


});

$('.order-modal-unreg').on('click', '.close_modal', function (e) {
    e.preventDefault();
    $.arcticmodal('close');
    location.reload();
});



// search
var categories = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: path + '/search/typeahead?query=%QUERY'
    }
});

categories.initialize();
$('#typeahead').typeahead({
    highlight: true // подсветка вводимого
},{
    name: 'categories',
    display: 'name', // return id and title showing only title, id as key
    limit: 9, // 1+ more than items from database;
    source: categories
});

// event after clicking founded product
$('#typeahead').bind('typeahead:select', function (ev, suggestion) {
    //console.log(suggestion);
    window.location = path + '/search/?s=' + encodeURIComponent(suggestion.id);
});

$(".js-modal-btn").modalVideo();

//cabinet password confirm

    $(document).ready(function () {
        var insert = '<label for="password_confirm" class="col-sm-3 col-form-label pass-confirm">Повторить пароль</label>\n' +
            '                                    <div class="col-sm-9 pass-confirm">\n' +
            '                                        <input type="password" name="password_confirm" class="form-control profile-password pass-confirm" id="password_confirm">\n' +
            '                                    </div>';
        $('.profile-password').focusin(function () {
            $('.profile-confirm-password').html(insert);
        });
        $('.profile-password').focusout(function () {
            if (!$('.profile-password').val()) {
                $('.pass-confirm').hide();
            }
        });
    });

//upload image cabinet
$(document).ready(function ($) {
    var basic;
    $('.add-photo-cabinet').on('click', function () {
        $("#c_input_24_cabinet").trigger('click');
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
                url: path + '/user/edit-photo',
                type: "POST",
                data: 'photo=' + html + "&photo_origin_cabinet=" + $('input[name="photo_origin_cabinet"]').val(),
                dataType: 'json',
            }).done(function (html) {
                if (html.status == 'success') {
                    $('input[name="photo_profile_cabinet"]').val(html.file_mini);
                    $('.perscab-photoedit-img-cabinet img').attr('src', html.path_mini);
                    $('.profile-modal-photo-cabinet').arcticmodal('close');
                }
            });
        });
    });
    $("#c_input_24_cabinet").on('change', function () {
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
            if (html.status == 'success') {
                $('input[name="photo_profile_cabinet"]').val(html.file_max);
                $('.profile_photo_i').attr('src', html.path_max);

                basic = $('.profile_photo_i').croppie({
                    viewport: {
                        width: 200,
                        height: 200,
                        type: 'circle',
                    }
                });
                $('.profile-modal-photo-cabinet').arcticmodal({
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

