@section('content')

<ol class="breadcrumb">
    <li class="active">Роли</li>
</ol>

<div class="row">
    <div class="col-md-9">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Код</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td><a href="{{ route('.role.view', $role->id) }}">{{ $role->title }}</a></td>
                    <td><a href="{{ route('.role.view', $role->id) }}">{{ $role->name }}</a></td>
                    <td class="grid-actions">
                        {{ grid_link('role', 'view', $role->id) }}
                        {{ grid_link('role', 'destroy', $role->id) }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <p><a href="{{ route('.role.create') }}" class="btn btn-primary" role="button">
            <span class="glyphicon glyphicon-plus"></span>
            Добавить
        </a></p>

    </div>
    <div class="col-md-3">
    </div>
</div>
@endsection