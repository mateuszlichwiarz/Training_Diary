Training diary for powerlifters.
Technologies: PHP, Symfony4, Twig, Html5, css3, bootstrap4
Bootstrap theme is from bootswatch.com. 'Darkly' Made by Thomas Park

About:
Training diary has Symfony authentification system.
The application allows for adding new progres in exercises in User Training Plan.
User has possibility to add weight, reps, sets in exercise but if he want, he can click on 'quick exercise' button. Now User can set name and other parameters to new exercise.
Diary has also buttons named 'similar'.This button is multiplayed and displays next to every exercise in trening plan. Is just adding the same exercises but with changed name e.g 'deadlift' for 'deadlift#2'.  


Main functionality of App is checking User progress and flush it in database.
App has section named 'progress'. This section shows user all exercises in actual week.
Diary also count training volume and allow User to choose between lbs or kg.
In Diary Homepage show special section where is previous workouts. In Default shows two days in the past from current day but in option user can change it or turn off.

Instalation:
1. Clone repository
2. configure DATABASE_URL in env
3. Enter php bin/console make:migration
4. Enter php bin/console doctrine:migrations:migrate
5. Enter php bin/console doctrine:fixtures:load
6. Enter php/bin run:server or symfony server:start
7. Email: user0@gmail.com
8. Password: password0
