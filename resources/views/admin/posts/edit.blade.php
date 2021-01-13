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
                            <h3 class="card-title">Редактирование статьи "{{ $post->title }}"</h3>
                        </div>
                        <form action="{{ route('admin.posts.update', $post) }}" role="form" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $post->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Цитата</label>
                                    <textarea name="description" id="description" class="form-control @error('title') is-invalid @enderror" rows="3">{{ $post->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content">Контент</label>
                                    <textarea name="content" id="content" class="form-control @error('title') is-invalid @enderror" rows="5">{{ $post->content }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    <select name="category_id" id="category_id" class="form-control @error('title') is-invalid @enderror">
                                        <option>выберите категорию ...</option>
                                        @foreach($categories as $id => $title)
                                            <option value="{{ $id }}" @if ($id == $post->category_id) selected @endif>{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tags">Тэги</label>
                                    <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Выбор тэгов" style="width: 100%;">
                                        @foreach($tags as $id => $title)
                                            <option value="{{ $id }}"@if (in_array($id, $post->tags->pluck('id')->all())) selected @endif>{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="thumbnail">Изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="thumbnail" id="thumbnail" type="file" class="custom-file-input @error('title') is-invalid @enderror">
                                            <label class="custom-file-label" for="thumbnail">Выберите изображение</label>
                                        </div>
                                    </div>
                                    <div><img src="{{ $post->getImage() }}" alt="" class="img-thumbnail mt-2" width="200px"></div>
                                </div>


                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                        <!-- /.card-footer-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
