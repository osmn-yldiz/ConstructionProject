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
    $placardcategoriesInfo = placardcategoriesFind($ID);
}

$lineplacardcategoriesList = placardcategoriesList();



?>

<?php include 'header.php'; ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> <?php echo ($ID > 0 ? "Afiş Kategori Güncelle":"Afiş Kategori Ekle") ?></h2>

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
                            <form action="<?php if($ID > 0) echo 'placardcategories_duzenle.php?ID='.$ID; else echo 'placardcategories_ekle.php?SupID='.$_GET['SupID']; ?>" method="POST" role="form">
                                <div class="form-group">
                                    <label for="">Afiş İsmi</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Name" value="<?php echo $placardcategoriesInfo['Name']; ?>" placeholder="Soyadınızı Giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="">Başlık</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Header" value="<?php echo $placardcategoriesInfo['Header']; ?>" placeholder="Soyadınızı Giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="">Kısa Açıklama</label>
                                    <textarea class="form-control" id="exampleInputEmail1" name="Exp" placeholder="Mesajınız*"><?php echo $placardcategoriesInfo['Exp']; ?></textarea>
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
                            <h2><i class="glyphicon glyphicon-user"></i> Popuplar</h2>

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
                                            <th>Afiş İsmi</th>
                                            <th>Başlık</th>
                                            <th>Kısa Açıklama</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($lineplacardcategoriesList as $row) 
                                        {        
                                            ?>
                                            <tr>
                                                <td class="center"><?php echo $row['Name']; ?></td>
                                                <td class="center"><?php echo $row['Header']; ?></td>
                                                <td class="center"><?php echo $row['Exp']; ?></td>

                                                <td class="center">
                                                    <a class="btn btn-success" href="placardcategories.php?ID=<?php echo $row['ID']; ?>">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        Düzenle
                                                    </a>
                                                    <a class="btn btn-warning" href="placard.php?PlaCardCategoryID=<?php echo $row['ID']; ?>">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        Afişleri Göster
                                                    </a>
                                                    <a class="btn btn-danger" href="placardcategories_sil.php?ID=<?php echo $row['ID']; ?>">
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
