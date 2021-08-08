<!--show table model-->
@if(count($array['model']))
<div class="container" style="margin-top: 25px;">
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Шаблон</th>
            </tr>
        </thead>
        <tbody>
            @foreach($array['model'] as $key => $value)
            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$value->name}}</td>
<<<<<<< HEAD
                <td>{{$value->validator}}</td>
=======
                <td>{{$value->template}}</td>
>>>>>>> 0.0.2
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<<<<<<< HEAD
    <p class="text-center">Вы пока не добавили хотя бы одну модель...</p>
=======
<div class="container">
    <div class="alert alert-danger" style="margin-top: 25px;">
        <p class="text-center">Вы пока не добавили хотя бы одну модель...</p>
    </div>
</div>
>>>>>>> 0.0.2
@endif

<!--show table device-->
@if(count($array['device']))
<div class="container" style="margin-top: 25px;">
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Серийный номер</th>
            </tr>
        </thead>
        <tbody>
            @foreach($array['device'] as $key => $value)
            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->serial}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<<<<<<< HEAD
    <p class="text-center">Вы пока не добавили хотя бы одно устройство...</p>
=======
<div class="container">
    <div class="alert alert-danger">
        <p class="text-center">Вы пока не добавили хотя бы одно устройство...</p>
    </div>
</div>
>>>>>>> 0.0.2
@endif