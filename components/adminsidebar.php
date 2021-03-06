<nav id="sidebar">
    <div class="sidebar-header">
        <img style="height: 150px;" src="https://cdn.discordapp.com/attachments/666663327153258506/673591599271510016/Test.png" alt="">
        <strong>NML</strong>
    </div>

    <ul class="list-unstyled components">
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-briefcase"></i>
                Visit NML Website
            </a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="index.php">NML</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="AdminIndex.php">
                <i class="fas fa-home"></i>
                Home
            </a>
            <a href="#productSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-copy"></i>
                Products
            </a>
            <ul class="collapse list-unstyled" id="productSubmenu">
                <li>
                    <a href="AdminViewProducts.php">View Products</a>
                </li>
                <li>
                    <a href="AdminAddProduct.php">Add Products</a>
                </li>
                <li>
                    <a href="AdminDeleteProduct.php">Delete Products</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#customerSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-portrait"></i>
                Customers
            </a>
            <ul class="collapse list-unstyled" id="customerSubmenu">
                <li>
                    <a href="AdminViewCustomer.php">View Customers</a>
                </li>
                <li>
                    <a href="AdminBanCustomer.php">Flag/Ban Customers</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-users-cog"></i>
                Admins
            </a>
            <ul class="collapse list-unstyled" id="adminSubmenu">
                <li>
                    <a href="AdminViewAdmin.php">View Admins</a>
                </li>
                <li>
                    <a href="AdminAddAdmin.php">Add Admins</a>
                </li>
                <li>
                    <a href="AdminBanAdmin.php">Flag/Ban Admins</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#ChoiceSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-tasks"></i>
                Manager choice of the week
            </a>
            <ul class="collapse list-unstyled" id="ChoiceSubmenu">
                <li>
                    <a href="AdminManage.php">View Choices</a>
                </li>
                <li>
                    <a href="AdminEmptyChoice.php">Empty Choices</a>
                </li>
                <li>
                    <a href="AdminAddChoices.php">Add New Choices</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="CRUD_HTA/indexSupp.php">
                <i class="fas fa-parachute-box"></i>
                Suppliers
            </a>
        </li>
        <li>
            <a href="includes/logout.inc.php">
                <i class="fas fa-sign-out-alt"></i>
                Log out
            </a>
        </li>
    </ul>
</nav>