<?php include_once("../includes/header.php") ?>

<div class="body-header">
    <div class="body-title">Project Manager Menu Configuration</div>
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
                <h5 class="modal-title">Create/ Edit User Manager Filter</h5>
            </div>
            <div class="modal-body pb-0">
                <div class="box-vertical">
                    <div>
                        <label class="form-label">Filter Name</label>
                        <input class="form-control" placeholder="Type here">
                    </div>
                    <div>
                        <label class="form-label">Company List</label>
                        <select class="form-select select2">
                            <option value="Select">Select</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                        </select>
                    </div>
                    <h5 class="font-bold">Filter Data Section:</h5>
                    <div class="row text-light">
                        <div class="col">Record 1</div>
                        <div class="col">
                            <div class="box justify-content-between">
                                <span>Created On: 12 Mar 2023</span>
                                <button class="btn-icon-sm btn btn-outline-light no-filter">
                                    <span class="ultralysis-icon">delete</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="row gy-2">
                        <div class="col-6">
                            <label class="form-label">Query Option</label>
                            <select class="form-select select2">
                                <option value="Select">Select</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Filter Field</label>
                            <select class="form-select select2">
                                <option value="Select">Select</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Field Operator</label>
                            <select class="form-select select2">
                                <option value="Select">Select</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Filter Value</label>
                            <select class="form-select select2">
                                <option value="Select">Select</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-block btn-outline-success">Add New Record</button>
                </div>

                <div class="box mt-3 justify-content-end">
                    <button type="button" class="btn btn-lg btn-outline-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-lg btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure want to <span class="text-danger">Delete</span> this list ?</h5>
            </div>
            <div class="modal-body pb-0">
                <div>By Clicking yes selected list will be deleted.</div>
                <div class="box mt-3 justify-content-end">
                    <button type="button" class="btn btn-lg btn-outline-danger px-4" data-bs-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-lg btn-outline-success px-4" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</div>


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
    class AssignedToRenderer {
        init(params) {
            console.log(params);
            this.eGui = document.createElement('div');
            this.eGui.innerHTML = `
            <div class="box grid-data">
                <span class="ultralysis-icon text-success">user-group</span>
                ${params.data.filter_name}
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
        headerName: "Filter Name",
        field: "filter_name",
        headerCheckboxSelection: true,
        checkboxSelection: true,
        flex: 1,
        suppressSizeToFit: true,
    },
    {
        headerName: "Company Name",
        field: "company_name",
    },
    {
        headerName: "Assigned To",
        field: "assigned_to",
        cellRenderer: AssignedToRenderer,
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
        sortable: false,
        cellRenderer: ActionRenderer,
        suppressSizeToFit: true,
        width: 110
    }
    ];

    const rowData = [];

    for (let i = 0; i <= 50; i++) {
        rowData.push({
            filter_name: "User & Group",
            company_name: "Users",
            assigned_to: "Manage Template",
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

    document.addEventListener('DOMContentLoaded', function () {
        const gridDiv = document.querySelector('#myGrid');
        const grid = new agGrid.Grid(gridDiv, gridOptions);
        grid.gridOptions.api.sizeColumnsToFit()
    });
</script>