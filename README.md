Для установик на сервере нужно:

1. Создать вьюшку в БД. Запрос:

```create view user_adverts_view as
SELECT adverts.id              AS id,
       adverts.title           AS title,
       adverts.price           AS price,
       adverts.region          AS region,
       adverts.delivery_volume AS delivery_volume,
       adverts.photo           AS photo,
       adverts.user_id         AS user_id,
       adverts.vip_status      AS vip_status,
       watch_makes.title       AS watch_make_title,
       mechanism_types.title   AS mechanism_type_title,
       watch_types.title       AS watch_type_title,
       watch_models.title      AS watch_model_title,
       sexes.title             AS sex_title,
       statuses.title          AS moderation_status,
       watch_adverts.watch_state,
       watch_adverts.release_year,
       watch_adverts.is_release_year_confirmed,
       watch_adverts.width,
       watch_adverts.height,
       watch_adverts.model_code
FROM watch_adverts
         INNER JOIN watch_models on watch_adverts.watch_model_id = watch_models.id
         INNER JOIN adverts ON watch_adverts.advert_id = adverts.id
         INNER JOIN sexes ON watch_adverts.sex_id = sexes.id
         INNER JOIN watch_makes ON watch_adverts.watch_make_id = watch_makes.id
         INNER JOIN mechanism_types ON watch_adverts.mechanism_type_id = mechanism_types.id
         INNER JOIN watch_types on watch_adverts.watch_type_id = watch_types.id
         INNER JOIN statuses on adverts.status_id = statuses.id
           where statuses.id = 2 and watch_makes.is_moderated = 1 and watch_models.is_moderated = 1
```           

2. Комманда для наполнения сайта исскуственным контектом
```
php artisan migrate:fresh --seed
```
3. Комманды для установки курсов валют и запуска крона
```
php artisan rate:update
php artisan schedule:work
```
