<?php

namespace App\Controller;

use App\Attributes\Get;
use App\Attributes\Post;
use App\View;

class UseController{
    #[Get('/use/create')]
    public function create(): View
    {
        return View::make('users/register');
    }

    #[Post('/use/create')]
    public function register()
    {
       $name=$_POST['name'];
       $email=$_POST['email'];
       $firstname=explode(' ',$name)[0];
       $text="waa $firstname this is larmaaach";
    
        $email=(new Email())
        ->from ('ttalo1097@gmail.com')
        ->to($email)
        ->subject('welcome')
        ->text($text);

        $transport=Transport::fromDsn();
        $mailer=new Mailer($transport);
        $mailer->send($email);
    }
}
