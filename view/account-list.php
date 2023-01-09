<h1>Accounts</h1>
<ul>
<?php foreach($data as $account) : ?>
<li><?= $account['id'] ?> <?= $account['name'] ?> <?= $account['surname'] ?> <?= $account['personal-id-number'] ?> <?= $account['acount'] ?></li>
<?php endforeach ?>
</ul> 