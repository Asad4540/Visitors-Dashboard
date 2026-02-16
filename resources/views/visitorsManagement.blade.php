<x-app-layout>

    <div class="container-fluid mt-4">

        <!-- Page Title -->
        <div class="mb-3">
            <h3 class="fw-bold">Visitor Management</h3>
            <p class="text-muted">Welcome back! Here's what's happening with your data.</p>
        </div>

        <!-- Card -->
        <div class="card shadow-sm">

            <div class="card-body">

                <!-- Top Controls -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="mb-0">All Users</h5>
                        <small class="text-muted">All Registered Visitors & Candidates</small>
                    </div>

                    <button class="btn btn-primary">Export</button>
                </div>

                <!-- Filters -->
                <div class="row g-2 mb-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control" placeholder="Search users, Email, or Department...">
                    </div>

                    <div class="col-md-2">
                        <select class="form-select">
                            <option>Date Range</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-select">
                            <option>Department</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-select">
                            <option>Status</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-select">
                            <option>Purpose of Visit</option>
                        </select>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle">

                        <thead class="table-light">
                            <tr>
                                <th>VISITOR NAME</th>
                                <th>MOBILE</th>
                                <th>PURPOSE</th>
                                <th>PERSON TO MEET</th>
                                <th>ID TYPE</th>
                                <th>DATE & TIME</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>

                        <tbody>

                            @for($i = 0; $i < 6; $i++)
                                <tr>
                                    <td>
                                        <strong>Shubham Patil</strong><br>
                                        <small class="text-muted">patilshubham.1@gmail.com</small>
                                    </td>
                                    <td>09356864194</td>
                                    <td>Interview</td>
                                    <td>
                                        Priyanka <br>
                                        <small class="text-muted">HR</small>
                                    </td>
                                    <td>
                                        PAN Card <br>
                                        <small class="text-muted">ABCDE1234F</small>
                                    </td>
                                    <td>
                                        09/02/2026 <br>
                                        <small class="text-muted">08:59 pm</small>
                                    </td>
                                    <td>
                                        <select class="form-select form-select-sm">
                                            <option selected>Approved</option>
                                            <option>Pending</option>
                                            <option>Rejected</option>
                                        </select>
                                    </td>
                                </tr>
                            @endfor

                        </tbody>

                    </table>
                </div>

                <!-- Footer -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Showing 6 of 6 visitors</small>

                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>