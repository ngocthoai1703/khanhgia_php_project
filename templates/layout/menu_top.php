<?php

$d->reset();
$sql="select ten$lang as ten,tenkhongdau,id,thumb from #_product_danhmuc where hienthi=1 and type='location' order by stt,id desc";
$d->query($sql);
$p_danhmuc=$d->result_array();

$d->reset();
$sql_logo1 = "select photo from #_background where type='logo' limit 0,1";
$d->query($sql_logo1);
$row_logo = $d->fetch_array();
?>



<nav id="menu_mobi" style="height:0; overflow:hidden;">
    <ul>
        <li class="c"><a class="<?php if($_REQUEST['com'] == 'san-pham') echo 'active'; ?>" href="lien-he.html"><?=_gioithieu?></a></li>
            
                <!-- <li>
                    <a class="<?php if($_REQUEST['com'] == 'san-pham') echo 'active'; ?>" href="san-pham.html"><?=_sanpham?></a>
                    <ul>
                        <?php 
                        for($i = 0; $i < count($p_danhmuc); $i++){ 
                          $d->reset();
                          $sql_dvquan="select ten$lang as ten,tenkhongdau,id from #_product_list where id_danhmuc=".$p_danhmuc[$i]['id']." and type='sanpham' and hienthi=1 order by stt asc,id desc";
                          $d->query($sql_dvquan);
                          $p_list=$d->result_array();

                          ?>
                          <li>
                            <a href="san-pham/<?=$p_danhmuc[$i]['tenkhongdau']?>/"><?=$p_danhmuc[$i]['ten']?></a>
                            <?php if(count($p_list)>0) { ?>
                                <ul class="dm_cap2">
                                    <?php for($j=0;$j<count($p_list);$j++) { ?>
                                        <li><a href="san-pham/<?=$p_list[$j]['id']?>/<?=$p_list[$j]['tenkhongdau']?>/"><?=$p_list[$j]['ten']?></a></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>

                        </li>
                    <?php } ?>
                </ul>
            </li> -->






            

            <!-- <li><a class="<?php if($_REQUEST['com'] == 'cam-nang-du-lich') echo 'active'; ?>" href="cam-nang-du-lich.html"><?=_camnangdl?></a> </li> -->


            



            <li class="a"><a class="<?php if($_REQUEST['com'] == 'cam-nang-du-lich') echo 'active'; ?>" href=""><?=_khanhgiaapart?></a></li>
            <li class="b"><a class="<?php if($_REQUEST['com'] == 'cam-nang-du-lich') echo 'active'; ?>" href="cam-nang-du-lich.html"><?=_SignatureByKG?></a></li>
            <li><a href="cam-nang-du-lich.html#khac-biet"><?=_khacbiet?></a></li>
            <li><a class="<?php if($_REQUEST['com'] == 'san-pham') echo 'active'; ?>" href="gioi-thieu.html"><?=_timphong?></a></li>


            </ul>
        </nav>
        <div class="header">
            <a href="#menu_mobi" class="hien_menu"><i class="fa fa-bars" aria-hidden="true"></i> </a>
            <a href="index.html"><img class="logo" src="<?=_upload_hinhanh_l.$row_logo['photo']?>" /></a>
                <div id="lang" class="col_w10">
                    <a href="index.php?com=ngonngu&lang=" title="Vietnamese">
                        <img src="images/vn.jpg">
                        <p>VI</p> 
                    </a>

                    <a href="index.php?com=ngonngu&lang=en" title="English">
                        <img src="images/en.jpg" >
                        <p>EN</p>
                    </a>
                </div>
        </div>


    <?php /*?>
     
    <div class="user"><i class="fa fa-user-plus" aria-hidden="true"></i>
        <ul>
        <?php if((!isset($_SESSION[$login_name]) || $_SESSION[$login_name]==false)){?>
            <li><a href="dang-ky.html"><?=_dangky?></a></li>
            <li><a href="dang-nhap.html"><?=_dangnhap?></a></li>
            <li><a style="border:none;" href="quen-mat-khau.html"><?=_quenmatkhau?></a></li>
        <?php } else { ?>
            <li><a>Xin chào <span style="color:#e00a1f;">(
            <?php $info_user=info_user($_SESSION['login']['id']);echo $info_user['username']?>)</span></a></li>
            <li><a href="dang-xuat.html"><?=_dangxuat?></a></li>
            <li><a style="border:none;" href="thay-doi-thong-tin.html"><?=_thaydoithongtin?></a></li>
        <?php } ?>
        </ul>
    </div>
    <?php */?>    
    




    <nav id="menu">
        <div id="wp_logo" class="col_w20">  
            <a href="index.html"><img class="logo" src="<?=_upload_hinhanh_l.$row_logo['photo']?>" /></a>
        </div>
        
        <ul id="list_menu" class="col_w60">
            
                    <li><a class="<?php if($_REQUEST['com'] == 'cam-nang-du-lich') echo 'active'; ?>" href="cam-nang-du-lich.html"><?=_SignatureByKG?></a></li>
                    <!-- <li>
                        <a class="<?php if($_REQUEST['com'] == 'san-pham') echo 'active'; ?>" href="san-pham.html">Signature by Khánh Gia Apartment</a>
                        <ul>
                            <?php 
                            for($i = 0; $i < count($p_danhmuc); $i++){ 
                              $d->reset();
                              $sql_dvquan="select ten$lang as ten,tenkhongdau,id from #_product_list where id_danhmuc=".$p_danhmuc[$i]['id']." and type='sanpham' and hienthi=1 order by stt asc,id desc";
                              $d->query($sql_dvquan);
                              $p_list=$d->result_array();

                              ?>
                              <li>
                                <a href="san-pham/<?=$p_danhmuc[$i]['tenkhongdau']?>/"><?=$p_danhmuc[$i]['ten']?></a>
                                <?php if(count($p_list)>0) { ?>
                                    <ul class="dm_cap2">
                                        <?php for($j=0;$j<count($p_list);$j++) { ?>
                                            <li><a href="san-pham/<?=$p_list[$j]['id']?>/<?=$p_list[$j]['tenkhongdau']?>/"><?=$p_list[$j]['ten']?></a></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>

                            </li>
                        <?php } ?>
                    </ul>
                </li> -->






                







                <li><a class="<?php if($_REQUEST['com'] == 'lien-he') echo 'active'; ?>" href="lien-he.html">
                    <?=_gioithieu?></a></li>


                </ul>
                <div id="lang" class="col_w10">
                    <a href="index.php?com=ngonngu&lang=" title="Vietnamese">
                        <img src="images/vn.jpg">
                        <p>VI</p> 
                    </a>

                    <a href="index.php?com=ngonngu&lang=en" title="English">
                        <img src="images/en.jpg" >
                        <p>EN</p>
                    </a>
                </div>

                <button class="tim_phong"><a href="gioi-thieu.html"><?=_timphong?></a> </button>

                <!-- <div id="phone" class="col_w20">
                    <p><?=$company['dienthoai']?></p>
                    <p><?=$company['fax']?></p>
                </div> -->
                
            </nav>





