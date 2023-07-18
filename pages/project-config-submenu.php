<?php include_once("../includes/header.php") ?>

<div class="body-header">
    <div class="body-title">Project Manager Menu Configuration</div>
</div>

<div class="body-header">
    <div></div>
    <div class="body-actions">
        <span class="text-light">Change status of Selected :</span>

        <div>
            <button class="btn btn-outline-light dropdown-menu-toggle" placement="bottom" onclick="dropdownMenu(this)">
                <span class="ultralysis-icon">down</span>
                <span>Select</span>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <span class="ultralysis-icon">tick-circle</span>
                    Enable
                </li>
                <li>
                    <span class="ultralysis-icon">minus-circle</span>
                    Disable
                </li>
            </ul>
        </div>
        <button class="btn btn-success">Update</button>
        <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#addModal">
            <span class="ultralysis-icon">add</span>
            <span>Add New Record</span>
        </button>
    </div>
</div>



<div class="body-content">
    <div id="myGrid" class="ag-theme-alpine"></div>
    <?php include_once("../includes/grid-pagination.php") ?>
</div>

<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Project Manager Sub-Menu Wizard</h5>
            </div>
            <div class="modal-body">
                <div class="box-vertical">
                    <div>
                        <label class="form-label">Menu Slug</label>
                        <select class="form-select select2">
                            <option value="1">Manage Template</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div>
                        <label class="form-label">Menu Slug</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">2</label>
                        </div>
                    </div>



                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-outline-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-lg btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<?php include_once("../includes/delete-modal.php") ?>
<?php include_once("../includes/footer.php") ?>

<script>
class ActionRenderer {
    init(params) {
        this.eGui = document.createElement('div');
        this.eGui.innerHTML = `
            <div class="grid-actions">
                <button class="btn-icon btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <span class="ultralysis-icon">delete</span>
                </button>
                <button class="btn-icon btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#addModal">
                    <span class="ultralysis-icon">edit</span>
                </button>
            </div>
        `;
    }
    getGui() {
        return this.eGui;
    }
    refresh(params) {
        return false;
    }
}
class StatusRenderer {
    init(params) {
        this.eGui = document.createElement('div');
        this.eGui.innerHTML = `
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox">
            </div>
        `;
    }
    getGui() {
        return this.eGui;
    }
    refresh(params) {
        return false;
    }
}
const columnDefs = [{
        headerName: "Menu Name",
        field: "menu_name",
        headerCheckboxSelection: true,
        checkboxSelection: true,
        flex: 1,
        suppressSizeToFit: true,
    },
    {
        headerName: "Sub Menu Name",
        field: "sub_menu_name",
    },
    {
        headerName: "Menu Slug",
        field: "menu_slug",
    },
    {
        headerName: "Rank",
        field: "rank",
    },
    {
        headerName: "Status",
        field: "phone",
        cellRenderer: StatusRenderer,
        suppressSizeToFit: true,
        width: 80
    },
    {
        headerName: "Action",
        type: 'rightAligned',
        sortable: false,
        cellRenderer: ActionRenderer,
        suppressSizeToFit: true,
        width: 120
    }
];

const rowData = [];

for (let i = 0; i <= 50; i++) {
    rowData.push({
        menu_name: "User & Group",
        sub_menu_name: "Users",
        menu_slug: "Manage Template",
        rank: "5",
        status: false
    })
}
const gridOptions = {
    columnDefs: columnDefs,
    defaultColDef: {
        sortable: true
    },
    rowData: rowData,
    rowSelection: 'multiple',
    suppressRowClickSelection: true,
};

document.addEventListener('DOMContentLoaded', function() {
    const gridDiv = document.querySelector('#myGrid');
    const grid = new agGrid.Grid(gridDiv, gridOptions);
    grid.gridOptions.api.sizeColumnsToFit()
});
</script>