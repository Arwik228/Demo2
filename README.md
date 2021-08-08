<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Особенности
Регулярное выражение для валидация серийных номеров создается по шаблону формата


| Символ | Назначение |
| ------ | ------ |
| N | Цифра от 0 до 9 |
| A | Прописная буква латинского алфавита |
| a | Строчная буква латинского алфавита |
| X | Прописная буква латинского алфавита либо цифра от 0 до 9 |
| Z | Символ из списка: “-“, “_”, “@” |
## Установка
Для запуска воспользоваться командами
> **WARNING**:  Запуск производить с linux или в подсистеме wsl
```sh
composer create-project
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
```

## Если нет серийников
```
((s) => { 
  var res = String()
  for (let i = 0; i < 10; i++) {
    let local = String();
    s.split(String()).forEach((e) => {
      local += random(e)
    })
    res += local+"\n";
  }
  function random(s) {
    let l
    let N = "1234567890";
    let A = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
    switch (s) {
      case 'N': l = symbol(N); break;
      case 'A': l = symbol(A); break;
      case 'a': l = symbol(A).toLocaleLowerCase(); break;
      case 'X': l = symbol(N + A); break;
      case 'Z': l = symbol("@_-"); break;
      default: return false
    }
    return l
  }
  function symbol(str) {
    return str.charAt(Math.floor(Math.random() * str.length))
  }
  console.warn(res)
})("NXXAAXZXXa") 
```