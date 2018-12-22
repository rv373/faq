# faq

To run the FAQ project:

1. git clone https://github.com/rv373/faq.git
2. CD into FAQ and run composer install
3. cp .env.example to .env
4. setup database / with sqlite or other (https://laravel.com/docs/5.6/database)
5. .env – change sqllite and database.sqlite path
6. php artisan make:auth for atuehnticatoin
8. php artisan migrate:refresh --seed

** FINAL Assignment - Tagging **

9) Epic: Create & Tag - A question:	

    UserStory#1: Display a Username after "**Registrater and Create Profile**".     
    
    UserStory#2: **View & Create Tags** using "Tags" link under dropdown menu
    
        Desc: When the user login they could see available Tags and also able to create a new tag(s).
        
    UserStory#3: While creating a new Question the user can **choose the tag**(s)
        The user has successfully created the question with tags.
        
    UserStory#4: While editing Question we can choose/ update tag.
