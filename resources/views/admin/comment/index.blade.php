@extends('layouts.admin')
@section('title')
  <h1>All Comment</h1>
@stop
@section('main')
  <div class="text-right" style="margin-right: 70px;text-decoration: none !important; ">
    <a href=" {{ route('comment.create') }}" class="btn btn-primary btn-lg active btn-sm" role="button" aria-pressed="true">New Comment</a>
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
                <th scope="col">Author</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">For</th>
                <th scope="col">Created at</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <th scope="row">{{ $d->id }}</th>
                    <td>{{ $d->authorable->name }}</td>                   
                    <td>{{ $d->body }}</td>
                    <td class="align-middle">             
                      <div class="media">                       
                        <div class="media-body">
                          <img src="{{asset('public/uploads') }}/{{ $d->image }} " style="width: 100px;float: left;">
                        </div>
                      </div>
                    </td>
                    @php
                      foreach($rep as $reps){
                          if($reps->cmt_id == $d->id){
                            $a = $reps->replyable;
                            $name = $reps->replyable_type ? $a->title : '';
                            echo '<td>'.$name.'  <span class="badge badge-primary">'.$reps->replyable_type.'</span></td>';
                            break;
                          }
                      }
                    @endphp 
                   
                    <td>{{  $d->created_at }}</td>
                    <td class="text-right">
                      <a href="{{ route('comment.edit',$d->id) }}" class="btn btn-sm btn-success">Edit</a>
                      <button href="{{ route('comment.destroy',$d->id) }}" class="btn btn-sm btn-danger btndelete" >
                            Delete
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