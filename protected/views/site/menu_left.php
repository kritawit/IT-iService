<div class="menu_icon">
    <a href="<?php echo Yii::app()->createUrl("Home/RequestForm"); ?>">
        <div><?php echo CHtml::image("images/home.png");?></div>
        <div>หน้าหลัก</div>
    </a>
</div>
<?php if(Yii::app()->session["employee_level"]=="admin"): ?>
<div class="menu_icon">
    <a href="<?php echo Yii::app()->createUrl("Config/GroupSetting"); ?>">
        <div><?php echo CHtml::image("images/config.png"); ?></div>
        <div>ตั้งค่าระบบ</div>
    </a>
</div>
<div class="menu_icon">
    <a href="<?php echo Yii::app()->createUrl("Report/Repair"); ?>">
        <div><?php echo CHtml::image("images/report.png"); ?></div>
        <div>รายงาน</div>
    </a>
</div>
<?php endif; ?>
<div class="menu_icon">
    <a href="<?php echo Yii::app()->createUrl("Member/Profile",array("id"=>$_SESSION["employee_id"])); ?>">
        <div><?php echo CHtml::image("images/profile.png") ?></div>
        <div>ข้อมูลส่วนตัว</div>
    </a>
</div>
<div class="menu_icon">
    <a href="<?php echo Yii::app()->createUrl("member/logout"); ?>"
       onclick="return confirm('ยืนยันการออกจากระบบ')">
        <div><?php echo CHtml::image("images/logout.png"); ?></div>
        <div>ออกจากระบบ</div>
    </a>
</div>