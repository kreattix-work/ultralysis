<?php include_once("../includes/header.php") ?>

<div class="body-header">
    <div class="box">
        <div class="body-title">List Company</div>
        <span class="selected-chips">
            <span>25 Selected</span>
            <span class="ultralysis-icon" onclick="removeParent(this)">clear</span>
        </span>
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
        <button class="btn btn-outline-danger light-border">
            <span class="ultralysis-icon">delete</span>
            <span>Delete Selected</span>
        </button>
        <button class="btn btn-outline-light">
            <span class="ultralysis-icon">upload-document</span>
            <span>Export CSV</span>
        </button>
        <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#addModal">
            <span class="ultralysis-icon">add</span>
            <span>Add</span>
        </button>
    </div>
</div>

<div class="body-content">
    <div id="myGrid" class="ag-theme-alpine"></div>
</div>

<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Company</h5>
            </div>
            <div class="modal-body">
                <div class="box-vertical">
                    <div>
                        <label class="form-label">Company :</label>
                        <input class="form-control" placeholder="Company">
                    </div>
                    <div>
                        <label class="form-label">Contact Person :</label>
                        <input class="form-control" placeholder="Type here">
                    </div>
                    <div>
                        <label class="form-label">Contact Person :</label>
                        <input class="form-control" placeholder="Type here">
                    </div>
                    <div>
                        <label class="form-label">Client Id :</label>
                        <input class="form-control" placeholder="+88">
                    </div>
                    <div>
                        <label class="form-label">Client Form</label>
                        <select class="form-select select2">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-outline-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-lg btn-success">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="manageClientModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Client Id’s</h5>
            </div>
            <div class="modal-body">
                <div class="box-vertical">
                    <div>
                        <label class="form-label">Company</label>
                        <select class="form-select select2">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Client Id</label>
                        <input class="form-control" placeholder="Client Id">
                    </div>
                    <div>
                        <label class="form-label">Assigned Client Id’s</label>
                        <div class="box-sm">
                            <span class="selected-chips">
                                <span>Client Id</span>
                                <span class="ultralysis-icon" onclick="removeParent(this)">clear</span>
                            </span>
                            <span class="selected-chips">
                                <span>Client Id</span>
                                <span class="ultralysis-icon" onclick="removeParent(this)">clear</span>
                            </span>
                            <span class="selected-chips">
                                <span>Client Id</span>
                                <span class="ultralysis-icon" onclick="removeParent(this)">clear</span>
                            </span>
                            <span class="selected-chips">
                                <span>Client Id</span>
                                <span class="ultralysis-icon" onclick="removeParent(this)">clear</span>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-outline-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-lg btn-success">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php include_once("../includes/delete-modal.php") ?>
<?php include_once("../includes/footer.php") ?>

<?php 
    $actionOptions = [[
        "name" => "Manage Client Ids",
        "icon" => "add-category",
        "attributes" => "data-bs-toggle=\"modal\" data-bs-target=\"#manageClientModal\""
    ]];
?>

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
        headerName: "Server ID",
        field: "server_id",
        headerCheckboxSelection: true,
        checkboxSelection: true,
    },
    {
        headerName: "Company Name",
        field: "company_name",
        flex: 1,
        suppressSizeToFit: true,
    },
    {
        headerName: "Client ID",
        field: "client_id",
    },
    {
        headerName: "Country",
        field: "country",
    },
    {
        headerName: "City",
        field: "city",
    },
    {
        headerName: "Phone",
        field: "phone",
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
        server_id: "29",
        company_name: "AB World Foods",
        client_id: 'Red Bull (29)',
        country: 'UK',
        city: 'FOXS',
        phone: "9998889998",
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