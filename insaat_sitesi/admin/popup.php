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
    $PopupInfo = PopupFind($ID);
}

$PopupList = PopupList();



?>

<?php include 'header.php'; ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> <?php echo ($ID > 0 ? "Popup Güncelle":"Popup Ekle") ?></h2>

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
                            <form enctype="multipart/form-data" action="<?php if($ID > 0) echo 'popup_duzenle.php?ID='.$ID; else echo 'popup_ekle.php'; ?>" method="POST" role="form">
                                <div class="form-group">
                                    <label for="">Popup İsmi</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Name" value="<?php echo $PopupInfo['Name']; ?>" placeholder="Soyadınızı Giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="">Header</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Header" value="<?php echo $PopupInfo['Header']; ?>" placeholder="Soyadınızı Giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="">Popup Resmi</label>
                                    <img height="150" src ="../uploads/popup/<?php echo $PopupInfo['Images']; ?>">
                                    <input type="file" class="form-control" id="exampleInputEmail1" name="Images">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">İçerik</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Content" value="<?php echo $PopupInfo['Content']; ?>" placeholder="Soyadınızı Giriniz">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="selectError">Popup Durumu</label>
                                    <div class="controls">
                                        <select id="selectError" name="Status" style="max-width: 100%" class="form-control">
                                            <option value="1" <?php echo ($PopupInfo['Status'] == 1 ? "selected":"") ?>>Aktif</option>
                                            <option value="0" <?php echo ($PopupInfo['Status'] == 0 ? "selected":"") ?>>Pasif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Popup Başlangıcı</label>
                                    <input type="text" class="form-control datetimepicker" name="StartDate" value="<?php echo $PopupInfo['StartDate']; ?>" placeholder="Adres Giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="">Popup Bitişi</label>
                                    <input type="text" class="form-control datetimepicker" name="EndDate" value="<?php echo $PopupInfo['EndDate']; ?>" placeholder="Adres Giriniz">
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
                                            <th>Popup İsmi</th>
                                            <th>Header</th>
                                            <th>Popup Resmi</th>
                                            <th>İçerik</th>
                                            <th>Popup Durumu</th>
                                            <th>Popup Başlangıç</th>
                                            <th>Popup Bitiş</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($PopupList as $row) 
                                        {        
                                            ?>
                                            <tr>
                                                <td class="center"><?php echo $row['Name']; ?></td>
                                                <td class="center"><?php echo $row['Header']; ?></td>
                                                <td>
                                                    <?php if ($row['Images'] != '') { ?>
                                                        <img height="150" src="../uploads/popup/<?php echo $row['Images']; ?>">
                                                    <?php } else {
                                                        echo 'Resim Yok';
                                                    } ?>
                                                </td>
                                                <td class="center"><?php echo $row['Content']; ?></td>
                                                <td class="center">
                                                    <?php echo ($row['Status']==1?'<span class="label-success label label-default">Aktif</span>':'<span class="label-danger label label-default">Pasif</span>') ?>
                                                </td>
                                                <td class="center"><?php echo $row['StartDate']; ?></td>
                                                <td class="center"><?php echo $row['EndDate']; ?></td>

                                                <td class="center">
                                                    <a class="btn btn-success" href="popup.php?ID=<?php echo $row['ID']; ?>">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        Düzenle
                                                    </a>
                                                    <a class="btn btn-danger" href="popup_sil.php?ID=<?php echo $row['ID']; ?>&Images=<?php print $row['Images'] ?>">
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
