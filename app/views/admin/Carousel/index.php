<section class="content-header">
    <h1>Карусель на главном экране</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/carousel"><i class="fa fa-dashboard"></i>Назад</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <a href="<?=ADMIN?>/carousel/add" class="btn btn-success">Загрузить новое фото</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Фото</th>
                                <th>Категория</th>
                                <th>Статус</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($images)): ?>
                                <?php foreach ($images as $key => $image):?>
                                    <tr>
                                        <td>
                                            <img style="width: 100px" src="../upload/<?=$image['src'];?>" alt="<?=$image['src'];?>">
                                        </td>
                                        <td><?=$image['name'];?></td>
                                        <?php $statuses = getStatusCarousel();?>
                                        <td><?=$statuses[$image['status']];?></td>
                                        <td>
                                            <a href="<?=ADMIN?>/carousel/delete?id=<?=$image['id'];?>">
                                                <i class="fa fa-fw fa-trash delete text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif; ?>
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
