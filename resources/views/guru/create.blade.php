@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">Data Tabel
				<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
				</div>
			</div>
			<div class="panel-body">
				<form action="{{ route('guru.store') }}" method="post">
					{{ csrf_field() }}
					<div class="form group {{ $errors->has('nik') ? 'has-error' : '' }}">
						<label class="control-label">NIK</label>
						<input type="text" class="form-control" name="nik" required>
						@if($errors->first('nik'))
						<span class="help-block">
							<strong>{{ $errors->first('nik') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
						<label class="control-label">Nama</label>
						<input type="text" class="form-control" name="nama" required>
						@if ($errors->has('nama'))
							<span class="help-block">
								<strong>{{ $errors->first ('nama') }}</strong>
							</span>
						@endif
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
	</div>

@endsection