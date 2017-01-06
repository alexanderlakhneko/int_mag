<?php

namespace IntMag\Controller;

/**
 * Контроллер UserController
 */
class UserController
{
    /**
     * Action для страницы "Регистрация"
     */
    public function registerAction()
    {
        return 'register';
    }
    
    /**
     * Action для страницы "Вход на сайт"
     */
    public function loginAction()
    {
        return 'Login';
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function logoutAction()
    {
//        // Удаляем информацию о пользователе из сессии
//        unset($_SESSION["user"]);
//
//        // Перенаправляем пользователя на главную страницу
//        header("Location: /");
        return 'logout';
    }

}
