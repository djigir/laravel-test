@extends('layouts.app')

@section('content')

    @include('partials.header', ['title' => "Фильм - {$movie->title}"])

    <a href="{{ route('movies.index') }}" class="btn btn-primary">Назад</a>
    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Редактировать</a>
    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
        @method('DELETE')
        @csrf
        <input type="submit" class="btn btn-danger" value="Удалить">
    </form>

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <tbody>
                    <tr class="text-center">
                        <td>ID</td>
                        <td>{{ $movie->id }}</td>
                    </tr>
                    <tr class="text-center">
                        <td>Название</td>
                        <td>{{ $movie->title }}</td>
                    </tr>
                    <tr class="text-center">
                        <td>Жанры</td>
                        <td>
                            @foreach($movie['genres'] as $genre)
                                {{ $genre->title }}
                                <br>
                            @endforeach
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>Постер</td>
                        <td>
                            <img src="{{ asset('storage/' . $movie->poster) }}"
                                 alt="{{ $movie->title }}" width="100">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
