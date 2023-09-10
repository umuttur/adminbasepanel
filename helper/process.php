<?php require_once '../init.php';

if (isset($_POST['color_desc'])) {
    $color_desc = $adminclass->getSecurity($_POST['color_desc']);
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





?>