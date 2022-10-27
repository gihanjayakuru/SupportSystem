@extends('layouts.app')

@section('content')

    <Body class="antialiased">
        <div class="text-center mt-5">
            <h1>Open New Ticket</h1>
            <div class="m-5 jus">

                <!-- FORM STSRT -->
                <form action="{{ route('tickets.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">
                                    <label for="customer_name">Your Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="customer_name" value="{{ old('customer_name') }}"
                                        class="form-control 
                                    {{ $errors->has('customer_name') ? 'is-invalid' : '' }}">
                                    @if ($errors->first('customer_name'))
                                        <div class="invalid-feedback text-left">
                                            {{ $errors->first('customer_name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        class="form-control
                                    {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                    @if ($errors->first('email'))
                                        <div class="invalid-feedback text-left">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">
                                    <label for="phone">Phone</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">
                                    <label for="description">Description</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="description"
                                        class="form-control
                                    {{ $errors->has('description') ? 'is-invalid' : '' }}"></textarea>
                                    @if ($errors->first('description'))
                                        <div class="invalid-feebback text-left">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 offset-md-4 text-md-right">
                                    <input type="submit" value="submit" class="btn btn-success">
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

                <!-- FORM END-->
            </div>
        </div>

    @endsection
