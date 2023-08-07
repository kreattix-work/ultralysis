<?php include_once("../includes/header.php") ?>

<div class="body-header">
    <div class="box">
        <div class="body-title">Admin Manager Menu Configuration</div>
    </div>
</div>

<div class="body-content">
    <div id="myGrid" class="ag-theme-alpine"></div>
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
                <button class="btn btn-success btn-sm mt-1" onclick="window.location.href = 'admin-menu-matrix.html'">
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
            <span class="text-success">Active</span>
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
        headerName: "Slug",
        field: "slug",

    },
    {
        headerName: "Position",
        field: "position",
    },
    {
        headerName: "Status",
        field: "phone",
        cellRenderer: StatusRenderer,
    },
    {
        headerName: "Action",
        type: 'rightAligned',
        sortable: false,
        cellRenderer: ActionRenderer,
        suppressSizeToFit: true,
        width: 170
    }
];

const rowData = [];

for (let i = 0; i <= 50; i++) {
    rowData.push({
        name: "Manage Servers",
        slug: "manage-server",
        position: '1',
        status: 'active'
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