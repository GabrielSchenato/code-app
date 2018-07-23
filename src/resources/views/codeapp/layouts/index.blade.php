@extends('layouts.app')

@section('content')
@inject('appConfig', 'CodePress\CodeApp\Models\AppConfig')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <a href="{{ route('admin.layouts.create') }}" class="btn btn-primary">Create Layout</a>

                    <br>
                    <br>
                    <hr>

                    <h4>Layouts</h4>


                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Active?</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($layouts as $layout)
                            <tr>
                                <td>{{ $layout->name }}</td>
                                <td>@if($appConfig->frontLayout['dirname']) {{ str_contains($appConfig->frontLayout['dirname'], $layout->dirname) ? "Actived" : "" }} @endisset</td>                                
                                <td>
                                    <a href="{{ route('admin.layouts.active', $layout->id) }}" class="btn btn-outline-primary">Active layout</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
