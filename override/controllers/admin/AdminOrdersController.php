<?php

class AdminOrdersController extends AdminOrdersControllerCore {
    public function renderView()
    {
        $order = new Order(Tools::getValue('id_order'));
        if (!Validate::isLoadedObject($order)) {
            $this->errors[] = Tools::displayError('The order cannot be found within your database.');
        }

        $cart = reset(UrbitCart::getUrbitCartByOrderId($order->id));
        $address = new Address($order->id_address_delivery, $this->context->language->id);

        $phone = $cart['delivery_is_gift']
            ? $cart['delivery_gift_receiver_phone']
            : $cart['delivery_contact_phone'];

        $date = date_parse($cart['delivery_time']);

        $urbit_address = <<<EOF
{$cart['delivery_first_name']} {$cart['delivery_last_name']}<br/>
{$cart['delivery_street']}<br/>
{$cart['delivery_zip_code']} {$cart['delivery_city']}<br/>
{$address->country}<br/>
{$phone}<br/>
<br/>
<br/>
Time: {$date['hour']}h {$date['minute']}<br/>
Date: {$date['year']}/{$date['month']}/{$date['day']}
EOF;

        $this->context->smarty->assign(array(
            'urbit_address' => $urbit_address,
        ));

        return parent::renderView();
    }
}
