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
    $placardInfo = placardFind($ID);
}

$lineplacardList = placardList($_GET['PlaCardCategoryID']);



?>

<?php include 'header.php'; ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> <?php echo ($ID > 0 ? "Afiş Güncelle":"Afiş Ekle") ?></h2>

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
                            <form enctype="multipart/form-data" action="<?php if($ID > 0) echo 'placard_duzenle.php?ID='.$ID; else echo 'placard_ekle.php?PlaCardCategoryID='.$_GET['PlaCardCategoryID']; ?>" method="POST" role="form">
                                <div class="form-group"> 
                                    <label for="">Başlık</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Header" value="<?php echo $placardInfo['Header']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Link</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Link" value="<?php echo $placardInfo['Link']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="selectError">Link Yönlendirilmesi</label>
                                    <div class="controls">
                                        <select id="selectError" name="Target" style="max-width: 100%" class="form-control">
                                            <option value="_self" <?php echo ($placardInfo['Target'] == '_self' ? "selected":"") ?>>İç Link</option>
                                            <option value="_blank" <?php echo ($placardInfo['Target'] == '_blank' ? "selected":"") ?>>Dış Link</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Afiş Resmi</label>
                                    <img height="150" src ="../uploads/PlaCard/<?php echo $placardInfo['Images']; ?>">
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
                                            <th>Başlık</th>
                                            <th>Link</th>
                                            <th>Link Yönlendirilmesi</th>
                                            <th>Afiş Resmi</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($lineplacardList as $row) 
                                        {        
                                            ?>
                                            <tr>
                                                <td class="center"><?php echo $row['Header']; ?></td>
                                                <td class="center"><?php echo $row['Link']; ?></td>
                                                <td class="center">
                                                    <?php echo ($row['Target']=='_blank'?'<span class="label-success label label-default">DışLink</span>':'<span class="label-danger label label-default">İç Link</span>') ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['Images'] != '') { ?>
                                                        <img height="150" src="../uploads/PlaCard/<?php echo $row['Images']; ?>">
                                                    <?php } else {
                                                        echo 'Resim Yok';
                                                    } ?>
                                                </td>

                                                <td class="center">
                                                    <a class="btn btn-success" href="placard.php?ID=<?php echo $row['ID']; ?>">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        Düzenle
                                                    </a>
                                                    <a class="btn btn-danger" href="placard_sil.php?ID=<?php echo $row['ID']; ?>&PlaCardCategoryID=<?php echo $row['PlaCardCategoryID']; ?>">
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
