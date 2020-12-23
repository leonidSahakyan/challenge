@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('generate-token') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">Generate token</button>
                    </form>
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Token</td>
                                <td>Expires</td>
                            <tr>
                        </thead>
                    <tbody>
                        @foreach ($tokens as $token)
                            <tr>
                                <td>{{ $token->name }}</td>
                                <td>{{ $token->id}}</td>
                                <td>{{ $token->expires_at}}</td>
                            <tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
