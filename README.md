# PHP to Enterprise CRUD Reference Repo

Этот каталог зарезервирован под отдельный git-репозиторий курса `php-to-enterprise-crud`.

Курс ведет студента от голого `PHP` до корпоративного CRUD на `Laravel 13` и `Filament`. Репозиторий нужен не как "папка с примерами", а как учебная история изменений: каждая домашка и каждый крупный этап должны жить в отдельной ветке, чтобы проверка могла сравнивать решение студента с ожидаемым результатом.

## Сквозной проект

`NSI management system` - система управления справочниками.

Основные сущности:

- `products`;
- `categories`;
- `units`;
- `suppliers`;
- `users`;
- `roles` или permissions на этапе Laravel/Filament.

## Корень проекта

Контракт курса: после `git clone` студент всегда работает в корне репозитория `php-to-enterprise-crud`.

```bash
git clone git@github.com:tyfoon-kz/php-to-enterprise-crud.git
cd php-to-enterprise-crud
```

Plain PHP этап создает `public/`, `src/`, `storage/`, `scripts/`, `docs/`, `notes/` прямо в корне. Laravel этап с модуля 12 также живет прямо в корне: `composer.json`, `artisan`, `app/`, `routes/`, `database/` и остальные файлы Laravel не должны оказываться внутри дополнительной папки `product-nsi/`.

Подробный контракт зафиксирован в `docs/project-root-contract.md`. Все проверки и эталонные ветки должны использовать именно эти относительные пути.

## Среда

Проект должен запускаться в Docker-окружении из курса `docker-engineering-environment`.

Базовый runtime:

- `nginx`;
- `php-fpm`;
- `php-cli`;
- `composer`;
- `postgres` или `mysql`;
- `redis` для Laravel cache/queue modules;
- `mailpit` или аналогичный mail catcher для инфраструктурных уроков.

## Ветки

- `main` - стартовая база проекта.
- `homework-*` - эталонные решения домашних заданий.
- `exam-*` - экзаменационные сценарии.

Полная сетка веток зафиксирована в `docs/branch-map.md`. Сейчас курс содержит 101 домашнее задание, и каждая ветка должна соответствовать конкретному `homework.md` внутри `../modules/*/lessons/*`.

Важно: `docs/branch-map.md` - это целевая сетка публикации. Перед продажей курса нужно создать или обновить фактические `homework-*` ветки под эту сетку. Старые ветки из черновой версии курса не считаются достаточными эталонами.

Проверка готовности веток:

```bash
scripts/validate-reference-branches.sh
```

Скрипт обязан завершаться ошибкой, пока фактические эталонные ветки не созданы. Для публикации он должен проходить без списка `Missing homework branches`.

Проверка структуры курса и самодостаточности домашних заданий:

```bash
scripts/validate-course-structure.sh
scripts/validate-homework-self-contained.sh
```

## Правило для каждой ветки

Ветка должна содержать:

- рабочий код;
- README или `docs/homework.md` с командами запуска;
- явный список проверок;
- минимальный seed/demo data, если задача требует данных;
- тест или smoke-сценарий там, где это уместно.

Пример минимального smoke-сценария:

```bash
docker compose up -d
docker compose exec php composer install
docker compose exec php php -v
curl -i http://localhost/products
```

## Связь с курсом

Содержательные файлы курса находятся уровнем выше:

- `../plan.md`
- `../modules/*/module.md`
- `../exam/course-exam.md`

Перед публикацией нужно создать или обновить фактические эталонные ветки из `docs/branch-map.md`.

## Packaging safety

Не публикуй технические worktree-каталоги из `../ref-worktrees/`. Они нужны только для параллельной сборки эталонных веток и могут содержать временные `.env`, Laravel-файлы и промежуточные состояния.

Не используй слепой `git push --all`, если локально есть старые draft-ветки. Публиковать нужно только ветки из `docs/branch-map.md`.
