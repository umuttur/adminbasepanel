<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Web Tasarım</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-sm-12">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Yeni Tasarım Ekle</h3>
                </div>
                <?php 
                if (isset($_POST['save'])) {
                    if ($_POST['save']==1001) {
                        $tittle = $_POST['tittle'];
                        $description = $_POST['description'];
                        $image = 'images/'.$_FILES['images']['name'];
                        $price = $_POST['price'];
                        $adddate = date('Y-m-d H:i:s');
                        $statu = $_POST['statu'][0];
                        $image_tmp = $_FILES['images']['tmp_name'];

                        if (file_exists($image)) {
                            print '<div class="alert alert-danger">Aynı İsimde Dosya Mevcut !</div>';
                        }
                        else {
                        move_uploaded_file($image_tmp, $image);




                        $sql="INSERT INTO qp_webdesign (tittle,description,image,price,adddate,statu,user_id) VALUES (?,?,?,?,?,?,?) ";
                        $args= [$tittle, $description, $image, $price, $adddate, $statu, $user_id ];
                        $args = $adminclass->getSecurity($args);
                        $query = $adminclass->pdoPrepare($sql,$args);
                        if ($query) {
                            print '<div class="alert alert-success">İşlem Başarılı..</div>';
                            header("refresh:1;url=webtasarim");
                        }
                        else {
                            print '<div class="alert alert-danger">İşlem Başarısız..</div>'; }
                        }
                    }
                }
                
                ?>
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Tasarım Adı</label>
                    <input type="text" class="form-control" name="tittle">
                  </div>
                  <div class="form-group">
                    <label>Tasarım Özellikleri</label>
                    <textarea class="form-control" rows="3" name="description"></textarea>
                    </div>                   
                   <div class="form-group">
                    <label>Fiyat</label>
                    <input type="text" class="form-control" name="price" class="form-control">
                    </div>
                  <div class="form-group">
                     <label>Durum</label>
                     <select class="form-control" name="statu[]">
                         <option value="1">Aktif</option>
                         <option value="2">Pasif</option>
                     </select>
                      </div>
                  <div class="form-group">
                    <label>Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="images">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <input type="hidden" name="save" value="1001">
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Kaydet</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tasarım Listesi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                if (isset($_POST['deleteData'])) {
                  if ($_POST['deleteData']== 1001) {
                    $deleteData = $_POST['checkbox'];
                    $deleteData = implode("','",$deleteData);
                    $sql1001 = "SELECT * FROM qp_webdesign WHERE id IN ('$deleteData')";
                    $stmt = $adminclass->pdoQuery($sql1001);
                    $sql = "DELETE FROM qp_webdesign WHERE id IN ('$deleteData')";
                    $query=$adminclass->pdoPrepare($sql);
                    if ($query) {

                      if ($stmt) {
                        foreach ($stmt as $value) {
                          $unlink = unlink($value['image']);
                        }
                      }

                      print '<div class="alert alert-success"> Silme İşlemi Başarılı..</div>';
                      header("refresh:2;url=webdesign");
                    } else {
                      print '<div class="alert alert-danger"> Silme İşlemi Başarısız..</div>';
                      
                    }
                  }
                }
                ?>
                <form method="POST">
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Silmek İstiyor musunuz?')">SİL</button>
                  <input type="hidden" name="deleteData" value="1001">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Seç</th>
                    <th>id</th>
                    <th>Başlık</th>
                    <th>Açıklama</th>
                    <th>Resim</th>
                    <th>Fiyat</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $sql = "SELECT * FROM qp_webdesign";
                  $query = $adminclass->pdoQueryObj($sql);
                  if ($query) {

                    foreach ($query as $value) {

                  ?>
                  <tr>
                    <td style="width: 3px; "><input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?php print $value->id;?>"></td>
                    <td><?php print $value->id; ?></td>
                    <td><?php print $value->tittle; ?></td>
                    <td><?php print $value->description; ?></td>
                    <td><img src="<?php print $value->image; ?>" style="width:100px;"></td>
                    <td><?php print $value->price; ?></td>
                    <td><?php print $adminclass->getStatu($value->statu);?></td>
                    <td>
                      <a href="webtasarim_edit?id=<?php print $value->id; ?>" class="btn btn-warning">Güncelle</a>
                    </td>
                  </tr>
                  <?php } }?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Seç</th>
                    <th>id</th>
                    <th>Başlık</th>
                    <th>Açıklama</th>
                    <th>Resim</th>
                    <th>Fiyat</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                  </tr>
                  </tfoot>
                </table>
                </form>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
        
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
