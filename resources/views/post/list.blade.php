@extends('layouts.master')
@section('title', 'Post List')
@section('content')
   <section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">All Post</div>
                        <div class="float-right">
                            <a class="btn btn-sm btn-primary" href="{{route('post.add')}}"><i class="fa-solid fa-plus" style="color: #ffffff;"></i> Add Post</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('messages'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{Session::get('messages')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                        @endif


                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Body</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <th style="width: 5%">{{$loop->iteration}}</th>
                                    <td style="width: 15%">{{$post->title}}</td>
                                    <td style="width: 65%">{{$post->body}}</td>
                                    <td style="width: 15%">
                                        <a class="btn btn-sm btn-success" href="{{ route('post.show', $post->id) }}"><i class="fa-solid fa-circle-info"></i></a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('post.edit', $post->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-sm btn-danger" href= "{{ route('post.delete', $post->id) }}"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            
                            </tbody>
                          </table>
                          {{$posts->links("pagination::bootstrap-4")}}
                          
                        
                          
                    </div>
                </div>
            </div>
        </div>
    </div>

   </section>
@endsection