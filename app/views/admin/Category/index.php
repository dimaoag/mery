<section class="content-header">
    <h1>Категории курсов</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/category"><i class="fa fa-dashboard"></i>Категории курсов</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
                    <a href="<?=ADMIN?>/category/add" class="btn btn-success">Добавить новую категорию курсов</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Фото</th>
                                <th>Название</th>
                                <th>Раздел меню</th>
                                <th>Мастер</th>
                                <th>Статус</th>
                                <th>Галерея с фото</th>
                                <th>Видеоотзовы</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($categories as $category):?>
                                <tr>
                                    <td>
                                        <img style="max-width: 50px" src="/upload/<?=$category['img_preview'];?>" alt="">
                                    </td>
                                    <td><?=$category['name'];?></td>
                                    <td><?=$category['menu_name'];?></td>
                                    <td>
                                        <?php if (!empty($masters)): ?>
                                            <?php foreach ($masters as $master): ?>
                                                <?php  if ($master->category_id == $category['id']):?>
                                                    <?=$master->first_name . ' ' . $master->last_name;?>
                                                <?php  endif;?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $category['status'] ? 'Показывать' : 'Не показывать';?></td>
                                    <td>
                                        <a href="<?=ADMIN?>/gallery?id=<?=$category['id'];?>" class="btn btn-xs">Галерея</a>
                                    </td>
                                    <td>
                                        <a href="<?=ADMIN?>/category/video-reviews?id=<?=$category['id'];?>" class="btn btn-xs">Видеоотзовы</a>
                                    </td>
                                    <td>
                                        <a href="<?=ADMIN?>/category/edit?id=<?=$category['id'];?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                        <a href="<?=ADMIN?>/category/delete?id=<?=$category['id'];?>">
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

