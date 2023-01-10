<h1>Accounts</h1>
<ul>
<?php foreach($data as $account) : ?>
<li><h2><span style="color: brown;">Id:</span> <?= $account['id'] ?> <span style="color: teal;">Name:</span> <?= $account['name'] ?> <span style="color: orange;">Surname:</span> <?= $account['surname'] ?> <span style="color: red;">Id nr:</span> <?= $account['personal-id-number'] ?> <span style="color: green;">AccountID:</span> <?= $account['acount'] ?> <span style="color: blue;">Euro:</span> <?= $account['balance'] ?>;</h2></li>
<?php endforeach ?>
</ul> 

<a href="http://lbank.lt/menu">back to menu</a>
