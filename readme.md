## Training Diary

Training Diary for powerlifters.

> [!NOTE]
> PHP 7.2 Symfony 4.3

## About:
Main functionality of App is checking User progress and flush it in database. Training diary has Symfony authentification system.
The application allows for adding new progres in exercises in User Training Plan.
User has possibility to add weight, reps, sets in exercise but if he want, he can click on 'quick exercise' button. Now User can set name and other parameters to new exercise.
Diary has also buttons named 'similar'.This button is multiplayed display next to every exercise in Training Plan. It is just adding the same exercises but with changed name e.g 'deadlift' for 'deadlift#2'.  
App has section named 'progress'. This section shows user all exercises in actual week.
Diary also count training volume and allow User to choose between lbs or kg.
In Diary Homepage show special section where is previous workouts. In Default shows two days in the past from current day but in option user can change it or turn off.

## Instalation Guide

1. `git clone https://github.com/mateuszlichwiarz/Training-diary.git`
2. `php/bin run:server` or `symfony server:start`
3.  configure DATABASE_URL in env file
4. `php bin/console doctrine:database:create`
5. `php bin/console make:migration`
6. `php bin/console doctrine:migrations:migrate`
7. `php bin/console doctrine:fixtures:load`

## Credentials
Email: user0@gmail.com <br>
Password: password0 <br>
