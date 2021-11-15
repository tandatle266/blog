@extends('layouts.admin')
@section('title')
  <h1>All Post</h1>
@stop
@section('main')
  <div class="text-right" style="margin-right: 70px;text-decoration: none !important; ">
   <a href=" {{ route('post.create') }}" class="btn btn-primary btn-lg active btn-sm" role="button" aria-pressed="true"><i class="fas fa-pen"></i> New post</a>
  </div>
    <div class="container">
      @if (Session::has('success'))
            
        <div class="alert alert-success" style="margin:0 20%  0 ">
            <strong>{{ Session::get('success') }}</strong>
        </div>
        @endif
        <br>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>               
                <th scope="col">Author</th>
                <th scope="col">Created at</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              
                @foreach ($data as $d)
                <tr>
                    <th class="align-middle" scope="row">{{ $d->id }}</th>

                    <td class="align-middle">             
                      <div class="media">                       
                        <div class="media-body">
                          <img src="{{asset('public/uploads') }}/{{ $d->thumbnail }} " style="width: 100px;float: left;">
                          <p  class="align-middle" ><em >{{ $d->title }}</em></p>
                          
                        </div>
                      </div>
                    </td>
                    
                    
                    <td class="align-middle" style="max-width: 100%">
                     
                      <span class="badge badge-primary">{{ $d->authorable->name }}</span>                     
                    </td>      
                    
                    <td class="align-middle">{{  date_format($d->created_at, 'd-m-Y ') }}</td>
                    <td class="text-right align-middle">
                      <a href="{{ route('post.show',$d->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                      <a href="{{ route('post.edit',$d->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                      <button href="{{ route('post.destroy',$d->id) }}" class="btn btn-sm btn-danger btndelete" >
                        <i class="fas fa-trash"></i>
                        </button> 
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        
  </div>
  @if (isset($data))
  <form action="" method="POST" id="form-delete">
    @csrf @method('DELETE')
  </form>
  @endif
  
@stop

@section('js')
<script>
  $('.btndelete').click(function(ev){
      ev.preventDefault();
      var _href = $(this).attr('href');
      $('form#form-delete').attr('action',_href);

      if(confirm('Bạn có chắc chắn muốn xoá không?')){
          $('form#form-delete').submit();
      }
  })
</script>
@stop