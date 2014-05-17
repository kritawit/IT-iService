<div class="panel_header">เมนูหลักผู้ใช้งาน</div>
<div>
    <ul class="button-toolbar">
        <li <?php if ($current == 1) echo "class='current'"; ?>>
            <a href="<?php echo $this->createUrl("Home/RequestForm"); ?>">
                <div><?php echo CHtml::image("images/edit48.png"); ?></div>
                <div>Form แจ้งซ่อม</div>
            </a>
        </li>
        <li <?php if ($current == 2) echo "class='current'"; ?>>
            <a href="<?php echo $this->createUrl("Home/RequestHistory"); ?>">
                <div><?php echo CHtml::image("images/editpaste.png"); ?></div>
                <div>ประวัติแจ้งซ่อม</div>
            </a>
        </li>
        <?php if (Yii::app()->session["employee_level"] == "admin"): ?>
            <li <?php if ($current == 3) echo "class='current'"; ?>>
                <a href="<?php echo $this->createUrl("Home/DeviceList"); ?>">
                    <div><?php echo CHtml::image("images/book.png"); ?></div>
                    <div>ทะเบียนอุปกรณ์</div>
                </a>
            </li>
            <li <?php if ($current == 4) echo "class='current'"; ?>>
                <a href="<?php echo $this->createUrl("Home/RequestGetRequest"); ?>">
                    <div><?php echo CHtml::image("images/right48.png"); ?></div>
                    <div>รับเรื่องที่แจ้ง</div>
                </a>
            </li>
            <li <?php if ($current == 5) echo "class='current'"; ?>>
                <a href="<?php echo $this->createUrl("Home/RequestGetRepair"); ?>">
                    <div><?php echo CHtml::image("images/favorites_add48.png"); ?></div>
                    <div>รับซ่อม/ตรวจสอบ</div>
                </a>
            </li>
            <li <?php if ($current == 6) echo "class='current'"; ?>>
                <a href="<?php echo $this->createUrl("Home/RequestRepairEnd"); ?>">
                    <div><?php echo CHtml::image("images/summary48.png"); ?></div>
                    <div>ปิดงานซ่อมเสร็จ</div>
                </a>
            </li>
        <?php endif ?>
    </ul>
</div>