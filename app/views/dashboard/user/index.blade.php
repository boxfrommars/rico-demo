@section('content')

<ol class="breadcrumb">
    <li class="active">Пользователи</li>
</ol>

<div class="row">
    <div class="col-md-9">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Имя пользователя</th>
                <th>Email</th>
                <th>Подтверждён</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="sortable" data-entityname="building">
            @foreach ($users as $user)
                <tr data-itemId="{{{ $user->id }}}">
                    <td><a href="{{ route('.user.view', $user->id) }}">{{ $user->username }}</a></td>
                    <td><a href="{{ route('.user.view', $user->id) }}">{{ $user->email }}</a></td>
                    <td> {{ $user->confirmed ? '<i class="fa fa-check"></i>' : '' }}</td>
                    <td class="grid-actions">
                        {{ grid_link('user', 'view', $user->id) }}
                        {{ grid_link('user', 'destroy', $user->id) }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <p><a href="{{ route('.user.create') }}" class="btn btn-primary" role="button">
            <span class="glyphicon glyphicon-plus"></span>
            Добавить
        </a></p>

    </div>
    <div class="col-md-3">
    </div>
</div>
@endsection