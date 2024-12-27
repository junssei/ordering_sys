<div id="sidebar">
    <a id="logo" href="index.php">
        <img src="../source/images/logo/DefaultWordmark.png" class="wordLogoSmall" alt="logo">
    </a>
    <div id="navigation">
        <?php 
        $defaultpage = basename($_SERVER['REQUEST_URI']);
        $currentPage = basename($_SERVER['REQUEST_URI'], ".php");
        ?>
        <div id="navmenus">
            <a href="index.php" class="menu <?php if($currentPage === "index") echo "active"; ?>"><img src="../source/images/icon/svg/dashboard.svg" class="iconNormal" alt="dashboard"><p>Dashboard</p></a>
            <div class="menu dropdown"><img src="../source/images/icon/svg/boxes.svg" class="iconNormal" alt="inventory"><p>Inventory</p><img src="../source/images/icon/svg/dropdown.svg"></div>
                <div class="dropdown_menus">
                    <a href="inventory.php?page=product" class="menu <?php if($defaultpage === "inventory.php?page=product") echo "active"; ?>">
                        <span>Product List</span>
                    </a>
                    <a href="inventory.php?page=category" class="menu <?php if($defaultpage === "inventory.php?page=category") echo "active"; ?>">
                        <span>Categories</span>
                    </a>
                </div>
            <a href="" class="menu <?php if($currentPage === "") echo "active"; ?>"><img src="../source/images/icon/svg/dashboard.svg" class="iconNormal" alt="dashboard"><p> Orders </p></a>
            <div class="menu dropdown"><img src="../source/images/icon/svg/people.svg" class="iconNormal" alt="users"><p>Users</p><img src="../source/images/icon/svg/dropdown.svg"></div>
                <div class="dropdown_menus">
                    <a href="users.php?page=customer" class="menu <?php if($defaultpage === "users.php?page=customer") echo "active"; ?>">
                        <span>Customer</span>
                    </a>
                    <a href="users.php?page=admin" class="menu <?php if($defaultpage === "users.php?page=admin") echo "active"; ?>">
                        <span>Admin</span>
                    </a>
                </div>
            <div class="menu dropdown"><img src="../source/images/icon/svg/analytics.svg" class="iconNormal" alt="report"><p> Report </p><img src="../source/images/icon/svg/dropdown.svg"></div>
                <div class="dropdown_menus">
                    <a href="analytics_inventory.php" class="menu <?php if($currentPage === "analytics_inventory") echo "active"; ?>">
                        <span>Inventory</span>
                    </a>
                    <a href="analytics_sales.php" class="menu <?php if($currentPage === "analytics_sales") echo "active"; ?>">
                        <span>Sales</span>
                    </a>
                    <a href="analytics_user.php" class="menu <?php if($currentPage === "analytics_user") echo "active"; ?>">
                        <span>Users</span>
                    </a>
                </div>
        </div>
        <div id="navactions">
            <a id="logout" href="logout.php" class="menu"><img src="../source/images/icon/svg/Log_Out.svg" class="iconNormal" alt="dashboard"><p>Logout</p></a>
        </div>
    </div>
</div>