Training diary for powerlifters.
Technologies: PHP/Symfony4, Twig3, Html5, css3, bootstrap4

About:
Training diary have simple authentification system.
The application allows for adding new progres in exercises in user training plan located in homepage.
the user can add weight, reps, sets in exercise but if he want, he can click on 'quick exercise' button and voila! Now user can set name and other parameters to new exercise but this exercise is not permanent in trening plan like other exercises.
In diary is seemingly similar button, is called 'similar'.He is next to every exercise in trening plan. Is responsible for possibility adding the same exercises but adds '#{int}' in name exercise e.g 'deadlift' and similar 'deadlift#2'.  

Application checks user progres and note it in database. Later, all exercises is showing special section named "progres". This section shows user all exercises in actual week.
Diary count training volume and allow you to choose between lbs or kg.
Also, in homepage is waiting for users special section where is showing previous workouts. Default shows two days in the past from today but in option user can change it or complitely off.

Instalation:
1. Clone repository.
2. Set DATABASE_URL in env
3. Composer install
4. Enter php bin/console make:migration
5. Enter php bin/console doctrine:migrations:migrate
6. Enter php bin/console doctrine:fixtures:load
7. Enter php/bin run:server
8. Open in browser: http://127.0.0.1:8000 (all you need is this, not /something/)
9. Email: user0@gmail.com
10.Password: password0
End
