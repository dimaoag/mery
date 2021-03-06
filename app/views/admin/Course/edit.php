<section class="content-header">
    <h1>Изменить <?=$course[0]['name'];?></h1>
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
                            <form method="post" action="<?=ADMIN?>/course/edit" data-toggle="validator" role="form" autocomplete="off">
                                <div class="form-group has-feedback">
                                    <label for="date_start">Дата начала курса</label>
                                    <input type="text" name="date_start" class="form-control datepicker" id="date_start"
                                           value="<?=$course[0]['date_start'];?>"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="date_end">Дата конца курса</label>
                                    <input type="text" name="date_end" class="form-control datepicker" id="date_end"
                                           value="<?=$course[0]['date_end'];?>"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="category_id">Категория курсов</label>
                                    <select class="form-control" id="category_id" name="category_id" required>
                                        <option value="<?=$course[0]['category_id']?>" selected><?=$course[0]['cat_name']?></option>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="kind_id">Вид курса</label>
                                    <select class="form-control select_kind" id="kind_id" name="kind_id" required>
                                        <option value="<?=$course[0]['kind_id']?>" selected><?=$course[0]['kind_name']?></option>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="type_id">Тип курса</label>
                                    <select class="form-control select_type" id="type_id" name="type_id" required>
                                        <option value="<?=$course[0]['type_id']?>" selected><?=$course[0]['type_name']?></option>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="master_id">Мастер</label>
                                    <select class="form-control" id="master_id" name="master_id" required>
                                        <option value="<?=$course[0]['master_id']?>" selected><?=$course[0]['first_name']?> <?=$course[0]['first_name']?></option>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="name">Название</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Название"
                                           data-error="Minimum of 4 chars" data-minlength="4"
                                           value="<?=$course[0]['name'];?>"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="limit_sits">Количество мест</label>
                                    <input type="number" name="limit_sits" class="form-control" id="limit_sits"
                                           value="<?=$course[0]['limit_sits'];?>"
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
                                                <div id="course" class="btn btn-success" data-url="/course/add-image" data-name="course" data-act="edit" data-id="<?=$course[0]['id'];?>">
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
                                                <div class="course">
                                                    <img src="/upload/<?=$course[0]['img'];?>" alt="image" class="img-course del-img-course"
                                                         data-type="course" data-id="<?=$course[0]['id'];?>" data-src="<?=$course[0]['img'];?>"
                                                         style="width: 150px">
                                                </div>
                                            </div>
                                            <div class="overlay">
                                                <i class="fa fa-refresh fa-spin"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group has-feedback">
                                    <label for="status">Статус</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <?php $corseStatuses = getStatusCourse(); ?>
                                        <?php if ($corseStatuses):?>
                                            <?php foreach ($corseStatuses as $key => $corseStatuse): ?>
                                                <?php if ($key == $course[0]['status']):?>
                                                    <option value="<?=$key?>" selected><?=$corseStatuse?></option>
                                                <?php else: ?>
                                                    <option value="<?=$key?>"><?=$corseStatuse?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <input type="hidden" name="id" value="<?=$course[0]['id'];?>">
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

