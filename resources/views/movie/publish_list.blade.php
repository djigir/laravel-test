@extends('layouts.app')

@section('content')

    @include('partials.header', ['title' => 'Управление публикациями'])

    <a class="btn btn-primary" href="{{ route('movies.index') }}">
        Назад
    </a>

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Жанры</th>
                <th scope="col">Опубликовано</th>
                <th scope="col">Постер</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>
                    <th scope="row">{{ $movie->id }}</th>
                    <td>{{ $movie->title }}</td>
                    <td>
                        @foreach($movie['genres'] as $genre)
                            <span>
                                {{ $genre->title }}
                                <br>
                            </span>
                        @endforeach
                    </td>
                    <td>
                        {{ $movie->is_published === 0 ? 'Нет' : 'Да' }}
                    </td>
                    <td>
                        <img src="{{ asset('storage/' . $movie->poster) }}"
                             alt="{{ $movie->title }}" width="100">
                    </td>
                    <td>
                        <form action="{{ route('movies.publish_toggle', $movie->id) }}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-success"
                                   value="{{ $movie->is_published === 1 ? 'Не опубликовывать' : 'Опубликовать' }}">
                            <input type="hidden" name="is_published" value="{{ $movie->is_published === 0 ? 1 : 0 }}">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
