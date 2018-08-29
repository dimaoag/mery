<section class="content-header">
    <h1>Добавить видеоотзыв</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/category"><i class="fa fa-dashboard"></i>Категории курсов</a></li>
        <li class="active">Добавить видеоотзыв</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN?>/category/video-review-add" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="url">Ссылка на видео</label>
                            <input type="text" class="form-control" name="url" id="url"
                                   data-error="Minimum of 3 chars" data-minlength="3"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="status">Статус</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Показывать</option>
                                <option value="0">Непоказывать</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?=$category->id;?>">
                        <button type="submit" class="btn btn-success">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>