<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Demo2 by Laravel</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">PhP demo2</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/index">Просмотр устройств и моделей</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/device">Добавление устройств</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/model">Добавление моделей</a>
                </li>
            </ul>
            <div class="form-inline">
                <input class="form-control mr-sm-2" id="search" placeholder="Id Device">
                <button class="btn btn-outline-info my-2 my-sm-0" id="search-button">Search</button>
            </div>
        </div>
    </nav>

    <!--render page block-->
    <div id="app">
        {{app(App\Http\Controllers\MainController::class)->renderPageTemplate($page)}}
    </div>

    <!--ajax navigation or request-->
    <script>
        var timeout;

        function addModel(){
            let name = document.getElementById('nameModel').value
            let validator = document.getElementById('validator').value
            fetch(`/api/model/${validator}/${name}`).then((data) => {
                return data.json()
            }).then((data) => {
                renderMessage(data.message)
            })
        }
        
        function renderMessage(m){
            let block = document.getElementById("alert");
            clearTimeout(timeout)
            block.innerText = m
            block.style.display = 'block'
            timeout = setTimeout(() => {
                block.style.display = 'none'
            }, 2500);


        }

        document.getElementById('search-button').addEventListener('click', () => {
            let serial = document.getElementById("search").value;
            fetch(`/api/find/${serial}`).then((data) => {
                return data.json()
            }).then((data) => {
                document.getElementById("app").innerHTML = `find: ${data.value}` //----------
            })
        })
    </script>
</body>

</html>