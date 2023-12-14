<div class="main">
    <h2>Liệt Kê Sản Phẩm</h2>   
    <form action="index.php?act=spdm" method="post" enctype="multipart/form-data">
        <select name="loaisp" id="">
            <option value="0">Chọn Danh Mục</option>
            <option value="ao">áo</option>
            <option value="giay">giày</option>
            <option value="aokhoac">Áo khoác</option>
            <option value="daychuyen">Dây Chuyền</option>
        </select>
        <input type="submit" name="xem" value="xem">
    </form>
    
    <?php
    
    if (isset($rs) && (count($rs) > 0)) {
        $i = 1;
        foreach ($rs as $item) {
                echo '<tr>
                        <td>' . $i . '</td>
                        <td>' . $item['tensp'] . '</td>
                        <td><img src="' . $item['img'] . '" width="80px"></td>
                        <td>' . $item['gia'] . '</td>
                    </tr><br>   ';
            $i++;
        }
    }
    ?>
    </table>


</div>