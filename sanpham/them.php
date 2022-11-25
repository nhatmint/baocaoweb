<div class = "container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm Sản Phẩm</h2>
        </div>
        <div class="card-body">
           <form method="POST" enctype="multipart/form-data">

            <div class = "form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="sp_name" class = "form-control">
            </div>

            <div class = "form-group">
                <label for="">Mã sản phẩm</label>
                <input type="text" name="sp_name" class = "form-control">
            </div>

            <div class = "form-group">
                <label for="">Ảnh sản phẩm</label>
                <input type="file" name="image" > <br>
            </div>

            <div class = "form-group">
                <label for="">Giá sản phẩm</label>
                <input type="number" name="price" class = "form-control">
            </div>

            <div class = "form-group">
                <label for="">Loại hàng</label>
                <input type="text" name="loai" class = "form-control">
            </div>

            <div class = "form-group">
                <label for="">Ngày cập nhật</label>
                <input type="text" name="sp_name" class = "form-control">
            </div>

            <div class = "form-group">
                <label for="">Ngày tạo</label>
                <input type="text" name="sp_name" class = "form-control">
            </div>

            <div class = "form-group">
                <label for="">Số lượng</label>
                <input type="number" name="quanlity" class = "form-control">
            </div> 

            <div class="form-group">
              <label for="">Danh mục</label>
              <select class="form-control" name="brand_id" id="">
                <option></option>
              </select>
            </div>
           </form>
        </div>

        
    </div>
</div>