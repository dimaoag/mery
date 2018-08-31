<section class="content-header">
    <h1>Виды курсов</h1>
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
                    <a href="<?=ADMIN?>/course-kind/add" class="btn btn-success">Добавить новый выд курсов</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Категория</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($kind_courses as $kind_course):?>
                                <tr>
                                    <td><?=$kind_course['name'];?></td>
                                    <td><?=$kind_course['cat_name'];?></td>
                                    <td>
                                        <a href="<?=ADMIN?>/course-kind/edit?id=<?=$kind_course['id'];?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                        <a href="<?=ADMIN?>/course-kind/delete?id=<?=$kind_course['id'];?>">
                                            <i class="fa fa-fw fa-trash delete text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-content">
                        <p><?=count($kind_courses);?> видов курс(ов) с <?=$count?></p>
                        <?php if ($pagination->getCountPages() > 1):?>
                            <?=$pagination?>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>