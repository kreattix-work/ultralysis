<?php include_once("../includes/header.php") ?>

<div class="body-header">
    <div class="box">
        <div class="body-title">List Company</div>
        <span class="selected-chips">
            <span>25 Selected</span>
            <span class="ultralysis-icon">clear</span>
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
        <button class="btn btn-outline-danger">
            <span class="ultralysis-icon">delete</span>
            <span>Delete Selected</span>
        </button>
        <button class="btn btn-outline-light">
            <span class="ultralysis-icon">upload-document</span>
            <span>Export CSV</span>
        </button>
        <button class="btn btn-outline-light">
            <span class="ultralysis-icon">add</span>
            <span>Add</span>
        </button>
    </div>
</div>

<div class="body-content">
    <div id="myGrid" class="ag-theme-alpine"></div>
</div>

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