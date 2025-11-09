# Исправление ошибки `Class "App\\Filament\\Resources\\DiscussionCategoryResource\\Pages\\ListDiscussionCategories" not found`

Эта ошибка появляется, когда Laravel/Composer не может найти класс страницы списка категорий обсуждений. Ниже приведён пошаговый чек-лист по проекту [`MacintoshDi/edumark`](https://github.com/MacintoshDi/edumark), который поможет гарантировать корректную автозагрузку классов Filament.

## 1. Проверяем, что файлы существуют и названы без лишних пробелов
1. Откройте директорию [`app/Filament/Resources/DiscussionCategoryResource`](../../app/Filament/Resources/DiscussionCategoryResource).
2. Убедитесь, что внутри неё есть папка `Pages` **без пробела в конце** (macOS иногда оставляет копии с пробелом).
3. В папке `Pages` должны лежать **ровно три файла**:
   - [`CreateDiscussionCategory.php`](../../app/Filament/Resources/DiscussionCategoryResource/Pages/CreateDiscussionCategory.php)
   - [`EditDiscussionCategory.php`](../../app/Filament/Resources/DiscussionCategoryResource/Pages/EditDiscussionCategory.php)
   - [`ListDiscussionCategories.php`](../../app/Filament/Resources/DiscussionCategoryResource/Pages/ListDiscussionCategories.php)
4. Если увидите дубликаты с пробелом на конце имени (например, `ListDiscussionCategories .php`), удалите их.

## 2. Сверяем namespace и имена классов
Откройте каждый из файлов и проверьте, что:

```php
<?php
namespace App\Filament\Resources\DiscussionCategoryResource\Pages;
```

- Класс в `ListDiscussionCategories.php` должен называться `class ListDiscussionCategories extends ListRecords`.
- Классы в `CreateDiscussionCategory.php` и `EditDiscussionCategory.php` должны называться соответственно `CreateDiscussionCategory` и `EditDiscussionCategory` и наследоваться от Filament-страниц (`CreateRecord`, `EditRecord`).

## 3. Проверяем ресурс
В файле [`app/Filament/Resources/DiscussionCategoryResource.php`](../../app/Filament/Resources/DiscussionCategoryResource.php) убедитесь, что метод `getPages()` возвращает те же самые классы:

```php
public static function getPages(): array
{
    return [
        'index' => Pages\ListDiscussionCategories::route('/'),
        'create' => Pages\CreateDiscussionCategory::route('/create'),
        'edit' => Pages\EditDiscussionCategory::route('/{record}/edit'),
    ];
}
```

Если вы переименовывали файлы/классы, синхронизируйте здесь названия.

## 4. Обновляем автозагрузку Composer
После любых переименований выполните в корне проекта:

```bash
composer dump-autoload
php artisan optimize:clear
```

Эти команды пересоберут классы для автозагрузки и очистят кеш Laravel.

## 5. Перезапускаем локальный сервер
Запустите сервер заново:

```bash
php artisan serve
```

Если все пути и имена файлов указаны корректно, класс `ListDiscussionCategories` будет найден, и Filament отобразит страницу со списком категорий обсуждений.

> **Примечание:** на macOS с файловой системой APFS (по умолчанию регистронезависимой) дубликаты файлов с пробелом в конце имени могут «слипаться». Если проблема повторяется, очистите проект от таких копий и повторите шаг 4.
