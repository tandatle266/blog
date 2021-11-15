@extends('layouts.admin')
@section('title')
  <h1>Upload Ảnh</h1>
@stop


@section('main')

<div class="container" >
  <form action="{{ route('image.store') }}" method="POST" style="width: 100%" enctype="multipart/form-data">
    @csrf 
      <div class="input-group mb-3">
        <input type="file"  id="ckfinder-input-1" name="file_upload" aria-describedby="basic-addon2" style="width:30%">
        <div class="input-group-append">
          <button class="input-group-text" type="button" id="ckfinder-popup-1" id="basic-addon2">@Upload</button>
        </div>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
 
@stop
@section('js')
  <script src="{{ asset('public/frontend/ckeditor') }}/ckeditor.js"></script>
  <script src="{{ asset('public/frontend/ckfinder') }}/ckfinder.js"></script>
  <script>
   var button1 = document.getElementById( 'ckfinder-popup-1' );

   button1.onclick = function() {
	selectFileWithCKFinder( 'ckfinder-input-1' );
};
function selectFileWithCKFinder( elementId ) {
	CKFinder.modal( {
		chooseFiles: true,
		width: 800,
		height: 600,
		onInit: function( finder ) {
			finder.on( 'files:choose', function( evt ) {
				var file = evt.data.files.first();
				var output = document.getElementById( elementId );
				output.value = file.getUrl();
			} );

			finder.on( 'file:choose:resizedImage', function( evt ) {
				var output = document.getElementById( elementId );
				output.value = evt.data.resizedUrl;
			} );
		}
	} );
}
</script>
@stop