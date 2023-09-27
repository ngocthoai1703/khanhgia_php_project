<?php



$d->reset();

$sql = "select ten$lang as ten,photo,thumb,tenkhongdau,title,description,mota$lang as mota from #_product_danhmuc where type='location' and hienthi=1 and noibat = 1 order by stt,id desc";

$d->query($sql);

$p_danhmuc = $d->result_array();

$d->reset();
$sql = "select ten$lang as ten,mota$lang as mota,title,keywords,description,photo from #_background where type='banner' and hienthi=1";
$d->query($sql);
$logo_sig = $d->fetch_array();

$d->reset();
$sql = "select ten$lang as ten,noidung$lang as noidung,title,photo from #_about where type='showroom' and hienthi=1";
$d->query($sql);
$background_sig = $d->fetch_array();

$d->reset();
$sql_social="select photo,link,ten from #_slider where type='social' and hienthi=1 order by stt asc,id desc";
$d->query($sql_social);
$social=$d->result_array();

$d->reset();
$sql2="select ten$lang as ten,tenkhongdau,id from #_news where type='chinhsach' and hienthi=1 order by stt asc,id desc";
$d->query($sql2);
$chinhsach_ft=$d->result_array();

?>

<div class="signature">

        <div class="header1">
            <a href="#menu_mobi" class="hien_menu"><i class="fa fa-bars" aria-hidden="true"></i> </a>
            <a href="index.html"><img class="logo1" src="<?=_upload_hinhanh_l.$logo_sig['photo']?>" /></a>
                <div id="lang1" class="col_w10">
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
		<div class="head_sig">
			<div id="wp_logo" class="col_w20">  
            <a href="index.html"><img class="logo" src="<?=_upload_hinhanh_l.$logo_sig['photo']?>" /></a>
        	</div>
        	<ul id="list_menu" class="col_w60">
            
                    <li><a class="<?php if($_REQUEST['com'] == 'cam-nang-du-lich') echo 'active'; ?>" href=""><?=_khanhgiaapart?></a></li>
                    <li><a href="cam-nang-du-lich.html#khac-biet"><?=_khacbiet?></a></li>


                </ul>
			 <div id="lang1" class="col_w10">
                    <a href="index.php?com=ngonngu&lang=" title="Vietnamese">
                        <img src="images/vn.jpg">
                        <p>VI</p> 
                    </a>

                    <a href="index.php?com=ngonngu&lang=en" title="English">
                        <img src="images/en.jpg" >
                        <p>EN</p>
                    </a>
                </div>
                 <button class="dat_phong"><a href="gioi-thieu.html"><?=_timphong?></a> </button>
		</div>
		<div class="background_sig"  style="background-image: url(<?=_upload_hinhanh_l.$background_sig['photo']?>); ">
				<div class="content_sig">
					<div class="color_sig">
						<h1><?=$background_sig['ten']?></h1>
						<div class="noidung_sig"><?=$background_sig['noidung']?></div>
					</div>
				</div>
				
		</div>

		

	<div class="bst_sig">
		<h1>
			<span><?=_bo?> <b><?=_suutap?></b></span>
			<div class="line_title">
				<div class="line_title1"></div>
				<div class="line_title2"></div>
			</div>
		</h1>
		<div class="types">
		<?php foreach ($p_danhmuc as $key => $value) { ?>
			
			<div class="item_type" style="background-image: url(<?=_upload_sanpham_l.$value['thumb']?>); ">
				
					<div class="color_type">
						<span class="cate_name"><?=_SignatureByKG?> <?=$value['ten']?></span>
					<div class="btn_sig">
					<div class="mota_bst"><?=$value['mota']?></div>
					<button class="dat_phong"><a href="san-pham/<?=$value['tenkhongdau']?>/"><?=_xemthem?></a></button>
					</div>
					</div>
					

			</div>
		<?php } ?>
		</div>
	</div>
	<div id="khac-biet">
		<h1>
			<span><?=_4khacbiet?> <b><?=_lamnensutinhte?></b></span>
			<div class="line_title">
				<div class="line_title1"></div>
				<div class="line_title2"></div>
			</div>
		</h1>
		<div class="khac_biet">
	 	<?php for($i = 0, $count_tintuc = count($tintuc); $i < $count_tintuc; $i++){ ?>
	        <div class="box_kb">
	            <img src="<?=_upload_tintuc_l.$tintuc[$i]['thumb']?>" />  
	            <h3 class="ten_kb"><?=$tintuc[$i]['ten']?></h3>
	            <div class="clear"></div>         
	        </div> <!---END .box_new--> 
	    <?php } ?>
	</div>
	</div>  <!---END .wap_box_new-->
	<div class="ft_sig">
		<div class="col_w35">
			<img src="<?=_upload_hinhanh_l.$logo_sig['photo']?>" />
			<div id="social">
         <?php foreach ($social as $key => $value) { ?>
          <a href="<?=$value['link']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$value['photo']?>" ></a>
        <?php } ?>
        <div id="copy_right"><span>Copyright © Khanh An Apartment</span></div>
            </div>
        	</div>
        	<div class="col_w20 pdl25">
        <h3 class="title_sig"><?=_khanhgiaapart?></h3>
        <ul class="list_addr">
            <li><a class="<?php if($_REQUEST['com'] == 'news') echo 'active'; ?>" href="dich-vu.html"><?=_tintuckhuyenmai?></a></li>
            <li><a class="<?php if($_REQUEST['com'] == 'gioi-thieu') echo 'active'; ?>" href="lien-he.html"><?=_gioithieu?></a></li>
       </ul>
     </div>
     <div class="col_w20 pdl25">
            <h3 class="title_sig"><?=_hotro?></h3>
            <ul class="list_addr">
             <?php foreach ($chinhsach_ft as $key => $value2) { ?>
               <li><a href="chinh-sach/<?=$value2['tenkhongdau']?>.html" ><?=$value2['ten']?></a></li>
             <?php } ?>
           </ul>
         </div>
         <div class="col_w25 pdl25">
         	<h3 class="title_sig"><?=_lienhe?></h3>
         	<div class="lienhe_sig">
		<?php foreach ($p_danhmuc as $key => $value) { ?>
			<div class="lienhe_sig1">
			<span class=""><?=$value['title']?></span>
					
			<div class="description_sig"><?=$value['description']?></div>
			</div>		
		<?php } ?>
		</div>
		</div>
	</div>
	
		<div class="clear"></div>
	<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div>

<!-- <h1 class="tieude_giua"><span><?=$title_cat?></span></h1>
	<div class="box_container">
	<div class="wap_box_new">
	 	<?php for($i = 0, $count_tintuc = count($tintuc); $i < $count_tintuc; $i++){ ?>
	        <div class="box_news">
	            <a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>.html" title="<?=$tintuc[$i]['ten']?>"><img src="<?php if($tintuc[$i]['thumb']!=NULL)echo _upload_tintuc_l.$tintuc[$i]['thumb'];else echo 'images/noimage.png';?>" alt="<?=$tintuc[$i]['ten']?>" /></a>      
	            <h3 class="ten"><a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>.html" title="<?=$tintuc[$i]['ten']?>"><?=$tintuc[$i]['ten']?></a></h3>
	            <div class="mota"><?=$tintuc[$i]['mota']?></div>  
	            <div class="clear"></div>         
	        </div> <!---END .box_new--> 
	    <?php } ?>
	</div>  <!---END .wap_box_new-->
	<!-- <div class="clear"></div>
	<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
	</div> --> <!---END .box_container-->