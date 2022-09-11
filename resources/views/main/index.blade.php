@extends('layouts.app')

@section('content')
    @include('partials.header', ['title' => 'Главная страница'])

    <div class="container mt-5">
        <div class="row">
            <div class="col-xs-12">
                <div class="text-center">
                    <a href="{{ route('movies.index') }}" class="btn btn-success">Фильмы</a>
                    <a href="{{ route('genres.index') }}" class="btn btn-danger">Жанры</a>
                </div>
            </div>
        </div>
    </div>

@endsection
