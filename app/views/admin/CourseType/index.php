<section class="content-header">
    <h1>Типы курса</h1>
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
                    <a href="<?=ADMIN?>/course-type/add" class="btn btn-success">Добавить новый тип курса</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Категория</th>
                                <th>Вид курса</th>
                                <th>Цена</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($type_courses as $type_course):?>
                                <tr>
                                    <td><?=$type_course['name'];?></td>
                                    <td><?=$type_course['cat_name'];?></td>
                                    <td><?=$type_course['kind_name'];?></td>
                                    <td><?=$type_course['price'];?></td>
                                    <td>
                                        <a href="<?=ADMIN?>/course-type/edit?id=<?=$type_course['id'];?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                        <a href="<?=ADMIN?>/course-type/delete?id=<?=$type_course['id'];?>">
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