<section class="content-header">
    <h1>Отзыв <?= $review->id;?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/review"><i class="fa fa-dashboard"></i>Отзывы</a></li>
        <li class="active">Отзыв <?= $review->id;?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN?>/review/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <input type="hidden" name="user_id" value="<?= $review->user_id;?>">
                        <div class="form-group has-feedback">
                            <label for="text">Текст</label>
                            <input type="text" class="form-control" name="text" id="text"
                                   value="<?=h($review->text)?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="status">Статус</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="0" <?php if ($review->status == '0') echo ' selected';?>>Непоказывать</option>
                                <option value="1" <?php if ($review->status == '1') echo ' selected';?>>Показывать</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?= $review->id;?>">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>