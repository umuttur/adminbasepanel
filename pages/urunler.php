<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ÜRÜNLER</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <?php 
    
    if (isset($_POST['edit_products'])) {
      $product_name = $_POST['product_name'];
      $product_desc = $_POST['product_desc'];
      $color_code = $_POST['color_code'];
      $size_code = $_POST['size_code'];
      $product_miktar = $_POST['product_miktar'];
      $statu = $_POST['statu'];
      $product_id = $_POST['product_id'];
      $args = [
          'product_name' => $product_name,
          'product_desc' => $product_desc,
          'color_code' => $color_code,
          'size_code' => $size_code,
          'product_miktar' => $product_miktar,
          'user_id' => $user_id,
          'statu' => $statu,
          'product_id' => $product_id

      ];

      $args = $adminclass->getSecurity($args);
      $product_update = $adminclass->productUpdate($args);
      if ($product_update) {
        print '<div class="alert alert-success">İşlem Başarılı </div>"';
      }
      else {
        print '<div class="alert alert-danger">İşlem Başarısız </div>"';

      }


    }
    
    ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#products-modal">Ürün Ekle</button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#color-modal">Renk Ekle</button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#size-modal">Beden Ekle</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Ürün Id</th>
                    <th>Ürün Adı</th>
                    <th>Ürün Rengi</th>
                    <th>Ürün Bedeni</th>
                    <th>Ürün Miktarı</th>
                    <th>Ürün Resmi</th>
                    <th>Ürün Durumu</th>
                    <th>İşlem</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sql="SELECT 
                    t1.product_id,
                    t1.product_name,
                    t2.color_desc,
                    t3.size_desc,
                    t1.product_miktar,
                    t1.images,
                    t1.statu
                    FROM qp_product t1
                    INNER JOIN qp_color t2 ON t1.color_code = t2.color_code
                    INNER JOIN qp_size t3 ON t1.size_code = t3.size_id";
                    $products = $adminclass->pdoQueryObj($sql);
                    if ($products) {
                      foreach ($products as $product) {             
                    ?>
                  <tr>
                    <td><?php print $product->product_id ; ?></td>
                    <td><?php print $product->product_name ; ?></td>
                    <td><?php print $product->color_desc ; ?></td>
                    <td><?php print $product->size_desc; ?></td>
                    <td><?php print $product->product_miktar ; ?></td>
                    <td><img src="./images/<?php print $product->images ; ?>" style="width: 150px;;"></td>
                    <td><?php print $adminclass->getStatu($product->statu) ; ?></td>
                    <td>
                        <button id="product_delete" name="product_delete" class="btn btn-danger" onclick="productsDelete(<?php print $product->product_id ;?>);">Sil</button>
                        <button id="product_edit" name="product_edit" class="btn btn-warning" onclick="productEdit(<?php print $product->product_id ;?>);">Düzenle</button>

                    </td>
                  </tr>
                  <?php }}?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Ürün ID</th>
                    <th>Ürün Adı</th>
                    <th>Ürün Rengi</th>
                    <th>Ürün Bedeni</th>
                    <th>Ürün Miktarı</th>
                    <th>Ürün Resmi</th>
                    <th>Ürün Durumu</th>
                    <th>İşlem</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
      </div>
      </div>
    </section>
  </div>
  <div class="modal fade" id="products-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Yeni Ürün Ekle</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" id="product_form" name="product_form">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Ürün Adı</label>
                        <input type="text" class="form-control" name ="product_name" id ="product_name" placeholder="Ürün adı giriniz..">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Ürün Açıklaması- Özellikleri</label>
                        <textarea class="form-control" rows="5" name="product_desc" id="product_desc" placeholder="Açıklama giriniz..."></textarea>
                      </div>
                    </div>
                  </div>

                  <!-- input states -->
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Renk Seçiniz</label>
                        <select class="form-control" id="color_code" name="color_code">
                          <?php
                           $sql="SELECT * FROM qp_color WHERE statu = 1";
                           $query = $adminclass->pdoQueryObj($sql);
                           if ($query) {
                          foreach ($query as $color) { ?>
                          <option value="<?php print $color->color_code?>"><?php print $color->color_desc?></option>
                          <?php }} ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Beden Seçiniz</label>
                        <select class="form-control" id="size_code" name="size_code">
                        <?php
                           $sql="SELECT * FROM qp_size WHERE statu = 1";
                           $query = $adminclass->pdoQueryObj($sql);
                           if ($query) {
                          foreach ($query as $size) { ?>
                          <option value="<?php print $size->size_id?>"><?php print $size->size_desc?></option>
                          <?php }} ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i> Miktar</label>
                    <input type="text" class="form-control is-invalid" name="product_miktar" id="product_miktar" placeholder="Miktar giriniz..">
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                  <div class="form-group">
                    <label>Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="images" id="images">
                      </div>
                    </div>
                  </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="statu" id="statu">
                          <option value="1">Aktif</option>
                          <option value="2">Pasif</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" value="95951" name="postcheck">
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">VAZGEÇ</button>
                    <button class="btn btn-success" id="save_data" name="save_data">KAYDET</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
        </div>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="color-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
            <div class="card card-navy">
              <div class="card-header">
                <h3 class="card-title">Renk Ekle</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" id="color_form" name="color_form">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Renk Adı</label>
                        <input type="text" class="form-control" name ="color_desc" id ="color_desc" placeholder="Renk adı giriniz..">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="statu" id="statu">
                          <option value="1">Aktif</option>
                          <option value="2">Pasif</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">VAZGEÇ</button>
                    <button class="btn btn-success" id="save_data" name="save_data">KAYDET</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
        </div>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="size-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
            <div class="card card-teal">
              <div class="card-header">
                <h3 class="card-title">Beden Ekle</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" id="size_form" name="size_form">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Beden</label>
                        <input type="text" class="form-control" name ="size_desc" id ="size_desc" placeholder="Beden adı giriniz..">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="statu" id="statu">
                          <option value="1">Aktif</option>
                          <option value="2">Pasif</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">VAZGEÇ</button>
                    <button class="btn btn-success" id="save_data" name="save_data">KAYDET</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
        </div>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="products-edit-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Ürün Güncelleme</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" id="product_edit_form" name="product_form">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Ürün Adı</label>
                        <input type="text" class="form-control" name ="product_name" id ="product_name" placeholder="Ürün adı giriniz..">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Ürün Açıklaması- Özellikleri</label>
                        <textarea class="form-control" rows="5" name="product_desc" id="product_desc" placeholder="Açıklama giriniz..."></textarea>
                      </div>
                    </div>
                  </div>

                  <!-- input states -->
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Renk Seçiniz</label>
                        <select class="form-control" id="color_code" name="color_code">
                          <?php
                           $sql="SELECT * FROM qp_color WHERE statu = 1";
                           $query = $adminclass->pdoQueryObj($sql);
                           if ($query) {
                          foreach ($query as $color) { ?>
                          <option value="<?php print $color->color_code?>"><?php print $color->color_desc?></option>
                          <?php }} ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Beden Seçiniz</label>
                        <select class="form-control" id="size_code" name="size_code">
                        <?php
                           $sql="SELECT * FROM qp_size WHERE statu = 1";
                           $query = $adminclass->pdoQueryObj($sql);
                           if ($query) {
                          foreach ($query as $size) { ?>
                          <option value="<?php print $size->size_id?>"><?php print $size->size_desc?></option>
                          <?php }} ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i> Miktar</label>
                    <input type="text" class="form-control is-invalid" name="product_miktar" id="product_miktar" placeholder="Miktar giriniz..">
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                  <div class="form-group">
                    <label>Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="images" id="images">
                      </div>
                    </div>
                  </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="statu" id="statu">
                          <option value="1">Aktif</option>
                          <option value="2">Pasif</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <input type="hidden" name="product_id" id="product_id" >
                    <button type="button" class="btn btn-default" data-dismiss="modal">VAZGEÇ</button>
                    <button class="btn btn-success" id="save_data" name="edit_products">KAYDET</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
        </div>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>