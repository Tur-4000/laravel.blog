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
                                <h3 class="card-title">Новая статья</h3>
                            </div>
                            <form action="{{ route('admin.posts.store') }}" role="form" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Название</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Название">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Цитата</label>
                                        <textarea name="description" id="description" class="form-control" rows="3" placeholder="Цитата ..."></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Контент</label>
                                        <textarea name="content" id="content" class="form-control" rows="5" placeholder="Контент ..."></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="category_id">Категория</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option>выберите категорию ...</option>
                                            @foreach($categories as $id => $title)
                                                <option value="{{ $id }}">{{ $title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="tags">Тэги</label>
                                        <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Выбор тэгов" style="width: 100%;">
                                            @foreach($tags as $id => $title)
                                                <option value="{{ $id }}">{{ $title }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="thumbnail">Изображение</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="thumbnail" id="thumbnail" type="file" class="custom-file-input">
                                                <label class="custom-file-label" for="thumbnail">Выберите изображение</label>
                                            </div>
                                        </div>
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
