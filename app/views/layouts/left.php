<?
use app\helpers\ViewHelper;

?>
<aside class="main-sidebar">
    <section class="sidebar">
        <?
        $menuItems = [];
        ?>
        <? if (isset($this->params['categories'])): ?>
            <?
            $generatedMenu = ViewHelper::generateCategoriesMenu($this->params['categories']);
            $menuItems = array_merge($menuItems,
                [
                    ['label' => 'Categories', 'options' => ['class' => 'header']],
                ], $generatedMenu)
            ?>
        <? endif; ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items'   => $menuItems,
            ]) ?>
    </section>

</aside>
