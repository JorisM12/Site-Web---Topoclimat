<?php

namespace App\Controllers;
use App\Core\Form;
use App\Core\JWT;
use App\Core\Mail;
use App\Models\UsersModel;
use const App\Config\HEADER;
use const App\Config\KEY;
require_once __DIR__ . '/../Config/config.php';

class UsersController extends Controller
{
    /**
     * Connexion des utilisateurs
     *
     * @return void
     */
    public function login()
    {
       if(Form::validate($_POST, ['mail_user','password_user'])){
            $userModel = new UsersModel;
            $userArray = $userModel->findOneByEmail(htmlspecialchars($_POST['mail_user']));
            if(!$userArray) {
                $_SESSION['erreur'] = "Identifiants incorrects ou compte inactif";
                header('Location: /users/login');
                exit;
            }
            $user = $userModel->hydrate($userArray);
            if(password_verify($_POST['password_user'], $user->getPassword_user()) && $userModel->verifyMail($_POST['mail_user'])) {
                $_SESSION['error'] = "";
                $_SESSION['message'] = "";

                $user->setSession();
                header('Location: /admin');
                exit;
            } else {
                $_SESSION['error'] = "Identifiants incorrects ou compte inactif";
                header('Location: /users/login');
                exit;
            }

        }
        $form = new Form;
        $form->debutForm()
            ->ajoutLabelFor('email','Email:')
            ->ajoutInput('email', 'mail_user', ['class'=>'input-type-1', 'id' => 'email'])
            ->ajoutLabelFor('password_user','mot de passe:')
            ->ajoutInput('password','password_user',['id' => 'passord_user', 'class' => 'input-type-1'])
            ->ajoutBouton('Me connecter', ['class' => 'button-type-1'])
            ->finForm();
        $this->render('users/login',['loginForm' => $form->create()],'login_template');
    }

    /**
     * Déconnecte l'utilisateur
     *
     * @return void
     */
    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
        exit;
    }
    /**
     * Inscription des utilisateurs
     *
     * @return void
     */
    public function register()
    {
        if(Form::validate($_POST,['first_name_user','name_user','mail_user','password_user']))
        {
            $user = new UsersModel;
            $name = htmlspecialchars($_POST['name_user']);
            $firstName = htmlspecialchars($_POST['first_name_user']);
            $email = htmlspecialchars($_POST['mail_user']);
            $pass = password_hash($_POST['password_user'], PASSWORD_DEFAULT);
            if($user->verifyMail($email))
            {
                $_SESSION['error'] = 'Cet email est déjà utilisé';
                header('Location: /users/register');
            }
            $user->setName_user($name)
                ->setFirst_name_user($firstName)
                ->setMail_user($email)
                ->setPassword_user($pass);
            $user->create();

            $result = $user->findOneByEmail($email);
            $mail = new Mail;
            $jwt = new JWT;
            $payload = [
                'id_user' => $result->id_user,
                'email' => $result->mail_user
            ];
            $token = $jwt->generate(HEADER,$payload,KEY);
            $mail->confirmRegister($token,$result->mail_user);
            if($mail == false) {
                $_SESSION['error'] = 'Une erreur est survenue';

            }else{
                $user->setToken_user($token);
                $user->update($result->id_user,'id_user');

                $mail = new Mail;
                $mail->confirmRegister($token,$result->mail_user);
                $_SESSION['message'] = 'Veuillez confirmer votre inscription';
            }
            header('Location: /');
        }
        $form = new Form;

        $form->debutForm()
            ->ajoutLabelFor('first_name_user','Prénom:')
            ->ajoutInput('text','first_name_user', ['id'=>'first_name_user', 'class' => 'input-type-1'])
            ->ajoutLabelFor('name_user','Nom:')
            ->ajoutInput('text','name_user', ['id'=>'name_user', 'class' => 'input-type-1'])
            ->ajoutLabelFor('mail_user','E-mail:')
            ->ajoutInput('email','mail_user', ['id'=>'email', 'class' => 'input-type-1'])
            ->ajoutLabelFor('password_user','Mot de passe:')
            ->ajoutInput('password','password_user',['id'=>'pass', 'class' => 'input-type-1'])
            ->ajoutBouton('VALIDER',['class'=>'button-type-1'])
            ->finForm();
        $this->render('users/register', ['registerForm' => $form->create()],'login_template');
    }
    public function confirmUser()
    {
        $jwt = new JWT;
        $userModel = new UsersModel;
        $uri = $_SERVER['REQUEST_URI'];
        $url = explode('?',$uri);
        $token = explode('=',$url[1]);
        if(!$jwt->isValid($token[0]))
        {
            $titlePage = 'Confirmation du compte';
            $nameCSS = 'style';
            $content = 'Liens invalide';
            $this->render('users/confirm',compact('nameCSS','titlePage','content'),"template");
            exit;
        }
        if(!$jwt->isExpired($token[0])) {
            if($jwt->check($token[0],KEY)) {
                $userModel->setConfirm_user(1)
                        ->setToken_user('');
                $id = $jwt->getPayload($token[0]);
                $mail = $jwt->getPayload($token[0]);
                if($userModel->verifyMail($mail['email'])) {
                    $_SESSION['message'] = 'Votre compte est déjà actif !';
                    $titlePage = 'Confirmation du compte';
                    $nameCSS = 'style';
                    $content = 'Votre compte est déjà actif !';
                    $this->render('users/confirm',compact('nameCSS','titlePage','content'),"template");
                    exit;
                }
                $userModel->update($id['id_user'],'id_user');
                $_SESSION['message'] = 'Votre compte est désormais actif !';
                $titlePage = 'Confirmation du compte';
                $nameCSS = 'style';
                $content = 'Votre compte est désormais actif !';
                $this->render('users/confirm',compact('nameCSS','titlePage','content'),"template");
                exit;
            } else {
                $titlePage = 'Confirmation du compte';
                $nameCSS = 'style';
                $content = 'Liens invalide';
                $this->render('users/confirm',compact('nameCSS','titlePage','content'),"template");
                exit;
            }
        }else{
            $titlePage = 'Confirmation du compte';
            $nameCSS = 'style';
            $content = 'Liens invalide';
            $this->render('users/confirm',compact('nameCSS','titlePage','content'),"template");
            $_SESSION['error'] = 'Lien invalide';
                header('Location: /');
        }
    }
}