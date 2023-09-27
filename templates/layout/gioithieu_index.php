<?php 
#gioi_thieu
$sql = "select ten$lang as ten,mota$lang as mota,title,keywords,description,photo from #_about where type='about' and hienthi=1 limit 0,1";
$d->query($sql);
$about_index = $d->fetch_array();
?>


<div id="gioithieu_index" style="background-image: url(<?=_upload_hinhanh_l.$about_index['photo']?>); " >
    <div class="content_noidung wow fadeInDown" data-wow-delay="300ms">
        <div class="title_gioithieu"><span><?=_khanhgiaapart?></span></div>
        <p class="title--2">Welcome to " YOUR HOUSE "</p>
        <div class="desc">
            <?=$about_index['mota']?>
        </div>
        <div class="clear"></div>
    </div>
</div>