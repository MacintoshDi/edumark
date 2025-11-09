ТЕХНИЧЕСКОЕ ЗАДАНИЕ: Полная админ-панель для Edumark на Filament v3.3.43
1. Общие сведения
1.1. Наименование проекта
Полная админ-панель Edumark с интеграцией фронтенда

1.2. Заказчик
Edumark Education Platform

1.3. Исполнитель
Разработчик/Команда разработки

1.4. Цель документа
Детальное описание требований к разработке админ-панели Edumark, обеспечивающее полное понимание задачи для ИИ-ассистента или разработчика без необходимости дополнительных уточнений.

1.5. Статус документа
Версия 1.0 (окончательная)

2. Цели и задачи проекта
2.1. Основная цель
Создать полностью функциональную админ-панель на Filament v3.3.43, позволяющую управлять всеми сущностями платформы Edumark с полной интеграцией с фронтендом, обеспечивая 100% соответствие предоставленным макетам и структуре сайта.

2.2. Конкретные задачи

Реализовать все функциональные модули, описанные в ТЗ
Обеспечить полное соответствие UI/UX макетам
Создать интеграцию с существующей структурой проекта
Обеспечить масштабируемость и поддержку будущих доработок
Обеспечить соответствие всем требованиям безопасности
3. Требования к функционалу
3.1. Меню (Menu Management)
3.1.1. Структура данных

Таблица menus:
id (BIGINT, PK, AUTO_INCREMENT)
slug (VARCHAR 255, UNIQUE, NOT NULL)
location (ENUM('header', 'footer', 'mobile'), DEFAULT 'header', NOT NULL)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
Таблица menu_items:
id (BIGINT, PK, AUTO_INCREMENT)
menu_id (BIGINT, FK to menus.id, CASCADE DELETE, NOT NULL)
parent_id (BIGINT, FK to menu_items.id, NULLABLE)
title (JSON, {"en": "Home", "ru": "Главная"}, NOT NULL)
type (ENUM('link', 'dropdown', 'mega-menu', 'button'), DEFAULT 'link', NOT NULL)
url (TEXT, NULLABLE)
device (JSON, ["desktop", "tablet", "mobile"], NOT NULL)
icon (VARCHAR 255, NULLABLE)
status (BOOLEAN, DEFAULT 1, NOT NULL)
sort_order (INT, DEFAULT 0, NOT NULL)
metadata (JSON, NULLABLE)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
3.1.2. Функциональные требования

Поддержка вложенности до 5 уровней
Типы пунктов меню:
Ссылка (link): прямая ссылка на URL
Выпадающее меню (dropdown): контейнер для дочерних элементов
Mega-меню (mega-menu): сложная структура с несколькими колонками
Кнопка (button): выделенный элемент с уникальным стилем
Drag-and-drop сортировка с визуальной обратной связью
Фильтрация по устройствам (десктоп/планшет/мобильный) с возможностью выбора нескольких вариантов
Включение/выключение видимости пункта
Поддержка иконок (использовать Heroicons v2.0)
Метаданные для каждого пункта меню (например, target="_blank", rel="nofollow")
Поддержка локализации (русский/английский)
Автоматическое обновление кэша при изменении структуры меню
Валидация:
Пункт типа "link" или "button" должен иметь URL
Пункт типа "dropdown" или "mega-menu" не должен иметь URL
Пункт не может быть дочерним для самого себя
3.1.3. UI-требования

Добавление новых пунктов через модальное окно
Визуальное представление иерархии в виде дерева
Плавные анимации при перетаскивании
Отображение типа пункта через иконку
Отображение активных/неактивных элементов с различным стилем
3.2. Когорты (Cohorts)
3.2.1. Структура данных

Таблица cohorts:
id (BIGINT, PK, AUTO_INCREMENT)
name (JSON, {"en": "Growth Marketing", "ru": "Рост маркетинга"}, NOT NULL)
description (JSON, NOT NULL)
slug (VARCHAR 255, UNIQUE, NOT NULL)
start_date (DATETIME, NOT NULL)
color (VARCHAR 7, DEFAULT '#3B82F6', NOT NULL)
icon (VARCHAR 255, NULLABLE)
status (BOOLEAN, DEFAULT 1, NOT NULL)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
Таблица cohort_student (Many-to-Many):
cohort_id (BIGINT, FK to cohorts.id, CASCADE DELETE, NOT NULL)
student_id (BIGINT, FK to users.id, CASCADE DELETE, NOT NULL)
PRIMARY KEY (cohort_id, student_id)
Таблица cohort_teacher (Many-to-Many):
cohort_id (BIGINT, FK to cohorts.id, CASCADE DELETE, NOT NULL)
teacher_id (BIGINT, FK to users.id, CASCADE DELETE, NOT NULL)
PRIMARY KEY (cohort_id, teacher_id)
3.2.2. Функциональные требования

