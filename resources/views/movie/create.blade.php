@extends('layouts.app')

@section('content')

    @include('partials.header', ['title' => 'Добавление фильма'])

    <a href="{{ route('movies.index') }}">
        Назад
    </a>

    <div class="container">
        <form action="{{ route('movies.store') }}" method="POST" class="form-control" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Название</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                       placeholder="Название фильма" value="{{ old('title') }}">
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <select class="selectpicker" name="genre_ids[]" multiple data-live-search="true">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->title }}</option>
                    @endforeach
                </select>
                @error('genre_ids')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="file" name="poster">
                @error('poster')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>

@endsection
