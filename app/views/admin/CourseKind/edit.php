<section class="content-header">
    <h1>Изменить вид </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/course-kind"><i class="fa fa-dashboard"></i>Виды курсов</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <form action="<?=ADMIN?>/course-kind/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="category_id">Категория курсов</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">Выберите категорию курсов</option>
                                <?php if (!empty($categories)): ?>
                                    <?php foreach ($categories as $category):?>
                                        <?php if ($category->id == $course_kind->category_id): ?>
                                            <option value="<?=$category->id?>" selected><?=$category->name?></option>
                                        <?php else: ?>
                                            <option value="<?=$category->id?>"><?=$category->name?></option>
                                        <?php  endif;?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name">Название</label>
                            <input type="text" class="form-control" name="name" id="name"
                                   data-error="Minimum of 3 chars" data-minlength="3"
                                   value="<?=$course_kind->name;?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <input type="hidden" name="id" value="<?=$course_kind->id;?>">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>