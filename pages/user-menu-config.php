<?php include_once("../includes/header.php") ?>

<div class="body-header">
    <div class="body-title">User Manager Menu Configuration</div>
</div>

<div class="body-header">
    <div>
        <?php include_once("../includes/user-menu-tabs.php") ?>
    </div>
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
                <h5 class="modal-title">Add New Menu</h5>
            </div>
            <div class="modal-body">
                <div class="box-vertical">
                    <div>
                        <label class="form-label">Menu Name</label>
                        <input class="form-control" placeholder="Type here">
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Menu Slug</label>
                            <input class="form-control" placeholder="Type here">
                        </div>
                        <div class="col">
                            <label class="form-label">Rank</label>
                            <select class="form-select select2">
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="form-label">Status</label>
                        <div class="">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" checked type="radio" name="inlineRadioOptions"
                                    id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                                    value="option3">
                                <label class="form-check-label" for="inlineRadio3">Deactive</label>
                            </div>
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
            <?php include(BASEPATH.'includes/actions.php') ?>
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
        menu_name: "Project Configuration",
        menu_slug: "project_configuration",
        rank: "N/A",
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