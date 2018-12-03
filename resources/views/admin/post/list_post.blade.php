@extends('admin.layout.app')
@section('content')
    <div id="page-wrapper">
        <div id="page-inner">
            @if (Session::has('success'))
                <div id="success" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div id="error" class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Post</h1>
                    {{--<h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>--}}

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!--    Context Classes  -->
                    <div class="panel panel-default">

                        {{--<div class="panel-heading">--}}
                            {{--Context Classes--}}
                        {{--</div>--}}

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @if($posts)
                                        @php
                                        $id=1;
                                        @endphp
                                        @foreach($posts as $post)
                                            <tr>
                                                <td>{{ $id }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->category_id  }}</td>
                                                <td>{{ strip_tags(str_limit($post->description,50))  }}</td>
                                                <td>
                                                    <i title="View" style="cursor: pointer;" class="fa fa-eye"></i> |
                                                    <a href="{{ url('admin-panel/edit-post/'.str_replace(" ", "-", $post->title)) }}"> <i title="Edit"style="cursor: pointer;"  class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |
                                                    <i title="Delete" style="cursor: pointer;" onclick="return DeletePost({{$post->id}})"  class="fa fa-trash" aria-hidden="true"></i>
                                                </td>
                                            </tr>
                                            @php
                                            $id++;
                                            @endphp
                                        @endforeach
                                    @endif

                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
                </div>
            </div>
        </div>
    </div>
@endsection()