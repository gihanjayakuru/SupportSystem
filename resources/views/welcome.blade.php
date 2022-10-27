@extends('layouts.app')

@section('content')
    <div class="text-center mt-5">
        <h1>Support System</h1>
        <div class="mt-5">
            <a href="{{ route('tickets.create') }}" class="btn btn-primary">Open New Ticket</a>
        </div>
        <div class="mt-5">
            <p>
                Check the status of your ticket:
            </p>
            <div class="container">
                <form class="" action="{{ route('tickets.search') }}" method="get">
                    <div class="row">
                        <div class="col-8">
                            <input type="text" name="reference" value="" class="form-control"
                                placeholder="Enter ticket reference">
                        </div>
                        <div class="col-4">
                            <button type="submit" name="view" class="btn btn-success w-100">View Ticket</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
