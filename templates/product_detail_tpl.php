<?php 

$arr_loaitienich = explode(',',$row_detail['id_loaitienich']);

$d->reset();

$sql = "select ten,photo FROM #_news_danhmuc where id='".$row_detail['id_loaicanho']."' and type='loaicanho' ";       

$d->query($sql);

$loaicanho = $d->fetch_array(); 


$d->reset();

$sql_quan = "select ten FROM #_product_danhmuc where id='".$row_detail['id_danhmuc']. "'";       

$d->query($sql_quan);

$p_quan = $d->fetch_array(); 

$d->reset();

$sql_phuong = "select ten FROM #_product_list where id='".$row_detail['id_list']. "'";       

$d->query($sql_phuong);

$p_phuong = $d->fetch_array(); 



$d->reset();

$sql_duong = "select ten FROM #_product_cat where id='".$row_detail['id_cat']. "'";       

$d->query($sql_duong);

$p_duong = $d->fetch_array(); 


?>

<link href="magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>

<!--Tags sản phẩm-->

<link href="css/tab.css" type="text/css" rel="stylesheet" />

<input type="hidden" value="1" class="soluong"  />
<div class="box_container">

<div id="col_left">





  
     

    <div class="zoom_slick">    

      <div class="slick2">                

        <a data-zoom-id="Zoom-detail" id="Zoom-detail" class="MagicZoom" href="<?php if($row_detail['photo'] != NULL)echo _upload_sanpham_l.$row_detail['photo'];else echo 'images/noimage.gif';?>" title="<?=$row_detail['ten']?>"><img class='cloudzoom' src="<?php if($row_detail['photo'] != NULL)echo _upload_sanpham_l.$row_detail['photo'];else echo 'images/noimage.gif';?>" /></a>



        <?php $count=count($hinhthem); if($count>0) {?>

          <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){?>

            <a data-zoom-id="Zoom-detail" id="Zoom-detail" class="MagicZoom" href="<?php if($hinhthem[$j]['photo']!=NULL) echo _upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>" title="<?=$row_detail['ten']?>" ><img src="<?php if($hinhthem[$j]['photo']!=NULL) echo _upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>" /></a>    

          <?php }} ?>

        </div><!--.slick-->





        <?php $count=count($hinhthem); if($count>0) {?>

          <div class="slick">                

            <p><img src="<?=_upload_sanpham_l.$row_detail['thumb']?>" /></p>

            <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){?>

              <p><img src="<?=_upload_hinhthem_l.$hinhthem[$j]['thumb']?>" /></p>

            <?php } ?>

          </div><!--.slick-->

        <?php } ?>



      </div><!--.zoom_slick-->
      <div class="tt_lh"> 
      <p><?=_trangchu?> > <b><?=_chinhanh?> <?=_khanhgiaapart?></b> > <b><?=$title_cat?></b></p>
    </div>
        <h3 class="pro--name"><?=$title_cat?> <?=_tai?> <?=_khanhgiaapart?> <?php if($row_detail['soldout'] > 0){ ?><span style="color: red">( <?=_daduocthue?> )</span><?php } ?></h3>

  

     <!--  <div id="pro__info none">    

        <div class="addr"><b><?=_diachi?>:</b>đường           
          <?php
          foreach( $p_duong as $value ){
            echo "$value";
          }
        ?>,phường           
        <?php foreach( $p_phuong as $value ){
          echo "$value";
        }
      ?>,quận 
      <?php  foreach( $p_quan as $value ){
        echo "$value";
      } 
      ?>
    </div> -->
    <div id="pro__info">    

      <div class="addr"><b><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                  width="19" height="19"
                  viewBox="0 0 384 512"
                  style=" fill:#15445E; margin-right: 5px; margin-bottom: -2px"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#15445E"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> </b> <?=$row_detail['diachi']
      ?>
    </div>
    <div class="icon_ifo">
    <div class="addr"><b><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                  width="19" height="19"
                  viewBox="0 0 512 512"
                  style=" fill:#15445E; margin-right: 5px; margin-bottom: -2px"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#15445E"><path d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm96 288H448c17.7 0 32-14.3 32-32V251.8c0-7.6-2.7-15-7.7-20.8l-65.8-76.8c-12.1-14.2-33.7-15-46.9-1.8l-21 21c-10 10-26.4 9.2-35.4-1.6l-39.2-47c-12.6-15.1-35.7-15.4-48.7-.6L135.9 215c-5.1 5.8-7.9 13.3-7.9 21.1v84c0 17.7 14.3 32 32 32z"/></svg></b> <?=$row_detail['dientich']?> m2</div>
    <div class="addr"><b><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                  width="19" height="19"
                  viewBox="0 0 640 512"
                  style=" fill:#15445E; margin-right: 5px; margin-bottom: -2px"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#15445E"><path d="M64 64a64 64 0 1 1 128 0A64 64 0 1 1 64 64zM25.9 233.4C29.3 191.9 64 160 105.6 160h44.8c27 0 51 13.4 65.5 34.1c-2.7 1.9-5.2 4-7.5 6.3l-64 64c-21.9 21.9-21.9 57.3 0 79.2L192 391.2V464c0 26.5-21.5 48-48 48H112c-26.5 0-48-21.5-48-48V348.3c-26.5-9.5-44.7-35.8-42.2-65.6l4.1-49.3zM448 64a64 64 0 1 1 128 0A64 64 0 1 1 448 64zM431.6 200.4c-2.3-2.3-4.9-4.4-7.5-6.3c14.5-20.7 38.6-34.1 65.5-34.1h44.8c41.6 0 76.3 31.9 79.7 73.4l4.1 49.3c2.5 29.8-15.7 56.1-42.2 65.6V464c0 26.5-21.5 48-48 48H496c-26.5 0-48-21.5-48-48V391.2l47.6-47.6c21.9-21.9 21.9-57.3 0-79.2l-64-64zM272 240v32h96V240c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2l64 64c9.4 9.4 9.4 24.6 0 33.9l-64 64c-6.9 6.9-17.2 8.9-26.2 5.2s-14.8-12.5-14.8-22.2V336H272v32c0 9.7-5.8 18.5-14.8 22.2s-19.3 1.7-26.2-5.2l-64-64c-9.4-9.4-9.4-24.6 0-33.9l64-64c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2z"/></svg></b> <?=_phuhop?> <?=$row_detail['lau']?> <?=_nguoio?></div>
    <div class="addr"><b><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                  width="19" height="19"
                  viewBox="0 0 640 512"
                  style=" fill:#15445E; margin-right: 5px; margin-bottom: -2px"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#15445E"><path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg></b> <?=$row_detail['sophong']?></div>
      </div>

       <!-- <div class="type"><b><?=_loaiphong?>:</b> <?php if($row_detail['sophongngu']==0){ ?>Studio <?php }else{ ?><?=$row_detail['sophongngu']?> p.ngủ<?php } ?> </div> -->
<!-- <div class="typeapart"><b><?=_loaicanho?>:</b> <?=$loaicanho['ten']?></div> -->
<div class="room_status_details">
  <?php if($row_detail['soldout'] > 0 ){ ?>
    <span class="sold__outs"><?=_dacokhach?></span>
  <?php }else{ ?> 
    <span class="still_emptys"><?=_controng?> </span>
  <?php } ?>
</div>
<div class="room_code_details"><b><?=_maphong?>:</b> <?=$row_detail['id']?></div>



<!-- <div class="price"><b><?=_gia?>:</b> <?=$row_detail['gia']?> <?=_trieuthang?> - <?=$row_detail['giangay']?> <?=_nganngay?></div> -->

</div> 

<!-- <div id="pro__desc">
  <h2>Thông tin</h2>
  <p><b><?=_giadien?>:</b> <?=$row_detail['giadien'] ?> <?=_kWh ?></p>
  <p><b><?=_gianuoc?>:</b> <?=$row_detail['gianuoc'] ?> <?=_m3 ?></p>
  <p><b><?=_phidichvu?>:</b> <?=$row_detail['phidichvu'] ?> <?=_nguoi ?></p>
  <p><b><?=_phiguixe?>:</b> <?=$row_detail['phiguixe'] ?> <?=_chiec ?></p>



</div> -->
<div id="">
  <h2><?=_mota?></h2>
  <hr>
  <?=$row_detail['noidung']?>

</div>

<?php if($row_detail['id_loaitienich']!=''){ ?> 

  <div id="pro_service">

    <h3 class="title"><?=_tienich?></h3>

    <ul class="list_service">

     <?php foreach ($arr_loaitienich as $key => $value) { 

       $d->reset();

       $sql = "select ten$lang as ten,photo FROM #_news_danhmuc where id='".$value."' and type='loaitienich' ";       

       $d->query($sql);

       $loaitienich = $d->fetch_array(); 

       ?>

       <li>

         <img src="<?=_upload_tintuc_l.$loaitienich['photo']?>" alt="<?=$loaitienich['ten']?>">

         <p><?=$loaitienich['ten']?></p>

       </li>

     <?php } ?>

   </ul>

 </div>

<?php } ?>

