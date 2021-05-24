@extends (layouts.org)
@section('title', 'Nuovo evento')

@section('content')
<div class="container">
    <div class="center">
        <h4 class=" left title"><span class="text"><strong>Registrazione</strong></h4>
        <div class="container-contact">
            <div class="wrap-contact1">
                {{ Form::open(array('route' => 'register', 'class' => 'contact-form')) }}   
                <div  class="wrap-input">
                    {{ Form::label('nome', 'Nome', ['class' => 'label-input']) }}
                    {{ Form::text('nome', '', ['class' => 'input','id' => 'nome', 'required' => '']) }}
                    @if ($errors->first('nome'))
                    <ul class="errors">
                        @foreach ($errors->get('nome') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection