<div class="main">
    <h2>Danh Mục</h2>
    <form action="index.php?act=adddm" method="post">
    </form>
    <br>
        <table>
        <tr>
            <th>STT</th>
            <th>Tên Danh Mục</th>
            
        </tr>
        <?php
            if(isset($kq)&& (count($kq) > 0)){
                $i =1;
                foreach ($kq as $dm) {
              echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$dm['tendm'].'</td>      
                    </tr>';
                    $i++;
                    
                }
            }
        ?>
        </table>

        
</div>