<h1>Create account</h1>


    <form action="<?= URL ?>Accounts/save" method="post">
        <div><label for="name">Name: </label>
        <input type="text" name="name" placeholder="Name">
        </div>
        <div><label for="surname">Surname: </label>
        <input type="text" name="surname" placeholder="Surname">
        </div>
        <div><label for="personal-id-number">Personal ID: </label>
        <input type="text" name="personal-id-number" placeholder="Personal ID">
        </div>
        <div><label for="acount">Account number: </label>
        
        <input type="text" name="acount" placeholder="Account number" readonly value="999999999">
        </div>
        <button type="submit">Register</button>
    </form>
        <br>
        <br>
        <br>
        <br>
        <br>
    <a href="<?= URL ?>">Grizti i meniu</a>
    