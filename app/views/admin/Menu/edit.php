<section class="content-header">
    <h1><?=$menuItem->name?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/menu"><i class="fa fa-dashboard"></i>Меню</a></li>
        <li class="active"><?=$menuItem->name?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN?>/menu/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="name">Название</label>
                            <input type="text" class="form-control" name="name" id="name"
                                   value="<?=h($menuItem->name)?>"
                                   data-error="Minimum of 3 chars" data-minlength="3"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <input type="hidden" name="is_child" value="<?=$menuItem->is_child?>">
                        <div class="form-group has-feedback">
                            <label for="status">Статус</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="0" <?php if ($menuItem->status == '0') echo ' selected';?>>Непоказывать</option>
                                <option value="1" <?php if ($menuItem->status == '1') echo ' selected';?>>Показывать</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?=$menuItem->id?>">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>