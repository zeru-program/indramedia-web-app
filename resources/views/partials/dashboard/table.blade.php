<div class="table-data">
    <div class="order">
        <div class="head d-flex flex-wrap">
            <h3>Recent Orders</h3>
            <div class="d-flex flex-wrap gap-3">
                <div class="d-flex flex-wrap gap-3">
                    <button class="d-flex align-items-center gap-2 btn bg-accent text-light" data-bs-toggle="modal" data-bs-target="#modalCreate">
                        <i class='bi bi-plus-lg'></i>
                        <span>Create</span>
                    </button>
                    <button class="d-flex align-items-center gap-2 btn bg-accent text-light" data-bs-toggle="modal" data-bs-target="#modalFilter">
                        <i class='bx bx-filter'></i>
                        <span>Filter</span>
                    </button>
                </div>
                <div class="d-flex gap-2 align-items-center position-relative">
                    <input type="text" name="search" placeholder="Search by id orders" id="search_input" style="padding-right: 35px" class="form-control">
                    <i class='bx bx-search position-absolute' style="right: 15px"></i>
                </div>
             </div>
            <!-- Modal Create -->
            <div class="modal fade" id="modalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    ...
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn text-light bg-accent">Understood</button>
                    </div>
                </div>
                </div>
            </div>
            <!-- Modal Filter -->
            <div class="modal fade" id="modalFilter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Filter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    ...
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn text-light bg-accent">Understood</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <table id="myTable" class="table-admin mt-3 mb-3 rounded-sm">
            <thead>
                <tr>
                    <th>Column 1 along text</th>
                    <th>Column 2</th>
                    <th>Column 2</th>
                    <th>Column 2</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Row 1 Data 1</td>
                    <td>Row 1 Data 2</td>
                    <td>Row 1 Data 2</td>
                    <td>Row 1 Data 2</td>
                    <td class="d-flex gap-2">
                            <button class="btn btn-action text-light bg-accent d-flex justify-content-center align-items-center"><i class="bi-pencil-fill"></i></button>
                            <button class="btn btn-action text-light bg-danger d-flex justify-content-center align-items-center"><i class="bi-trash-fill"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>