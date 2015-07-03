<?php

class TestModel
{
    function getItems()
    {
        $data = array(
            1 => 'first item',
            2 => 'second item'
        );
        return $data;
    }
}

class TestView
{
    function renderItemsPage($items = array())
    {
        $html = '<table><tr><th>item #</th><td>item name</td></tr>';
        if (!empty($items)) {
            foreach ($items as $i => $item) {
                $html .= '<tr><td>' . $i . '</td><td>' . $item . '</td></tr>';
            }
        }
        $html .= '</table>';
        echo $html;
    }
}

class TestController
{
    function getItemsAction()
    {
        $model = new TestModel();
        $data = $model->getItems();

        $view = new TestView();
        $view->renderItemsPage($data);
    }

}

class Core
{
    function run()
    {
        $controller = new TestController();
        $controller->getItemsAction();
    }
}

$core = new Core();
$core->run();