<?php //$this->layout('layout::default', ['title' => sprintf('%d %s', $status, $reason)]) ?>

<h1>Страница не найдена.</h1>

<p>We encountered a <?=$this->e($status)?> <?=$this->e($reason)?> error.</p>
<?php if ($status == 404) : ?>
<p>
    То, что выхотели посмотреть не существует или перемещено. <br>Попробуйте перейти по другим ссылкам на 
        <a href="/"><span class="fa fa-home"></span> Начальной странице</a>.
</p>
<?php endif; ?>
