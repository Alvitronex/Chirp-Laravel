<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use function Laravel\Prompts\text;
use function Laravel\Prompts\password;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\search;
use function Laravel\Prompts\select;
use function Laravel\Prompts\suggest;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('greet', function () {


    // === preguntar nombre ===

    // $name = text(
    //     label: 'What is your name?',
    //     placeholder: 'E.g. Taylor Otwell',
    //     hint: 'This will be displayed on your profile.',
    //     default: 'Taylor Otwell',
    //     required: 'Your name is required.',
    //     validate: fn(string $value) => match (true) {

    //         strlen($value) < 3 => 'The name must be at least 3 characters.',
    //         strlen($value) > 255 => 'The name must be at least 255 characters.',
    //         default => null
    //     }
    // );

    // === preguntar contraseña ===
    // $password = password(
    //     label: 'What is your password?',
    //     placeholder: 'E.g. Taylor Otwell',
    //     hint: 'This will be displayed on your profile.',
    //     required: 'Your password is required.',
    //     validate: fn(string $value) => match (true) {

    //         strlen($value) < 3 => 'The password must be at least 3 characters.',
    //         strlen($value) > 255 => 'The password must be at least 255 characters.',
    //         default => null
    //     }
    // );

    // $this->info("Hello, {$name}");
    // $this->info("Hello:  {$password}");

    // $confirmed = confirm(
    //     label: 'Are you sure?',
    //     default: false,
    //     yes: 'I accept',
    //     no: 'I decline',
    //     required: 'You must accept the terms to continue.'

    // );
    // dd($confirmed);



    // === roles de usuario donde se pueden asigar ===
    // $role = select(
    //     label: 'What role should the user have?',
    //     options: [
    //         'member' => 'Member',
    //         'contributor' => 'Contributor',
    //         'owner' => 'Owner',
    //         'hi' => 'Hi',
    //         'more' => 'More',
    //         'one' => 'One',
    //         'admin' => 'Admin',
    //     ],
    //     validate: fn(string $value) => $value === 'owner'
    //         ? 'An owner already exists. '
    //         : null,
    //     default: 'owner',
    //     scroll: 3,
    // );
    // dd($role);


    // === permisos ===
    // $permissions = multiselect(
    //     label: 'What permissions should be assigned?',
    //     options: [
    //         'read' => 'Read',
    //         'create' => 'Create',
    //         'update' => 'Update',
    //         'delete' => 'Delete',
    //     ],
    //     default: ['read', 'create']
    // );
    // dd($permissions);

    // === sugerencias ===
    // $name = suggest(
    //     label: 'What is your name?',
    //     options: [
    //         'Taylor Otwell',
    //         'Laravel',
    //         'Voyager',
    //     ],
    //     default: 'Taylor Otwell',

    // );

    // $this->info("Hello, {$name}"); 


    $id = search(
        label: 'Search for the user that should receive the mail',
        placeholder: 'E.g. Taylor Otwell',
        options: fn(string $value) => strlen($value) > 0
            ? User::whereLike('name', "%{$value}%")->pluck('name', 'id')->all()
            : [],
        hint: 'The user will receive an email immediately.'
    );

    dd($id );
});






// ejecutar comando => artisan:greetold 

Artisan::command('greetold {name?}', function (string $name = null) {
    if (! $name) {
        $name = text('What is your name?');
    }
    $this->info("Hello, {$name}");
});
