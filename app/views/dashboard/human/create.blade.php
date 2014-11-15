@section('content')

<ol class="breadcrumb">
    <li><a href="{{ route('.human.index') }}">Гуманоиды</a></li>
    <li class="active">{{ $human->id ? $human->title : 'Добавление гуманоида' }}</li>
</ol>

<div class="row">
    <div class="col-md-9">

        <?php $url = $human->id ? route('.human.update', $human->id) : route('.human.store'); ?>

        {{ Form::model($human, array('url' => $url, 'class' => 'form-horizontal', 'human' => 'form')) }}
        {{ Form::textField('Название', 'title') }}
        {{ Form::textareaField('Биография', 'bio') }}
        {{ Form::imageField('Изображение', 'image') }}
        {{ Form::numberField('Рост', 'height') }}
        {{ Form::geopointField('Расположение', 'location', null, [], ['help' => 'Укажите расположение объекта, кликнув по нужной точке карты или вписав широту и долготу в поле под ней']) }}
        {{ Form::dateField('Дата рождения', 'birthdate') }}
        {{ Form::submitField() }}
        {{ Form::close() }}
    </div>

    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-paw"></i> Питомцы</div>
            <table class="table">
                <tbody class="sortable" data-entityname="human-pet">
                @foreach ($human->pets()->sorted()->get() as $pet)
                <tr data-itemId="{{{ $pet->id }}}">
                    <td class="sortable-handle"><span class="glyphicon glyphicon-sort"></span></td>
                    <td><a href="{{ route('.pet.view', $pet->id) }}">{{ $pet->title }}</a></td>
                    <td class="grid-actions">
                        {{ grid_link('pet', 'view', $pet->id) }}
                        {{ grid_link('pet', 'destroy', $pet->id) }}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="panel-body">
                <a type="button" href="{{ route('.pet.create', $human->id) }}" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Добавить питомца</a>
            </div>
        </div>
    </div>
</div>

@endsection