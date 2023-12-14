<div class="main">
    <h2>Cập Nhật Danh Mục</h2>

    <!-- <?php 
        echo var_dump($kqone)
    ?> -->

    <form action="index.php?act=updatedmform" method="post">
        <input type="text" name="tendm" id="" value="<?=$kqone[0]['tendm']?>"> 
        <!-- xác định ở vị trí đầu tiên =0 -->
        <input type="hidden" name ="id" value="<?=$kqone[0]['id']?>" >
        <input type="submit" name="capnhat" value="cập nhật">
    </form>
    <br>
        <table>
        <tr>
            <th>STT</th>
            <th>Tên Danh Mục</th>
            <th>Ưu Tiên</th>
            <th>Hiện Thị</th>
            <th>Hành Động</th>
        </tr>

        

        <?php
            if(isset($kq)&& (count($kq) > 0)){
                $i =1;
                foreach ($kq as $dm) {
              echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$dm['tendm'].'</td>
                        <td>'.$dm['uutien'].'</td>
                        <td>'.$dm['hienthi'].'</td>
                        <td> <a href="index.php?act=updatedmform&id='.$dm['maloaisp'].'">Sửa</a> | <a href="index.php?act=deldm&id='.$dm['id'].'">Xóa</a> </td>
                    </tr>';
                    $i++;
                    
                }
            }
        ?>
        </table>

        
</div>