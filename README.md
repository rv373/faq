# faq

To run the FAQ project:

1. git clone https://github.com/rv373/faq.git
2. CD into FAQ and run composer install
3. cp .env.example to .env
4. setup database / with sqlite or other (https://laravel.com/docs/5.6/database)
5. .env – change sqllite and database.sqlite path
6. php artisan make:auth for atuehnticatoin
8. php artisan migrate:refresh --seed

****** FINAL Assignment *************
9) Epic: Build Tagging a Question in FAQ	
    1.	UserStory: Displaying a Username after "**Registration and Create Profile**".     
    2.	UserStory: View **Create Tags** link under dropdown menu
        Desc: When any user login in they could see available Tags and also able to create a new tag(s).
    3.	UserStory: While creating a new Question the user can **choose the tag**(s)
        The user has successfully created the question with tags.
    4.	UserSto ry: User can **edit the tags** and **assign a new one**.
