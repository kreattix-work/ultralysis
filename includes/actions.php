<div class="grid-actions">
    <button class="btn-icon btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#deleteModal">
        <span class="ultralysis-icon">delete</span>
    </button>
    <div>
        <button class="btn-icon btn btn-outline-light dropdown-menu-toggle" onclick="dropdownMenu(this)">
            <span class="ultralysis-icon">more</span>
        </button>
        <ul class="dropdown-menu">
            <li data-bs-toggle="modal" data-bs-target="#deleteModal">
                <span class="ultralysis-icon">delete</span>
                Delete
            </li>
            <li>
                <span class="ultralysis-icon">edit</span>
                Edit
            </li>
            <?php if(isset($actionOptions)) { ?>
            <?php foreach($actionOptions as $options) { ?>
            <li <?= $options['attributes'] ?>>
                <span class="ultralysis-icon"><?= $options['icon'] ?></span>
                <?= $options['name'] ?>
            </li>
            <?php } ?>
            <?php } else { ?>
            <li>
                <span class="ultralysis-icon">add</span>
                Other Options
            </li>
            <?php } ?>
        </ul>
    </div>
</div>