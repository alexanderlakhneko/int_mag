<?php

namespace IntMag\Controller;

/**
 * Контроллер CabinetController
 * Кабинет пользователя
 */
class CabinetController
{

    /**
     * Action для страницы "Кабинет пользователя"
     */
    public function indexAction()
    {
        return 'cabIndex';
    }

    /**
     * Action для страницы "Редактирование данных пользователя"
     */
    public function editAction()
    {
        return 'edit';
    }

}
