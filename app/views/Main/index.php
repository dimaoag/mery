<div class="container">
    <div class="row">
        <div class="col-xl-8">
            <?php if (!empty($carousel)): ?>
                <div class="slider">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel">
                            <?php $i = 1;?>
                            <?php foreach ($carousel as $key => $src): ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?=$key;?>" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?=$key;?>"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?=$key;?>"></li>
                            <?php endforeach; ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php foreach ($carousel as $item): ?>
                                <div class="carousel-item <?= ($i==1) ? ' active' : '' ?>">
                                    <a href="/category/<?=$item->category_id;?>">
                                        <img class="d-block w-100" src="upload/<?=$item->src;?>" alt="">
                                    </a>
                                </div>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php if (!empty($nearest_courses)): ?>
            <div class="col-xl-4">
            <div class="programs">
                <h2 class="programs-title text-center">Ближайшие програмы</h2>
                <ul>
                    <?php foreach ($nearest_courses as $nearest_course): ?>
                        <li>
                            <div class="programs-date">
                                <h4><?=echoDay($nearest_course['date_start']);?><br><span><?=echoMonth($nearest_course['date_start']);?></span></h4>
                            </div>
                            <a href="#" class="programs-text">
                                <h5><b><?=h($nearest_course['name']);?></b></h5>
                                <p>
                                    <small><?=dateFormat($nearest_course['date_start'], '.');?> - <?=dateFormat($nearest_course['date_end'], '.');?></small>
                                </p>
                                <p>
                                    <small>Количество мест: <?=h($nearest_course['sits']);?>/<?=h($nearest_course['limit_sits']);?></small>
                                </p>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a href="<?=PATH;?>/courses">
                    <h2 class="programs-show-all text-center mt-2">Ближайшие програмы</h2>
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="horizontal-line">
        <div class="row">
            <div class="col-4">
                <div class="horizontal-line-left"></div>
            </div>
            <div class="col-4">
                <div class="horizontal-line-text horizontal-line-text-md">Популярные статьи</div>
            </div>
            <div class="col-4">
                <div class="horizontal-line-right"></div>
            </div>
        </div>
    </div>
    <article>
        <?php if (!empty($articles)): ?>
        <div class="row">
            <?php foreach ($articles as $article): ?>
                <div class="col-md-4">
                    <div class="card">
                        <a href="#">
                            <img class="card-img-top" src="upload/<?= h($article->img); ?>" alt="<?= h($article->img); ?>">
                        </a>
                        <div class="card-body index-card-body">
                            <h5 class="card-title index-card-title"><?= h($article->title); ?></h5>
                            <div class="cart-info d-flex justify-content-between">
                                <p class="card-data"><?= echoDate($article->created_at); ?></p>
                                <div>
                                    <i class="fa fa-comment"></i> <?= h($article->comments); ?>
                                    <i class="fa fa-heart"></i> <?= h($article->likes); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </article>
    <div class="horizontal-line">
        <div class="row">
            <div class="col-4">
                <div class="horizontal-line-left"></div>
            </div>
            <div class="col-4">
                <div class="horizontal-line-text horizontal-line-text-md">Видеоуроки</div>
            </div>
            <div class="col-4">
                <div class="horizontal-line-right"></div>
            </div>
        </div>
    </div>
    <article>
        <?php if (!empty($videos)): ?>
            <div class="row">
                <?php foreach ($videos as $video): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <a href="/category/<?= h($video->category_id);?>">
                                <img src="https://i.ytimg.com/vi/<?= h($video->url);?>/hqdefault.jpg" alt="<?= h($video->url);?>" />
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"><?= h($video->title);?></h5>
                                <div class="cart-info d-flex justify-content-between">
                                    <p class="card-data"><?= echoDate($video->created_at); ?></p>
                                    <div>
                                        <i class="fa fa-comment"></i> <?= h($video->comments);?>
                                        <i class="fa fa-heart"></i> <?= h($video->likes);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12 text-center">
                <a href="/videos/">
                    <h5 class="all-video">Все видеоуроки</h5>
                </a>
            </div>
        </div>
    </article>
    <div class="horizontal-line">
        <div class="row">
            <div class="col-4">
                <div class="horizontal-line-left"></div>
            </div>
            <div class="col-4">
                <div class="horizontal-line-text horizontal-line-text-md">Отзывы</div>
            </div>
            <div class="col-4">
                <div class="horizontal-line-right"></div>
            </div>
        </div>
    </div>
    <section class="reviews-container">
        <div class="row">
            <div class="col-12 carousel-index">
                <?php if (!empty($reviews)): ?>
                    <div class="owl-carousel reviews owl-carousel-index">
                        <?php foreach ($reviews as $review): ?>
                            <div class="review">
                                <div class="review-img">
                                    <img src="upload/<?=$review['photo_profile'];?>" alt="<?=$review['photo_profile'];?>">
                                </div>
                                <div class="review-name"><?=h($review['first_name']) . h($review['last_name']);?></div>
                                <div class="row">
                                    <div class="col-8 offset-2">
                                        <div class="review-text"><?=h($review['text']);?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>
<section class="map-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="map" id="map"></div>
            </div>
        </div>
    </div>
</section>