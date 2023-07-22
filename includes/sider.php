<?php 
    $menu = [
        [
            "name" => "Manage Servers",
            "icon" => "category",
            "color" => "green",
            "subMenu" => [
                ["name" => "List Server", "url" => "manage-server.html"],
            ]
        ],
        [
            "name" => "Manage Companies",
            "icon" => "chart",
            "color" => "blue",
            "subMenu" => [
                ["name" => "List Companies", "url" => "manage-company.html"],
            ]
        ],
        [
            "name" => "Manage Projects",
            "icon" => "align-left",
            "color" => "purple",
            "subMenu" => [
                ["name" => "List Manage Project", "url" => "manage-project.html"],
                ["name" => "List Project", "url" => "#"],
                ["name" => "Assign Project", "url" => "#"],
                ["name" => "List Project Type", "url" => "#"],
            ]
        ],
        [
            "name" => "Manage Users",
            "icon" => "user-double",
            "color" => "lime",
            "subMenu" => [
                ["name" => "List Server", "url" => "#"],
            ]
        ],
        [
            "name" => "Manage Ips",
            "icon" => "wifi",
            "color" => "cyan",
            "subMenu" => [
                ["name" => "List Server", "url" => "#"],
            ]
        ],
        [
            "name" => "Manage Usage Tracker",
            "icon" => "situation",
            "color" => "yellow",
            "subMenu" => [
                ["name" => "List Server", "url" => "#"],
            ]
        ],
        [
            "name" => "Manage Api Keys",
            "icon" => "key",
            "color" => "blue",
            "subMenu" => [
                ["name" => "List Server", "url" => "#"],
            ]
        ],
        [
            "name" => "Custom Project type",
            "icon" => "discount-circle",
            "color" => "light-green",
            "subMenu" => [
                ["name" => "List Server", "url" => "#"],
            ]
        ],
        [
            "name" => "Menu Configuration",
            "icon" => "node",
            "color" => "pink",
            "subMenu" => [
                ["name" => "Admin Manager Config", "url" => "admin-menu-config.html"],
                ["name" => "Project Manager Config", "url" => "project-menu-config.html"],
                ["name" => "User Manager Config", "url" => "user-menu-config.html"],
            ]
        ],
    ];
?>

<aside class="page-sider">
    <ul class="sider-nav">
        <?php foreach($menu as $key => $menuItem) { ?>
        <li class="nav-item <?= $key == 0 ? 'active': '' ?>">
            <div class="nav-item-content" onclick="toggleMenu(this)">
                <span class="ultralysis-icon nav-item-icon text-<?= $menuItem['color'] ?>">
                    <?= $menuItem['icon'] ?>
                </span>
                <div class="nav-item-text"><?= $menuItem['name'] ?></div>
                <span class="ultralysis-icon nav-item-chevron">down</span>
            </div>
            <?php if(!empty($menuItem['subMenu'])){ ?>
            <ul class="nav-submenu">
                <?php foreach($menuItem['subMenu'] as $subMenu) { ?>
                <li class="nav-submenu-item <?= $key == 0 ? 'active': '' ?>">
                    <a href="<?= $subMenu['url'] ?>">
                        <span class="submenu-bullet bg-<?= $menuItem['color'] ?>"></span>
                        <div><?= $subMenu['name'] ?></div>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <?php } ?>
        </li>
        <?php } ?>
    </ul>
    <ul class="sider-nav">
        <li class="sider-label">Account</li>
        <li class="nav-item">
            <div class="nav-item-content" onclick="toggleMenu(this)">
                <span class="ultralysis-icon nav-item-icon">setting</span>
                <div class="nav-item-text">Settings</div>
            </div>
        </li>
        <li class="nav-item">
            <div class="nav-item-content" onclick="toggleMenu(this)">
                <span class="ultralysis-icon nav-item-icon">lock</span>
                <div class="nav-item-text">Change Password</div>
            </div>
        </li>
    </ul>
    <button class="btn btn-lg btn-dark btn-block" data-bs-toggle="modal" data-bs-target="#logoutModal">
        <span class="ultralysis-icon">logout</span>
        <span>Logout</span>
    </button>
</aside>