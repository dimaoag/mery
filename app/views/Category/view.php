<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="course-banner">
                <img src="images/<?=h($category->banner);?>" alt="course-banner">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center mt-3 mb-4">
            <h4 class="programs-title rob-nash-title">Работы наших учениц после окончания курса</h4>
        </div>
    </div>
    <?php if (!empty($gallery)): ?>
        <div class="row">
            <div class="col-12 carousel-course">
                <div class="owl-carousel owl-carousel-course">
                    <?php foreach ($gallery as $item): ?>
                    <div class="course-img">
                        <img src="images/<?=h($item->src);?>" alt="<?=h($item->src);?>">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row py-4">
        <div class="col-xl-6 text-center d-flex flex-column my-5">
            <h3 class="programs-title text-center"><?=h($master->first_name);?> <?=h($master->last_name);?></h3>
            <small class="text-secondary"><?=h($master->position);?></small>
            <p class="text-left mt-3 mb-5"><?=h($master->description);?></p>
            <!--<a href="#" class="programs-show-all mt-3 mb-3 w-75 align-self-center">Бронировать</a>-->
        </div>
        <div class="col-xl-6 video-wrapper my-5">
            <a href="https://www.youtube.com/embed/<?=$category->video;?>-XI?autoplay=1" class="b-video js-iframe" id="js-iframe">
                <img src="http://img.youtube.com/vi/<?=$category->video;?>-XI/maxresdefault.jpg" alt="" />
                <div class="b-play">
                    <!--<svg class="svg" width="21" height="29"><use xlink:href="./images/sprite.svg#play"></use></svg>-->
                    <img class="svg" src="images/play_pn.png">
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 course-image-center text-center">
            <img src="./images/invite-bg.jpg" alt="">
            <div class="text-image-center">
                <h2>Ты будешь проходить обучение в действующем салоне
                    и сможешь  прочувствовать атмосферу рабочего процесса</h2>
                <!--<a href="#" class="btn btn-outline-light text-image-center-btn">Бронировать</a>-->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 head-title text-center text-justify programs-title rob-nash-title">
            всего за несколько дней вы сможете начать свой путь мастера
        </div>
    </div>
    <?php if (!empty($courses_kind)): ?>
        <?php foreach ($courses_kind as $course_kind): ?>
            <div class="row my-3">
                <div class="col-12">
                    <h3 class="text-center title-sub-category"><?=h($course_kind->name);?></h3>
                </div>
            </div>
            <?php if (!empty($courses_type)): ?>
                <div class="row">
                    <?php foreach ($courses_type as $course_type): ?>
                        <?php if ($course_type->kind_id == $course_kind->id): ?>

                            <div class="col-lg-6 mt-3 mb-2">
                                <h4 class="text-center programs-title mb-3 course-title"><?=h($course_type->name);?></h4>
