<section class="content-header">
    <h1>Редактировать <?=$course_type[0]['name'];?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/course-type"><i class="fa fa-dashboard"></i>Типы курса</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <form action="<?=ADMIN?>/course-type/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="category_id">Категория курса</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="<?=$course_type[0]['category_id'];?>" selected><?=$course_type[0]['cat_name'];?></option>
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="kind_id_1">Вид курса</label>
                            <select class="form-control" id="kind_id_1" name="kind_id" required>
                                <option value="">Выберите вид курса</option>
                                <?php if (!empty($kinds)): ?>
                                    <?php foreach ($kinds as $kind):?>
                                        <?php if ($kind->id == $course_type[0]['kind_id']): ?>
                                            <option value="<?=$kind->id?>" selected><?=$kind->name?></option>
                                        <?php else: ?>
                                            <option value="<?=$kind->id?>"><?=$kind->name?></option>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name">Название</label>
                            <input type="text" class="form-control" name="name" id="name"
                                   data-error="Minimum of 3 chars" data-minlength="3"
                                   value="<?=$course_type[0]['name'];?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="price">Цена</label>
                            <input type="text" name="price" class="form-control" id="price"
                                   value="<?=$course_type[0]['price'];?>"
                                   pattern="^[0-9.]{1,}$"
                                   data-error="Only numbers and dot"
                                   required>
                            <!-- От начала до кокца строки принимаеи только цыфри и точка, и один и больше символов -->
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="editor1">Описание</label>
                            <textarea name="description" id="editor1" cols="30" rows="10" class="form-control">
                                <?=$course_type[0]['description'];?>
                            </textarea>
                        </div>
                        <input type="hidden" name="id" value="<?=$course_type[0]['id'];?>">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>