@extends('layouts.app')

@section('content')
    <div class="text-center mt-5">
        <h1>All Tickets</h1>
        <div class="m-5">
            <div class="my-4">
                <form class="" action="" method="get">
                    <div class="row">
                        <div class="col-3">
                            <select class="form-control" name="sort">
                                <option value="customer_name"
                                    {{ request('sort', 'customer_name') == 'customer_name' ? 'selected' : null }}>Customer
                                    Name</option>
                                <option value="created_at"
                                    {{ request('sort', 'created_at') == 'created_at' ? 'selected' : null }}>Opened Time
                                </option>
                                <option value="updated_at"
                                    {{ request('sort', 'updated_at') == 'updated_at' ? 'selected' : null }}>Last Updated
                                    Time</option>
                                <option value="status" {{ request('sort', 'status') == 'status' ? 'selected' : null }}>
                                    Status</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-control" name="sort_dir">
                                <option value="asc" {{ request('sort_dir', 'asc') == 'asc' ? 'selected' : null }}>
                                    Ascending</option>
                                <option value="desc" {{ request('sort_dir', 'desc') == 'desc' ? 'selected' : null }}>
                                    Descending</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                                placeholder="Reference, customer name or phone number">
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary w-100">Search</button>
                        </div>
                    </div>
                </form>
            </div>

            @if ($tickets->isNotEmpty())
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Opened Time</th>
                            <th>Handled By</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>
                                    <a href="{{ route('tickets.show', $ticket->id) }}">{{ $ticket->customer_name }}</a>
                                </td>
                                <td>{{ $ticket->email }}</td>
                                <td>{{ $ticket->phone }}</td>
                                <td>{{ $ticket->created_at->format('d/M/Y H:i:s') }}</td>
                                <td>{{ $ticket->lastCommentedAgent ? $ticket->lastCommentedAgent->name : 'None' }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {!! $tickets->links() !!}
                </div>
            @else
                <div class="alert alert-info">
                    No tickets are there yet.
                </div>
            @endif
        </div>
    </div>
@endsection
