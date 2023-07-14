<?php 
    $menu = [
        [
            "name" => "Manage Servers",
            "icon" => "category",
            "color" => "green",
            "subMenu" => [
                ["name" => "List Server", "url" => "#"],
            ]
        ],
        [
            "name" => "Manage Companies",
            "icon" => "chart",
            "color" => "blue",
            "subMenu" => [
                ["name" => "List Companies", "url" => "#"],
            ]
        ],
        [
            "name" => "Manage Projects",
            "icon" => "align-left",
            "color" => "purple",
            "subMenu" => [
                ["name" => "List Manage Project", "url" => "#"],
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
                ["name" => "Admin Manager Config", "url" => "#"],
                ["name" => "Project Manager Config", "url" => "#"],
                ["name" => "User Manager Config", "url" => "#"],
            ]
        ],
    ];
?>

<aside class="page-sider">
    <ul class="sider-nav">
        <?php foreach($menu as $menuItem) { ?>
        <li class="nav-item">
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
                <li class="nav-submenu-item">
                    <span class="submenu-bullet bg-<?= $menuItem['color'] ?>"></span>
                    <div><?= $subMenu['name'] ?></div>
                </li>
                <?php } ?>
            </ul>
            <?php } ?>
        </li>
        <?php } ?>
    </ul>
</aside>