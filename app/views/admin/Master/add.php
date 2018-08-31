<section class="content-header">
    <h1>Добавить нового мастера</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/master"><i class="fa fa-dashboard"></i>Все мастера</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="box">
                <form action="<?=ADMIN?>/master/add" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="first_name">Имя</label>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                   data-error="Minimum of 3 chars" data-minlength="3"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="last_name">Фамилия</label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                   data-error="Minimum of 3 chars" data-minlength="3"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="category_id">Категория курса</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Выберите категорию</option>
                                <?php if (!empty($categories)):?>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?=$category->id;?>"><?=$category->name;?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="position">Посада</label>
                            <input type="text" class="form-control" name="position" id="position"
                                   data-error="Minimum of 3 chars" data-minlength="2"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="video">Ссылка на видео</label>
                            <input type="text" class="form-control" name="video" id="video"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="description">Описание мастера</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
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