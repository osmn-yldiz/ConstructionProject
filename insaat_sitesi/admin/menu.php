<?php

include 'config.php';
include 'functions.php';

loginControl();


if (isset($_GET['ID'])) {
    $ID = cleanData($_GET['ID'], 1);
    $mainMenuInfo = mainMenuFind($ID);
}

$mainMenuList = mainMenuList($_GET['SupID']);


?>

<?php include 'header.php'; ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> <?php echo($ID > 0 ? "Menu Güncelle" : "Menu Ekle") ?></h2>

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
                <form action="<?php if ($ID > 0) echo 'menu_duzenle.php?ID=' . $ID; else echo 'menu_ekle.php?SupID=' . $_GET['SupID']; ?>"
                      method="POST" role="form">
                    <div class="form-group">
                        <label for="">Menu Adı(Türkçe)</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="Name_tr"
                               value="<?php echo $mainMenuInfo['Name_tr']; ?>" placeholder="Adınızı Giriniz">
                    </div>
                    <div class="form-group">
                        <label for="">Menu Adı(İngilizce)</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="Name_en"
                               value="<?php echo $mainMenuInfo['Name_en']; ?>" placeholder="Adınızı Giriniz">
                    </div>
                    <div class="form-group">
                        <label for="">Menu Adı(Almanca)</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="Name_ge"
                               value="<?php echo $mainMenuInfo['Name_ge']; ?>" placeholder="Adınızı Giriniz">
                    </div>
                    <div class="form-group">
                        <label for="">Menu Link</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="Link"
                               value="<?php echo $mainMenuInfo['Link']; ?>" placeholder="Soyadınızı Giriniz">
                    </div>
                    <div class="form-group">
                        <label for="">Menu Sırası</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="OrderNumber"
                               value="<?php echo $mainMenuInfo['OrderNumber']; ?>" placeholder="Adres Giriniz">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="selectError">Menu Durumu</label>
                        <div class="controls">
                            <select id="selectError" name="Status" style="max-width: 100%" class="form-control">
                                <option value="1" <?php echo($mainMenuInfo['Status'] == 1 ? "selected" : "") ?>>Aktif
                                </option>
                                <option value="0" <?php echo($mainMenuInfo['Status'] == 0 ? "selected" : "") ?>>Pasif
                                </option>
                            </select>
                        </div>
                    </div>
                    <!-- <input type="hidden" name="ID" value="<?php echo $ID; ?>"> -->
                    <button type="submit" name="<?php echo($ID > 0 ? "guncelle" : "ekle") ?>"
                            class="btn btn-default"><?php echo($ID > 0 ? "Güncelle" : "Ekle") ?></button>
                </form>
                <?php
                foreach ($error['errEmpty'] as $val) {
                    print "<div class='alert alert-danger'>" . $val . "</div>";
                }
                ?>
                <?php
                foreach ($error['errOther'] as $val) {
                    print "<div class='alert alert-warning'>" . $val . "</div>";
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
                                                                                       target="_blank">http://datatables.net/</a>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable responsive">
                    <thead>
                    <tr>
                        <th>Menu Adı(Türkçe)</th>
                        <th>Menu Adı(İngilizce)</th>
                        <th>Menu Adı(Almanca)</th>
                        <th>Menu Linki</th>
                        <th>Menu Sırası</th>
                        <th>Menu Durumu</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($mainMenuList as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row['Name_tr']; ?></td>
                            <td><?php echo $row['Name_en']; ?></td>
                            <td><?php echo $row['Name_ge']; ?></td>
                            <td class="center"><?php echo $row['Link']; ?></td>
                            <td class="center"><?php echo $row['OrderNumber']; ?></td>
                            <td class="center">
                                <?php echo($row['Status'] == 1 ? '<span class="label-success label label-default">Aktif</span>' : '<span class="label-danger label label-default">Pasif</span>') ?>
                            </td>
                            <td class="center">
                                <a class="btn btn-success"
                                   href="menu.php?SupID=<?php print $row['SupID'] ?>&ID=<?php echo $row['ID']; ?>">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    Düzenle
                                </a>
                                <a class="btn btn-warning" href="menu.php?SupID=<?php echo $row['ID']; ?>">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    Alt Menü
                                </a>
                                <a class="btn btn-danger" href="menu_sil.php?ID=<?php echo $row['ID']; ?>">
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
