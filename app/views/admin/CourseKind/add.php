<section class="content-header">
    <h1>Добавить новый вид курсов</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/course-kind"><i class="fa fa-dashboard"></i>Виды курсов</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <form action="<?=ADMIN?>/course-kind/add" method="post" data-toggle="validator">
                    <div class="box-body">
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
                            <label for="name">Название</label>
                            <input type="text" class="form-control" name="name" id="name"
                                   data-error="Minimum of 3 chars" data-minlength="3"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>