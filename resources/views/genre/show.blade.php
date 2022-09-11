@extends('layouts.app')

@section('content')

    @include('partials.header', ['title' => "Жанр - {$genre->title}"])

    <a href="{{ route('genres.index') }}" class="btn btn-primary">Назад</a>
    <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning">Редактировать</a>
    <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline">
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
                        <td>{{ $genre->id }}</td>
                    </tr>
                    <tr class="text-center">
                        <td>Название</td>
                        <td>{{ $genre->title }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
