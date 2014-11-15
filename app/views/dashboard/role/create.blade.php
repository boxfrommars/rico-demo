@section('content')

<ol class="breadcrumb">
    <li><a href="{{ route('.role.index') }}">Роли</a></li>
    <li class="active">{{ $role->id ? $role->title : 'Добавление роли' }}</li>
</ol>

<div class="row">
    <div class="col-md-9">

        <?php $url = $role->id ? route('.role.update', $role->id) : route('.role.store'); ?>

        {{ Form::model($role, array('url' => $url, 'class' => 'form-horizontal', 'role' => 'form')) }}

        {{ Form::textField('Название', 'title') }}
        {{ Form::textField('Код', 'name') }}

        {{ Form::submitField() }}
        {{ Form::close() }}
    </div>
</div>

@endsection