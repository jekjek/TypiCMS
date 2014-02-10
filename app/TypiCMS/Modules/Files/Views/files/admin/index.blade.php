@section('head')

	{{ HTML::script(asset('js/list.js')) }}

@stop


@section('main')

	<div class="list-form" lang="{{ Config::get('app.locale') }}">

		@include('admin._buttons-list')

		{{ Form::open(array('route' => array('admin.files.upload'), 'files' => true, 'class' => 'thumbnail thumbnail-dropzone', 'id' => 'uploader')) }}
			@foreach (Config::get('app.locales') as $locale)
				{{ Form::hidden($locale.'[alt_attribute]', '') }}
				{{ Form::hidden($locale.'[status]', 1) }}
			@endforeach
			@if($relatedModel)
			{{ Form::hidden('fileable_id', $relatedModel->id); }}
			{{ Form::hidden('fileable_type', get_class($relatedModel)); }}
			@endif
			<div class="dz-message">@lang('global.Drop files to upload (or click)')</div>
			<div class="fallback">
			{{ Form::file('file', null, array('class' => 'fileInput', 'accept' => 'image/*')); }}
			{{ Form::button('send', array('type' => 'submit')) }}
			</div>
		{{ Form::close() }}

		<div class="dropzone-previews"></div>

		<div class="sortable sortable-thumbnails">
		@foreach ($models as $key => $model)
			<a href="{{ route('admin.files.edit', $model->id) }}" class="thumbnail @if($model->status == 1) online @else offline @endif" id="item_{{ $model->id }}">
				<input type="checkbox" value="{{ $model->id }}">
				<img src="{{ Croppa::url('/'.$model->path.'/'.$model->filename, 100, 100) }}" alt="{{ $model->alt_attribute }}">
				<div class="caption">
					<div>{{ $model->filename }}</div>
					<div>{{ $model->alt_attribute }}</div>
				</div>
			</a>
		@endforeach
		</div>

	</div>

	{{-- $models->links() --}}

@stop