@extends('layouts.app')

@section('content')

    @include('partials.header', ['title' => "Редактирование жанра - {$genre->title}"])

    <a href="{{ route('genres.index') }}" class="btn btn-primary">Назад</a>
    <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline">
        @method('DELETE')
        @csrf
        <input type="submit" class="btn btn-danger" value="Удалить">
    </form>

    <div class="container mt-5">
        <form action="{{ route('genres.update', $genre->id) }}" method="POST" class="form-control">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Название</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                       placeholder="Название жанра" value="{{ $genre->title }}">
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>

@endsection
