<?php

//ฟังก์ชันงาน soa

function table2(int $column, $border = 1, $cellpadding = 1, $cellspacing = 1)
{
    if ($column == 3) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "<img src=\"./img/a.jpg\" width= \"70\" height=\"80\" >" ?></td>
            <td><?php echo "000123"; ?></td>
            <td><?php echo "แจกัน"; ?></td>
            <td><?php echo "2"; ?></td>
            <td><?php echo "5"; ?></td>
            <td><?php echo "10"; ?></td>
        </tr>
    <?php
    }
    if ($column == 4) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "<img src=\"./img/a.jpg\" width= \"70\" height=\"80\" >" ?></td>
            <td><?php echo "000123"; ?></td>
            <td><?php echo "แจกัน"; ?></td>
            <td><?php echo "2"; ?></td>
            <td><?php echo "5"; ?></td>
            <td><?php echo "10"; ?></td>
            <td style="text-align:center;">
                <button type="button" onclick="delfunction()" id="delete" class="btn btn-danger btn-sm btndel" data-toggle="tooltip" title="" data-original-title="ยกเลิก">
                    <i class="far fa-trash-alt"></i>
                </button>

            </td>
        </tr>
    <?php
    }
    if ($column == 5) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "แจกัน</br>" . "ดอกไม้</br>" . "ผ้าม่าน</br>"; ?></td>
            <td><?php echo "1050"; ?></td>
            <td><input type="number" class="product-quantity" id="quantity" name="quantity" min="0" max="100" name="quantity" value="0" size="2"></td>
            <td><input type="text" name="note"><br /></td>
        </tr>
    <?php
    }
    if ($column == 6) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "นายคาเดี้ยน คาเมร่า"; ?></td>
            <td><?php echo "ครึ่งวัน 1200</br>" . "เต็มวัน 2000</br>"; ?></td>
            <td><select id="photographerprice">
                    <option value="a">ครึ่งวัน</option>
                    <option value="b">เต็มวัน</option>
                </select></td>
            <td><input type="date" id="myDate" name="myDate" value=""></td>
        </tr>
    <?php
    }
    if ($column == 7) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "แจกัน</br>" . "ดอกไม้</br>" . "ผ้าม่าน</br>"; ?></td>
            <td><?php echo "1050"; ?></td>
            <td><input type="number" class="product-quantity" id="quantity" name="quantity" min="0" max="100" name="quantity" value="0" size="2"></td>
            <td><input type="text" name="note"><br /></td>
        </tr>
    <?php
    }
    if ($column == 8) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "ต้มยำกุ้ง"; ?></td>
            <td><?php echo "350"; ?></td>
            <td><input type="number" class="product-quantity" id="quantity" name="quantity" min="0" max="100" name="quantity" value="0" size="2"></td>
            <td><input type="text" name="note"><br /></td>
        </tr>
    <?php
    }
    if ($column == 9) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "แจกัน</br>" . "ดอกไม้</br>" . "ผ้าม่าน</br>"; ?></td>
            <td><?php echo "1050"; ?></td>
            <td><?php echo "1"; ?></td>
            <td><?php echo "1050"; ?></td>
            <td><?php echo "ต้องการดอกไม้สีขาว"; ?></td>
        </tr>
    <?php
    }
    if ($column == 10) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "นายคาเดี้ยน คาเมร่า"; ?></td>
            <td><?php echo "1200"; ?></td>
            <td><?php echo "ครึ่งวัน"; ?></td>
            <td><input type="date" id="myDate" name="myDate" value="2020-03-12"></td>
        </tr>
    <?php
    }
    if ($column == 11) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "แจกัน</br>" . "ดอกไม้</br>" . "ผ้าม่าน</br>"; ?></td>
            <td><?php echo "1050"; ?></td>
            <td><?php echo "1"; ?></td>
            <td><?php echo "1050"; ?></td>
            <td><?php echo "ต้องการดอกไม้สีแดง"; ?></td>
        </tr>
    <?php
    }
    if ($column == 12) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "ต้มยำกุ้ง"; ?></td>
            <td><?php echo "350"; ?></td>
            <td><?php echo "5"; ?></td>
            <td><?php echo "1750"; ?></td>
            <td><?php echo "รสชาติจัดจ้าน"; ?></td>
        </tr>
    <?php
    }
    if ($column == 13) {
    ?>
        <tr>
            <td><?php echo "2"; ?></td>
            <td><?php echo "<img src=\"./img/q62ir9.jpg\" width= \"70\" height=\"80\" >" ?></td>
            <td><?php echo "000124"; ?></td>
            <td><?php echo "ดอกไม้"; ?></td>
            <td><?php echo "5"; ?></td>
            <td><?php echo "5"; ?></td>
            <td><?php echo "25"; ?></td>
            <td style="text-align:center;">
                <button type="button" onclick="delfunction()" id="delete" class="btn btn-danger btn-sm btndel" data-toggle="tooltip" title="" data-original-title="ยกเลิก">
                    <i class="far fa-trash-alt"></i>
                </button>

            </td>
        </tr>
<?php
    }
}
