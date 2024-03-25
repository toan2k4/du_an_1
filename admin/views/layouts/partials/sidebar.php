
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- roles  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Roles</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=roles">Danh sách roles</a>
                <a class="collapse-item"  href="<?= BASE_URL_ADMIN?>?act=role-create">Thêm role</a>
            </div>
        </div>
    </li>

     <!-- users  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoUser" aria-expanded="true"
            aria-controls="collapseTwoUser">
            <i class="fas fa-fw fa-cog"></i>
            <span>User</span>
        </a>
        <div id="collapseTwoUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=users">Danh sách users</a>
                <a class="collapse-item"  href="<?= BASE_URL_ADMIN?>?act=user-create">Thêm user</a>
            </div>
        </div>
    </li>

    <!-- categories -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoCategory" aria-expanded="true"
            aria-controls="collapseTwoCategory">
            <i class="fas fa-fw fa-cog"></i>
            <span>category</span>
        </a>
        <div id="collapseTwoCategory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=categories">Danh sách categories</a>
                <a class="collapse-item"  href="<?= BASE_URL_ADMIN?>?act=category-create">Thêm category</a>
            </div>
        </div>
    </li>

    <!-- vouchers  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoVoucher" aria-expanded="true"
            aria-controls="collapseTwoVoucher">
            <i class="fas fa-fw fa-cog"></i>
            <span>Vouchers</span>
        </a>
        <div id="collapseTwoVoucher" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=vouchers">Danh sách vouchers</a>
                <a class="collapse-item"  href="<?= BASE_URL_ADMIN?>?act=voucher-create">Thêm voucher</a>
            </div>
        </div>
    </li>

    <!-- comments  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoComment" aria-expanded="true"
            aria-controls="collapseTwoComment">
            <i class="fas fa-fw fa-cog"></i>
            <span>Comments</span>
        </a>
        <div id="collapseTwoComment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=comments">Danh sách comments</a>
            </div>
        </div>
    </li>

     <!-- products  -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoproduct" aria-expanded="true"
            aria-controls="collapseTwoproduct">
            <i class="fas fa-fw fa-cog"></i>
            <span>products</span>
        </a>
        <div id="collapseTwoproduct" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=products">Danh sách products</a>
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=product-create">Thêm products</a>
                <a class="collapse-item" href="<?= BASE_URL_ADMIN?>?act=variant-create">Thêm biến thể</a>
            </div>
        </div>
    </li>

</ul>
