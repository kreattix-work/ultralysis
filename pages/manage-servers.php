<?php include_once("../includes/header.php") ?>

<div class="body-header">
    <div class="body-title">Lists Servers</div>
    <div class="body-actions">
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
var columnDefs = [{
        headerName: "Server ID",
        field: "server_id"
    },
    {
        headerName: "Server Name",
        field: "server_name",
        flex: 1
    },
    {
        headerName: "Action",
        type: 'rightAligned',
    }
];

var rowData = [{
    server_id: "29",
    server_name: "Ultralysis.com/secure",
}];

var gridOptions = {
    columnDefs: columnDefs,
    rowData: rowData
};

document.addEventListener('DOMContentLoaded', function() {
    var gridDiv = document.querySelector('#myGrid');
    const gridApi = new agGrid.Grid(gridDiv, gridOptions);
});
</script>