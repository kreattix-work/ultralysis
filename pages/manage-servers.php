<?php include_once("../includes/header.php") ?>

<div class="body-header">
    <div class="body-title">Lists Servers</div>
    <div class="body-actions">
        <span class="text-light">Enable maintenance mode</span>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox">
        </div>
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
const columnDefs = [{
        headerName: "Server ID",
        field: "server_id",
        headerCheckboxSelection: true,
        checkboxSelection: true,
    },
    {
        headerName: "Server Name",
        field: "server_name",
        flex: 1,
    },
    {
        headerName: "Action",
        type: 'rightAligned',
        sortable: false,
        cellRenderer: ActionRenderer,
        suppressSizeToFit: true
    }
];

const rowData = [];

for (let i = 0; i <= 50; i++) {
    rowData.push({
        server_id: "29",
        server_name: "Ultralysis.com/secure",
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
    new agGrid.Grid(gridDiv, gridOptions);
});
</script>