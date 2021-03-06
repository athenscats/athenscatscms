@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h1>{{$title}}</h1>
@stop

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('general.categories')</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{ route('categories.create') }}" class="btn btn-app"><i
                                class="fa fa-plus"></i> @lang('general.categories_add')</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12">
                    <table id="data" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>@lang('categories.name')    </th>

                            <th width="280px">@lang('general.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dat)
                            <tr>
                                <td>
                                    {{$dat->name}}
                                </td>
                                <td>
                                    <form class="pull-right" method="post"
                                          action="{{ route('categories.destroy',$dat->id) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{route('category.single', ['slug' => $dat->slug])}}" data-toggle="tooltip"
                                               title="View Category" target="_blank" class="btn btn-default btn-sm"><i
                                                        class='fa fa-eye'></i></a>
                                            <a href="{{ route('categories.edit',$dat->id) }}" data-toggle="tooltip"
                                               title="Edit Category" class="btn btn-default btn-sm"><i
                                                        class='fa fa-pencil'></i></a>
                                            <button type="submit" data-toggle="tooltip" title="Delete Category"
                                                    class="btn btn-default btn-sm"><i class='fa fa-trash'></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>@lang('categories.name')    </th>

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