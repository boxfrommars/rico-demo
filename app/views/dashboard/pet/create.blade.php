@section('content')

<ol class="breadcrumb">
    <li><a href="{{ route('.human.index') }}">Гуманоиды</a></li>
    <li><a href="{{ route('.human.view') }}">{{ $human->title }}</a></li>
    <li class="active">{{ $pet->id ? $pet->title : 'Добавление питомца' }}</li>
</ol>

<div class="row">
    <div class="col-md-9">

        <?php $url = $pet->id ? route('.pet.update', $pet->id) : route('.pet.store'); ?>

        {{ Form::model($pet, array('url' => $url, 'class' => 'form-horizontal', 'role' => 'form')) }}
        {{ Form::hidden('human_id', $human->id) }}
        {{ Form::textField('Название', 'title') }}
        {{ Form::textareaField('Биография', 'description') }}
        {{ Form::imageField('Изображение', 'image') }}
        {{ Form::submitField() }}
        {{ Form::close() }}
    </div>
</div>

@endsection