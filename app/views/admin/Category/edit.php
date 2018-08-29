<section class="content-header">
    <h1>Изменения категории <?=$category->name;?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/category">Все категории курсов</a></li>
        <li class="active"><?=$category->name;?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="register-main">
                        <div class="col-md-6 account-left">
                            <form method="post" action="<?=ADMIN?>/category/edit" data-toggle="validator" role="form">
                                <div class="form-group has-feedback">
                                    <label for="name">Название</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Название"
                                           data-error="Minimum of 4 chars" data-minlength="4"
                                           value="<?=$category->name;?>"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="price">Цена от</label>
                                    <input type="text" name="price" class="form-control" id="price"
                                           value="<?=$category->price;?>"
                                           pattern="^[0-9.]{1,}$"
                                           data-error="Only numbers and dot"
                                           required>
                                    <!-- От начала до кокца строки принимаеи только цыфри и точка, и один и больше символов -->
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <h4 class="text-danger">Фото баннера и мини фото курса менять одновремено!</h4>
                                    <div class="col-md-6">
                                        <div class="box box-danger box-solid file-upload">
                                            <div class="box-header">
                                                <h3 class="box-title">Баннер</h3>
                                            </div>
                                            <div class="box-body">
                                                <div id="banner" class="btn btn-success" data-url="/category/add-image" data-name="banner">
                                                    Выберите изображение
                                                </div>
                                                <p>
                                                    <small>
                                                        Recommended size:
                                                        <?=\mery\App::$app->getProperty('banner_width'); ?>
                                                        x
                                                        <?=\mery\App::$app->getProperty('banner_height'); ?>
                                                    </small>
                                                </p>
                                                <div class="banner">
                                                    <img src="/upload/<?=$category->banner;?>" alt="image" class="img-banner del-img"
                                                         data-type="banner" data-id="<?=$category->id;?>" data-src="<?=$category->banner;?>"
                                                    style="width: 150px">
                                                </div>
                                            </div>
                                            <div class="overlay">
                                                <i class="fa fa-refresh fa-spin"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box box-info box-solid file-upload">
                                            <div class="box-header">
                                                <h3 class="box-title">Мини фото курса</h3>
                                            </div>
                                            <div class="box-body">
                                                <div id="profile" class="btn btn-success" data-url="/category/add-image" data-name="profile">
                                                    Выберите изображение
                                                </div>
                                                <p>
                                                    <small>
                                                        Recommended size:
                                                        <?=\mery\App::$app->getProperty('preview_width'); ?>
                                                        x
                                                        <?=\mery\App::$app->getProperty('preview_height'); ?>
                                                    </small>
                                                </p>
                                                <div class="profile">
                                                    <img src="/upload/<?=$category->img_preview;?>" alt="image" class="img-profile del-img"
                                                         data-type="profile" data-id="<?=$category->id;?>" data-src="<?=$category->img_preview;?>"
                                                         style="width: 150px">
                                                </div>
                                            </div>
                                            <div class="overlay">
                                                <i class="fa fa-refresh fa-spin"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="box box-primary box-solid file-upload">
                                            <div class="box-header">
                                                <h3 class="box-title">Галерея с изображениями работ</h3>
                                            </div>
                                            <div class="box-body">
                                                <div id="gallery" class="btn btn-success" data-url="/category/add-image" data-name="gallery">
                                                    Выберите изображение
                                                </div>
                                                <p>
                                                    <small>
                                                        Recommended size:
                                                        <?=\mery\App::$app->getProperty('gallery_with'); ?>
                                                        x
                                                        <?=\mery\App::$app->getProperty('gallery_height'); ?>
                                                    </small>
                                                </p>
                                                <div class="gallery">
                                                    <?php if (!empty($gallery)):?>
                                                        <?php foreach ($gallery as $item): ?>
                                                            <img src="/upload/<?=$item;?>" alt="image" class="img-gallery del-img"
                                                                 data-id="<?=$category->id;?>" data-src="<?=$item;?>" data-type="gallery"
                                                            style="margin: 5px">
                                                        <?php  endforeach;?>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                            <div class="overlay">
                                                <i class="fa fa-refresh fa-spin"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <input type="hidden" name="id" value="<?=$category->id;?>">
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="status" <?= $category->status ? ' checked' : null; ?>> Показывать
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--                                    <div class="box-footer">-->
                                    <button type="submit" class="btn btn-block btn-success">Сохранить изменения</button>
                                    <!--                                    </div>-->
                                </div>
                            </form>
                            <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
