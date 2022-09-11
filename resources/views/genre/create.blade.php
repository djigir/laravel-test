@extends('layouts.app')

@section('content')

    @include('partials.header', ['title' => 'Добавление жанра'])

    <a href="{{ route('genres.index') }}">
        Назад
    </a>

    <div class="container">
        <form action="{{ route('genres.store') }}" method="POST" class="form-control">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Название</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                       placeholder="Название фильма" value="{{ old('title') }}">
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>

@endsection
