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

    UserStory#1: Display a Username after "**Register and Create Profile**".
    
        Result: The username will be displayed next to dropdown.
    
    UserStory#2: **View & Create Tags** using "Tags" link under dropdown menu
    
        Result: When the user login they can see available Tags and also able to create a new tag(s).
        
    UserStory#3: While creating a new Question the user can **choose the tag**(s)
    
        Result: The user should be able to successfully create a question with tags.
        
    UserStory#4: While Editing Question user can choose/ update selected tag.
    
        Result: The user should be able to updated tags for a question.
