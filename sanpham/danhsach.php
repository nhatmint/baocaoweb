<?php
    $sql = "SELECT * FROM sanpham INNER JOIN danhmuc on sanpham.id_brand = danhmuc.id_brand";
    $query = mysqli_query($con, $sql);
?>


<div class="contain-fluid">
    <div class="card">
        <div class="card-heard">
            <h2>Danh sách sản phẩm</h4>
        </div>
        <div class="card-body">
            <table class = "table">
                <thead class = "thead-dark">
                    <tr>
                        <th>#</th>
                        <th>ID </th>
                        <th>Tên Sản Phẩm</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Ảnh Sản Phẩm</th>
                        <th>Giá Sản Phẩm</th>
                        <th>Loại Hàng</th>
                        <th>Ngày Cập Nhật</th>
                        <th>Ngày Tạo</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                        while($row = mysqli_fetch_assoc($query)){?>
                            <tr>
                                <td> <?php echo $i++; ?> </td>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['code'] ?></td>

                                <td>
                                    <img style = "width: 100px"src="./<?php echo $row['image']; ?> " >
                                    
                                </td>

                                <td><?php echo $row['price'] ?></td>
                                <td><?php echo $row['LoaiHang'] ?></td>
                                <td><?php echo $row['ngaycapnhat'] ?></td>
                                <td><?php echo $row['ngaytao'] ?></td>
                                <td>Sửa</td>
                                <td>Xóa</td>
                            </tr> 
                        <?php }   ?>
                    
                   
                </tbody>
            </table>
            <a class="btn btn-primary" href="admin.php?page_layout=them">Thêm</a>
        </div>
    </div>
</div>