<div id="pro__content">
  <?=$row_detail['linkvideo']?>

</div>


<div class="clear"></div>



</div>

<div id="col_right">

<div id="map">

    <?=$row_detail['map']?>

  </div>

  <form method="post" name="frm_dangkythuephong" class="frm_dangkythuephong" action="ajax/dangkythuephong.php" enctype="multipart/form-data">

    <div style="display: none;">

      <input type="hidden" name="pid" value="<?=$row_detail['id']?>">



    </div>
    <div class="hoten_bg">
      <div class="loai_ng">
        <p><label><?=$title_cat?></label></p>
        <p><label><?=$row_detail['gia']?> <?=_trieuthang?> - <?=$row_detail['giangay']?> <?=_trieudem?></label></p>
      </div>
    <p><label><?=_hotenres?></label><span><input type="text" name="fullname" value="" size="40" class="fullname" aria-required="true" aria-invalid="false"></span></p>

    <p><label><?=_sdtres?></label><span ><input type="tel" name="phonenumber" value="" size="40" class="phonenumber" aria-required="true" aria-invalid="false"></span></p>

    <p><label><?=_emailres?></label><span ><input type="tel" name="email" value="" size="40" class="email" aria-required="true" aria-invalid="false"></span></p>
  </div>
  <div class="hoten_bg">
    <div class="loai_ng">
    <p><label><?=_ngaydenres?></label><span ><input type="date" name="arrive" value="" class="arrive" aria-required="true" aria-invalid="false"></span></p>

    <p><label><?=_ngaydires?></label><span ><input type="date" name="departure" value="" class="departure" aria-required="true" aria-invalid="false"></span></p>
  </div>
    <div class="loai_ng">
    <p><label><?=_phong?></label><span ><select name="room" class="room" aria-invalid="false"><option value="Studio">Studio</option><option value="1 phòng ngủ">1 <?=_phongngu?></option><option value="2 phòng ngủ">2 <?=_phongngu?></option><option value="3 phòng ngủ">3 <?=_phongngu?></option><option value="4 phòng ngủ">4 <?=_phongngu?></option><option value="5 phòng ngủ">5 <?=_phongngu?></option></select></span></p>

    <p><label><?=_nguoilon?></label><span ><select name="adults" class="adults" aria-invalid="false"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></span></p>

    <p><label><?=_treem?></label><span ><select name="children" class="children" aria-invalid="false"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></span></p>

    </div>
    

    <p><span class="click_send"><?=_gui?></span></p>
  </div>

    <div class="thongbao"></div>

  </form>

  

</div>


<div class="clear"></div>
 <div id="related_product">
  <h3 class="title"><?=_luachonkhac?></h3>
  <ul class="list_room">
    <?php foreach ($product as $key => $value) { ?>
      <li>
        <div class="image">
          <img src="<?=_upload_sanpham_l.$value['thumb']?>" alt="<?=$value['ten']?>">
          
        </div>
        <a href="san-pham/<?=$value['tenkhongdau']?>.html" class="room--name"><?=$value['ten']?></a>
        <div class="popup__detail">
         <div class="utilities">
                  <div class="utilities__item">
                    <i class="fas fa-wifi"></i>
                    <span><?=_wifitocdocao?></span>             
                  </div>
                  <div class="utilities__item">
                    <i class="fas fa-tv"></i>             
                    <span><?=_tvtrongphong?></span>             

                  </div>
                  <div class="utilities__item">
                    <i class="fas fa-couch"></i>              
                    <span><?=_ghesofa?></span>              
                  </div>
                  <div class="utilities__item">
                    <i class="fas fa-building"></i>             
                    <span><?=_viewtp?></span>             
                  </div>


                </div>
            
            <!-- <p class="address"><i class="fas fa-map-marker-alt"></i><?=$value['diachi']?></p> -->

            <div class="addr"><b><?=_dientich?>:</b> <?=$value['dientich']?> m2</div>
            <div class="btn_dathang">
            <span class="price"><b><?=_giathue?> </b><br><i class="fa fa-dollar-sign"></i><?=$value['gia']?> <?=_trieuthang?> - <?=$value['giangay']?> <?=_nganngay?></span>

            <a href="san-pham/<?=$value['tenkhongdau']?>.html" class="see__detail"><span><?=_xemchitiet?></span></a>
            </div>
          </div>
      </li>
    <?php } ?>
  </ul>
</div>
</div><!--.box_containerlienhe-->

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2517667182552553"
     crossorigin="anonymous"></script>
<!-- QC1 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2517667182552553"
     data-ad-slot="5650017973"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>