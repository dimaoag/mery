<section class="content-header">
    <h1>Назначить новою дату на курс</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/course"><i class="fa fa-dashboard"></i>Все даты курсов</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="register-main">
                        <div class="col-md-6 account-left">
                            <form method="post" action="<?=ADMIN?>/course/add" data-toggle="validator" role="form" autocomplete="off">
                                <div class="form-group has-feedback">
                                    <label for="date_start">Дата начала курса</label>
                                    <input type="text" name="date_start" class="form-control datepicker" id="date_start"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="date_end">Дата конца курса</label>
                                    <input type="text" name="date_end" class="form-control datepicker" id="date_end"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="category_id">Категория курсов</label>
                                    <select class="form-control" id="category_id" name="category_id" required>
                                        <option value="">Выберите категорию курсов</option>
                                        <?php if (!empty($categories)): ?>
                                            <?php foreach ($categories as $category):?>
                                                <option value="<?=$category->id?>"><?=$category->name?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="kind_id">Вид курса</label>
                                    <select class="form-control select_kind" id="kind_id" name="kind_id" required>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="type_id">Тип курса</label>
                                    <select class="form-control select_type" id="type_id" name="type_id" required>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="master_id">Мастер</label>
                                    <select class="form-control" id="master_id" name="master_id" required>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="name">Название</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Название"
                                           data-error="Minimum of 4 chars" data-minlength="4"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="limit_sits">Количество мест</label>
                                    <input type="number" name="limit_sits" class="form-control" id="limit_sits"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="box box-info box-solid file-upload">
                                            <div class="box-header">
                                                <h3 class="box-title">Мини фото курса</h3>
                                            </div>
                                            <div class="box-body">
                                                <div id="course" class="btn btn-success" data-url="/course/add-image" data-name="course" data-act="add" data-id="0">
                                                    Выберите изображение
                                                </div>
                                                <p>
                                                    <small>
                                                        Recommended size:
                                                        <?=\mery\App::$app->getProperty('course_with'); ?>
                                                        x
                                                        <?=\mery\App::$app->getProperty('course_height'); ?>
                                                    </small>
                                                </p>
                                                <div class="course"></div>
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

