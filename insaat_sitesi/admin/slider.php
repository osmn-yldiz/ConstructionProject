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
    $SliderInfo = SliderFind($ID);
}

$SliderList = SliderList();



?>

<?php include 'header.php'; ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> <?php echo ($ID > 0 ? "Slider Güncelle":"Slider Ekle") ?></h2>

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
                            <form enctype="multipart/form-data" action="<?php if($ID > 0) echo 'slider_duzenle.php?ID='.$ID; else echo 'slider_ekle.php'; ?>" method="POST" role="form">
                                <div class="form-group">
                                    <label for="">Slider Resmi</label>
                                    <img height="150" src ="../uploads/slider/<?php echo $SliderInfo['Images']; ?>">
                                    <input type="file" class="form-control" id="exampleInputEmail1" name="Images">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">Başlık 1</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="FirstName" value="<?php echo $SliderInfo['FirstName']; ?>" placeholder="Soyadınızı Giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="">Başlık 2</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="SecondName" value="<?php echo $SliderInfo['SecondName']; ?>" placeholder="Adres Giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="">İçerik</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Content" value="<?php echo $SliderInfo['Content']; ?>" placeholder="Adres Giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="">Link Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="LinkName" value="<?php echo $SliderInfo['LinkName']; ?>" placeholder="Adres Giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="">Link</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Link" value="<?php echo $SliderInfo['Link']; ?>" placeholder="Adres Giriniz">
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
                            <h2><i class="glyphicon glyphicon-user"></i> Menuler</h2>

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
                                            <th>Resim</th>
                                            <th>Başlık 1</th>
                                            <th>Başlık 2</th>
                                            <th>İçerik</th>
                                            <th>Link İsmi</th>
                                            <th>Link</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($SliderList as $row) 
                                        {        
                                            ?>
                                            <tr>
                                                <td><img height="150" src="../uploads/slider/<?php echo $row['Images']; ?>"></td>
                                                <td class="center"><?php echo $row['FirstName']; ?></td>
                                                <td class="center"><?php echo $row['SecondName']; ?></td>
                                                <td class="center"><?php echo $row['Content']; ?></td>
                                                <td class="center"><?php echo $row['LinkName']; ?></td>
                                                <td class="center"><?php echo $row['Link']; ?></td>

                                                <td class="center">
                                                    <a class="btn btn-success" href="slider.php?ID=<?php echo $row['ID']; ?>">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        Düzenle
                                                    </a>
                                                    <a class="btn btn-danger" href="slider_sil.php?ID=<?php echo $row['ID']; ?>&Images=<?php print $row['Images'] ?>">
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
