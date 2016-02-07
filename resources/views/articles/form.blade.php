
	<div class="form-group">
		{!! Form::label('title', 'Название') !!}
		{!! Form::text('title',null,['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('body', 'Body:') !!}
		{!! Form::textarea('body',null,['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('published_at', 'Published On:') !!}
		{!! Form::input('date','published_at',$article->published_at->format('Y-m-d'),['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('tags_list', 'Tags:') !!}
		{!! Form::select('tags_list[]',$tags, null, ['id'=>'tags_list', 'class'=>'form-control', 'multiple']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::submit($submitButtonText, ['class'=> 'btn btn-primary form-control']) !!}
	</div>


	@section('footer')
	<script>
		$('#tags_list').select2({
			placeholder:'Chose tag',
			tags: true,
			/*ajax:{
				dataType: 'json',
				url: 'api/tags',
				delay: 250,
				data: function(params){
					return {
						q: params.term
					}
				},
				processResults: function(data){
					return { results: data}
				}
			}*/
		});
	</script>
	@endsection