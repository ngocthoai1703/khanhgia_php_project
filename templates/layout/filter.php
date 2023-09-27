<script type="text/javascript">
	function select_onchange()

	{				

		var a=document.getElementById("id_danhmuc");

		window.location ="index.php?com=index&id_danhmuc="+a.value;	

		return true;

	}

	function select_onchange1()

	{				

		var a=document.getElementById("id_danhmuc");

		var b=document.getElementById("id_list");

		window.location ="index.php?com=index&id_danhmuc="+a.value+"&id_list="+b.value;	

		return true;

	}

	function select_onchange2()

	{				

		var a=document.getElementById("id_danhmuc");

		var b=document.getElementById("id_list");

		var c=document.getElementById("id_cat");

		window.location ="index.php?com=index&id_danhmuc="+a.value+"&id_list="+b.value+"&id_cat="+c.value;	

		return true;

	}	
	function select_onchangeHuyen()

	{				

		var a=document.getElementById("id_danhmuc");

		var b=document.getElementById("id_list_huyen");

		window.location ="index.php?com=index&id_danhmuc="+a.value+"&id_list="+b.value;	

		return true;

	}
</script>



<?php 

function get_quan_list(){

	$sql="select * from table_product_danhmuc where type='location' and hienthi=1 order by stt";



	$stmt=mysql_query($sql);

	$str='

	<select id="id_danhmuc" name="id_danhmuc" onchange="select_onchange()" class="main_select select_danhmuc">

	<option>Chọn quận</option>			

	';

	while ($row=@mysql_fetch_array($stmt)) 

	{

		if($row["id"]==(int)@$_REQUEST["id_danhmuc"])

			$selected="selected";

		else 

			$selected="";

		$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			

	}

	$str.='</select>';

	return $str;
}
function get_huyen_list(){

	$sql="select * from table_product_list where id_danhmuc=".$_REQUEST['id_danhmuc']." and hienthi = 1  order by stt";

	$stmt=mysql_query($sql);

	$str='

	<select id="id_list_huyen" name="id_list_huyen" onchange="select_onchangeHuyen()" class="main_select select_danhmuc">

	<option>Chọn huyện</option>			

	';

	while ($row=@mysql_fetch_array($stmt)) 

	{

		if($row["id"]==(int)@$_REQUEST["id_list"])

			$selected="selected";

		else 

			$selected="";

		$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			

	}

	$str.='</select>';

	return $str;

}
function get_duong_cat(){

	$sql="select * from table_product_cat where id_list=".$_REQUEST['id_list']."  order by stt";

	$stmt=mysql_query($sql);

	$str='

	<select id="id_cat" name="id_cat" onchange="select_onchange2()" class="main_select select_cat">

	<option>Chọn đường</option>			

	';

	while ($row=@mysql_fetch_array($stmt)) 

	{

		if($row["id"]==(int)@$_REQUEST["id_cat"])

			$selected="selected";

		else 

			$selected="";

		$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			

	}

	$str.='</select>';

	return $str;

}
?>
<div class="filter block">

	<h3 class="title" style="display: none;"><?=_choncanho?></h3>

	<div class="form__filter">

		<div class="location">


			<div class="choose_location">

				<?=get_quan_list()?>


			</div>

		</div>
		<!-- <div class="apartment">


      <input class="check_in" type="date" id="birthday" value="<?php echo date('Y-m-d'); ?>">
      <input class="check_in" type="date" id="birthday" value="<?php echo date('Y-m-d'); ?>">

    </div >
    <div class="apartment">
      <label><?=_nguoilon?></label><span ><select name="adults" class="adults" aria-invalid="false"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></span>


      <label><?=_treem?></label><span ><select name="adults" class="adults" aria-invalid="false"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></span>
    </div> -->
		<div class="location" >


			<div class="choose_location">

				<?=get_huyen_list()?>


			</div>

		</div>
		<div class="location" style="display: none;">


			<div class="choose_location">

				<?=get_duong_cat()?>


			</div>

		</div>

		

<!-- 		<div class="acreage none">

			<select name="dientich" id="acreage">

				<?php

				$sql_sdientich="select ten$lang as ten,noidung from #_news_danhmuc where type='sdientich' and hienthi=1 order by stt asc,id desc";

				$d->query($sql_sdientich);

				$sdientich=$d->result_array();

				?>

				<option value=""><?=_dientich?></option>

				<?php for($i=0;$i<count($sdientich);$i++){ ?>

					<option value="<?=$sdientich[$i]['noidung']?>"><?=$sdientich[$i]['ten']?></option>

				<?php } ?>

			</select>

		</div> -->




	<div class="row">

		<div class="pricemin" >

			<select name="pricemin" id="pricemin">

				<?php

				$sql_sgia="select ten$lang as ten,noidung from #_news_danhmuc where type='sgiamin' and hienthi=1 order by stt asc,id desc";

				$d->query($sql_sgia);

				$sgia=$d->result_array();

				?>

				<option value="0"><?=_thapnhat?></option>

				<?php for($i=0;$i<count($sgia);$i++){ ?>

					<option value="<?=$sgia[$i]['noidung']?>"><?=$sgia[$i]['ten']?></option>

				<?php } ?>

			</select>

		</div>

		<div class="pricemax" >

			<select name="pricemax" id="pricemax">

				<option value="9999999999"><?=_caonhat?></option>

				<?php for($i=0;$i<count($sgia);$i++){ ?>

					<option value="<?=$sgia[$i]['noidung']?>"><?=$sgia[$i]['ten']?></option>

				<?php } ?>

			</select>

		</div>

	</div>

	<div class="row" >

		<div class="apartment">

			<select name="canho" id="apartment">

				<?php

				$sql_loaicanho="select ten$lang as ten,id from #_news_danhmuc where type='loaicanho' and hienthi=1 order by stt asc,id desc";

				$d->query($sql_loaicanho);

				$loaicanho=$d->result_array();

				?>

				<option value=""><?=_tatcacanho?></option>

				<?php for($i=0;$i<count($loaicanho);$i++){ ?>

					<option value="<?=$loaicanho[$i]['id']?>"><?=$loaicanho[$i]['ten']?></option>

				<?php } ?>

			</select>

		</div>

		<div class="room">

			<input type="number" name="tienich" id="service"  placeholder="<?=_nhapidphong?>" />

		</div> 



	</div>

	<div class="row1">
		<!-- <?=$template ?> -->

		<button class="btn_search"><?=_timkiem?></button>

	</div>

</div>

</div>