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
    <?php if (!empty($master)): ?>
        <div class="row py-4">
            <div class="col-xl-6 text-center d-flex flex-column my-5">
                <h3 class="programs-title text-center"><?=h($master->first_name);?> <?=h($master->last_name);?></h3>
                <small class="text-secondary"><?=h($master->position);?></small>
                <p class="mt-3 mb-5"><?=h($master->description);?></p>
                <!--<a href="#" class="programs-show-all mt-3 mb-3 w-75 align-self-center">Бронировать</a>-->
            </div>
            <div class="col-xl-6 video-wrapper d-flex flex-column justify-content-center my-5">
                <a href="https://www.youtube.com/embed/<?=$category->video;?>-XI?autoplay=1" class="b-video js-iframe" id="js-iframe">
                    <img src="http://img.youtube.com/vi/<?=$category->video;?>-XI/maxresdefault.jpg" alt="" />
                    <div class="b-play">
                        <!--<svg class="svg" width="21" height="29"><use xlink:href="./images/sprite.svg#play"></use></svg>-->
                        <img class="svg" src="images/play_pn.png">
                    </div>
                </a>
            </div>
        </div>
    <?php endif; ?>
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
                                <textarea class="w-100 mt-3 course-textarea"><?=h($course_type->description);?></textarea>
                                <p class="course-price text-center"><?=h($course_type->price);?> грн</p>
                                <button type="button" class="programs-show-all course-btn" data-toggle="modal" data-target="#exampleModalCenter<?=h($course_type->id);?>">Посмотреть даты</button>
                                <div class="modal fade" id="exampleModalCenter<?=h($course_type->id);?>"
                                     tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle<?=h($course_type->id);?>" aria-hidden="true" style="padding: 0">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <div class="w-100 d-flex flex-column align-items-center">
                                                    <p class="text-secondary">Ближайшие курсы по программе</p>
                                                    <h5 class="modal-title programs-title">«<?=h($course_type->name);?>»</h5>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body w-100">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <?php if (!empty($courses)): ?>
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
                                                                        <?php $i = 1;?>
                                                                        <?php foreach ($courses as $key => $course): ?>
                                                                            <?php if ($course['type_id'] == $course_type->id): ?>
                                                                                <tr>
                                                                                    <th scope="row" class="table-item-delete"><?=$i;?></th>
                                                                                    <td><?=h(dateFormat($course['date_start']));?> - <?=h(dateFormat($course['date_end']));?></td>
                                                                                    <td class="table-item-delete"><?=h($course['first_name']);?> <?=h($course['last_name']);?></td>
                                                                                    <td><?=h($course['sits']);?>/<?=h($course['limit_sits']);?></td>
                                                                                    <td class="table-item-delete"><?=h($course_type->price);?>грн</td>
                                                                                    <td>
                                                                                        <a href="" class="programs-show-all modal-btn"><i class="fa fa-plus-square" aria-hidden="true"></i><span class="modal-btn-text">Бронировать</span></a>
                                                                                    </td>
                                                                                </tr>
                                                                                <?php $i++?>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; ?>
                                                                    </tbody>
                                                                </table>
                                                            <?php endif; ?>
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
    <?php if (!empty($nearest_courses)): ?>
        <div class="row mb-4">
            <div class="col-12 carousel-course">
                <div class="owl-carousel-nearest-courses owl-carousel" id="nearest">
                    <?php foreach ($nearest_courses as $nearest_course):?>
                        <div class="nearest">
                            <div class="nearest-img">
                                <img src="images/<?=h($nearest_course['img']);?>" alt="image">
                            </div>
                            <h4 class="nearest-title"><?=h($nearest_course['name']);?></h4>
                            <small class="text-right d-block"><?=h(dateFormat($nearest_course['date_start']));?></small>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
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
    </div>
    <?php if (!empty($video_reviews)): ?>
        <div class="row">
            <div class="col-12">
                <div id="carousel" class="carousel-video">
                    <?php foreach ($video_reviews as $video_review):?>
                        <a href="#">
                            <img src="https://i.ytimg.com/vi/<?=h($video_review->url);?>/hqdefault.jpg" alt="<?=h($video_review->url);?>" />
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>