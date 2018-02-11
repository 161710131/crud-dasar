@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Post 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Title</label>	
			  			<input type="text" name="title" class="form-control" value="{{ $posts->title }}"  readonly>
			  		</div>

			  		<div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
			  			<label class="control-label">Content</label>	
			  			<textarea name="content" class="form-control" rows="10" readonly>{{ $posts->content }}</textarea>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection