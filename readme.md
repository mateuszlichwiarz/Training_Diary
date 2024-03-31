## Training Diary

Training Diary for powerlifters.

> [!NOTE]
> Technology: PHP 7.2 Symfony 4.3

## About:
Training diary has Symfony authentification system.
The application allows for adding new progres in exercises in User Training Plan.
User has possibility to add weight, reps, sets in exercise but if he want, he can click on 'quick exercise' button. Now User can set name and other parameters to new exercise.
Diary has also buttons named 'similar'.This button is multiplayed and displays next to every exercise in trening plan. Is just adding the same exercises but with changed name e.g 'deadlift' for 'deadlift#2'.  
Main functionality of App is checking User progress and flush it in database.
App has section named 'progress'. This section shows user all exercises in actual week.
Diary also count training volume and allow User to choose between lbs or kg.
In Diary Homepage show special section where is previous workouts. In Default shows two days in the past from current day but in option user can change it or turn off.

## Instalation steps

1: Clone repository<br>
2: Configure DATABASE_URL in env<br>
3: Enter php bin/console make:migration<br>
4: Enter php bin/console doctrine:migrations:migrate<br>
5: Enter php bin/console doctrine:fixtures:load<br>
6: Enter php/bin run:server or symfony server:start<br>


## Credentials
Email: user0@gmail.com <br>
Password: password0 <br>
