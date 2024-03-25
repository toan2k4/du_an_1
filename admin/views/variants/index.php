<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
    </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <?= $title ?>
            </h6>
        </div>
        <div class="card-body">
            <?php if (isset ($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success'])
                        ?>
                </div>
            <?php endif; ?>
            <?php if (isset ($_SESSION['errors'])): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($_SESSION['errors'] as $error): ?>
                            <li>
                                <?= $error ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php unset($_SESSION['errors']) ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Chọn sản phẩm</label>
                    <select name="id_sp" id="" class="form-select" onchange="showVariant(this.value)">
                        <option value="">--- Chọn sản phẩm ---</option>
                        <?php foreach ($products as $value): ?>
                            <option value="<?= $value['id'] ?>" <?= isset ($_SESSION['data']) && $_SESSION['data']['id_sp'] == $value['id'] ? 'selected' : null ?>>
                                <?= $value['ten_sp'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 row justify-content-between">
                    <div class="col-6">
                        <label class="form-label">Tên màu </label>
                        <input type="text" class="form-control " name="ten_mau" placeholder="Nhập tên màu" value="<?= isset ($_SESSION['data'])? $_SESSION['data']['ten_mau']: null ?>">
                    </div>
                    <div class="col-6">
                        <label class="form-label">mã màu</label>
                        <input type="color" class="form-control col-3" name="ma_mau" value="<?= isset ($_SESSION['data'])? $_SESSION['data']['ma_mau']: null ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Size</label>
                    <select name="size" id="" class="form-control">
                        <option value="">--- Chọn size -----</option>
                        <option value="S" <?= isset ($_SESSION['data']) && $_SESSION['data']['size'] == 'S' ? 'selected' : null ?>>S</option>
                        <option value="M" <?= isset ($_SESSION['data']) && $_SESSION['data']['size'] == 'M' ? 'selected' : null ?>>M</option>
                        <option value="L" <?= isset ($_SESSION['data']) && $_SESSION['data']['size'] == 'L' ? 'selected' : null ?>>L</option>
                        <option value="XL" <?= isset ($_SESSION['data']) && $_SESSION['data']['size'] == 'XL' ? 'selected' : null ?>>XL</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Số lượng</label>
                    <input type="text" class="form-control" name="so_luong" placeholder="Nhập số lượng" value="<?= isset ($_SESSION['data'])? $_SESSION['data']['so_luong']: null ?>">
                </div>



                <input type="submit" name="gui" class="btn btn-success" value="Thêm">
                <a href="<?= BASE_URL_ADMIN ?>?act=products" type="submit" class="btn btn-warning">Quay lại </a>
            </form>
        </div>

    </div>
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Danh sách biến thể
            </h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Size</th>
                        <th>Tên màu</th>
                        <th>Mã màu</th>
                        <th>Sô lượng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody id="txtHint">
                    <?php if (isset ($_SESSION['variants'])):
                        foreach ($_SESSION['variants'] as $key => $value):
                            ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $value['size'] ?>
                                </td>
                                <td>
                                    <?= $value['ten_mau'] ?>
                                </td>
                                <td>
                                    <h5 class="fw-bold " style="color: <?= $value['ma_mau'] ?>">
                                        <?= $value['ma_mau'] ?>
                                    </h5>
                                </td>
                                <td>
                                    <?= $value['so_luong'] ?>
                                </td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN?>?act=variant-update&id=<?= $value['id']?>" class="btn btn-warning" >Sửa</a>
                                    <a href="<?= BASE_URL_ADMIN?>?act=variant-delete&id=<?= $value['id']?>" class="btn btn-danger" onclick="return confirm('bạn có chắc chắn muốn xóa không!')">Xóa</a>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                    endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>






<?php if (isset ($_SESSION['variants']))
    unset($_SESSION['variants']) ?>
<?php if (isset ($_SESSION['data']))
    unset($_SESSION['data']) ?>
    <script>

        function showVariant(str) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "<?= BASE_URL_ADMIN ?>?act=variants&id_sp=" + str, true);
        xmlhttp.send();
    }

    // function updateVariant(id) {
    //     var xmlhttp = new XMLHttpRequest();
    //     xmlhttp.onreadystatechange = function () {
    //         if (this.readyState == 4 && this.status == 200) {
    //             document.getElementById("exampleModal").innerHTML = this.responseText;
    //         }
    //     }
    //     xmlhttp.open("GET", "<?= BASE_URL_ADMIN ?>?act=variant-update&id_sp=" + id, true);
    //     xmlhttp.send();
    // }
</script>