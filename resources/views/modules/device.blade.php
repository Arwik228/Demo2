<div class="container" style="margin-top: 25px;display: flex;justify-content: center;">
    <div class="card" style="width:65%;">
        <div class="card-header">
            Добавить устройство или группу устройств
        </div>
        <div class="card-body">
            <div class="mb-3">
                <select class="form-control" id="select">
                    @if(count($devices))
                    @foreach($devices as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                    @else
                    <option selected>Для начала нужно добавить модель (1+)</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <textarea class="form-control" placeholder="Серийники устройств (Enter OR Space)" id="textarea" style="min-height: 100px"></textarea>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" onclick="addDevice()" style="width: 100%;">Добавить</button>
            </div>
            <div class="alert alert-danger" id="alert" style="margin-top: 25px;display:none"> </div>
        </div>
    </div>
</div>