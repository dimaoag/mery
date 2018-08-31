<section class="content-header">
    <h1>Изменить данные по мастеру <?=$master->first_name;?> <?=$master->last_name;?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/master"><i class="fa fa-dashboard"></i>Все мастера</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="box">
                <form action="<?=ADMIN?>/master/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="first_name">Имя</label>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                   data-error="Minimum of 3 chars" data-minlength="3"
                                   value="<?=$master->first_name;?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="last_name">Фамилия</label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                   data-error="Minimum of 3 chars" data-minlength="3"
                                   value="<?=$master->last_name;?>"
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
                                        <?php if ($category->id == $master->category_id): ?>
                                            <option value="<?=$category->id;?>" selected><?=$category->name;?></option>
                                        <?php else: ?>
                                            <option value="<?=$category->id;?>"><?=$category->name;?></option>
                                        <?php endif; ?>
                                        
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="position">Посада</label>
                            <input type="text" class="form-control" name="position" id="position"
                                   data-error="Minimum of 3 chars" data-minlength="2"
                                   value="<?=$master->position;?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="video">Ссылка на видео</label>
                            <input type="text" class="form-control" name="video" id="video"
                                   value="<?=$master->video;?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                            <div>
                                <iframe width="420" height="315"
                                        src="https://www.youtube.com/embed/<?=$master->video;?>?controls=1">
                                </iframe>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="description">Описание мастера</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" required><?=$master->description;?></textarea>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <input type="hidden" name="id" value="<?=$master->id;?>">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>