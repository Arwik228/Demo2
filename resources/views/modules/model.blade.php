<div class="container" style="margin-top: 25px;display: flex;justify-content: center;">
    <div style="width:60%;">
        <div class="mb-3">
            <label for="nameModel" class="form-label">Наименование модели</label>
            <input type="text" class="form-control" id="nameModel" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="validator" class="form-label">Проверочный шаблон</label>
            <input type="text" class="form-control" id="validator">
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" onclick="addModel()" style="width: 100%;">Отправить</button>
        </div>
        <div class="alert alert-danger" id="alert" style="margin-top: 25px;display:none"> </div>
    </div>
</div>