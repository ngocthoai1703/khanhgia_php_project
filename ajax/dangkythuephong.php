<?php 
include ("ajax_config.php");


$ten = trim(strip_tags($_POST['fullname']));
$pid= trim(strip_tags($_POST['pid']));
$dienthoai = trim(strip_tags($_POST['phonenumber']));
$email = trim(strip_tags($_POST['email']));
$ngayden = trim(strip_tags($_POST['arrive']));
$ngaydi = trim(strip_tags($_POST['departure']));
$songuoilon = trim(strip_tags($_POST['adults']));
$sotreem = trim(strip_tags($_POST['children']));
$sophongngu = trim(strip_tags($_POST['room']));
$ip = getRealIPAddress();
$ngaydangky = time();
$ngaycapnhat = time();
$coloi = false;		
if ($ten == NULL) { 
	$coloi=true; $error = _nhaphoten;
} 
if ($dienthoai == NULL) { 
	$coloi=true; $error = _nhapsodienthoai;
}

if ($email == NULL) { 
	$coloi=true; $error = _nhapdiachi;
}
		#Nếu không điền đầy đủ thông tin cần thiết

		#Nếu điền đầy đủ thông tin cần thiết
if ($coloi==false) 
{	

			#Mẫu mã đơn hàng VD:05032016NN101
	$donhangmau = date('dmY').'NN';

			#Kiểm tra mã đơn hàng lớn nhất trong ngày
	$d->reset();
	$sql = "select id,madonhang from #_donhang where madonhang like '$donhangmau%' order by id desc limit 0,1";
	$d->query($sql);
	$max_order = $d->fetch_array();

			#Nếu không tồn tại đơn hàng nào trong ngày hôm nay
	if(empty($max_order['id']))
	{
		$songaunhien = 101;
	}
	else
	{
		(int)$songaunhien =  substr($max_order['madonhang'],10)+1;
	}
			#Mã đơn hàng của đơn hàng hiện tại là
	$madonhang = date('dmY').'NN'.$songaunhien;
			//dump($tonggia);
	$sql = "INSERT INTO  table_donhang (madonhang,hoten,dienthoai,email,ngaytao,ngaycapnhat,tinhtrang,ip,ngayden,ngaydi,songuoilon,sotreem,sophongngu) 
	VALUES ('$madonhang','$ten','$dienthoai','$email','$ngaydangky','$ngaycapnhat','1','$ip','$ngayden','$ngaydi','$songuoilon','$sotreem','$sophongngu')";	
	if(mysql_query($sql))
	{
		
		$coloi = false;
		$q = 1;
		$pmasp = get_code($pid);					
		$pname = get_product_name($pid);
		$pphoto = get_product_photo($pid);
		$pgia = get_price($pid);
		$pdiachi = get_address($pid);


					#Nếu số lượng bàng ko thì bỏ qua
		if($q == 0) continue;
		$sql = "INSERT INTO table_chitietdonhang (madonhang,masp,ten,gia,soluong,ngaytao,photo,id_sanpham,diachi) VALUES ('$madonhang','$pmasp','$pname','$pgia','$q','$ngaydangky','$pphoto','$pid','$pdiachi')";

		if(mysql_query($sql) == true)
		{
			$coloi = true;
		}	
		
		if($coloi==true){
			include_once "../sources/phpMailer/class.phpmailer.php";	
					$mail = new PHPMailer();
					$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
					$mail->Host       = $ip_host;   // tên SMTP server
					$mail->SMTPAuth   = true;       // Sử dụng đăng nhập vào account
					$mail->Username   = $mail_host; // SMTP account username
					$mail->Password   = $pass_mail;  
			
					//Thiết lập thông tin người gửi và email người gửi
					$mail->SetFrom($mail_host,$_POST['ten_lienhe']);
					
					$mail->AddAddress($company['email'], 'Đơn hàng từ website '.$_SERVER["SERVER_NAME"]);
					$mail->AddAddress($email, 'Đơn hàng từ website '.$_SERVER["SERVER_NAME"]);
					//Thiết lập email nhận email hồi đáp
					
					//nếu người nhận nhấn nút Reply
					$mail->AddReplyTo($email,'Đơn hàng từ website'.$_SERVER["SERVER_NAME"]);
					/*=====================================
					 * THIET LAP NOI DUNG EMAIL
					*=====================================*/
					//Thiết lập tiêu đề
					$mail->Subject    = "Đơn hàng từ website".$_SERVER["SERVER_NAME"];
					$mail->IsHTML(true);
					//Thiết lập định dạng font chữ
					$mail->CharSet = "utf-8";		
						$body = '<table>';
						$body .= '
							<tr>
								<th colspan="2">&nbsp;</th>
							</tr>
							<tr>
								<th colspan="2">Đơn đặt phòng từ website <a href="'.$_SERVER["SERVER_NAME"].'">'.$_SERVER["SERVER_NAME"].'</a></th>
							</tr>
							<tr>
								<th colspan="2">&nbsp;</th>
							</tr>
							<tr>
								<th>Mã đơn đặt phòng :</th><td>'.$madonhang.'</td>
							</tr>
							<tr>
								<th>Họ tên :</th><td>'.$ten.'</td>
							</tr>
							<tr>
								<th>Email :</th><td>'.$email.'</td>
							</tr>
							<tr>
								<th>Điện thoại :</th><td>'.$dienthoai.'</td>
							</tr>
							<tr>
								<th>Ngày đến :</th><td>'.$ngayden.'</td>
							</tr>
							<tr>
								<th>Ngày đi :</th><td>'.$ngaydi.'</td>
							</tr>
							<tr>
								<th>Số lượng người lớn :</th><td>'.$songuoilon.'</td>
							</tr>
							<tr>
								<th>Số lượng trẻ em :</th><td>'.$sotreem.'</td>
							</tr>
							<tr>
								<th>Loại phòng :</th><td>'.$sophongngu.'</td>
							</tr>

							';
						$body .= '</table>';
						
						
						#------------Chi tiết đơn hàng---------------------
						$body.='<table border="0" cellpadding="5px" cellspacing="1px" style="color:#000000; background:#d4d4d4; width:100%;">';

							$body.= '<tr bgcolor="#F0F0F0" height="55px"><td style="text-align:center;">Hình phòng</td><td style="text-align:center;" class="gh_an">Tên phòng</td> <td align="center">Giá thuê</td></tr>';				
								$body.= '<tr bgcolor="#FFFFFF" style="color:#000000;">';
								$body.='<td width="15%" align="center"><img src="http://'.$config_url.'/upload/sanpham/'.$pphoto.'" style="max-height:50px; margin:5px 0;" /></td>';
								$body.='<td width="25%" style="padding:0px 10px; box-sizing:border-box;">'.$pname.'</td>';				
								$body.="<td width='15%' align='center'>".number_format(get_price($pid),0, ',', '.')." triệu/tháng</td>";                 
								
								$body.='</tr>';
							
						
				   $body.='</table>';
				   #------------Chi tiết đơn hàng---------------------
		
						$mail->Body = $body;

						if($mail->Send())
						{
							$return['nhaplai']='nhaplai';
						}
		}
	}
}
		#Nếu insert bảng đơn hàng thành công thì tiếp tự insert vào bảng chi tiết đơn hàng
echo json_encode($return);

?>
