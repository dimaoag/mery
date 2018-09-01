



// alert before delete item
$('.delete').click(function () {
    var res = confirm('Вы действительно хотите это сделать?');
    if (!res){
        return false;
    }
});

$('.sidebar-menu a').each(function () {
    var currentLocation = window.location.protocol + '//' + window.location.host + window.location.pathname;
    var link = this.href;
    if(link == currentLocation){
        $(this).parent().addClass(' active'); //parent
        $(this).closest('.treeview').addClass(' active'); //child
    }
});



//reset filter in add new product
// $('#reset_filter').click(function () {
//     $('#filter input[type=radio]').prop('checked', false); //снять все отметки
//     return false;
// });

//select2
// $(".select2").select2({
//     placeholder: "Start to input name product",
//     minimumInputLength: 1,  // с какого символа отправлять запрос на сервер
//     cache: true,
//     ajax: {
//         url: adminPath + "/product/related-product",
//         delay: 250,  //задержка перед показом
//         dataType: 'json',
//         data: function (params) {
//             return {
//                 q: params.term,
//                 page: params.page
//             };
//         },
//         processResults: function (data, params) { //return data
//             return {
//                 results: data.items
//             };
//         }
//     }
// });

//upload images
if ($('div').is('#banner')){
    var buttonBanner = $('#banner'),
        buttonProfile = $('#profile'),
        file;
}

if (buttonBanner){
    new AjaxUpload(buttonBanner, {
        action: adminPath + buttonBanner.data('url') + "?upload=1",
        data: {
            name: buttonBanner.data('name'),
            act: buttonBanner.data('act'),
            id: buttonBanner.data('id')
        },
        name: buttonBanner.data('name'), //параметр
        onSubmit: function(file, ext){ //при нажатии на кнопку выполняется функция (названия файла и его расширения)
            if (! (ext && /^(jpg|png|jpeg|gif)$/i.test(ext))){
                alert('Error! Allowed only images.');
                return false;
            }
            buttonBanner.closest('.file-upload').find('.overlay').css({'display':'block'});
            //первый предок (родитель с класом .file-upload) >  ищеи .find('.overlay') и показуем спинер

        },
        onComplete: function(file, response){ // по завершению аякс запроса
            setTimeout(function(){ // чтобы лоадер (спинер) дольше покрутился
                buttonBanner.closest('.file-upload').find('.overlay').css({'display':'none'});

                response = JSON.parse(response);
                $('.banner').html('<img src="/upload/' + response.file + '" style="max-height: 100px;">');
            }, 1000);
        }
    });
}


if (buttonProfile){
    new AjaxUpload(buttonProfile, {
        action: adminPath + buttonProfile.data('url') + "?upload=1",
        data: {
            name: buttonProfile.data('name'),
            act: buttonProfile.data('act'),
            id: buttonProfile.data('id')
        },
        name: buttonProfile.data('name'), //параметр
        onSubmit: function(file, ext){ //при нажатии на кнопку выполняется функция (названия файла и его расширения)
            if (! (ext && /^(jpg|png|jpeg|gif)$/i.test(ext))){
                alert('Error! Allowed only images.');
                return false;
            }
            buttonProfile.closest('.file-upload').find('.overlay').css({'display':'block'});
            //первый предок (родитель с класом .file-upload) >  ищеи .find('.overlay') и показуем спинер

        },
        onComplete: function(file, response){ // по завершению аякс запроса
            setTimeout(function(){ // чтобы лоадер (спинер) дольше покрутился
                buttonProfile.closest('.file-upload').find('.overlay').css({'display':'none'});

                response = JSON.parse(response);
                $('.profile').html('<img src="/upload/' + response.file + '" style="max-height: 100px;">');
            }, 1000);
        }
    });
}


//upload images
if ($('div').is('#gallery')){
    var buttonGallery = $('#gallery'),
        file;
}

if (buttonGallery){
    new AjaxUpload(buttonGallery, {
        action: adminPath + buttonGallery.data('url') + "?upload=1",
        data: {
            name: buttonGallery.data('name'),
            id: buttonGallery.data('id')
        },
        name: buttonGallery.data('name'),
        onSubmit: function (file, ext) {
            if (!(ext && /^(jpg|png|jpeg|gif)$/i.test(ext))) {
                alert('Ошибка! Разрешены только картинки');
                return false;
            }
            buttonGallery.closest('.file-upload').find('.overlay').css({'display': 'block'});

        },
        onComplete: function (file, response) {
            setTimeout(function () {
                buttonGallery.closest('.file-upload').find('.overlay').css({'display': 'none'});

                response = JSON.parse(response);
                $('.gallery').append('<img src="/upload/' + response.file + '" style="max-height: 100px;">');
            }, 1000);
        }
    });
}


//delete images from  product
$('.del-gallery').on('click', function () {
    var res = confirm('Вы действительно хотите удалить фото?');
    if (!res) return false;

    var this_img = $(this),
        id = this_img.data('id'),
        src = this_img.data('src'),
        type = this_img.data('type');

    $.ajax({
        url: adminPath + '/gallery/delete-image',
        data: {id: id, src: src, type: type},
        type: 'post',
        beforeSend: function () {
            this_img.closest('.file-upload').find('.overlay').css({'display': 'block'});
        },
        success: function (res) {
            setTimeout(function () {
                this_img.closest('.file-upload').find('.overlay').css({'display': 'none'});
                if (res == 1){
                    this_img.fadeOut();
                }
            }, 1000);
        },
        error: function () {
            setTimeout(function () {
                this_img.closest('.file-upload').find('.overlay').css({'display': 'none'});
                alert('Error!')
            }, 1000);
        },
    });

});



//delete images from  product
$('.del-img').on('click', function () {
    var res = confirm('Вы действительно хотите удалить фото?');
    if (!res) return false;

    var this_img = $(this),
        id = this_img.data('id'),
        src = this_img.data('src'),
        type = this_img.data('type');

    $.ajax({
        url: adminPath + '/category/delete-image',
        data: {id: id, src: src, type: type},
        type: 'post',
        beforeSend: function () {
            this_img.closest('.file-upload').find('.overlay').css({'display': 'block'});
        },
        success: function (res) {
            setTimeout(function () {
                this_img.closest('.file-upload').find('.overlay').css({'display': 'none'});
                if (res == 1){
                    this_img.fadeOut();
                }
            }, 1000);
        },
        error: function () {
            setTimeout(function () {
                this_img.closest('.file-upload').find('.overlay').css({'display': 'none'});
                alert('Error!')
            }, 1000);
        },
    });

});

//dependence dropdown list
$(document).ready(function () {
    $('#category_id').change(function () {
        var category_id = $('#category_id').val();
        if (category_id != ''){
            $.ajax({
                url: adminPath + '/course-type/kinds',
                method: 'POST',
                data: {category_id: category_id},
                success: function (data) {
                    $('#kind_id').html(data);
                },
            });
        }
    });
});

// include CKeditor
// CKEDITOR.replace('editor1');
$('#editor1').ckeditor();


//datepicker
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    inline: true,
    language: 'ru',
    changeYear: true,
    changeMonth: true,
    todayHighlight: true,
    autoclose: true
});


//dependence dropdown list types
$(document).ready(function () {
    $('.select_kind').change(function () {
        var kind_id = $('.select_kind').val();
        if (kind_id != ''){
            $.ajax({
                url: adminPath + '/course/types',
                method: 'POST',
                data: {kind_id: kind_id},
                success: function (data) {
                    $('#type_id').html(data);
                },
            });
        }
    });
});

//dependence dropdown list types
$(document).ready(function () {
    $('.select_type').change(function () {
        var type_id = $('.select_type').val();
        if (type_id != ''){
            $.ajax({
                url: adminPath + '/course/master',
                method: 'POST',
                data: {type_id: type_id},
                success: function (data) {
                    $('#master_id').html(data);
                },
            });
        }
    });
});


//upload images
if ($('div').is('#course')){
    var buttonCouse = $('#course'),
        file;
}

if (buttonCouse){
    new AjaxUpload(buttonCouse, {
        action: adminPath + buttonCouse.data('url') + "?upload=1",
        data: {
            name: buttonCouse.data('name'),
            act: buttonCouse.data('act'),
            id: buttonCouse.data('id')
        },
        name: buttonCouse.data('name'), //параметр
        onSubmit: function(file, ext){ //при нажатии на кнопку выполняется функция (названия файла и его расширения)
            if (! (ext && /^(jpg|png|jpeg|gif)$/i.test(ext))){
                alert('Error! Allowed only images.');
                return false;
            }
            buttonCouse.closest('.file-upload').find('.overlay').css({'display':'block'});
            //первый предок (родитель с класом .file-upload) >  ищеи .find('.overlay') и показуем спинер

        },
        onComplete: function(file, response){ // по завершению аякс запроса
            setTimeout(function(){ // чтобы лоадер (спинер) дольше покрутился
                buttonCouse.closest('.file-upload').find('.overlay').css({'display':'none'});

                response = JSON.parse(response);
                $('.course').html('<img src="/upload/' + response.file + '" style="max-height: 100px;">');
            }, 1000);
        }
    });
}

