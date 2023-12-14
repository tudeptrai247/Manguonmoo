<div class="main">
    <h2>Sản Phẩm</h2>
    <form action="index.php?act=sanpham_add" method="post" enctype="multipart/form-data">
        
        <select name ="loaisp" id=""> 
            <option value="0">Chọn Danh Mục</option>
            <option value="ao">áo</option>
            <option value="giay">giày</option>
            <option value="aokhoac">Áo Khoác</option>
            <option value="daychuyen">Dây Chuyền</option>
            <br>
        <input type="text" name="tensp" id="" placeholder="Nhập Tên SP">
        <br>
        Chọn File Ảnh <input type="file" name="hinh" id="">
        <br>
        <?php
                if(isset($uploadOk) && ($uploadOk == 0)){
                    echo "Yêu cầu nhập đúng file hình";
                }
            ?>
        Giá <input type="text" name="gia" id="">
        <br>
        <input type="submit" name="themmoi" value="thêm mới">
    </form>
    <br>
        <table>
        <tr>
            <th>STT</th>
            <th>Tên Sản Phẩm</th>
            <th>Tên Danh Mục </th>
            <th>Hình Ảnh</th>
            <th>Giá</th>
            
        </tr>

        

        <?php
            if(isset($kq)&& (count($kq) > 0)){
                $i =1;
                foreach ($kq as $item ) {
              echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$item['tensp'].'</td>
                        <td>  
                            '.$item['loaisp'].'
                        </td>
                        <td><img src="'.$item['img'].'" width="80px"></td>
                        <td>'.$item['gia'].'</td>
                       
                    </tr>';
                    $i++;
                    
                }
            }
        ?>
        </table>

        
</div>