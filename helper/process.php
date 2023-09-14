<?php require_once '../init.php';

if (isset($_POST['product_edit_id'])) {
    $product_edit_id = $adminclass->getSecurity($_POST['product_edit_id']);
    $query = $adminclass->getProduct($product_edit_id);
    if ($query) {
        print json_encode($query) ;
    } else {
        print 'İşlem Başarısız' ;
    }

}

if (isset($_POST['product_delete_id'])) {
    $product_delete_id = $adminclass->getSecurity($_POST['product_delete_id']);
    $sql = "DELETE FROM qp_product WHERE product_id = :product_id";
    $args = ['product_id' => $product_delete_id];
    $query = $adminclass->pdoPrepare($sql,$args);
    if ($query) {
        print 'Ürün Silindi...' ;
    }else {
        print 'İşlem Hatası';
    }
}

if (isset($_POST['product_name'])) {
    $path = '../images/';
    $image_name = date('Y-m-d').'-'.rand(100,999).'-'.$_FILES['images']['name'];
    $image_tmp_name = $_FILES['images']['tmp_name'];





        $product_name = $_POST['product_name'] ;
        $product_desc = $_POST['product_desc'] ;
        $color_code = $_POST['color_code'] ;
        $size_code = $_POST['size_code'] ;
        $product_miktar = $_POST['product_miktar'] ;
        $create_date= date("Y-m-d H:i:s");
        $statu = $_POST['statu'] ;
        if(empty($product_name) || empty($product_desc) || empty($color_code) || empty($size_code) || empty($product_miktar) || empty($statu)){
            print 'Boş alan bırakmayınız...';
        } else {
                $args = [
                    $product_name,
                    $product_desc,
                    $color_code,
                    $size_code,
                    $product_miktar,
                    $user_id,
                    $create_date,
                    $statu,
                    $image_name
                ];
            $args = $adminclass -> getSecurity($args);
            $sql = "INSERT INTO qp_product(product_name, product_desc, color_code, size_code, product_miktar, user_id, create_date, statu, images) VALUES (?,?,?,?,?,?,?,?,?)";
            $prepare = $adminclass->pdoPrepare($sql,$args);
            if ($prepare) {
                move_uploaded_file($image_tmp_name, $path.$image_name);
                print 'Yeni Ürün Eklendi...';
            } else {
                print 'Ürün ekleme başarısız...';
            }
    
        }

}





if (isset($_POST['color_desc'])) {
    $color_desc = $adminclass->getSecurity($_POST['color_desc']);
    if (empty($color_desc)) {
       print 'Renk açıklaması boş bırakılamaz';
    } else {
    $statu = $adminclass->getSecurity($_POST['statu']);
    $create_date= date("Y-m-d H:i:s");
    $query=$adminclass->getColorCount($color_desc);
    if ($query->total ==0) {
        $sql = "INSERT INTO qp_color(color_desc, user_id, create_date, statu) VALUES (?,?,?,?)";
        $args =  [$color_desc,$user_id, $create_date, $statu];
        $prepare = $adminclass->pdoPrepare($sql, $args);
        if ($prepare) {
            print 'İşlem Başarılı..';
        } else {
            print 'İşlem Başarısız..';
        }
    }
    else {
        print 'Aynı kayıt tekrar oluşturuldu';
    }
 }
}

if (isset($_POST['size_desc'])) {
    $size_desc = $adminclass->getSecurity($_POST['size_desc']);
    if (empty($size_desc)) {
        print 'Beden açıklaması boş bırakılamaz';
     } else {
    $statu = $adminclass->getSecurity($_POST['statu']);
    $create_date= date("Y-m-d H:i:s");
    $query=$adminclass->getSizeCount($size_desc);
    if ($query->total ==0) {
        $sql = "INSERT INTO qp_size(size_desc, user_id, create_date, statu) VALUES (?,?,?,?)";
        $args =  [$size_desc,$user_id, $create_date, $statu];
        $prepare = $adminclass->pdoPrepare($sql, $args);
        if ($prepare) {
            print 'İşlem Başarılı..';
        } else {
            print 'İşlem Başarısız..';
        }
    }
    else {
        print 'Aynı kayıt tekrar oluşturuldu';
    }
 }
}





?>