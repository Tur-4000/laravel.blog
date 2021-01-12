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
                                <h3 class="card-title">Создание тэга</h3>
                            </div>
                            <form action="{{ route('admin.tags.store') }}" role="form" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Название</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Название">
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
