<?php

session_start();

$session=session_id();



@define ( '_template' , './templates/');

@define ( '_source' , './sources/');

@define ( '_lib' , './admin/lib/');



include_once _lib."Mobile_Detect.php";

$detect = new Mobile_Detect;

$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');



$lang_default = array("","en");



if(isset($_SESSION['lang']))

{

	$lang=$_SESSION['lang'];

}

else

{

	$lang="";

}



require_once _source."lang$lang.php";	

include_once _lib."config.php";

include_once _lib."constant.php";

include_once _lib."functions.php";

include_once _lib."class.database.php";

include_once _lib."functions_user.php";

include_once _lib."functions_giohang.php";

include_once _lib."file_requick.php";

include_once _source."counter.php";	



?>



<!doctype html>

<html lang="vi">



<head itemscope itemtype="http://schema.org/WebSite" >

    <base href="http://<?=$config_url?>/" />



    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0, user-scalable=yes">





    <link rel="canonical" href="<?=getCurrentPageURL()?>" />



    <?php include _template."layout/seoweb.php";?>

    <?php include _template."layout/web_css.php";?> 



    <?=$company['codethem']?>  



</head>



<?php //include _template."layout/background.php";?>



<body  <?=$str_background?> >



    <div id="wapper">

        <div class="wap_menu">

            <div class="menu">

                <?php include _template."layout/menu_top.php";?>

            </div><!---END .menu-->

        </div><!---END .wap_menu--> 



        <?php if($template=='index') {

            $d->reset();

            $sql = " select photo from #_background where type='bgsearch'";

            $d->query($sql);

            $bgsearch =  $d->fetch_array();



            ?>

            <div id="filter--res" style="background-image: url(<?=_upload_hinhanh_l.$bgsearch['photo']?>);
                                            width: 90%;
                                            display: flex;
                                            margin: 0 auto;">

                <?php include _template."layout/filter_res.php";?>

            </div><!---END #slider--> 

        <?php } ?>

        <?php if($template=='index') { include _template."layout/gioithieu_index.php"; } ?> 

        <div id="main_content">



            <?php include _template.$template."_tpl.php"; ?>



            <div class="clear"></div>

        </div><!---END #main_content--> 



       <!--  <?php //if($template=='index') { include _template."layout/canho_noibat.php"; } ?>  -->

        <!-- <?php //if($template=='index') { include _template."layout/tintuc_index.php"; } ?> -->

        <!-- <?php //if($template=='index') { include _template."layout/camnang_dulich.php"; } ?> -->
        <?php if($template=='index') { include _template."layout/blog.php"; } ?>

        <?php if($template=='index') { include _template."layout/khachhang.php"; } ?>
        <?php if($template=='index') { include _template."layout/banner.php"; } ?>

        <?php  include _template."layout/hinhthuclienhe.php"; ?>

        <div class="clear"></div>









        <div id="wap_footer" >

            <?php include _template."layout/footer.php";?>

            <div class="wap_chat_zalo">
                <?php include _template."layout/chat_zalo.php"; ?>
            </div>

            <div class="clear"></div>

        </div><!---END#wap_footer-->





    </div><!---END #wapper-->





    <?php include _template."layout/web_js.php";?>



    <?php include _template."layout/giohang_ajax.php";?>

    <?php //include _template."layout/chat_facebook.php"; ?>

    <?php //include _template."layout/phone2.php";?>





</body>

</html>




