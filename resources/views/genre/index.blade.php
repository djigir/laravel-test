@extends('layouts.app')

@section('content')

    @include('partials.header', ['title' => 'Жанры'])

    <a href="{{ route('main.index') }}" class="ms-3 me-3">Назад</a>

    <a class="btn btn-dark" href="{{ route('genres.create') }}">
        Добавить жанр
    </a>

    @if($genres->count() > 0)
        <div class="container mt-5">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($genres as $genre)
                    <tr>
                        <th scope="row">{{ $genre->id }}</th>
                        <td>{{ $genre->title }}</td>
                        <td>
                            <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-primary">Посмотреть</a>
                            <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning">Редактировать</a>
                            <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline">
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
