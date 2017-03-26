@extends('layouts.app')

@section('content')
<div class="container">
	<div class="columns">
		<div class="column is-8 is-offset-2">
			<form method="post" action="{{ route('new-brands') }}">
				<div class="card">
					<div class="card-header">
						<p class="card-header-title">New Receiving Report</p>
					</div>
					<div class="card-content is-clearfix">
						@if(count($errors) > 0)
							<div class="notification is-danger">
								<button class="delete"></button>
								{{ $errors->first() }}
							</div>
						@endif

						{{ csrf_field() }}

						@if(isset($brand))
							{{ method_field('PUT') }}
						@endif

						<div class="control is-horizontal">
							<div class="control-label">
								<label class="label">Invoice #</label>
							</div>
							<div class="control">
								<input name="name" type="text" class="input" value="@if(isset($brand)){{ trim($brand->name) }}@else{{ trim(old('name')) }}@endif">
							</div>
						</div>
						<vue-handsontable header="{{ json_encode(['SKU', 'Qty']) }}"></vue-handsontable>
						<button class="button is-pulled-right is-primary">@if(isset($brand)){{ "Update" }}@else{{ "Create" }}@endif</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection