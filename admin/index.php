<?php
        session_start();
        ob_start();
    if(($_SESSION['role'])&&($_SESSION['role']==1)){
    include "./model/connectdb.php";
    include "./model/danhmuc.php";
    include "./model/sanpham.php";
    connectdb();
    include "view/header.php";
    
    if(isset($_GET['act'])){
        switch ($_GET['act']) {
            case 'danhmuc':
                //nhân yêu cầu , xử lý và lấy ds danh mục
                $kq=getall_dm();
                // lấy kết quả
                include "view/danhmuc.php";
                break;

            // case 'deldm':
            //         //include "view/sanpham.php";
            //         if(isset($_GET['id'])){
            //             $id= $_GET['id'];
            //             deldm($id);
            //         //kiểm tra đúng id ko , nếu đúng thì sẽ xóa
            //         }
            //         $kq=getall_dm(); // trả về trang danh mục khi đã xóa
            //         include "view/danhmuc.php";
            //     break;

            // case 'adddm':
            //         //nhân yêu cầu , xử lý và lấy ds danh mục
            //         if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
            //             $tendm = $_POST['tendm'];
            //             themdm($tendm);
            //         }
            //         $kq=getall_dm();
            //         // lấy kết quả
            //         include "view/danhmuc.php";
            //     break;

            // case 'updatedmform':
            //         if(isset($_GET['id'])){
            //         $id= $_GET['id'];
            //         $kqone = getonedm($id);
            //     //kiểm tra đúng id ko , nếu đúng thì sẽ sửa
            //         $kq=getall_dm(); // trả về trang danh mục khi đã sửa
            //         include "view/updatedmform.php";
            //         }
            //         if(isset($_POST['id'])){
            //             $id= $_POST['id'];
            //             $tendm= $_POST['tendm'];
            //             updatedm($id ,$tendm);
            //         //kiểm tra đúng id ko , nếu đúng thì sẽ xóa
            //         $kq=getall_dm(); // trả về trang danh mục khi đã xóa
            //         include "view/danhmuc.php";
            //         }
            //         break;

            case 'sanpham':
                    //load danh mục
                    $dsdm = getall_dm();
                    //load sản phẩm
                    $kq = getall_sanpham();

                include "view/sanpham.php";
                break;
            case 'updatespform':
                    //load danh mục
                    $dsdm = getall_dm();
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $spct= getonesp($_GET['id']);
                    }
                    //load sản phẩm
                    $kq = getall_sanpham();

                include "view/updatespform.php";
                break;
            case 'sanpham_add':
                if((isset($_POST['themmoi'])) &&($_POST['themmoi']))
                //kiểm tra có tồn tại hay ko và có được click ko
                {
                    $iddm =$_POST['loaisp'];
                    $tensp =$_POST['tensp'];
                    $gia =$_POST['gia'];                    
                    $target_dir = "../admin/uploaded";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    // lấy hết tên file kể cả đuôi file
                    $img = $target_file ;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // chuyển chuỗi tên file thành chữ thường
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif" ) {
                           // kiểm tra đuôi file đúng định dạng ko , nếu ko đúng sẽ gắn biến cờ thành 0
                            $uploadOk = 0;
                        }
                    if($uploadOk == 1){
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    // target_file kiểm tra đường dẫn đúng  
                    insert_sanpham($iddm,$tensp,$gia,$img);
                    }
                }
                //load danh mục
                $dsdm = getall_dm();
                //load sản phẩm
                $kq = getall_sanpham();
                include "view/sanpham.php";
                break;
                
            case 'donhang':
                include "view/donhang.php";
                break;
            case 'spdm':
                if((isset($_POST['xem'])) &&($_POST['xem']))
                //kiểm tra có tồn tại hay ko và có được click ko
                {
                    $iddm =$_POST['loaisp'];
                }
                //load danh mục
                $rs = getALLSPDM($iddm);
                include "view/sanphamdanhmuc.php";
                break;
            case 'login':{
                if(isset($_POST['login'])&& isset($_POST['login'])){
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $kq=getUserInfo($user,$pass);
                    $role = $kq[0]['role'];
                    if($role ==1 ){
                        $_SESSION['role']=$role ;
                        header('location: admin/index.php');
                    }else{
                        $_SESSION['role'] = $role;
                        $_SESSION['iduser'] = $kq[0]['user'];
                        $_SESSION['username'] = $kq[0]['user'];
                        header('location: index.php');
                        break;
                    }
                }
            }
            case 'thoat':
                    unset($_SESSION['role']);
                    header('location: login.php');
                    // thoát sẽ xóa session trở lại trang admin
                    break;
            default:
                include "view/home.php";
                break;
        }
    }else   {
    include "view/sanphamdanhmuc.php";
}
    include "view/footer.php";  
}
else {
    header('location: login.php');
}
?>