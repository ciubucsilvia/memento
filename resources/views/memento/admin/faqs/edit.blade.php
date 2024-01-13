{!! Form::model($faq, ['route' => ['faqs.update', $faq->id], 'method' => 'PUT']) !!}
	
	@include(config('settings.theme') . '.admin.faqs.form')

{!! Form::close() !!}