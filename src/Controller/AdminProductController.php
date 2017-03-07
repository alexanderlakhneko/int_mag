<?php

namespace Controller;

use Library\Request;
use Model\Product;
/**
 * Контроллер AdminProductController
 * Управление товарами в админпанели
 */
class AdminProductController extends AdminBase
{

    /**
     * Action для страницы "Управление товарами"
     */
    public function indexAction()
    {
        // Проверка доступа
        $this->checkAdmin();
        $product = $this->container->get('repository_manager')->getRepository('Product');

        // Получаем список товаров
        $productsList = $product->getProductsList();

        // Подключаем вид
        return $this->render('index.php', ['productsList' => $productsList]);
    }

    /**
     * Action для страницы "Добавить товар"
     */
    public function createAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();
        $product = $this->container->get('repository_manager')->getRepository('Product');

        // Получаем список категорий для выпадающего списка
        $categoriesList = $product->getCategoriesListAdmin();

        // Флаг ошибок в форме
        $errors = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name'] = $request->post('name');
            $options['code'] = $request->post('code');
            $options['price'] = $request->post('price');
            $options['category_id'] = $request->post('category_id');
            $options['brand'] = $request->post('brand');
            $options['availability'] = $request->post('availability');
            $options['description'] = $request->post('description');
            $options['is_new'] = $request->post('is_new');
            $options['is_recommended'] = $request->post('is_recommended');
            $options['status'] = $request->post('status');

            

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = $product->createProduct($options);


                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/webroot/images/home/product{$id}.jpg");
                    }
                };

                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/product");
            }
        }

        // Подключаем вид
        return $this->render('create.php', ['categoriesList' => $categoriesList, 'errors' => $errors]);
    }

    /**
     * Action для страницы "Редактировать товар"
     */
    public function updateAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();
        
        $id = $request->get('id');
        
        $products = $this->container->get('repository_manager')->getRepository('Product');

        // Получаем список категорий для выпадающего списка
        $categoriesList = $products->getCategoriesListAdmin();

        // Получаем данные о конкретном заказе
        $product = $products->getProductById($id);

        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $request->post('name');
            $options['code'] = $request->post('code');
            $options['price'] = $request->post('price');
            $options['category_id'] = $request->post('category_id');
            $options['brand'] = $request->post('brand');
            $options['availability'] = $request->post('availability');
            $options['description'] = $request->post('description');
            $options['is_new'] = $request->post('is_new');
            $options['is_recommended'] = $request->post('is_recommended');
            $options['status'] = $_POST['status'];

            // Сохраняем изменения
            if ($products->updateProductById($id, $options)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/webroot/images/home/product{$id}.jpg");
                }
            }

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }

        // Подключаем вид
        return $this->render('update.php', ['products' => $products, 'product' => $product, 'id' => $id,'categoriesList' => $categoriesList]);
    }

    /**
     * Action для страницы "Удалить товар"
     */
    public function deleteAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();
        $product = $this->container->get('repository_manager')->getRepository('Product');

        $id = $request->get('id');

        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Удаляем товар
            $product->deleteProductById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }

        // Подключаем вид
        return $this->render('delete.php', ['id' => $id]);

    }

}
