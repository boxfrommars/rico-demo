@section('content')

<ol class="breadcrumb">
    <li><a href="{{ route('.user.index') }}">Пользователи</a></li>
    <li class="active">{{ $user->id ? $user->email : 'Добавление пользователя' }}</li>
</ol>

<div class="row">
    <div class="col-md-9">

        <?php $url = $user->id ? route('.user.update', $user->id) : route('.user.store'); ?>

        {{ Form::model($user, array('url' => $url, 'class' => 'form-horizontal', 'role' => 'form')) }}

        {{ Form::textField('Имя пользователя', 'username') }}
        {{ Form::textField('email', 'email') }}
        {{ Form::textField('Пароль', 'password', '') }}
        {{ Form::checkboxField('Подтверждён', 'confirmed') }}

        <div class="form-group">
            <label for="video" class="col-sm-3 control-label">Роли</label>
            <div class="col-sm-9">
                <ul class="list-inline equal-width-list">
                    <?php $userRolesIds = $user->roles->lists('id'); ?>
                    <?php $roles = \Rico\Auth\Role::all(); \Log::debug($roles); ?>
                    @foreach ($roles as $role)
                    <li><label class="checkbox checkbox-inline">{{ Form::checkbox('user_roles[]', $role->id, in_array($role->id, $userRolesIds)) }} {{ $role->title }}</label></li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{ Form::submitField() }}
        {{ Form::close() }}
        @if ($user->id)
        {{ Form::formAddAnotherField(route('.user.create')) }}
        @endif
    </div>
</div>

@endsection