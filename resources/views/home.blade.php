@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<br>
<br>
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                <h1 class="display-4">Stay Alert, Stay Safe!</h1>
                <p class="lead">Welcome to the User Dashboard.</p>
                </div>
            </div>
                    <h3></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
