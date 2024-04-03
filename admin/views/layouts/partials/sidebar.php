
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASE_URL_ADMIN ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= BASE_URL_ADMIN?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Bảng điều khiển </span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

<!-- users  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoUser" aria-expanded="true"
            aria-controls="collapseTwoUser">
            <i class="bi bi-person-fill"></i>
            <!-- <i class="fas fa-fw fa-cog"></i> -->
            <span>Quản lý tài khoản</span>
        </a>
        <div id="collapseTwoUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=users">Danh sách tài khoản</a>
                <a class="collapse-item"  href="<?= BASE_URL_ADMIN?>?act=user-create">Thêm tài khoản</a>
            </div>
        </div>
    </li>

    <!-- roles  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="bi bi-bezier2"></i>
            <!-- <i class="fas fa-fw fa-cog"></i> -->
            <span>Quản lý phân quyền</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=roles">Danh sách phân quyền </a>
                <a class="collapse-item"  href="<?= BASE_URL_ADMIN?>?act=role-create">Thêm phân quyền</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    

    <!-- categories -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoCategory" aria-expanded="true"
            aria-controls="collapseTwoCategory">
            <i class="bi bi-list"></i>
            <!-- <i class="fas fa-fw fa-cog"></i> -->
            <span>Quản lý danh mục</span>
        </a>
        <div id="collapseTwoCategory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=categories">Danh sách danh mục</a>
                <a class="collapse-item"  href="<?= BASE_URL_ADMIN?>?act=category-create">Thêm danh mục</a>
            </div>
        </div>
    </li>

    <!-- products  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoproduct" aria-expanded="true"
            aria-controls="collapseTwoproduct">
            <i class="bi bi-collection"></i>
            <!-- <i class="fas fa-fw fa-cog"></i> -->
            <span>Quản lý sản phẩm </span>
        </a>
        <div id="collapseTwoproduct" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=products">Danh sách sản phẩm</a>
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=product-create">Thêm sản phẩm </a>
            </div>
        </div>
    </li>

    <!-- vouchers  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoVoucher" aria-expanded="true"
            aria-controls="collapseTwoVoucher">
            <i class="bi bi-tags-fill"></i>
            <!-- <i class="fas fa-fw fa-cog"></i> -->
            <span>Quản lý khuyến mãi </span>
        </a>
        <div id="collapseTwoVoucher" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=vouchers">Danh sách khuyến mãi</a>
                <a class="collapse-item"  href="<?= BASE_URL_ADMIN?>?act=voucher-create">Thêm khuyến mãi</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- order status  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoorder" aria-expanded="true"
            aria-controls="collapseTwoorder">
            <i class="bi bi-cart-check"></i>
            <!-- <i class="fas fa-fw fa-cog"></i> -->
            <span>Quản lý đơn hàng</span>
        </a>
        <div id="collapseTwoorder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=orders">Danh sách đơn hàng </a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoStatus" aria-expanded="true"
            aria-controls="collapseTwoStatus">
            <i class="bi bi-toggles2"></i>
            <!-- <i class="fas fa-fw fa-cog"></i> -->
            <span>Quản lý trạng thái đơn hàng</span>
        </a>
        <div id="collapseTwoStatus" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=statuses">Danh sách trạng thái</a>
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=status-create">Thêm trạng thái </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoBlog" aria-expanded="true"
            aria-controls="collapseTwoBlog">
            <i class="bi bi-blockquote-right"></i>
            <!-- <i class="fas fa-fw fa-folder"></i> -->
            <span>Quản lý bài viết tin tức</span>
        </a>
        <div id="collapseTwoBlog" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=blogs">Danh sách bài viết</a>
                <a class="collapse-item"  href="<?= BASE_URL_ADMIN?>?act=blog-create">Thêm bài viết</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoContact" aria-expanded="true"
            aria-controls="collapseTwoContact">
            <i class="bi bi-person-lines-fill"></i>
            <!-- <i class="fas fa-fw fa-folder"></i> -->
            <span>Quản lý liên hệ </span>
        </a>
        <div id="collapseTwoContact" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=contacts">Danh sách liên hệ</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Setting - Nội dung-->
    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL_ADMIN?>?act=setting-form">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Setting-Content</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>
