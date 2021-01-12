@extends('admin.layouts.layout')

@section('content')

        <!-- Content Header (Page header) -->
        @include('admin.includes.content_header')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список статей</h3>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">Добавить статью</a>

                                @if ($posts->count())
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px">#</th>
                                                <th>Наименование</th>
                                                <th>Категория</th>
                                                <th>Тэги</th>
                                                <th>Дата публикации</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->category->title }}</td>
                                                <td>{{ $post->tags }}</td>
                                                <td>{{ $post->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Подтвердите удаление')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                @else
                                    <p>Статей пока нет...</p>
                                @endif

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $posts->links() }}

                            </div>
                            <!-- /.card-footer-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->

@endsection
