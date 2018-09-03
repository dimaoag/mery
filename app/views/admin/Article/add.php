<section class="content-header">
    <h1>Добавить новую статью</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/article"><i class="fa fa-dashboard"></i>Все статьи</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="register-main">
                        <div class="col-md-6 account-left">
                            <form method="post" action="<?=ADMIN?>/article/add" data-toggle="validator" role="form">
                                <div class="form-group has-feedback">
                                    <label for="name">Название</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Название статьи"
                                           data-error="Minimum of 4 chars" data-minlength="4"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="editor1">Описание</label>
                                    <textarea name="description" id="editor1" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="box box-info box-solid file-upload">
                                            <div class="box-header">
                                                <h3 class="box-title">Фото статьи</h3>
                                            </div>
                                            <div class="box-body">
                                                <div id="article" class="btn btn-success" data-url="/article/add-image" data-name="article" data-act="add" data-id="0">
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
                                                <div class="article"></div>
                                            </div>
                                            <div class="overlay">
                                                <i class="fa fa-refresh fa-spin"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <!--                                    <div class="box-footer">-->
                                    <button type="submit" class="btn btn-block btn-success">Сохранить</button>
                                    <!--                                    </div>-->
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

