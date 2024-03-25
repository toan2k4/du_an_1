<?php foreach ($variants as $key => $value): ?>
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
            <a href="<?= BASE_URL_ADMIN ?>?act=variant-update&id=<?= $value['id'] ?>" class="btn btn-warning">Sửa</a>
            <a href="<?= BASE_URL_ADMIN ?>?act=variant-delete&id=<?= $value['id'] ?>" class="btn btn-danger" onclick="return confirm('bạn có chắc chắn muốn xóa không!')">Xóa</a>
        </td>
    </tr>
<?php endforeach ?>