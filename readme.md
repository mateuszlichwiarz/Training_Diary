Training diary for powerlifters.
Technologies: PHP, Symfony4, Twig, Html5, css3, bootstrap4
Bootstrap theme is from bootswatch.com. 'Darkly' Made by Thomas Park

About:
Training diary have simple authentification system.
The application allows for adding new progres in exercises in user training plan.
User can add weight, reps, sets in exercise but if he want, he can click on 'quick exercise' button and now user can set name and other parameters to new exercise but this exercise is not permanent in trening plan like other exercises.
In diary is seemingly similar button, is called 'similar'.He is next to every exercise in trening plan. Is responsible for possibility adding the same exercises but adds '#{int}' in name exercise e.g 'deadlift' and similar 'deadlift#2'.  

Application checks user progres and note it in database. Later, all exercises section named "progres". This section shows user all exercises in actual week.
Diary count training volume and allow you to choose between lbs or kg.
Also, in homepage is waiting for users special section where is showing previous workouts. Default shows two days in the past from today but in option user can change it or complitely off.
Instalation:
1. Clone repository
2. configure DATABASE_URL in env
3. Enter php bin/console make:migration
4. Enter php bin/console doctrine:migrations:migrate
5. Enter php bin/console doctrine:fixtures:load
6. Enter php/bin run:server or symfony server:start
7. Email: user0@gmail.com
8. Password: password0
