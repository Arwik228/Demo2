<div class="container" style="margin-top: 25px;display: flex;justify-content: center;">
    <div class="card" style="width:65%;">
        <div class="card-header">
            Добавить модель оборудования
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="nameModel" class="form-label">Наименование модели</label>
                <input type="text" class="form-control" id="nameModel" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="template" class="form-label">Проверочный шаблон</label>
                <input type="text" class="form-control" id="template">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" onclick="addModel()" style="width: 100%;">Добавить</button>
            </div>
            <div class="alert alert-danger" id="alert" style="margin-top: 25px;display:none"> </div>
        </div>
    </div>
</div>