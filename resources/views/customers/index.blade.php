@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Card Header -->
    <div class="card">
        <div class="card-header ">
            <h3 class="mb-0">Customer List</h3>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <!-- Add Customer Button -->
            <a href="{{ route('customers.create') }}" class="btn btn-danger mb-3">+ Add Customer</a>

            <!-- Table -->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>sr No.</th>
                        <th>Customer Name</th>
                        <th>City</th>
                        <th>GST IN</th>
                        <th>PAN Card No</th>
                        <th>Mobile No</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $customer->customer_name }}</td>
                            <td>{{ $customer->city }}</td>
                            <td>{{ $customer->gstin }}</td>
                            <td>{{ $customer->pancard_no }}</td>
                            <td>{{ $customer->mobile_no }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>

                                <a href="{{ route('customers.edit', $customer) }}" class="btn  btn-sm">
                                    <i class="fas fa-edit fa-sm"></i> <!-- Size adjusted here -->
                                </a>

                                <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn  btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash fa-sm"style="color:red"></i> <!-- Size adjusted here -->
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <div>
                    Showing {{ $customers->firstItem() }} to {{ $customers->lastItem() }} of {{ $customers->total() }} entries
                </div>
                <div>
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
