<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Save
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= BASE_URL_ADMIN . '?act=setting-save' ?>" method="POST">
                <table class="table">
                    <tr>
                        <th>Trường dữ liệu</th>
                        <th>Dữ liệu</th>
                    </tr>

                    <tr>
                        <td>Logo</td>
                        <td>
                            <input type="text" class="form-control" name="logo" value="<?= $settings['logo'] ?? null ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Overview</td>
                        <td>
                            <textarea type="text" class="form-control" name="overview" ><?= $settings['overview'] ?? null ?></textarea>
                        </td>
                    </tr>

                </table>

                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>