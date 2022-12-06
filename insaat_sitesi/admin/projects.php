<?php  

include 'config.php';


include 'functions.php';

loginControl();

/*if(isset($_GET['ID'])){
    $ID = cleanData($_GET['ID'], 1);
    $usersInfo = usersFindID($ID);

    if (isset($_POST['guncelle'])) {
        usersEdit($ID);
    }
}

$error = usersAdd();
print_r($error);

//print_r($_GET);
if ($_GET['func']=='Delete') {
    $ID = $_GET['ID'];

    usersDelete($ID); 
}*/


if(isset($_GET['ID'])){
    $ID = cleanData($_GET['ID'], 1);
    $ProjectsInfo = ProjectsFind($ID);
}

$lineProjectsList = ProjectsList();

$lineprojectsCategoriesList = projectsCategoriesList();

$lineprojectsCategoriesListArray = projectsCategoriesListArray();



?>

<?php include 'header.php'; ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> <?php echo ($ID > 0 ? "Proje Güncelle":"Proje Ekle") ?></h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                        class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                            <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <form enctype="multipart/form-data" action="<?php if($ID > 0) echo 'projects_duzenle.php?ID='.$ID; else echo 'projects_ekle.php'; ?>" method="POST" role="form">

                                <div class="form-group">
                                    <label class="control-label" for="selectError">Proje Kategorisi</label>
                                    <div class="controls">
                                        <select id="selectError" name="ProjectsCategoriesID" style="max-width: 100%" class="form-control">
                                            <option value="">Seçiniz</option>
                                            <?php foreach ($lineprojectsCategoriesList as $row) { ?>

                                                <option value="<?php echo $row['ID']; ?>" <?php echo ($row['ID'] == $ProjectsInfo['ProjectsCategoriesID'] ? 'selected':'' ); ?>><?php echo $row['Name']; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Proje İsmi</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Name" value="<?php echo $ProjectsInfo['Name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">İş Veren</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Boss" value="<?php echo $ProjectsInfo['Boss']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">İşin Adı</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="JobName" value="<?php echo $ProjectsInfo['JobName']; ?>">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">İçerik</label>
                                    <textarea class="form-control ckeditor" id="Content" name="Content" placeholder="Mesajınız*"><?php echo $PagesInfo['Content']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Sözleşme Başlanma Tarihi</label>
                                    <input type="text" class="form-control datetimepicker" name="ContractStartDate" value="<?php echo $ProjectsInfo['ContractStartDate']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Sözleşme Bitiş Tarihi</label>
                                    <input type="text" class="form-control datetimepicker" name="ContractEndDate" value="<?php echo $ProjectsInfo['ContractEndDate']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Proje Resmi</label>
                                    <img height="150" src ="../uploads/projects/<?php echo $ProjectsInfo['Images']; ?>">
                                    <input type="file" class="form-control" id="exampleInputEmail1" name="Images">
                                    
                                </div>

                                <!-- <input type="hidden" name="ID" value="<?php echo $ID; ?>"> -->
                                <button type="submit" name="<?php echo ($ID > 0 ? "guncelle":"ekle") ?>" class="btn btn-default"><?php echo ($ID > 0 ? "Güncelle":"Ekle") ?></button>
                            </form>
                            <?php 
                            foreach($error['errEmpty'] as $val){
                                print "<div class='alert alert-danger'>".$val."</div>";
                            }
                            ?>
                            <?php 
                            foreach($error['errOther'] as $val){
                                print "<div class='alert alert-warning'>".$val."</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!--/span-->

            </div><!--/row-->

            <div class="row">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-user"></i> Projeler</h2>

                            <div class="box-icon">
                                <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                                    <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <div class="alert alert-info">For help with such table please check <a href="http://datatables.net/" target="_blank">http://datatables.net/</a></div>
                                <table class="table table-striped table-bordered bootstrap-datatable responsive">
                                    <thead>
                                        <tr>
                                            <th>Proje Kategorisi</th>
                                            <th>Proje İsmi</th>
                                            <th>İş Veren</th>
                                            <th>İş Adı</th>
                                            <th>Sözleşme Tarihleri</th>
                                            <th>Proje Resmi</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($lineProjectsList as $row) 
                                        {        
                                            ?>
                                            <tr>
                                                <td class="center"><?php echo $lineprojectsCategoriesListArray[$row['ProjectsCategoriesID']]; ?></td>
                                                <td class="center"><?php echo $row['Name']; ?></td>
                                                
                                                <td class="center"><?php echo $row['Boss']; ?></td>
                                                <td class="center"><?php echo $row['JobName']; ?></td>
                                                <td class="center"><?php echo trDate($row['ContractStartDate']). '-' .trDate($row['ContractEndDate']); ?></td>
                                                <td>
                                                    <?php if ($row['Images'] != '') { ?>
                                                        <img height="150" src="../uploads/projects/<?php echo $row['Images']; ?>">
                                                    <?php } else {
                                                        echo 'Resim Yok';
                                                    } ?>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="projects.php?ID=<?php echo $row['ID']; ?>">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        Düzenle
                                                    </a>
                                                    <a class="btn btn-danger" href="projects_sil.php?ID=<?php echo $row['ID']; ?>&Images=<?php print $row['Images'] ?>">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Sil
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }  
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/span-->

                </div><!--/row-->

                <?php include 'footer.php'; ?>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
                <script src="http://cdn.craig.is/js/rainbow-custom.min.js"></script>
                <script>
                  $(document).ready(function() {
                    $.datetimepicker.setLocale('tr');
                    $('.datetimepicker').datetimepicker({
                        'lang':'tr',
                    });
                });
            </script>
