<section class="content-header">
    <h1>Добавить новый тип курса</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/course-type"><i class="fa fa-dashboard"></i>Типы курса</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <form action="<?=ADMIN?>/course-type/add" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="category_id">Категория курса</label>
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
                            <select class="form-control" id="kind_id" name="kind_id" required>
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
                        <div class="form-group has-feedback">
                            <label for="price">Цена</label>
                            <input type="text" name="price" class="form-control" id="price"
                                   pattern="^[0-9.]{1,}$"
                                   data-error="Only numbers and dot"
                                   required>
                            <!-- От начала до кокца строки принимаеи только цыфри и точка, и один и больше символов -->
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="editor1">Описание</label>
                            <textarea name="description" id="editor1" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
