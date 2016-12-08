<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php'; 
 require_once 'check.php';  
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html"/>
<meta charset="UTF-8">
<title>Barry's Announcements</title>
<style>
#section1 {padding-top:10px; width:400px;
</style>
</head>
<body>
<div id="wrapper">
<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="index.php"><img src="img/logo.png" height="42" width="42"></a>
    </div>
      <form action="szukaj.php" method="GET" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" name="szukaj" class="form-control" placeholder="Czego poszukujesz?">
        </div>
        <button type="submit" class="btn btn-default">Szukaj</button>
      </form>
	   <?php 
	  if ($_SESSION['nick']){
	echo'<form action="dodaj.php" class="navbar-form navbar-left">';
    echo'<button type="submit" class="btn btn-success">Dodaj</button>';
      echo'</form>';
		   }
 ?>
      <ul class="nav navbar-nav navbar-right">
		<?php 
 if ($_SESSION['nick']){
		 echo'<li><a href="#">Witaj, '.$_SESSION['nick'].'</a></li>';
echo'<li class="dropdown">';
          echo'<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Konto<span class="caret"></span></a>';
           echo'<ul class="dropdown-menu">';
            echo'<li><a href="userpanel.php">Profil</a></li>';
 if ($_SESSION['admin']){
            echo'<li><a href="admin.php">Panel administratora</a></li>';
 }
 echo'<li><a href="logout.php">Wyloguj</a></li>';
           echo'</ul>';
         echo'</li>';

}else{
 echo'<li class="dropdown">';
          echo'<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logowanie<span class="caret"></span></a>';
           echo'<ul class="dropdown-menu">';
            echo'<li><a href="login.php">Zaloguj</a></li>';
            echo'<li><a href="register.php">Zarejestruj</a></li>';
           echo'</ul>';
         echo'</li>';

 }
 ?></ul>
    </div>
   </nav>
<div id="content" class="container-fluid">

<center>
<h4>Barry's Announcements to darmowe og&#322;oszenia lokalne w kategoriach: Obuwie, Gry, Odzie&#380;, Samochody, Zwierz&#281;ta, Komputery. Szybko znajdziesz tu ciekawe og&#322;oszenia i &#322;atwo skontaktujesz si&#281; z og&#322;oszeniodawc&#261;. Je&#347;li chcesz co&#347; sprzeda&#263; - w prosty spos&#243;b dodasz bezp&#322;atne og&#322;oszenia. Chcesz co&#347; kupi&#263; - tutaj znajdziesz ciekawe okazje, taniej ni&#380; w sklepie.</h4><br>
		<h1>Popularne kategorie</h1><br>
<?php  
$wynik = mysqli_query($conn, "SELECT id_kategorii,kategoria  FROM kategorie") 
or die('B&#322;&#261;d zapytania'); 
if(mysqli_num_rows($wynik) > 0) {  
    while($r = mysqli_fetch_array($wynik)) {
	echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'>"; 
        echo "<div class='hovereffect'>"; 
		echo "<img class='img-responsive' src='img/kat/".$r[0].".jpg'>";
		echo "<div class='overlay'>";
		echo "<p>";
		echo '<h2><a href="kategoria.php?id='.$r[0].'">'.$r[1].'</a></h2>';
		echo "</p>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
}
} 
mysqli_close($conn); 
?>		

</div>
<div id="footer">
<center>
<div class="col-md-12">
<h4>Więcej informacji</h4>
<ul class="list-unstyled">
<li><a href="help.php">FAQ</a></li>
<li><a href="kontakt.php">Kontakt</a></li>
</ul>
<p>© 2016 Barry All Rights Reserved </p>
</div>
</div></div>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/angular.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html><?php ob_end_flush(); ?>