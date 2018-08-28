<section class="content-header">
    <h1>Видеоотзыви по <?=$category->name;?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/category">Категории курсов</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
                    <a href="<?=ADMIN?>/category/add" class="btn btn-success">Добавить видеоотзыв в категорию курсов</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Видео</th>
                                <th>Название</th>
                                <th>Категория</th>
                                <th>Статус</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($reviews as $review):?>
                                <tr>
                                    <td>
                                        <img style="max-width: 70px" src="http://img.youtube.com/vi/<?=$review->url;?>/maxresdefault.jpg" alt="">
                                    </td>
                                    <td><?=$review->url;?></td>
                                    <td><?=$category->name;?></td>
                                    <td><?= $review->is_show ? 'Показывать' : 'Не показывать';?></td>
                                    <td>
                                        <a href="<?=ADMIN?>/category/video-delete?id=<?=$review->id;?>">
                                            <i class="fa fa-fw fa-trash delete text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

