# Тестовое задание для фреймворка Laravelr
## _Привет, это простое задание, суть задания оценить ваши навыки в работе с laravel, изучить стилистику написания кода._



1) Создать 3 миграции в базу данных с помощью Artisan:
1.1 Таблица “Жанры” с полями:
1.2 ID
1.3 Название жанра
2) Таблица Фильмы с полями :
2.1 ID
2.2 Название фильма
2.3 Статус публикации 
2.4 Ссылка на постер
3) Таблица связи фильмы с жанрами
4 Создать seeds для тестового заполнения вышеуказанных таблиц
5 Создать модели, контроллеры, для создания, вывода, редактирования и удаления записей.
6 При создании записи в таблицу фильмы, должна происходить загрузка изображения с постером фильма ( если изображение отсутствует, к записи должно прикрепляться дефолтное изображение. Так же фильм не должен быть опубликован, публикация записи должна быть предусмотрена отдельным методом.
7 Создать контроллеры REST API для выборки и пагинации данных в формате json
- жанры ( выводит список всех жанров)
- жанры/id (выводит список всех фильмов в данном жанре с разбивкой на страницы
- фильмы - выводит все фильмы с разбивкой на страницы
- фильмы/id - выводит определенный фильм по ID

**Фильм всегда в себе должен содержать жанры к которым относится и ссылку на изображение**

## Внимание в контроллерах должно быть минимальное количество логики. Все входящие по реквесту данные должны быть отвалидированы, особенно файлы.
