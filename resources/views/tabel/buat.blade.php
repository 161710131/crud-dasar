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
				<form action="{{ route('tabel.store') }}" method="post">
					{{ csrf_field() }}
					<div class="form group {{ $errors->has('nomor_ktp') ? 'has-error' : '' }}">
						<label class="control-label">Nomor KTP</label>
						<input type="text" class="form-control" name="nomor_ktp" required>
						@if($errors->first('nomor_ktp'))
						<span class="help-block">
							<strong>{{ $errors->first('nomor_ktp') }}</strong>
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