<!--                                <small class="text-secondary text-center w-100 d-block">-->
<!--                                </small>-->
                                <textarea class="w-100 mt-3 course-textarea">
                                                1 деньОриентирован на то, чтобы изучить теоретические основы и базовые навыки для работы
                                                10.00 – 10.15 – Знакомство. Представление школы и внутреннего распорядка
                                                10.15 – 12.30 – Теоретическая часть
                                                дезинфекция и стерилизация в кабинете маникюра (руки клиента, руки мастера, поверхности, инструменты, обзор оборудования и средств)
                                                внешний вид мастера
                                                анатомия и строение ногтей и кожи
                                                придание правильной формы ногтей
                                                правила поведения мастера в коллективе и с клиентом
                                                виды инструментов
                                                виды маникюра

                                                12.30 – 13.00 – Перерыв на кофе
                                                13.00 – 16.00 – отработка практических навыков на модели

                                                классический обрезной маникюр
                                                парафинотерапия

                                                16.00 – 16.30 – Завершение, работа с вопросами

                                                2 деньНарабатывания практических навыков и отработка на моделях
                                                10.00 – 10.15 – Подготовка класса и демонстрация преподавателем правильной обработки инструментов. Короткое тестирования студентов по теории
                                                10.15 – 12.30 – Встреча клиента. Выполнение классического маникюра с покрытием гель-лаком
                                                12.30 – 15.00 – Встреча клиента. Выполнение европейского маникюра с покрытием гель-лаком
                                                15.00 – 17.30 - Отработка практических навыков в технике комбинированный маникюр с покрытием гель-лаком
                                                17.30 – 18.00 – Итоги работы. При успешной сдачи экзаменационной работы – вручение сертификата. Фотосетdsfsdfsdfsd
                                                Ученикам с собой иметь:*
                                                пушер
                                                asdasd
                                                кусачки
                                                блокнот и ручку
                                                sfdsf
                                                sdfsd
                                                sdfs
                                            </textarea>
                                <p class="course-price text-center"><?=h($course_type->price);?> грн</p>
                                <button type="button" class="programs-show-all course-btn" data-toggle="modal" data-target="#exampleModalCenter<?=h($course_type->id);?>">Посмотреть даты</button>
                                <div class="modal fade" id="exampleModalCenter<?=h($course_type->name);?>"
                                     tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="padding: 0">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <div class="w-100 d-flex flex-column align-items-center">
                                                    <p class="text-secondary">Ближайшие курсы по программе</p>
                                                    <h5 class="modal-title programs-title">«БАЗОВЫЙ»</h5>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body w-100">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col" class="table-item-delete">#</th>
                                                                    <th scope="col">Дата</th>
                                                                    <th scope="col" class="table-item-delete">Мастер</th>
                                                                    <th scope="col">Места</th>
                                                                    <th scope="col" class="table-item-delete">Цена</th>
                                                                    <th scope="col">Бронировать</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row" class="table-item-delete">1</th>
                                                                    <td>05.10.2018 - 10.10.2018</td>
                                                                    <td class="table-item-delete">Маргарита Коваль</td>
                                                                    <td>1/3</td>
                                                                    <td class="table-item-delete">4500грн</td>
                                                                    <td>
                                                                        <a href="" class="programs-show-all modal-btn"><i class="fa fa-plus-square" aria-hidden="true"></i><span class="modal-btn-text">Бронировать</span></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="table-item-delete">2</th>
                                                                    <td>05.10.2018 - 10.10.2018</td>
                                                                    <td class="table-item-delete">Маргарита Коваль</td>
                                                                    <td>1/3</td>
                                                                    <td class="table-item-delete">4500грн</td>
                                                                    <td>
                                                                        <a href="" class="programs-show-all modal-btn"><i class="fa fa-plus-square" aria-hidden="true"></i><span class="modal-btn-text">Бронировать</span></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="table-item-delete">3</th>
                                                                    <td>05.10.2018 - 10.10.2018</td>
                                                                    <td class="table-item-delete">Маргарита Коваль</td>
                                                                    <td>1/3</td>
                                                                    <td class="table-item-delete">4500грн</td>
                                                                    <td>
                                                                        <a href="" class="programs-show-all modal-btn"><i class="fa fa-plus-square" aria-hidden="true"></i><span class="modal-btn-text">Бронировать</span></a>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="horizontal-line">
                <div class="row">
                    <div class="col-4">
                        <div class="horizontal-line-left"></div>
                    </div>
                    <div class="col-4">
                        <div class="horizontal-line-text horizontal-line-text-md">ближайшие курсы</div>
                    </div>
                    <div class="col-4">
                        <div class="horizontal-line-right"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12 carousel-course">
            <div class="owl-carousel-nearest-courses owl-carousel" id="nearest">
                <div class="nearest">
                    <div class="nearest-img">
                        <img src="./images/beauty-care.png" alt="image">
                    </div>
                    <h4 class="nearest-title">Как наносить правильно макияж</h4>
                    <small class="text-right d-block">07.01.2018</small>
                </div>
                <div class="nearest">
                    <div class="nearest-img">
                        <img src="./images/beauty-care.png" alt="image">
                    </div>
                    <h4 class="nearest-title">Как наносить правильно макияж</h4>
                    <small class="text-right d-block">07.01.2018</small>
                </div>
                <div class="nearest">
                    <div class="nearest-img">
                        <img src="./images/beauty-care.png" alt="image">
                    </div>
                    <h4 class="nearest-title">Как наносить правильно макияж</h4>
                    <small class="text-right d-block">07.01.2018</small>
                </div>
                <div class="nearest">
                    <div class="nearest-img">
                        <img src="./images/beauty-care.png" alt="image">
                    </div>
                    <h4 class="nearest-title">Как наносить правильно макияж</h4>
                    <small class="text-right d-block">07.01.2018</small>
                </div>
                <div class="nearest">
                    <div class="nearest-img">
                        <img src="./images/beauty-care.png" alt="image">
                    </div>
                    <h4 class="nearest-title">Как наносить правильно макияж</h4>
                    <small class="text-right d-block">07.01.2018</small>
                </div>
                <div class="nearest">
                    <div class="nearest-img">
                        <img src="./images/beauty-care.png" alt="image">
                    </div>
                    <h4 class="nearest-title">Как наносить правильно макияж</h4>
                    <small class="text-right d-block">07.01.2018</small>
                </div>
            </div>
        </div>
    </div>
    <div class="video-carousel">
        <div class="row">
            <div class="col-12">
                <div class="horizontal-line">
                    <div class="row">
                        <div class="col-4">
                            <div class="horizontal-line-left"></div>
                        </div>
                        <div class="col-4">
                            <div class="horizontal-line-text horizontal-line-text-md">Видеоотзывы</div>
                        </div>
                        <div class="col-4">
                            <div class="horizontal-line-right"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="carousel" class="carousel-video">
                    <a href="#">
                        <img src="https://i.ytimg.com/vi/IcrbM1l_BoI/hqdefault.jpg" alt="Image 1" />
                    </a>
                    <a href="#">
                        <img src="https://i.ytimg.com/vi/IcrbM1l_BoI/hqdefault.jpg" alt="Image 1" />
                    </a>
                    <a href="#">
                        <img src="https://i.ytimg.com/vi/IcrbM1l_BoI/hqdefault.jpg" alt="Image 1" />
                    </a>
                    <a href="#">
                        <img src="https://i.ytimg.com/vi/IcrbM1l_BoI/hqdefault.jpg" alt="Image 1" />
                    </a>
                    <a href="#">
                        <img src="https://i.ytimg.com/vi/IcrbM1l_BoI/hqdefault.jpg" alt="Image 1" />
                    </a>
                    <a href="#">
                        <img src="https://i.ytimg.com/vi/IcrbM1l_BoI/hqdefault.jpg" alt="Image 1" />
                    </a>
                    <a href="#">
                        <img src="https://i.ytimg.com/vi/IcrbM1l_BoI/hqdefault.jpg" alt="Image 1" />
                    </a>
                    <a href="#">
                        <img src="https://i.ytimg.com/vi/IcrbM1l_BoI/hqdefault.jpg" alt="Image 1" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>