<x-app-layout>
    <div class="container-fluid mt-4">


        <div class="mb-3">
            <h3 class="fw-bold">Dashboard Overview</h3>
            <p class="text-muted">Welcome back! Here's what's happening with your data.</p>
        </div>

        <div class="row gap-2 px-2 mt-4 ">
            <div class="col card-bg py-4">
                <span class="card-heading">Total Visitors</span>
                <div class="d-flex justify-content-between mt-2">
                    <span class="card-numbers">{{ $totalVisitors }}</span>
                    <img src="{{ asset('images/card-1.png') }}" alt="">
                </div>
            </div>
            <div class="col card-bg py-4">
                <span class="card-heading">Approved</span>
                <div class="d-flex justify-content-between mt-2">
                    <span class="card-numbers">{{$approved}}</span>
                    <img src="{{ asset('images/card-2.png') }}" alt="">
                </div>
            </div>
            <div class="col card-bg py-4">
                <span class="card-heading">Pending</span>
                <div class="d-flex justify-content-between mt-2">
                    <span class="card-numbers">{{ $pending }}</span>
                    <img src="{{ asset('images/card-3.png') }}" alt="">
                </div>
            </div>
            <div class="col card-bg py-4">
                <span class="card-heading">Rejected </span>
                <div class="d-flex justify-content-between mt-2">
                    <span class="card-numbers">{{$rejected}}</span>
                    <img src="{{ asset('images/card-4.png') }}" alt="">
                </div>
            </div>

        </div>

        <div class="mt-4">
            <h3 class="fw-bold">Latest visitors</h3>
            <table class="card-bg table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Purpose</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visitors as $visitor)
                        <tr>
                            <td>{{ $visitor->first_name }} {{ $visitor->last_name }}</td>
                            <td>{{ $visitor->mobile }}</td>
                            <td>{{ ucfirst($visitor->purpose) }}</td>
                            <td>
                                <span class="badge 
                                        @if($visitor->approval_status == 'approved') bg-success
                                        @elseif($visitor->approval_status == 'rejected') bg-danger
                                        @else bg-warning
                                        @endif">
                                    {{ ucfirst($visitor->approval_status) }}
                                </span>
                            </td>
                            <td>{{ $visitor->visted_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>