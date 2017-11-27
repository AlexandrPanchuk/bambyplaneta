<?php

namespace app\controllers;

use app\components\helper\NovaPoshtaApi2;
use app\models\NP;
use app\models\Product;
use app\models\Cart;
use Yii;

use app\models\OrderItems;
use app\models\Order;

class CartController extends AppController
{

    public function actionAdd()
    {
        $this->layout = false;

        $id = Yii::$app->request->get('id');
        /**
         * qty используется на карточке врача при выборе количества товаров
         */
        $qty = (int) Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;

        $product = Product::findOne($id);

        if (empty($product)) return false;

        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->addToCart($product, $qty);

        // перестрахуемся для ajax запроса, если запрос не через ajax
        // переадресация на страницу, с которой пришел пользователь
        if ( !Yii::$app->request->isAjax) {
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->render('cart-model', compact('session'));
    }


    public function actionClear()
    {
        $this->layout = false;

        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');

        return $this->render('cart-model', compact('session'));
    }

    public function actionDelItem()
    {
        $this->layout = false;
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->recalc($id);

        return $this->render('cart-model', compact('session'));
    }

    public function actionShow()
    {
        $this->layout = false;
        $session = Yii::$app->session;
        $session->open();
        return $this->render('cart-model', compact('session'));
    }

    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Корзина');
        $order = new Order();

        if ($order->load(Yii::$app->request->post())) {
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            $order->address = 'none';
            if ($order->save()) {
                $this->saveOrderItems($session['cart'], $order->id);
                Yii::$app->session->setFlash('success', 'Ваш заказ принят. Менеджер вскоре свяжется с Вами.');

                // письмо для клиента
                Yii::$app->mailer->compose('order-from', compact('session'))
                    ->setFrom(['shopmodastore@gmail.com' => 'project.local'])
                    ->setTo($order->email)
                    ->setSubject('Заказ')
                    ->send();

                // письмо для админимстратора
                Yii::$app->mailer->compose('order', compact('session', 'order'))
                    ->setFrom(['shopmodastore@gmail.com' => 'IModaStore'])
                    ->setTo(Yii::$app->params['adminEmail'])
                    ->setSubject('Новый заказ')
                    ->send();

                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка оформления заказа');
            }
        }

        return $this->render('view', compact('session', 'order'));
    }

    protected function saveOrderItems($items, $order_id)
    {
        foreach ($items as $id => $item) {
            $orderItems = new OrderItems();


            $orderItems->order_id = $order_id;
            $orderItems->product_id = $id;
            $orderItems->name = $item['name'];
            $orderItems->price = $item['price'];
            $orderItems->qty_item = $item['qty'];
            $orderItems->sum_item = $item['qty'] * $item['price'];
            $orderItems->save();
        }

    }


}