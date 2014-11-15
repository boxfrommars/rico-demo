@section('content')

<ol class="breadcrumb">
    <li class="active">Гуманоиды</li>
</ol>

<div class="row">
    <div class="col-md-9">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Дата рождения</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($humans as $human)
                <tr>
                    <td><a href="{{ route('.human.view', $human->id) }}">{{ $human->title }}</a></td>
                    <td><a href="{{ route('.human.view', $human->id) }}">{{ $human->birthdate }}</a></td>
                    <td class="grid-actions">
                        {{ grid_link('human', 'view', $human->id) }}
                        {{ grid_link('human', 'destroy', $human->id) }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <p><a href="{{ route('.human.create') }}" class="btn btn-primary" role="button">
            <span class="glyphicon glyphicon-plus"></span>
            Добавить
        </a></p>

    </div>
    <div class="col-md-3"></div>
</div>
@endsection