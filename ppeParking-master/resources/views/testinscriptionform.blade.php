<center>test inscription</center>
<br>
<form action="testinscriptionresultat" method="post">
    @csrf
    utilisateur : <input type="text" name="user" required>
    <br><br>
    mot de passe : <input type="password" name="pswd" required>
    <br> <br>
    <button type="submit">Inscription</button>
</form>
