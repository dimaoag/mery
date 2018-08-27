<section class="content-header">
    <h1>Создать новый пункт меню</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/menu"><i class="fa fa-dashboard"></i>Меню</a></li>
        <li class="active">Создать новый пункт меню</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN?>/menu/add" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="name">Название</label>
                            <input type="text" class="form-control" name="name" id="name"
                                   data-error="Minimum of 3 chars" data-minlength="3"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="status">Статус</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="1">Показывать</option>
                                <option value="0">Непоказывать</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>