<?php

namespace Controller;


use Library\Controller;
use Library\Request;


class SiteController extends Controller
{
    public function indexAction(Request $request)
    {
        $Products = $this->container->get('repository_manager')->getRepository('Product');
        return $this->render('index.php', ['Products' => $Products]);
    }

    public function contactAction(Request $request)
    {
        // Переменные для формы
        $userEmail = false;
        $userText = false;
        $result = false;

        // Флаг ошибок
        $errors = false;
        
        $user = $this->container->get('repository_manager')->getRepository('User');

        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена 
            // Получаем данные из формы
            $userEmail = $request->post('userEmail');
            $userText = $request->post('userText');
            
            // Валидация полей
            if (!$user->checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Отправляем письмо администратору 
                $adminEmail = 'php.admin@gmail.com';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }
        return $this->render('contact.php', ['userEmail' => $userEmail, 'userText' => $userText, 'result' => $result, 'errors' => $errors]);
    }

    public function aboutAction()
    {
        return $this->render('about.php');
    }
}