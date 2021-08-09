
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('index')}}">
                    <div class="brand-logo"><img class="logo" src="{{asset('image-use/images.jpg')}}" /></div>
                    <h2 class="brand-text mb-0">ADMIN</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            <li class=" navigation-header"><span>Products &amp; Category</span>
            <li class=" nav-item"><a href="{{route('category.index')}}"><i class="bx bxs-receipt"></i><span class="menu-title" data-i18n="Kanban">Categories</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('colors.index')}}"><i class="bx bxs-vial" ></i><span class="menu-title" data-i18n="Colors">Colors</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('sizes.index')}}"><i class="bx bx-font-size" ></i><span class="menu-title" data-i18n="Form Wizard">Sizes</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('product.index')}}"><i class="bx bxs-bug" data-icon="thumbnails-small"></i><span class="menu-title" data-i18n="Widgets">Products</span><span class="badge badge-light-primary badge-pill badge-round float-right">New</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('index.comments')}}"><i class="bx bxs-bug" data-icon="thumbnails-small"></i><span class="menu-title" data-i18n="Widgets">Comments</span><span class="badge badge-light-primary badge-pill badge-round float-right">New</span></a>
            </li>
            <li class=" navigation-header"><span>Info &amp; Company</span>
            <li class=" nav-item"><a href="{{route('post.index')}}"><i class="bx bxs-book-content" ></i><span class="menu-title" data-i18n="Kanban">Posts</span></a>
            <li class=" nav-item"><a href="{{route('banner.index')}}"><i class="bx bx-images" data-icon="save"></i><span class="menu-title" data-i18n="File Manager">Banners</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('websetting.index')}}"><i class="bx bxs-brightness" data-icon="globe"></i><span class="menu-title" data-i18n="i18n">Settings</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="bx bxs-notepad" data-icon="notebook"></i><span class="menu-title" data-i18n="Invoice">Invoice</span></a>
                <ul class="menu-content">
                    <li><a href="app-invoice-list.html"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice List">Invoice List</span></a>
                    </li>
                    <li><a href="app-invoice.html"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice">Invoice</span></a>
                    </li>
                    <li><a href="app-invoice-edit.html"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice Edit">Invoice Edit</span></a>
                    </li>
                    <li><a href="app-invoice-add.html"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice Add">Invoice Add</span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span>Users </span>

            <li class=" nav-item"><a href="{{route('user.index')}}"><i class="bx bxs-contact" data-icon="users"></i><span class="menu-title" data-i18n="User">User</span></a>
            </li>

            <li class=" nav-item"><a href="{{route('roles.index')}}"><i class="bx bxs-group" data-icon="save"></i><span class="menu-title" data-i18n="File Manager">Roles</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('permission.index')}}"><i class="bx bxs-user-detail" data-icon="notebook"></i><span class="menu-title" data-i18n="Invoice">Permission</span></a>


        </ul>
    </div>
</div>
