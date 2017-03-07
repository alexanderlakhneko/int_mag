<?php

namespace Controller;

use Library\Request;
use Model\Product;
/**
 * Контроллер AdminCategoryController
 * Управление категориями товаров в админпанели
 */


class AdminCategoryController extends AdminBase
{

    /**
     * Action для страницы "Управление категориями"
     */
    public function indexAction()
    {
        // Проверка доступа
        $this->checkAdmin();
        $product = $this->container->get('repository_manager')->getRepository('Product');

        // Получаем список категорий
        $categoriesList = $product->getCategoriesListAdmin();

        // Подключаем вид
        return $this->render('index.php', ['categoriesList' => $categoriesList, 'product' => $product]);
    }

    /**
     * Action для страницы "Добавить категорию"
     */
    public function createAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();

        $product = $this->container->get('repository_manager')->getRepository('Product');

        // Флаг ошибок в форме
        $errors = false;

        // Обработка формы
        if ($request->isPost('submit')) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $request->post('name');
            $sortOrder = $request->post('sort_order');
            $status = $request->post('status');

            // При необходимости можно валидировать значения нужным образом
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
                $product->createCategory($name, $sortOrder, $status);

                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/category");
            }
        }

        return $this->render('create.php', ['errors' => $errors]);
    }

    /**
     * Action для страницы "Редактировать категорию"
     */
    public function updateAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();

        $id = $request->get('id');
        $product = $this->container->get('repository_manager')->getRepository('Product');

        // Получаем данные о конкретной категории
        $category = $product->getCategoryById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            // Сохраняем изменения
            $product->updateCategoryById($id, $name, $sortOrder, $status);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/category");
        }

        // Подключаем вид
        return $this->render('update.php', ['category' => $category]);
    }

    /**
     * Action для страницы "Удалить категорию"
     */
    public function deleteAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();
        $id = $request->get('id');
        $product = $this->container->get('repository_manager')->getRepository('Product');

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            $product->deleteCategoryById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/category");
        }

        // Подключаем вид
        return $this->render('delete.php', ['id' => $id ]);
    }

}
