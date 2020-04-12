<?php

class cartService{
    public static function table2(int $column, $border = 1, $cellpadding = 1, $cellspacing = 1){
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
    }
}