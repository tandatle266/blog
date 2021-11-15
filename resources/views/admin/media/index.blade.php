@extends('layouts.admin')
@section('title')
  <h1>All Media</h1>
@stop
@section('main')
  <div class="text-right" style="margin-right: 70px;text-decoration: none !important; ">
    <a href=" {{ route('image.create') }}" class="btn btn-primary btn-lg active btn-sm" role="button" aria-pressed="true">Upload</a>
  </div>

    <div class="container">
      @if (Session::has('success'))
            
        <div class="alert alert-success" style="margin:0 20%  0 ">
            <strong>{{ Session::get('success') }}</strong>
        </div>
      @endif
        <br>
        
        @for ($i = 0 ; $i < ceil(count($data) / 4) ; $i++)
          <div class="row">
              @foreach ($data as $d)
              <div class="col-md-3">
                
                  @if ($d->mediaable_type === 'Post')
                    @if (!empty( $d->mediaable->thumbnail))
                   
                    <img src="{{asset('public/uploads') }}/{{ $d->mediaable->thumbnail}} "
                    @endif
                  @else
                      @if (!empty( $d->mediaable->image))
                     
                      <img src="{{asset('public/uploads') }}/{{ $d->mediaable->image}}"
                      @endif
                  @endif
                style="width: 200px">
                <div>
                  <a href="{{ route('image.show', $d->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                  <a href="{{ route('image.edit',$d->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                  <button href="{{ route('image.destroy',$d->id) }}" class="btn btn-sm btn-danger btndelete" >
                    <i class="fas fa-trash"></i>
                    </button> 
                </div>
              </div>
              @endforeach
          </div>
        @endfor
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