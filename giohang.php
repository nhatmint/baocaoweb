<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM sanpham WHERE code='" . $_GET["code"] . "'");
			// $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;
    // case "back":
    //     header("location:trangchu.php");
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="giohang.css">
    <link rel="stylesheet" href="trangchu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <title>Li??n h???</title>
</head>

<body>
    <!-- Header -->

    <div class="header" id="lendau">
        <div class="header_top">
            <ul class="header_top_left_left">
                <li class="hotro"><a href="trangchu.php">trang ch???</a></li>
                <li class="hotro"><a href="#">gi???i thi???u</a></li>
                <li><a href="#">h??? th???ng c???a h??ng</a></li>
            </ul>
            <ul class="header_top_left_right">
                <li><a href="#">H?????ng d???n mua h??ng</a></li>
                <li><a href="#">ki???m tra ????n h??ng</a></li>
                <li class="hotro"><a href="#">h??? tr???</a></li>
            </ul>
        </div>
        <div class="header_bottom" id="myHeader">
            <div class="logo">
                <a href="trangchu.php"> <img src="./imge/logo.webp" alt=""></a>

            </div>
            <div class="search">
                <form action="" id="search_box">
                    <input type="text" id="search_text" placeholder="T??m ki???m s???n ph???m" required>
                    <button id="search_btn"> <i class="fa fa-search"></i></button>
                </form>

            </div>
            <div class="icon">
                <div class="icon_header icon_phone">
                    <a href="">
                        <i class="fa fa-phone"></i>
                        <span>0987655433</span>
                    </a>
                </div>
                <div class="icon_header icon_account">
                    <a href="dangnhap.php">
                        <i class="fa fa-user"></i>
                        <span>T??i kho???n</span>
                    </a>
                </div>
                <div class="icon_header icon_cart">
                    <a href="giohang.php">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Gi??? h??ng</span>
                    </a>

                </div>

            </div>
        </div>
    </div>

    <!-- End Header -->
    <!-- Body_middle -->
    <div class="body_middle">
        <!-- Body_middle_1 -->
        <div class="body_inside">
            <div class="body_menu">
                <div class="body_menu_left">
                    <ul>
                        <li>
                            <div id="anh">
                                <a href="#"> <img src="imge/top_icon_1_thumb.webp"></a>
                            </div>
                            <div id="chu">
                                <a href="#sanphambanchay">B??n ch???y</a>
                            </div>
                        </li>
                        <li>
                            <div id="anh">
                                <a href="#"> <img src="imge/top_icon_2_thumb.webp"></a>
                            </div>
                            <div id="chu">
                                <a href="#">Khuy???n m??i</a>
                            </div>
                        <li>
                            <div id="anh">
                                <a href="#"> <img src="imge/top_icon_3_thumb.webp"></a>
                            </div>
                            <div id="chu">
                                <a href="#sanphammoi">M???i</a>
                            </div>
                        <li><a href="#">
                                <div id="anh">
                                    <a href="#"> <img src="imge/top_icon_4_thumb.webp"></a>
                                </div>
                                <div id="chu">
                                    <a href="#like">Y??u th??ch</a>
                                </div>
                        <li>
                            <div id="anh">
                                <a href="#"> <img src="imge/top_icon_5_thumb.webp"></a>
                            </div>
                            <div id="chu">
                                <a href="#">M??i</a>
                            </div>
                        <li>
                            <div id="anh">
                                <a href="#"> <img src="imge/top_icon_6_thumb.webp"></a>
                            </div>
                            <div id="chu">
                                <a href="#">M???t</a>
                            </div>
                        <li>
                            <div id="anh">
                                <a href="#"> <img src="imge/top_icon_7_thumb.webp"></a>
                            </div>
                            <div id="chu">
                                <a href="#">M???t</a>
                            </div>
                        <li>
                            <div id="anh">
                                <a href="#"> <img src="imge/top_icon_8_thumb.webp"></a>
                            </div>
                            <div id="chu">
                                <a href="#">Ph??? ki???n</a>
                            </div>
                    </ul>
                </div>
                <div class="body_menu_right">
                    <div class="nguyen">
                        <h1 class="text">T???t c??? s???n ph???m Black Rouge</h1>
                        <a href="tatcasanpham.php" target="_blank">Xem ngay!</a>
                    </div>
                </div>
            </div>
        </div>
        <div >
        <div class="body_content">
            <div class="body_content_body">
                <div class="body_content_body1">
                    <h1>Gi??? h??ng c???a b???n</h1>
                </div>
            </div>
            <div>
            <?php
            if(isset($_SESSION["cart_item"])){
                $total_quantity = 0;
                $total_price = 0;
                ?>	
            <table class="tbl-cart" cellpadding="10" cellspacing="1"   border-collapse="collapse" style:"margin-top:50px">
                <tbody>
                    <tr>
                        <th style="text-align:left;">Name</th>
                        <th style="text-align:left;">Code</th>
                        <th style="text-align:right;" width="5%">Quantity</th>
                        <th style="text-align:right;" width="10%">Unit Price</th>
                        <th style="text-align:right;" width="10%">Price</th>
                        <th style="text-align:center;" width="5%">Remove</th>
                    </tr>	
                    <?php		
                    foreach ($_SESSION["cart_item"] as $item){
                        $item_price = $item["quantity"]*$item["price"];
                        ?>
                        <tr>
                            <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
                            <td><?php echo $item["code"]; ?></td>
				            <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				            <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				            <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				            <td style="text-align:center;"><a href="giohang.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="imge/icon-delete.png" alt="Remove Item" /></a></td>
				        </tr>
                        <?php
                        $total_quantity += $item["quantity"];
				        $total_price += ($item["price"]*$item["quantity"]);
                    }
                    ?>
                    <tr>
                        <td colspan="2" align="right">Total:</td>
                        <td align="right"><?php echo $total_quantity; ?></td>
                        <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>		
            <?php
            } else {
                ?>
                <div class="no-records">Your Cart is Empty</div>
                <?php 
                }
                ?>
                <a id="back" href="trangchu.php">Mua S???m Ti???p</a>
                <a id="btnEmpty" href="giohang.php?action=empty">Empty Cart</a>
                <a id="btntt" href="giohang.php">Thanh To??n</a>
             </div>
        </div>
      
    </div>
          
        <!-- body_middle_ten -->
        <div class="body_middle_ten">
            <img src="./imge/anh_body_10_1.webp" alt="">
            <div class="ten_top">
                Rouge Power Club C???ng ?????ng Nh???ng ng?????i y??u th??ch th????ng hi???u Black Rouge t???i Vi???t Nam.
                <br>
                ????y l?? n??i c?? v?? v??n ??u ????i ??u ????i mua h??ng, quy???n l???i h???p d???n c??ng nh???ng ?????c quy???n ch??? d??nh ri??ng
                cho
                Roubae
            </div>
            <div class="ten_bottom">
                <a href="">Tham gia ngay</a>
            </div>
        </div>
        <!-- End body_middle_ten -->
        <!-- End body_middle -->
    </div>

    <!-- End Body_middle_1 -->
    <!--Footer-->
    <div class="footer">
        <div class="footer_inside">
            <div class="footer1">
                <p>Legal Entity | <span>DM&C CO., LTD</span></p>
                <p>?????a ch???: T???ng 10, 194 Golden Building, 473 ??i???n Bi??n Ph???, Ph?????ng 25, B??nh Th???nh, H??? Ch?? Minh</p>
                <p>Th??ng tin h??? tr???: <a href="#">0909 312 350</a></p>
                <p>Email support: cskh@dmnc.vn Or blackrougevn@gmail.com</p>
                <a href="http://online.gov.vn/(X(1)S(c4r0ihn4yy1gwxol5piuiyug))/Home/WebDetails/62960?AspxAutoDetectCookieSupport=1"
                    target="_blank"><img src="imge/fFooter_bct_image.webp" alt=""></a>
            </div>
            <div class="footer2">
                <div class="footer2_top">
                    <p>V??? CH??NG T??I</p>
                    <a href="#">
                        <h1>Trang ch???</h1>
                    </a>
                    <br>
                    <a href="#">
                        <h1>H??? th???ng c???a h??ng</h1>
                    </a>
                </div>
                <div class="footer2_bottom">
                    <a href="#" target="_blank"><img src="imge/fFooter_top_payment_image_1.webp" alt=""></a>
                    <a href="#" target="_blank"><img src="imge/fFooter_top_payment_image_2.webp" alt=""></a>
                    <a href="#" target="_blank"><img src="imge/fFooter_top_payment_image_3.webp" alt=""></a>
                </div>
            </div>
            <div class="footer3">
                <p>CH??NH S??CH</p>
                <a href="#" target="_blank">
                    <h1>??i???u kho???n d???ch v???</h1>
                </a>
                <a href="#" target="_blank">
                    <h1>Ch??nh s??ch b???o m???t</h1>
                </a>
                <a href="#" target="_blank">
                    <h1>Ch??nh s??ch v???n chuy???n v?? giao nh???n</h1>
                </a>
                <a href="#" target="_blank">
                    <h1>Ch??nh s??ch ?????i tr??? v?? ho??n ti???n</h1>
                </a>
                <a href="#" target="_blank">
                    <h1>Quy ?????nh v?? h??nh th???c thanh to??n</h1>
                </a>
            </div>
            <div class="footer4">
                <div class="footer4_top">
                    <p>K???T N???I V???I CH??NG T??I</p>
                    <a href="https://www.facebook.com/BlackRougeVietnam/" target="_blank"><img
                            src="imge/fFooter_top_social_image_1.webp" alt=""></a>
                    <a href="https://www.tiktok.com/@blackrougevietnam" target="_blank"><img
                            src="imge/fFooter_top_social_image_2.webp" alt=""></a>
                    <a href="https://zalo.me/4083379486007296299" target="_blank"><img
                            src="imge/fFooter_top_social_image_3.webp" alt=""></a>
                    <a href="https://zalo.me/4083379486007296299" target="_blank"><img
                            src="imge/fFooter_top_social_image_4.webp" alt=""></a>
                    <a href="https://www.instagram.com/blackrouge_vn/" target="_blank"><img
                            src="imge/fFooter_top_social_image_5.webp" alt=""></a>
                </div>
                <div class="footer4_bottom">
                    <p>????NG K?? NH???N B???N TIN</p>
                    <div class="form_email">
                        <input required type="email" id="newsletter-email" value placeholder="Nh???p email c???a b???n">
                        <button type="submit" onclick="location.href='#';">????NG K??</button>
                    </div>
                    <h1>????? nh???n th??ng tin v?? khuy???n m??i m???i nh???t</h1>
                </div>
            </div>
            <div class="footer5">
                <div>
                    <a href="#" target="_blank"><img src="imge/addThis_cus_image_1.webp" alt=""></a>
                    <a href="#" target="_blank">
                        <h1>H?????ng d???n check h??ng th???t</h1>
                    </a>
                </div>
                <div>
                    <a href="#" target="_blank"><img src="imge/addThis_cus_image_2.webp" alt=""></a>
                    <a href="#" target="_blank">
                        <h1>B??o c??o h??ng gi???</h1>
                    </a>
                </div>
                <div>
                    <a href="#lendau"><img src="imge/addThis_cus_image_3.webp" alt=""></a>
                    <a href="#lendau">
                        <h1>L??n ?????u trang</h1>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="trangchu.js"></script>

</body>

</html>