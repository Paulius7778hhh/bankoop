<h1>Create account</h1>

            <?php $nameErr ?>
    <form action="<?= URL ?>check" method="post">
            <div><label for="name">Name: </label>
            <input type="text" name="name" placeholder="Name">
        </div>
            <div><label for="surname">Surname: </label>
            <input type="text" name="surname" placeholder="Surname">
        </div>
            <div><label for="personal-id-number">Personal ID: </label>
            <input type="text" name="personal-id-number" placeholder="Personal ID">
        </div>
            <div><label for="email">Email: </label>
            <input type="email" name="email" placeholder="Email">
        </div>
            <div><label for="password">Password: </label>
            <input type="password" name="password" placeholder="Password">
        </div>
            <div><label for="acount">Account number: </label>
            <input type="text" name="acount" placeholder="Account number" readonly value="<?= $acountt ?>">
        </div>
        <button type="submit">Register</button>
    </form>
        <br>
        <br>
        <br>
        <br>
        <br>
    <a href="<?= URL ?>">Grizti i meniu</a>
    