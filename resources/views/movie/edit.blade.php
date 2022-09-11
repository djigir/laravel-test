@extends('layouts.app')

@section('content')

    @include('partials.header', ['title' => "Редактирование фильма {$movie->title}"])

    <a href="{{ route('movies.index') }}" class="btn btn-primary">Назад</a>
    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
        @method('DELETE')
        @csrf
        <input type="submit" class="btn btn-danger" value="Удалить">
    </form>

    <div class="container mt-5">
        <form action="{{ route('movies.update', $movie->id) }}" method="POST" class="form-control"
              enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Название</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                       placeholder="Название фильма" value="{{ $movie->title }}">
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <select class="selectpicker" name="genre_ids[]" multiple data-live-search="true">
                    @foreach($genres as $genre)
                        <option
                            {{ is_array( $movie->genres->pluck('id')->toArray()) && in_array($genre->id, $movie->genres->pluck('id')->toArray()) ? 'selected' : '' }}
                            value="{{ $genre->id }}">{{ $genre->title }}
                        </option>
                    @endforeach
                </select>
                @error('genre_ids')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="exampleInputFile">Постер</label>
                <div class="w-50 mb-3">
                    <img src="{{ asset('storage/' . $movie->poster) }}"
                         alt="{{ $movie->title }}" width="100">
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="poster" value="{{ $movie->poster }}">
                    </div>
                </div>
                @error('poster')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>

@endsection
