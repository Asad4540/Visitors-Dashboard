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

                    <!-- <button class="btn btn-primary">Export</button> -->
                </div>

                <!-- Filters -->
                <form method="GET" action="{{ route('visitorsManagement') }}">
                    <div class="row g-2 mb-3">

                        {{-- Search --}}
                        <div class="col-md-3">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Search name, email or mobile">
                        </div>

                        {{-- Date --}}
                        <div class="col-md-2">
                            <input type="date" name="date" value="{{ request('date') }}" class="form-control">
                        </div>

                        {{-- Department --}}
                        <div class="col-md-2">
                            <select name="department" class="form-select">
                                <option value="">Department</option>
                                <option value="hr" {{ request('department') == 'hr' ? 'selected' : '' }}>HR</option>
                                <option value="it" {{ request('department') == 'it' ? 'selected' : '' }}>IT</option>
                                <option value="marketing" {{ request('department') == 'marketing' ? 'selected' : '' }}>
                                    Marketing</option>
                                <option value="sales" {{ request('department') == 'sales' ? 'selected' : '' }}>Sales
                                </option>
                            </select>
                        </div>

                        {{-- Status --}}
                        <div class="col-md-2">
                            <select name="status" class="form-select">
                                <option value="">Status</option>
                                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved
                                </option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected
                                </option>
                            </select>
                        </div>

                        {{-- Purpose --}}
                        <div class="col-md-2">
                            <select name="purpose" class="form-select">
                                <option value="">Purpose</option>
                                <option value="interview" {{ request('purpose') == 'interview' ? 'selected' : '' }}>
                                    Interview
                                </option>
                                <option value="meeting" {{ request('purpose') == 'meeting' ? 'selected' : '' }}>Meeting
                                </option>
                                <option value="maintenance" {{ request('purpose') == 'maintenance' ? 'selected' : '' }}>
                                    Maintenance</option>
                            </select>
                        </div>

                        {{-- Filter Button --}}
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-dark w-100">
                                Filter
                            </button>
                        </div>

                    </div>
                </form>


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

                            @forelse($visitors as $visitor)
                                <tr>
                                    <td>
                                        <strong>{{ $visitor->first_name }} {{ $visitor->last_name }}</strong><br>
                                        <small class="text-muted">{{ $visitor->email }}</small>
                                    </td>

                                    <td>{{ $visitor->mobile }}</td>

                                    <td>{{ ucfirst($visitor->purpose) }}</td>

                                    <td>
                                        {{ $visitor->person_to_meet ?? '-' }} <br>
                                        <small class="text-muted">{{ strtoupper($visitor->department) }}</small>
                                    </td>

                                    <td>
                                        {{ strtoupper($visitor->id_type) }} <br>
                                        <small class="text-muted">{{ $visitor->id_number }}</small>
                                    </td>

                                    <td>
                                        {{ $visitor->visted_at->format('d/m/Y') }} <br>
                                        <small class="text-muted">{{ $visitor->visted_at->format('h:i A') }}</small>
                                    </td>

                                    <td>
                                        <select class="form-select form-select-sm status-dropdown"
                                            data-id="{{ $visitor->id }}">
                                            <option value="pending" {{ $visitor->approval_status == 'pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>

                                            <option value="approved" {{ $visitor->approval_status == 'approved' ? 'selected' : '' }}>
                                                Approved
                                            </option>

                                            <option value="rejected" {{ $visitor->approval_status == 'rejected' ? 'selected' : '' }}>
                                                Rejected
                                            </option>
                                        </select>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Visitors Found</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                <!-- Footer -->
                @if ($visitors->hasPages())
                    <div class="mt-4">

                        <div class="d-flex justify-content-center">
                            {{ $visitors->links() }}
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.status-dropdown').forEach(function (dropdown) {
            dropdown.addEventListener('change', function () {

                let visitorId = this.dataset.id;
                let status = this.value;

                fetch(`/visitors/${visitorId}/status`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        approval_status: status
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Status updated successfully!");
                        }
                    });
            });
        });
    </script>


</x-app-layout>