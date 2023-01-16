<h1> Menu </h1>
<?= print_r($_SESSION); ?>
<a href="http://lbank.lt/account-list">account-list</a>

<form action="<?= URL . "menu/logout?" ?>" method="GET"><button type="submit">Log out</button></form>