//delete images from  product
$('.del-img-course').on('click', function () {
    var res = confirm('Вы действительно хотите удалить фото?');
    if (!res) return false;

    var this_img = $(this),
        id = this_img.data('id'),
        src = this_img.data('src'),
        type = this_img.data('type');

    $.ajax({
        url: adminPath + '/course/delete-image',
        data: {id: id, src: src, type: type},
        type: 'post',
        beforeSend: function () {
            this_img.closest('.file-upload').find('.overlay').css({'display': 'block'});
        },
        success: function (res) {
            setTimeout(function () {
                this_img.closest('.file-upload').find('.overlay').css({'display': 'none'});
                if (res == 1){
                    this_img.fadeOut();
                }
            }, 1000);
        },
        error: function () {
            setTimeout(function () {
                this_img.closest('.file-upload').find('.overlay').css({'display': 'none'});
                alert('Error!')
            }, 1000);
        },
    });

});


//upload images
if ($('div').is('#car')){
    var buttonCar = $('#car'),
        file;
}

if (buttonCar){
    new AjaxUpload(buttonCar, {
        action: adminPath + buttonCar.data('url') + "?upload=1",
        data: {name: buttonCar.data('name')},
        name: buttonCar.data('name'), //параметр
        onSubmit: function(file, ext){ //при нажатии на кнопку выполняется функция (названия файла и его расширения)
            if (! (ext && /^(jpg|png|jpeg|gif)$/i.test(ext))){
                alert('Error! Allowed only images.');
                return false;
            }
            buttonCar.closest('.file-upload').find('.overlay').css({'display':'block'});
            //первый предок (родитель с класом .file-upload) >  ищеи .find('.overlay') и показуем спинер

        },
        onComplete: function(file, response){ // по завершению аякс запроса
            setTimeout(function(){ // чтобы лоадер (спинер) дольше покрутился
                buttonCar.closest('.file-upload').find('.overlay').css({'display':'none'});

                response = JSON.parse(response);
                $('.car').html('<img src="/upload/' + response.file + '" style="max-height: 100px;">');
            }, 1000);
        }
    });
}

//delete images from  product
$('.del-img-car').on('click', function () {
    var res = confirm('Вы действительно хотите удалить фото?');
    if (!res) return false;

    var this_img = $(this),
        id = this_img.data('id'),
        src = this_img.data('src'),
        type = this_img.data('type');

    $.ajax({
        url: adminPath + '/carousel/delete-image',
        data: {id: id, src: src, type: type},
        type: 'post',
        beforeSend: function () {
            this_img.closest('.file-upload').find('.overlay').css({'display': 'block'});
        },
        success: function (res) {
            setTimeout(function () {
                this_img.closest('.file-upload').find('.overlay').css({'display': 'none'});
                if (res == 1){
                    this_img.fadeOut();
                }
            }, 1000);
        },
        error: function () {
            setTimeout(function () {
                this_img.closest('.file-upload').find('.overlay').css({'display': 'none'});
                alert('Error!')
            }, 1000);
        },
    });

});



//create modification product
var modList = [];
$('#add').on('click',function () {

    // var modList = [];
    var color = $('#in_color').val(),
        price = $('#in_price').val();
    var temp = {};
        temp.color = color;
        temp.price = price;
    var i = modList.length;
    modList[i] = temp;
    out();


    console.log(modList);

    return false;
});

function out() {
    var out = '';
    for (var key in modList){
        out += "<input type='checkbox' class='form-check-input' checked name='mod[" + key +"]' " +
            "value='" + modList[key].color + "_" + modList[key].price +"'" +
            "id='mod_"+ key +"'>";
        out += "<label class='form-check-label' for='mod_"+ key +"'>" + modList[key].color + " - $" + modList[key].price + "</label><br>";
    }
    $('.out').html(out);
}


// check input before submit isNum
$('#form_id').on('submit', function () {
    if (!isNumeric($('#category_id'))){
        alert('Choose category');
        return false;
    }
});

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}