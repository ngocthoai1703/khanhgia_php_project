<?php  if(!defined('_source')) die("Error");



if(isset($_GET['keyword'])){

	$tukhoa =  $_GET['keyword'];

	$tukhoa = trim(strip_tags($tukhoa));    	

	if (get_magic_quotes_gpc()==false) {

		$tukhoa = mysql_real_escape_string($tukhoa);    			

	}								



	$where = " (ten$lang LIKE '%$tukhoa%' or masp LIKE '%$tukhoa%') and type='".$type."' and hienthi=1 order by stt,id desc";



		#Lấy sản phẩm và phân trang

	$d->reset();

	$sql = "SELECT count(id) AS numrows FROM #_product where $where";

	$d->query($sql);	

	$dem = $d->fetch_array();



	$totalRows = $dem['numrows'];

	$page = $_GET['p'];

		$pageSize = 12;//Số item cho 1 trang

		$offset = 5;//Số trang hiển thị				

		if ($page == "")$page = 1;

		else $page = $_GET['p'];

		$page--;

		$bg = $pageSize*$page;		

		

		$d->reset();

		$sql = "select id,ten$lang as ten,tenkhongdau,thumb,photo,masp,gia,giacu from #_product where $where limit $bg,$pageSize";		

		$d->query($sql);

		$product = $d->result_array();	

		$url_link = getCurrentPageURL();

		

		$com = "san-pham";

	}else{

		$id_danhmuc = trim(strip_tags($_GET['quan']));
		// echo $id_danhmuc;

			//Lọc nâng cao

		@$id_huyen =   trim(strip_tags(addslashes($_GET['huyen'])));

		@$id_duong =   trim(strip_tags(addslashes($_GET['duong'])));	

		@$min =   trim(strip_tags(addslashes($_GET['min'])));

		@$max =   trim(strip_tags(addslashes($_GET['max'])));

		@$loaicanho =   trim(strip_tags(addslashes($_GET['loaicanho'])));

		@$id_product =   trim(strip_tags(addslashes($_GET['idpr'])));	

		// if (get_magic_quotes_gpc()==false) {

		// 	$vitri = mysql_real_escape_string($vitri);    			

		// }								

		
		if($id_danhmuc=="Chọn quận" | $id_danhmuc==''){
			if(@$min!='' && $max!=''){

				$where.="gia between ".$min." and ".$max." ";

			}

		}else{

			$where = " id_danhmuc=  ".$id_danhmuc." ";
		}

		if(@$id_huyen!='' & @$id_huyen!="Chọn huyện"){

			$where.=" and id_list=".$id_huyen." ";

		}

		if(@$id_duong!='' & @$id_duong!="Chọn đường"){

			$where.="and id_cat =".$id_duong." ";

		}

		if(@$min!='' && $max!=''){

			$where.="and gia between ".$min." and ".$max." ";

		}

		if(@$loaicanho!=''){

			$where.="and id_loaicanho = ".$loaicanho." ";

		}

		if(@$id_product!=''){

			$where.="and id=".$id_product." and hienthi=1 order by stt,id desc ";

		}else{

			$where.="and hienthi=1 order by stt,id desc ";

		}

		
		#Lấy sản phẩm và phân trang

		$d->reset();

		$sql = "SELECT count(id) AS numrows FROM #_product where $where";

		$d->query($sql);	

		$dem = $d->fetch_array();

		

		$totalRows = $dem['numrows'];

		$page = $_GET['p'];

		$pageSize = 12;//Số item cho 1 trang

		$offset = 5;//Số trang hiển thị				

		if ($page == "")$page = 1;

		else $page = $_GET['p'];

		$page--;

		$bg = $pageSize*$page;		

		

		$d->reset();

		$sql = "select id,ten$lang as ten,tenkhongdau,thumb,photo,masp,gia,giacu,dientich,sophongngu,diachi FROM #_product where $where limit $bg,$pageSize";			

		$d->query($sql);



		$product = $d->result_array();	

		$url_link = getCurrentPageURL();

		

		$com = "san-pham";

	}

?>