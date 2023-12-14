<?php 

function themdm($tendm){
    $conn = connectdb();
    $sql = "INSERT INTO tbl_danhmuc (tendm ) VALUES ('".$tendm.")";
  $conn->exec($sql);
}

function updatedm($id , $tendm){
    $conn = connectdb();
    $sql = "UPDATE tbl_danhmuc SET tendm='".$tendm."' WHERE id=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function getonedm($id){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_danhmuc WHERE id =".$id);
    $stmt->execute();
// lấy dữ liệu từ bảng 
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//hằng số trả về kq dữ liệu là mảng
    $kq = $stmt->fetchAll();
//ghi phương thức trả về , lấy tất cả trả về biến kết quả
    return $kq;
}

function deldm ($id){
    $conn = connectdb();
    $sql = "DELETE FROM tbl_danhmuc WHERE id=".$id;
    $conn->exec($sql); // gọi hàm thực thi xóa
}

function getall_dm(){
$conn = connectdb();
$stmt = $conn->prepare("SELECT * FROM tbl_danhmuc");
$stmt->execute();
// lấy dữ liệu từ bảng 
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//hằng số trả về kq dữ liệu là mảng
$kq = $stmt->fetchAll();
//ghi phương thức trả về , lấy tất cả trả về biến kết quả
return $kq;
}

?>