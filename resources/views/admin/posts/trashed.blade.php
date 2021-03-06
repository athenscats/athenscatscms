@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h1>{{$title}}</h1>
@stop

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('general.posts')</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{ route('posts.create') }}" class="btn btn-app"><i
                                class="fa fa-plus"></i> @lang('general.posts_add')</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12">
                    <table id="data" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>@lang('posts.featured')</th>
                            <th>@lang('posts.title')    </th>
                            <th>@lang('posts.slug')    </th>
                            <th>@lang('posts.category')</th>
                            <th width="280px">@lang('general.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dat)
                            <tr>
                                <td><img src="{{$dat->featured}}" alt="{{$dat->title}}" width="90px"></td>
                                <td>    {{$dat->title}}</td>
                                <td>    {{$dat->slug}}</td>
                                <td>    {{$dat->category->name}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('posts.restore',['id' => $dat->id]) }}" data-toggle="tooltip"
                                           title="Restore Post" class="btn btn-default btn-sm"><i
                                                    class='fa fa-arrow-up'></i></a>
                                        <a href="{{ route('posts.kill', ['id' => $dat->id]) }}" data-toggle="tooltip"
                                           title="Delete Post"
                                           class="btn btn-default btn-sm"><i class='fa fa-trash'></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>@lang('posts.featured')</th>
                            <th>@lang('posts.title')    </th>
                            <th>@lang('posts.slug')    </th>
                            <th>@lang('posts.category')</th>
                            <th width="280px">@lang('general.action')</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            Athens Cats CMS - 2018
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@stop

@section('js')
    <script>
        $(function () {
            $('#data').DataTable()
        })
    </script>
@stop