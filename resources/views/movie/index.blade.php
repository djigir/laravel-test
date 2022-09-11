@extends('layouts.app')

@section('content')

    @include('partials.header', ['title' => 'Фильмы'])

    <a href="{{ route('main.index') }}" class="ms-3 me-3">На главную</a>

    <a class="btn btn-dark me-2" href="{{ route('movies.create') }}">
        Добавить фильм
    </a>
    <a class="btn btn-info" href="{{ route('movies.publish_list') }}">
        Управление публикациями
    </a>

    @if($movies->count() > 0)
        <div class="container mt-5">
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
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary">Посмотреть</a>
                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Редактировать</a>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="container">
            <h1>Тут пока пусто</h1>
        </div>
    @endif

@endsection