Управление когортами с CRUD-операциями
Поля:
Название (с поддержкой локализации)
Описание (с поддержкой локализации)
Слаг (автоматическая генерация при создании)
Дата начала (в формате Y-m-d H:i:s)
Цвет (выбор через цветовой пикер)
Иконка (загрузка SVG/PNG до 512x512px)
Связь со студентами (Many-to-Many) с возможностью массового добавления
Связь с преподавателями (Many-to-Many)
Фильтрация по статусу (активные/архивные)
Сортировка по дате начала
Валидация:
Дата начала должна быть в будущем
Слаг должен быть уникальным
Цвет должен соответствовать формату hex (#RRGGBB)
3.3. Студенты (Students)
3.3.1. Структура данных

Таблица student_profiles:
user_id (BIGINT, FK to users.id, PRIMARY KEY, CASCADE DELETE, NOT NULL)
specialty (JSON, {"en": "Marketing", "ru": "Маркетинг"}, NULLABLE)
location (VARCHAR 255, NULLABLE)
status (ENUM('active', 'inactive', 'graduated'), DEFAULT 'active', NOT NULL)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
3.3.2. Функциональные требования

Профиль студента с полями:
Специальность (с поддержкой локализации)
Локация (выбор из предустановленного списка: New York, London, Tokyo и т.д.)
Статус (активный, неактивный, завершивший обучение)
Возможность прикрепления к когортам (Many-to-Many)
Фильтрация по когортам в Student Directory
Поиск по имени, специальности и локации
Экспорт данных студентов в CSV/Excel
Студенты могут быть только пользователями с ролью "student"
3.4. Преподаватели (Teachers)
3.4.1. Структура данных

Таблица teacher_profiles:
user_id (BIGINT, FK to users.id, PRIMARY KEY, CASCADE DELETE, NOT NULL)
specialization (JSON, {"en": "SEO", "ru": "SEO"}, NOT NULL)
location (VARCHAR 255, NULLABLE)
bio (JSON, {"en": "...", "ru": "..."}, NULLABLE)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
3.4.2. Функциональные требования

Отдельный тип пользователя "преподаватель"
Поля:
Специализация (с поддержкой локализации)
Локация
Био (с поддержкой локализации)
Связь с когортами (Many-to-Many)
Отображение в разделе "Ask Your Teacher" с фильтрацией по специализации
Возможность добавления/редактирования профиля преподавателя только администратором
3.5. Ресурсы (Resources)
3.5.1. Структура данных

Таблица resources:
id (BIGINT, PK, AUTO_INCREMENT)
cohort_id (BIGINT, FK to cohorts.id, NULLABLE)
title (JSON, NOT NULL)
description (JSON, NULLABLE)
type (ENUM('course', 'slides', 'template', 'quiz'), NOT NULL)
file_path (VARCHAR 512, NOT NULL)
metadata (JSON, NULLABLE)
status (BOOLEAN, DEFAULT 1, NOT NULL)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
3.5.2. Функциональные требования

Управление ресурсами (курсы, слайды, шаблоны, квизы)
Типы ресурсов:
Курсы (course): видеокурсы с возможностью добавления уроков
Слайды (slides): презентации в формате PDF/PPTX
Шаблоны (template): готовые шаблоны для использования
Квизы (quiz): интерактивные тесты
Загрузка файлов с валидацией:
Курсы: MP4, WebM (макс. 2GB)
Слайды: PDF, PPTX (макс. 500MB)
Шаблоны: ZIP, DOCX, XLSX (макс. 100MB)
Квизы: JSON (макс. 10MB)
Отображение в разделе каждой когорты с сортировкой по типу и дате добавления
Возможность создания превью для курсов и слайдов
3.6. Задания (Assignments)
3.6.1. Структура данных

Таблица assignments:
id (BIGINT, PK, AUTO_INCREMENT)
cohort_id (BIGINT, FK to cohorts.id, NOT NULL)
title (JSON, NOT NULL)
description (JSON, NOT NULL)
due_date (DATETIME, NOT NULL)
points (INT, DEFAULT 100, NOT NULL)
metadata (JSON, NULLABLE)
status (BOOLEAN, DEFAULT 1, NOT NULL)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
Таблица assignment_submissions:
id (BIGINT, PK, AUTO_INCREMENT)
assignment_id (BIGINT, FK to assignments.id, NOT NULL)
student_id (BIGINT, FK to users.id, NOT NULL)
file_path (VARCHAR 512, NULLABLE)
grade (DECIMAL(5,2), NULLABLE)
feedback (JSON, NULLABLE)
status (ENUM('submitted', 'graded', 'returned'), DEFAULT 'submitted', NOT NULL)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
3.6.2. Функциональные требования

Управление заданиями по когортам
Привязка к календарю (отображение в календарном формате)
Система оценок (0-100 баллов)
Обратная связь от преподавателя
Статусы заданий:
Ожидает отправки
Отправлено
Оценено
Возвращено на доработку
Уведомления о сроках сдачи
Возможность просмотра и оценки работ преподавателем
3.7. Обсуждения (Discussions)
3.7.1. Структура данных

Таблица discussion_categories:
id (BIGINT, PK, AUTO_INCREMENT)
name (JSON, NOT NULL)
slug (VARCHAR 255, UNIQUE, NOT NULL)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
Таблица discussion_topics:
id (BIGINT, PK, AUTO_INCREMENT)
category_id (BIGINT, FK to discussion_categories.id, NOT NULL)
user_id (BIGINT, FK to users.id, NOT NULL)
title (VARCHAR 255, NOT NULL)
content (TEXT, NOT NULL)
is_solved (BOOLEAN, DEFAULT 0, NOT NULL)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
Таблица discussion_replies:
id (BIGINT, PK, AUTO_INCREMENT)
topic_id (BIGINT, FK to discussion_topics.id, NOT NULL)
user_id (BIGINT, FK to users.id, NOT NULL)
content (TEXT, NOT NULL)
is_best (BOOLEAN, DEFAULT 0, NOT NULL)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
Таблица discussion_likes:
id (BIGINT, PK, AUTO_INCREMENT)
reply_id (BIGINT, FK to discussion_replies.id, NOT NULL)
user_id (BIGINT, FK to users.id, NOT NULL)
created_at (TIMESTAMP)
3.7.2. Функциональные требования

Категории обсуждений:
Вопросы
Обратная связь
Гиды
Другое
Управление топиками и ответами
Система лайков (каждый пользователь может лайкать один раз)
Пометка решения (только автор топика может отметить ответ как решение)
Уведомления о новых ответах
Сортировка по популярности и дате
Поддержка Markdown в контенте
3.8. События (Events)
3.8.1. Структура данных

Таблица events:
id (BIGINT, PK, AUTO_INCREMENT)
title (JSON, NOT NULL)
description (JSON, NOT NULL)
start_date (DATETIME, NOT NULL)
end_date (DATETIME, NULLABLE)
image (VARCHAR 255, NULLABLE)
capacity (INT, NULLABLE)
registration_url (TEXT, NULLABLE)
status (ENUM('upcoming', 'ongoing', 'completed', 'canceled'), DEFAULT 'upcoming', NOT NULL)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
Таблица event_registrations:
event_id (BIGINT, FK to events.id, NOT NULL)
user_id (BIGINT, FK to users.id, NOT NULL)
registered_at (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)
PRIMARY KEY (event_id, user_id)
3.8.2. Функциональные требования

Управление событиями и вебинарами
Поля:
Дата начала и окончания
Описание
Изображение (загрузка до 1920x1080px)
Вместимость (количество мест)
Ссылка на регистрацию
Система регистрации (проверка вместимости)
Отображение в разделе "Events" с фильтрацией по статусу
Уведомления о предстоящих событиях
Автоматическая смена статуса при наступлении даты
4. Требования к архитектуре и технологиям
4.1. Основные технологии
Laravel v10.x
Filament v3.3.43 (строго указанная версия)
PHP v8.2 (минимальная версия)
MySQL v8.0 (минимальная версия)
Node.js v18.x
NPM v9.x
4.2. Зависимости
json


1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
⌄
⌄
⌄
{
  "require": {
    "filament/filament": "3.3.43",
    "spatie/laravel-translatable": "^6.3",
    "jenssegers/agent": "^2.6",
    "maatwebsite/excel": "^3.1",
    "spatie/laravel-permission": "^5.10",
    "spatie/laravel-activitylog": "^4.7",
    "spatie/laravel-medialibrary": "^10.9"
  },
  "require-dev": {
    "laravel/pint": "^1.12",
    "nunomaduro/collision": "^8.1",
    "spatie/laravel-ignition": "^2.3"
  }
}
4.3. Структура проекта


1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
app/
├── Console/
├── Exceptions/
├── Filament/
│   ├── Pages/
│   ├── Resources/
│   │   ├── MenuResource/
│   │   ├── CohortResource/
│   │   ├── StudentResource/
│   │   ├── TeacherResource/
│   │   ├── ResourceResource/
│   │   ├── AssignmentResource/
│   │   ├── DiscussionResource/
│   │   └── EventResource/
│   ├── Widgets/
│   └── ...
├── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   │   ├── MenuController.php
│   │   │   └── ... (остальные контроллеры)
│   │   └── Frontend/
│   │       ├── CohortController.php
│   │       └── ... (остальные контроллеры)
│   ├── Middleware/
│   │   ├── DeviceDetection.php
│   │   └── ...
│   └── ...
├── Models/
│   ├── Menu.php
│   ├── MenuItem.php
│   ├── Cohort.php
│   ├── Student.php
│   ├── Teacher.php
│   ├── Resource.php
│   ├── Assignment.php
│   ├── Discussion.php
│   ├── Event.php
│   ├── User.php
│   └── ...
├── Policies/
│   ├── MenuItemPolicy.php
│   ├── CohortPolicy.php
│   └── ...
├── Repositories/
│   ├── MenuRepository.php
│   └── ...
├── Rules/
│   └── ...
└── ...

database/
├── migrations/
│   ├── ... (все миграции)
├── seeders/
│   └── ...

public/
├── assets/
│   ├── css/
│   │   └── filament/
│   │       └── ... (кастомные стили админки)
│   └── js/
│       └── filament/
│           └── ... (кастомные скрипты админки)
└── ...

resources/
├── lang/
│   ├── en/
4.4. Требования к безопасности
Все маршруты админ-панели должны использовать middleware auth и admin
Проверка прав доступа через Laravel Policies
Защита от CSRF-атак
Валидация всех входящих данных
Защита от XSS через автоматическое экранирование Blade
Хранение паролей с использованием bcrypt
Логирование всех критических операций
Ограничение количества попыток входа
Регулярное обновление зависимостей
5. Детальная спецификация реализации
5.1. Шаг 1: Настройка админки (1 день)
5.1.1. Базовая установка

Установка Filament v3.3.43
Настройка локализации (ru/en)
Настройка темной/светлой темы
Настройка аутентификации с ролями
5.1.2. Настройка прав доступа

Создание ролей: admin, teacher, student
Назначение разрешений для каждой роли
Настройка политики доступа к ресурсам
5.1.3. Ожидаемый результат

Работающая админ-панель с авторизацией
Система ролей и разрешений
Базовая навигация
5.2. Шаг 2: Меню и навигация (2 дня)
5.2.1. Создание моделей

Реализация моделей Menu и MenuItem
Настройка отношений
Добавление миграций
5.2.2. Реализация ресурсов

Создание MenuResource
Настройка RelationManager для пунктов меню
Реализация drag-and-drop сортировки
5.2.3. Интеграция с фронтендом

Создание MenuRepository с кэшированием
Реализация метода getTree()
Добавление device detection middleware
5.2.4. Ожидаемый результат

Работающий менеджер меню
Динамическое меню на фронтенде
Поддержка всех типов пунктов и устройств
5.3. Шаг 3: Контент-менеджмент (3 дня)
5.3.1. Создание ресурсов

Реализация всех ресурсов (Cohort, Student, Teacher и т.д.)
Настройка форм с необходимыми полями
Добавление RelationManagers для связей
5.3.2. Функциональность

Реализация массовых операций
Настройка фильтров и поиска
Добавление экспортных функций
5.3.3. Локализация

Полная поддержка русского и английского языков
Переводы для всех элементов интерфейса
Автоматическое определение языка
5.3.4. Ожидаемый результат

Полный набор ресурсов с CRUD-функционалом
Поддержка всех требуемых функций
Готовые к использованию формы и таблицы
5.4. Шаг 4: Интеграция с фронтендом (2 дня)
5.4.1. Динамические маршруты

Создание динамических маршрутов для когорт
Настройка контроллеров для отображения контента
5.4.2. Blade-компоненты

Создание компонентов для когорт
Создание компонентов для ресурсов
Создание компонентов для обсуждений
Создание компонентов для событий
5.4.3. Адаптация под устройства

Настройка адаптивности в Blade-шаблонах
Фильтрация контента по устройству
5.4.4. Ожидаемый результат

Полная интеграция с фронтендом
Динамическое отображение данных
Адаптивный интерфейс
5.5. Шаг 5: Тестирование и доработки (1 день)
5.5.1. Тестирование функционала

Проверка всех CRUD-операций
Проверка прав доступа
Проверка валидации данных
5.5.2. Тестирование интеграции

Проверка отображения данных на фронтенде
Проверка кэширования
Проверка адаптивности
5.5.3. Тестирование безопасности

Проверка уязвимостей
Проверка защиты от атак
Проверка логирования
5.5.4. Ожидаемый результат

Тестовый отчет
Исправленные ошибки
Готовый к деплою продукт
6. Требования к интерфейсам
6.1. Админ-панель
Соответствие Filament v3.3.43
Дизайн должен соответствовать макетам Edumark
Все элементы должны иметь поддержку русского и английского языков
Должна быть поддержка темной и светлой темы
6.2. Фронтенд-интерфейсы
Все компоненты должны повторять структуру и стиль исходных макетов
Компоненты должны быть адаптированы под мобильные устройства
Все тексты должны поддерживать локализацию
Должна быть поддержка всех браузеров (Chrome, Firefox, Safari, Edge)
6.3. API-интерфейсы (если требуется)
RESTful API для интеграции с внешними системами
Документация в формате OpenAPI 3.0
Аутентификация через токены
7. Требования к тестированию
7.1. Тестовые сценарии
Регистрация нового пользователя
Создание и редактирование меню
Создание когорты и добавление студентов
Загрузка ресурсов
Создание и выполнение заданий
Создание обсуждений и ответов
Регистрация на события
7.2. Типы тестов
Модульные тесты (100% покрытие ключевых функций)
Тесты на интеграцию (проверка взаимодействия компонентов)
Тесты на пользовательские сценарии (E2E)
Тесты безопасности
Тесты производительности
7.3. Инструменты
PHPUnit для модульных тестов
Pest для E2E тестов (опционально)
Laravel Dusk для браузерных тестов
PHPStan для статического анализа
8. Требования к документации
8.1. Техническая документация
Схема базы данных (ER-диаграмма)
API-документация (если требуется)
Инструкция по установке
Инструкция по настройке
Описание архитектуры
8.2. Документация для администратора
Руководство по использованию админ-панели
Описание всех функций
Сценарии типовых задач
Таблица ролей и разрешений
8.3. Документация для разработчика
Структура проекта
Описание основных классов и методов
Соглашения по коду
Процесс добавления новых функций
9. Сроки и этапы реализации
1
Базовая настройка админки
1 день
Разработчик
Не начат
2
Меню и навигация
2 дня
Разработчик
Не начат
3
Контент-менеджмент
3 дня
Разработчик
Не начат
4
Интеграция с фронтендом
2 дня
Разработчик
Не начат
5
Тестирование и доработки
1 день
QA
Не начат
Итого
9 дней
10. Критерии приемки
10.1. Функциональные критерии
Все разделы админ-панели полностью функциональны
Все данные корректно отображаются на фронтенде
Все функции соответствуют макетам
Все операции проходят валидацию
10.2. Технические критерии
Код соответствует стандартам Laravel и Filament
Покрытие тестами не менее 80%
Нет уязвимостей безопасности
Производительность соответствует требованиям
10.3. Дизайнерские критерии
Полное соответствие макетам
Адаптивный дизайн
Поддержка локализации
Соответствие брендингу Edumark
11. Приложения
11.1. Ссылки на макеты
Ссылка на Figma-макеты
Скриншоты текущего интерфейса (предоставлены в исходном ТЗ)
11.2. Схема базы данных
