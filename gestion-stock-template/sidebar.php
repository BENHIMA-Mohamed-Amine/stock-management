<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php" class="<?= $active[0]; ?>"><img src="assets/img/icons/dashboard.svg"
                            alt="img"><span>
                            Dashboard</span> </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/quotation1.svg" alt="img"><span>
                            Category</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="categorylist.php" class="<?= $active[3]; ?>">Category List</a></li>
                        <li><a href="addcategory.php" class="<?= $active[4]; ?>">Add Category</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/scanners.svg" alt="img"><span>
                            Brand</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="brandlist.php" class="<?= $active[1]; ?>">Brand List</a></li>
                        <li><a href="addbrand.php" class="<?= $active[2]; ?>">Add Brand</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span>
                            Product</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="productlist.php" class="<?= $active[5]; ?>">Product List</a></li>
                        <li><a href="addproduct.php" class="<?= $active[6]; ?>">Add Product</a></li>
                    </ul>
                </li>
                
                <li class="submenu">
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/users1.svg" alt="img"><span>
                            Customer</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="customerlist.php" class="<?= $active[11]; ?>">Customer List</a></li>
                        <li><a href="addcustomer.php" class="<?= $active[12]; ?>">Add Customer </a></li>
                    </ul>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/sales1.svg" alt="img"><span>
                            Sales</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="salesreturnlists.php" class="<?= $active[7]; ?>">Sales List</a></li>
                        <li><a href="createsalesreturns.php" class="<?= $active[8]; ?>">New Sales</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/users1.svg" alt="img"><span>
                            Supplier</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="supplierlist.php" class="<?= $active[13]; ?>">Supplier List</a></li>
                        <li><a href="addsupplier.php" class="<?= $active[14]; ?>">Add Supplier </a></li>
                    </ul>
                <li class="submenu">
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/purchase1.svg" alt="img"><span>
                            Purchase</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="purchaselist.php" class="<?= $active[9]; ?>">Purchase List</a></li>
                        <li><a href="addpurchase.php" class="<?= $active[10]; ?>">Add Purchase</a></li>
                    </ul>
                </li>
                
                   <li class="submenu"> 
                    <a href="javascript:void(0);">
                        <img src="assets/img/icons/users1.svg" alt="img">
                        <span>
                            Admin
                        </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="newuser.php" class="<?= $active[15]; ?>">New Admin </a></li>
                        <li><a href="userlists.php" class="<?= $active[16]; ?>">Admin List</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>