<div class="container">
    <div class="row courses-banner">
        <div class="col-12">
            <div class="courses-logo">
                <img src="./images/photo_courses.jpg" alt="courser-logo">
<!--                <img src="images/IMG_7992.JPG" alt="courser-logo" style="height: 600px">-->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="horizontal-line">
                <div class="row">
                    <div class="col-4">
                        <div class="horizontal-line-left"></div>
                    </div>
                    <div class="col-4">
                        <div class="horizontal-line-text horizontal-line-text-md">Наши курсы</div>
                    </div>
                    <div class="col-4">
                        <div class="horizontal-line-right"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($categories)): ?>
    <div class="row courses-container">
        <?php foreach ($categories as $category): ?>
        <div class="col-lg-4 mb-3">
            <div class="card h-100">
                <a href="/category/<?=h($category->id);?>">
                    <img class="card-img-top" src="upload/<?=h($category->img_preview);?>" alt="<?=h($category->img_preview);?>">
                </a>
                <div class="card-body d-flex flex-column">
                    <div class="cart-info d-flex justify-content-between courses-cart-info">
<!--                        <p class="card-data">07.01.2018</p>-->
<!--                        <div>-->
<!--                            <i class="fa fa-comment"></i> 6-->
<!--                            <i class="fa fa-heart"></i> 221-->
<!--                        </div>-->
                    </div>
                    <h5 class="card-title text-center coursers-card-title"><?=h($category->name);?></h5>
                    <p class="course-little-desc flex-grow-1"><?=h($category->description);?></p>
                    <p class="course-price text-center"><?=h($category->price);?> грн</p>
                    <a href="/category/<?=h($category->id);?>" class="programs-show-all course-btn">Подробнее</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
<!--    <div class="row mt-4 mb-4">-->
<!--        <div class="col-12 text-center">-->
<!--            <a href="#" class="programs-title text-center courses-all-courses">Все курсы</a>-->
<!--        </div>-->
<!--    </div>-->
</div>