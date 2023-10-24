<?php
	if(!defined('SOURCES')) die("Error");

			$data = array();


		    $data['ten'] = (isset($_POST['ten']) && $_POST['ten'] != '') ? htmlspecialchars($_POST['ten']) : '';
		    $data['diachi'] = (isset($_POST['diachi']) && $_POST['diachi'] != '') ? htmlspecialchars($_POST['diachi']) : '';
		    $data['dienthoai'] = (isset($_POST['dienthoai']) && $_POST['dienthoai'] != '') ? htmlspecialchars($_POST['dienthoai']) : '';
			$data['email'] = (isset($_POST['email']) && $_POST['email'] != '') ? htmlspecialchars($_POST['email']) : '';
		    $data['noidung'] = (isset($_POST['noidung']) && $_POST['noidung'] != '') ? htmlspecialchars($_POST['noidung']) : '';
		    $data['ngaytao'] = time();
		    $data['stt'] = 1;
			$data['id_size'] = (isset($_POST['kichthuoc']) && $_POST['kichthuoc'] > 0) ? htmlspecialchars($_POST['kichthuoc']) : 0;
			$data['id_chatlieu'] = (isset($_POST['chatlieu']) && $_POST['chatlieu'] > 0) ? htmlspecialchars($_POST['chatlieu']) : 0;
			$data['id_somat'] = (isset($_POST['somat']) && $_POST['somat'] > 0) ? htmlspecialchars($_POST['somat']) : 0;
			$data['id_canmang'] = (isset($_POST['canmang']) && $_POST['canmang'] > 0) ? htmlspecialchars($_POST['canmang']) : 0;
			$data['id_khoanlo'] = (isset($_POST['khoanlo']) && $_POST['khoanlo'] > 0) ? htmlspecialchars($_POST['khoanlo']) : 0;
			$data['id_soduongcung'] = (isset($_POST['soduongcung']) && $_POST['soduongcung'] > 0) ? htmlspecialchars($_POST['soduongcung']) : 0;
			$data['id_hinhdang'] = (isset($_POST['hinhdang']) && $_POST['hinhdang'] > 0) ? htmlspecialchars($_POST['hinhdang']) : 0;
			$data['id_cachthuc'] = (isset($_POST['cachthuc']) && $_POST['cachthuc'] > 0) ? htmlspecialchars($_POST['cachthuc']) : 0;
			$data['id_kieube'] = (isset($_POST['kieube']) && $_POST['kieube'] > 0) ? htmlspecialchars($_POST['kieube']) : 0;
			$data['id_soluong'] = (isset($_POST['soluong']) && $_POST['soluong'] > 0) ? htmlspecialchars($_POST['soluong']) : 0;
			$data['id_product'] = (isset($_POST['sanpham']) && $_POST['sanpham'] > 0) ? htmlspecialchars($_POST['sanpham']) : 0;
			$data['gia'] = (isset($_POST['gia']) && $_POST['gia'] > 0) ? htmlspecialchars($_POST['gia']) : 0;
			$row_detail = $d->rawQueryOne("select ten$lang as ten,gia from #_product where id = ?and hienthi > 0 limit 0,1",array($data['id_product'] ));

		    $data['type'] = 'dat-in';
		    $d->insert('newsletter',$data);



		    /* Gán giá trị gửi email */
		    $strThongtin = '';
		    $emailer->setEmail('tennguoigui',$data['ten']);
		    $emailer->setEmail('emailnguoigui',$data['email']);
		    $emailer->setEmail('dienthoainguoigui',$data['dienthoai']);
		    $emailer->setEmail('diachinguoigui',$data['diachi']);
		    $emailer->setEmail('tieudelienhe',$data['tieude']);
		    $emailer->setEmail('noidunglienhe',$data['noidung']);
		    if($emailer->getEmail('tennguoigui'))
		    {
		    	$strThongtin .= '<span style="text-transform:capitalize"><b>Tên:</b>'.$emailer->getEmail('tennguoigui').'</span><br>';
		    }
		    if($emailer->getEmail('emailnguoigui'))
		    {
		    	$strThongtin .= '<a href="mailto:'.$emailer->getEmail('emailnguoigui').'" target="_blank"><b>Email:</b>'.$emailer->getEmail('emailnguoigui').'</a><br>';
		    }
		    if($emailer->getEmail('diachinguoigui'))
		    {
		    	$strThongtin .= '<b>Điạ chỉ:</b>'.$emailer->getEmail('diachinguoigui').'<br>';
		    }
		    if($emailer->getEmail('dienthoainguoigui'))
		    {
		    	$strThongtin .= '<b>Số điện thoại:</b> '.$emailer->getEmail('dienthoainguoigui').'';
		    }
		    $emailer->setEmail('thongtin',$strThongtin);

			// Thông tin chi tiết

			$strThongtin2 = '';

			if($data['id_product']){
				$emailer->setEmail('tensanpham',$row_detail['ten']);
			}
			if($data['id_size']){
				$emailer->setEmail('kichthuoc',$func->get_name_cart($data['id_size']));
		    	$strThongtin2 .= '<span style="text-transform:capitalize"><b>Kích thước:</b> '.$emailer->getEmail('kichthuoc').'</span><br>';
			}
			if($data['id_chatlieu']){
				$emailer->setEmail('chatlieu',$func->get_name_cart($data['id_chatlieu']));
		    	$strThongtin2 .= '<span style="text-transform:capitalize"><b>Chất liệu:</b> '.$emailer->getEmail('chatlieu').'</span><br>';
			}
			if($data['id_somat']){
				$emailer->setEmail('somat',$func->get_name_cart($data['id_somat']));
		    	$strThongtin2 .= '<span style="text-transform:capitalize"><b>Số Mặt:</b> '.$emailer->getEmail('somat').'</span><br>';
			}
			if($data['id_canmang']){
				$emailer->setEmail('canmang',$func->get_name_cart($data['id_canmang']));
		    	$strThongtin2 .= '<span style="text-transform:capitalize"><b>Cán Màng:</b> '.$emailer->getEmail('canmang').'</span><br>';
			}
			if($data['id_khoanlo']){
				$emailer->setEmail('khoanlo',$func->get_name_cart($data['id_khoanlo']));
		    	$strThongtin2 .= '<span style="text-transform:capitalize"><b>Khoan Lỗ:</b> '.$emailer->getEmail('khoanlo').'</span><br>';
			}
			if($data['id_soduongcung']){
				$emailer->setEmail('soduongcung',$func->get_name_cart($data['id_soduongcung']));
		    	$strThongtin2 .= '<span style="text-transform:capitalize"><b>Số Đường Cứng:</b> '.$emailer->getEmail('soduongcung').'</span><br>';
			}
			if($data['id_hinhdang']){
				$emailer->setEmail('hinhdang',$func->get_name_cart($data['id_hinhdang']));
		    	$strThongtin2 .= '<span style="text-transform:capitalize"><b>Hình Dạng:</b> '.$emailer->getEmail('hinhdang').'</span><br>';
			}
			if($data['id_cachthuc']){
				$emailer->setEmail('cachthuc',$func->get_name_cart($data['id_cachthuc']));
		    	$strThongtin2 .= '<span style="text-transform:capitalize"><b>Cách Thức:</b> '.$emailer->getEmail('cachthuc').'</span><br>';
			}
			if($data['id_kieube']){
				$emailer->setEmail('kieube',$func->get_name_cart($data['id_kieube']));
		    	$strThongtin2 .= '<span style="text-transform:capitalize"><b>Kiểu Bế :</b> '.$emailer->getEmail('kieube').'</span><br>';
			}
			if($data['id_soluong']){
				$emailer->setEmail('soluong',$func->get_name_cart($data['id_soluong']));
		    	$strThongtin2 .= '<span style="text-transform:capitalize"><b>Số Lượng:</b> '.$emailer->getEmail('soluong').'</span><br>';
			}
			if($data['gia']){
				$emailer->setEmail('gia',$func->format_money($data['gia']));
		    	$strThongtin2 .= '<span style="text-transform:capitalize"><b>Tổng giá:</b> '.$emailer->getEmail('gia').'</span><br>';
			}


		    $emailer->setEmail('thongtin2',$strThongtin2);
		    /* Nội dung gửi email cho admin */
		    $contentAdmin = '
			<table align="center" bgcolor="#dcf0f8" border="0" cellpadding="0" cellspacing="0" style="margin:0;padding:0;background-color:#f2f2f2;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px" width="100%">
				<tbody>
					<tr>
						<td align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">
							<table border="0" cellpadding="0" cellspacing="0" style="margin-top:15px" width="600">
								<tbody>
									<tr>
										<td align="center" id="m_-6357629121201466163headerImage" valign="bottom">
											<table cellpadding="0" cellspacing="0" style="border-bottom:3px solid '.$emailer->getEmail('color').';padding-bottom:10px;background-color:#fff" width="100%">
												<tbody>
													<tr>
														<td bgcolor="#FFFFFF" style="padding:0" valign="top" width="100%">
															<div style="color:#fff;background-color:f2f2f2;font-size:11px">&nbsp;</div>
															<table style="width:100%;">
																<tbody>
																	<tr>
																		<td>
																			<a href="'.$emailer->getEmail('home').'" style="border:medium none;text-decoration:none;color:#007ed3;margin:0px 0px 0px 20px" target="_blank">'.$emailer->getEmail('logo').'</a>
																		</td>
																		<td style="padding:15px 20px 0 0;text-align:right">'.$emailer->getEmail('social').'</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr style="background:#fff">
										<td align="left" height="auto" style="padding:15px" width="600">
											<table>
												<tbody>
													<tr>
														<td>
															<h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">Kính chào</h1>
															<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">Bạn nhận được thư đặt in từ khách hàng <span style="text-transform:capitalize">'.$emailer->getEmail('tennguoigui').'</span> tại website '.$emailer->getEmail('company:website').'.</p>
															<h3 style="font-size:13px;font-weight:bold;color:'.$emailer->getEmail('color').';text-transform:uppercase;margin:20px 0 0 0;padding: 0 0 5px;border-bottom:1px solid #ddd">Thông tin đặt in <span style="font-size:12px;color:#777;text-transform:none;font-weight:normal">(Ngày '.date('d',$emailer->getEmail('datesend')).' tháng '.date('m',$emailer->getEmail('datesend')).' năm '.date('Y H:i:s',$emailer->getEmail('datesend')).')</span></h3>
														</td>
													</tr>
												<tr>
												<td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tbody>
														<tr>
															<td style="padding:3px 0px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">'.$emailer->getEmail('thongtin').'
															<br><strong>Nội dung: </strong>'.$emailer->getEmail('noidunglienhe').'</i>
															</td>
														</tr>

													</tbody>
												</table>
												</td>
											</tr>
											<tr>
												<td style="padding:3px 0px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">
												<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;"><b>Thông tin sản phẩm</b>: '.$emailer->getEmail('tensanpham').'</p>
												'.$emailer->getEmail('thongtin2').'</td>
											</tr>
											<tr>
												<td>&nbsp;
													<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;border:1px '.$emailer->getEmail('color').' dashed;padding:10px;list-style-type:none">Bạn cần được hỗ trợ ngay? Chỉ cần gửi mail về <a href="mailto:'.$emailer->getEmail('company:email').'" style="color:'.$emailer->getEmail('color').';text-decoration:none" target="_blank"> <strong>'.$emailer->getEmail('company:email').'</strong> </a>, hoặc gọi về hotline <strong style="color:'.$emailer->getEmail('color').'">'.$emailer->getEmail('company:hotline').'</strong> '.$emailer->getEmail('company:worktime').'. '.$emailer->getEmail('company:website').' luôn sẵn sàng hỗ trợ bạn bất kì lúc nào.</p>
												</td>
											</tr>
											<tr>
												<td>&nbsp;
												<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;line-height:18px;color:#444;font-weight:bold">Một lần nữa '.$emailer->getEmail('company:website').' cảm ơn quý khách.</p>
												<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;text-align:right"><strong><a href="'.$emailer->getEmail('home').'" style="color:'.$emailer->getEmail('color').';text-decoration:none;font-size:14px" target="_blank">'.$emailer->getEmail('company').'</a> </strong></p>
												</td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td align="center">
						<table width="600">
							<tbody>
								<tr>
									<td>
									<p align="left" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:18px;color:#4b8da5;padding:10px 0;margin:0px;font-weight:normal">Quý khách nhận được email này vì đã đặt in tại '.$emailer->getEmail('company:website').'.<br>
									Để chắc chắn luôn nhận được email thông báo, phản hồi từ '.$emailer->getEmail('company:website').', quý khách vui lòng thêm địa chỉ <strong><a href="mailto:'.$emailer->getEmail('email').'" target="_blank">'.$emailer->getEmail('email').'</a></strong> vào số địa chỉ (Address Book, Contacts) của hộp email.<br>
									<b>Địa chỉ:</b> '.$emailer->getEmail('company:address').'</p>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
				</tbody>
			</table>';

			/* Nội dung gửi email cho khách hàng */
			$contentCustomer = '
			<table align="center" bgcolor="#dcf0f8" border="0" cellpadding="0" cellspacing="0" style="margin:0;padding:0;background-color:#f2f2f2;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px" width="100%">
				<tbody>
					<tr>
						<td align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">
							<table border="0" cellpadding="0" cellspacing="0" style="margin-top:15px" width="600">
								<tbody>
									<tr>
										<td align="center" id="m_-6357629121201466163headerImage" valign="bottom">
											<table cellpadding="0" cellspacing="0" style="border-bottom:3px solid '.$emailer->getEmail('color').';padding-bottom:10px;background-color:#fff" width="100%">
												<tbody>
													<tr>
														<td bgcolor="#FFFFFF" style="padding:0" valign="top" width="100%">
															<div style="color:#fff;background-color:f2f2f2;font-size:11px">&nbsp;</div>
															<table style="width:100%;">
																<tbody>
																	<tr>
																		<td>
																			<a href="'.$emailer->getEmail('home').'" style="border:medium none;text-decoration:none;color:#007ed3;margin:0px 0px 0px 20px" target="_blank">'.$emailer->getEmail('logo').'</a>
																		</td>
																		<td style="padding:15px 20px 0 0;text-align:right">'.$emailer->getEmail('social').'</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr style="background:#fff">
										<td align="left" height="auto" style="padding:15px" width="600">
											<table>
												<tbody>
													<tr>
														<td>
															<h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">Kính chào Quý khách</h1>
															<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">Thông tin đặt in của quý khách đã được tiếp nhận. '.$emailer->getEmail('company:website').' sẽ phản hồi trong thời gian sớm nhất.</p>
															<h3 style="font-size:13px;font-weight:bold;color:'.$emailer->getEmail('color').';text-transform:uppercase;margin:20px 0 0 0;padding: 0 0 5px;border-bottom:1px solid #ddd">Thông tin đặt in <span style="font-size:12px;color:#777;text-transform:none;font-weight:normal">(Ngày '.date('d',$emailer->getEmail('datesend')).' tháng '.date('m',$emailer->getEmail('datesend')).' năm '.date('Y H:i:s',$emailer->getEmail('datesend')).')</span></h3>
														</td>
													</tr>
												<tr>
												<td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tbody>
													<tr>
													<td style="padding:3px 0px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">'.$emailer->getEmail('thongtin').'
													<br><strong>Nội dung: </strong>'.$emailer->getEmail('noidunglienhe').'</i>
													</td>
												</tr>

													</tbody>
												</table>
												</td>
											</tr>


											<tr>
												<td style="padding:3px 0px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">
												<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;"><b>Thông tin sản phẩm</b>: '.$emailer->getEmail('tensanpham').'</p>
												'.$emailer->getEmail('thongtin2').'</td>
											</tr>
											<tr>
												<td>&nbsp;
													<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;border:1px '.$emailer->getEmail('color').' dashed;padding:10px;list-style-type:none">Bạn cần được hỗ trợ ngay? Chỉ cần gửi mail về <a href="mailto:'.$emailer->getEmail('company:email').'" style="color:'.$emailer->getEmail('color').';text-decoration:none" target="_blank"> <strong>'.$emailer->getEmail('company:email').'</strong> </a>, hoặc gọi về hotline <strong style="color:'.$emailer->getEmail('color').'">'.$emailer->getEmail('company:hotline').'</strong> '.$emailer->getEmail('company:worktime').'. '.$emailer->getEmail('company:website').' luôn sẵn sàng hỗ trợ bạn bất kì lúc nào.</p>
												</td>
											</tr>
											<tr>
												<td>&nbsp;
												<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;line-height:18px;color:#444;font-weight:bold">Một lần nữa '.$emailer->getEmail('company:website').' cảm ơn quý khách.</p>
												<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;text-align:right"><strong><a href="'.$emailer->getEmail('home').'" style="color:'.$emailer->getEmail('color').';text-decoration:none;font-size:14px" target="_blank">'.$emailer->getEmail('company').'</a> </strong></p>
												</td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td align="center">
						<table width="600">
							<tbody>
								<tr>
									<td>
									<p align="left" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:18px;color:#4b8da5;padding:10px 0;margin:0px;font-weight:normal">Quý khách nhận được email này vì đã đặt in tại '.$emailer->getEmail('company:website').'.<br>
									Để chắc chắn luôn nhận được email thông báo, phản hồi từ '.$emailer->getEmail('company:website').', quý khách vui lòng thêm địa chỉ <strong><a href="mailto:'.$emailer->getEmail('email').'" target="_blank">'.$emailer->getEmail('email').'</a></strong> vào số địa chỉ (Address Book, Contacts) của hộp email.<br>
									<b>Địa chỉ:</b> '.$emailer->getEmail('company:address').'</p>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
				</tbody>
			</table>';

			/* Send email admin */
			$arrayEmail = null;
			$subject = "Thư đặt in từ ".$setting['ten'.$lang];
			$message = $contentAdmin;
			$file = 'file';

			if($emailer->sendEmail("admin", $arrayEmail, $subject, $message, $file))
			{
				/* Send email customer */
				$arrayEmail = array(
					"dataEmail" => array(
						"name" => $emailer->getEmail('tennguoigui'),
						"email" => $emailer->getEmail('emailnguoigui')
					)
				);
				$subject = "Thư đặt in từ ".$setting['ten'.$lang];
				$message = $contentCustomer;
				$file = 'file';

				if($emailer->sendEmail("customer", $arrayEmail, $subject, $message, $file)) $func->transfer("Gửi đặt in thành công",$config_base);
			}
			else $func->transfer("Gửi đặt in thất bại. Vui lòng thử lại sau",$config_base, false);


?>