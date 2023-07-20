<?php include_once("../includes/header.php") ?>

<div class="body-header fixed-to-header">
    <div class="box">
        <div class="body-title cursor-pointer" onclick="/* click event to redirect back */">
            <div class="box">
                <span class="ultralysis-icon icon-lg">arrow-left</span>
                <span>Update Permission Matrix</span>
            </div>
        </div>
    </div>
</div>

<div class="body-header">
    <div class="box">
        <div class="body-subtitle">
            <div class="box no-gap">
                <span>Admin Credential Matrix for Manage Servers</span>
                <span class="ultralysis-icon icon-lg">chevron-right</span>
                <span>List Servers</span>
            </div>
        </div>
    </div>
    <div class="body-actions">
        <button class="btn btn-success">Update</button>
        <button class="btn btn-danger">Cancel</button>
    </div>
</div>

<div class="body-content">
    <div id="myGrid" class="ag-theme-alpine"></div>
    <?php include_once("../includes/grid-pagination.php") ?>
</div>

<?php include_once("../includes/footer.php") ?>


<script>
class ActionRenderer {
    init(params) {
        console.log(params);
        this.eGui = document.createElement('div');
        const isEven = params.rowIndex % 2 === 0
        if (isEven) {
            this.eGui.innerHTML = `
                <button class="btn btn-success btn-sm mt-1">
                    <span class="ultralysis-icon">rule</span>
                    <span>Manage Permission</span>
                </button>
            `;
        } else {
            this.eGui.innerHTML = `<div class="text-start">N/A</div>`
        }

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
        headerName: "Name",
        field: "name",
        flex: 1,
        suppressSizeToFit: true,
    },
    {
        headerName: "Email",
        field: "email",
        flex: 1,
        suppressSizeToFit: true,
    },
    {
        headerName: "Admin Id",
        field: "admin_id",
        width: 250
    },
    {
        headerName: "User Type",
        field: "user_type",
    },
    {
        headerName: "All",
        field: "all",
        cellRenderer: StatusRenderer,
        sortable: false,
    },
    {
        headerName: "List",
        field: "list",
        cellRenderer: StatusRenderer,
        sortable: false,
    },
    {
        headerName: "Add",
        field: "add",
        cellRenderer: StatusRenderer,
        sortable: false,
    },
    {
        headerName: "Edit",
        field: "edit",
        cellRenderer: StatusRenderer,
        sortable: false,
    },
    {
        headerName: "Delete",
        field: "delete",
        cellRenderer: StatusRenderer,
        sortable: false,
    }
];

const rowData = [];

for (let i = 0; i <= 50; i++) {
    rowData.push({
        name: "Manage Servers",
        email: "example@domain.com",
        admin_id: 'Admin Name',
        user_type: 'Admin'
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