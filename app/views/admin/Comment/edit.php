<section class="content-header">
    <h1>Изменения комментария</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/article"><i class="fa fa-dashboard"></i>Все статьи</a></li>
        <li><a href="<?=ADMIN?>/comment/views?id=<?=$comment->article_id;?>"><i class="fa fa-dashboard"></i>Все комментарии</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="register-main">
                        <div class="col-md-6 account-left">
                            <form method="post" action="<?=ADMIN?>/comment/edit" data-toggle="validator" role="form">
                                <div class="form-group has-feedback">
                                    <label for="text">Текст</label>
                                    <input type="text" name="text" class="form-control" id="text"
                                           value="<?=$comment->text;?>"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="status">Статус</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="0" <?= $comment->status == '0' ? 'selected' : '';?>>Не показывать</option>
                                        <option value="1" <?= $comment->status == '1' ? 'selected' : '';?>>Показывать</option>
                                    </select>
                                </div>
                                <input type="hidden" name="id" value="<?=$comment->id;?>">
                                <div class="form-group">
                                    <!--                                    <div class="box-footer">-->
                                    <button type="submit" class="btn btn-block btn-success">Сохранить изменения</button>
                                    <!--                                    </div>-->
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
