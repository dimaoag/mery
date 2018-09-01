<div class="container">
    <div class="row">
        <div class="col-12">
            <article class="article">
                <div class="article-img">
                    <img src="upload/<?=h($article->img);?>" alt="<?=h($article->img);?>">
                </div>
                <div class="article-title py-4 text-center">
                    <?=h($article->title);?>
                </div>
                <div class="article-text">
                    <?=$article->description?>
                </div>
            </article>
        </div>
    </div>
    <?php if (!empty($_SESSION['user'])): ?>
        <div class="row mt-4">
            <div class="col-12 d-flex">
                <p class="mt-1 mr-2">Оставте свой коментарий</p>
                <hr class="flex-grow-1">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="post" class="" id="comment_form">
                    <div class="form-group">
                        <textarea name="text" id="text_comment" rows="5" cols="140" placeholder="Введите техт" class="form-control"></textarea>
                    </div>
                    <input type="hidden" name="article_id" value="<?=$article->id?>">
                    <div class="form-group">
                        <input type="submit" class="btn btn-block course-btn review-btn" value="Оставить коментарий">
                    </div>
                </form>
                <span id="comment_message" class="d-block"></span>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">
            <div class="horizontal-line">
                <div class="row">
                    <div class="col-4">
                        <div class="horizontal-line-left"></div>
                    </div>
                    <div class="col-4">
                        <div class="horizontal-line-text horizontal-line-text-md">коментарии</div>
                    </div>
                    <div class="col-4">
                        <div class="horizontal-line-right"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="comments_container" id="comments_container">

    </div>
<!--    <div class="row">-->
<!--        <div class="col-12">-->
<!--            <div class="page-reviews-reviews d-flex">-->
<!--                <img src="./images/kurs_1.png" alt="">-->
<!--                <div class="page-reviews-info flex-grow-1 d-flex flex-column ml-3">-->
<!--                    <h5 class="programs-title">Ромаченко Ирина</h5>-->
<!--                    <small class="text-secondary">08.09.2018 16:51</small>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa eaque eum laborum omnis pariatur quod, voluptatum! A atque delectus dolores dolorum eaque eligendi enim exercitationem, fugit illo, quibusdam quis voluptate?</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row">-->
<!--        <div class="col-12">-->
<!--            <div class="page-reviews-reviews d-flex">-->
<!--                <img src="./images/no_avatar.jpg" alt="">-->
<!--                <div class="page-reviews-info flex-grow-1 d-flex flex-column ml-3">-->
<!--                    <h5 class="programs-title">Ромаченко Ирина</h5>-->
<!--                    <small class="text-secondary">08.09.2018 16:51</small>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa eaque eum laborum omnis pariatur quod, voluptatum! A atque delectus dolores dolorum eaque eligendi enim exercitationem, fugit illo, quibusdam quis voluptate?</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row">-->
<!--        <div class="col-12">-->
<!--            <div class="page-reviews-reviews d-flex">-->
<!--                <img src="./images/no_avatar.jpg" alt="">-->
<!--                <div class="page-reviews-info flex-grow-1 d-flex flex-column ml-3">-->
<!--                    <h5 class="programs-title">Ромаченко Ирина</h5>-->
<!--                    <small class="text-secondary">08.09.2018 16:51</small>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa eaque eum laborum omnis pariatur quod, voluptatum! A atque delectus dolores dolorum eaque eligendi enim exercitationem, fugit illo, quibusdam quis voluptate?</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</div>