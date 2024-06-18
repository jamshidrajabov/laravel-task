<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Larvel-task loyihasi haqida

Laravel-task loyihasi 2024-yilning 15-18-iyun kunlari oralig'ida Rajabov Jamshid tomonidan ishlab chiqilgan loyiha. Bu loyiha portfolio uchun ishlab chiqilgan bo'lib, Laravel frameworkida yozilgan. Ushbu loyihada FrontEnd qismga e'tibor qaratilmagan!

- Telegram orqali bog'lanish uchun [bu yerga](http://t.me/jamshid_rajabov) bosishingiz mumkin.
- Email orqali bog'lanish uchun jamshidamaliymatematika@gmail.com ga bog'laning.
## Laravel-task loyihasining vazifasi nima?
- Admin va mijoz o'rtasidagi aloqani yaratib beruvchi loyiha.
- Mijoz Adminga ariza jo'natadi. Ariza ichida fayl ham mavjud.
- Ariza mijoz tomonidan jo'natilganda Adminga queue ga qo'yilgan Mailable orqali xabarnoma jo'natiladi
- Manager roli orqali kirgan admin kelib tushgan arizalarni ko'ra oladi. 
- Manager roli orqali kirgan admin kelib tushgan arizaga javob berganda userga elektron pochta orqali xabarnoma yuboriladi.
- Mijoz o'zining arizalarini va unga kelgan javoblarni platforma ichida ko'ra oladi. 
- Mijoz va Manager arizaga berilgan javoblarni platforma ichida ham ko'ra oladi. 
- Manager file tugmasini bosish orqali ariza ichida yuborilgan fileni ko'ra oladi.


### Migrate qilinganda 2 ta role ga ega 2 ta user ro'yxatdan o'tadi.
- **Manager**
- **Client**
```
User: Manager
Mail: client@gmail.com
Password: secret
```
```
User: Client
Mail: client@gmail.com
Password: secret
```

# Eslatma!
Dastur ishga tushirilganda 
```
php artisan queue:listen
```
buyrug'i bajarilishi kerak. 