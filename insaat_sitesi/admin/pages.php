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
    $PagesInfo = PagesFind($ID); 
}

$PagesList = PagesList($_GET['SupID']);



?>

<?php include 'header.php'; ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> <?php echo ($ID > 0 ? "Sayfa Güncelle":"Sayfa Ekle") ?>
                </h2>

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
                <form
                    action="<?php if($ID > 0) echo 'pages_duzenle.php?ID='.$ID; else echo 'pages_ekle.php?SupID='.$_GET['SupID']; ?>"
                    method="POST" role="form">
                    <div class="form-group">
                        <label for="">Başlık</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="Header"
                            value="<?php echo $PagesInfo['Header']; ?>" placeholder="Soyadınızı Giriniz">
                    </div>
                    <div class="form-group">
                        <label for="">İçerik</label>
                        <textarea class="form-control ckeditor" id="Content" name="Content"
                            placeholder="Mesajınız*"><?php echo $PagesInfo['Content']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="Description"
                            value="<?php echo $PagesInfo['Description']; ?>" placeholder="Soyadınızı Giriniz">
                    </div>
                    <div class="form-group">
                        <label for="">Keywords</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="Keywords"
                            value="<?php echo $PagesInfo['Keywords']; ?>" placeholder="Soyadınızı Giriniz">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="selectError">Sayfa Durumu</label>
                        <div class="controls">
                            <select id="selectError" name="Status" style="max-width: 100%" class="form-control">
                                <option value="1" <?php echo ($PagesInfo['Status'] == 1 ? "selected":"") ?>>Aktif
                                </option>
                                <option value="0" <?php echo ($PagesInfo['Status'] == 0 ? "selected":"") ?>>Pasif
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="selectError">Anasayfada Gösterilsin Mi?</label>
                        <div class="controls">
                            <select id="selectError" name="HomeShow" style="max-width: 100%" class="form-control">
                                <option value="1" <?php echo ($PagesInfo['HomeShow'] == 1 ? "selected":"") ?>>Aktif
                                </option>
                                <option value="0" <?php echo ($PagesInfo['HomeShow'] == 0 ? "selected":"") ?>>Pasif
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- <input type="hidden" name="ID" value="<?php echo $ID; ?>"> -->
                    <button type="submit" name="<?php echo ($ID > 0 ? "guncelle":"ekle") ?>"
                        class="btn btn-default"><?php echo ($ID > 0 ? "Güncelle":"Ekle") ?></button>
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

</div>
<!--/row-->

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Popuplar</h2>

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
                <div class="alert alert-info">For help with such table please check <a href="http://datatables.net/"
                        target="_blank">http://datatables.net/</a></div>
                <table class="table table-striped table-bordered bootstrap-datatable responsive">
                    <thead>
                        <tr>
                            <th>Başlık</th>
                            <th width="250">Description</th>
                            <th width="250">Keywords</th>
                            <th>Sayfa Durumu</th>
                            <th>Anasayfada Gösterme</th>
                            <th>CreateDate</th>
                            <th>UpdateDate</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                        foreach($PagesList as $row) 
                                        {        
                                            ?>
                        <tr>
                            <td class="center"><?php echo $row['Header']; ?></td>
                            <td class="center"><?php echo $row['Description']; ?></td>
                            <td class="center"><?php echo $row['Keywords']; ?></td>
                            <td class="center">
                                <?php echo ($row['Status']==1?'<span class="label-success label label-default">Aktif</span>':'<span class="label-danger label label-default">Pasif</span>') ?>
                            </td>
                            <td class="center">
                                <?php echo ($row['HomeShow']==1?'<span class="label-success label label-default">Aktif</span>':'<span class="label-danger label label-default">Pasif</span>') ?>
                            </td>
                            <td class="center"><?php echo $row['CreateDate']; ?></td>
                            <td class="center"><?php echo $row['UpdateDate']; ?></td>

                            <td class="center">
                                <a class="btn btn-success" href="pages.php?ID=<?php echo $row['ID']; ?>">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    Düzenle
                                </a>
                                <a class="btn btn-warning" href="pages.php?SupID=<?php echo $row['ID']; ?>">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    Alt Menü
                                </a>
                                <a class="btn btn-danger" href="pages_sil.php?ID=<?php echo $row['ID']; ?>">
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

</div>
<!--/row-->

<?php include 'footer.php'; ?>