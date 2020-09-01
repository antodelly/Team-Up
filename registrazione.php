<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
  <title>Registrazione</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/registrazione.css" rel="stylesheet" media="all">
  
</head>

<body>

<!-- script section -->
<script>
  var controll = function(){    
  var re = /^[A-Za-z]+$/;
  if(!re.test(document.getElementByClass("input-text").value))
      alert('Inserire solo caratteri!');      
  }
</script>

<script>
  var check = function() {
  if (document.getElementById('password').value == document.getElementById('re_password').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'Le password coincidono';
  } else {
        document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Le password non coincidono';
  }
}
</script>

<script>
function Validate() {
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("re_password").value;
  if (password != confirmPassword) {
      alert("Le password non coincidono!");
      return false;
  }
  return true;
}
</script>
<!-- end script section -->

<!-- titolo -->
<div class="hide">
	<h2>“Avere un'idea, è un'ottima cosa. Ma è ancora meglio sapere come portarla avanti.”</h2>
    <h3>Henry Ford</h3>
</div>
<!-- end titolo -->

<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
  <div class="wrapper wrapper--w680">
    <div class="card card-4">
      <div class="card-body">
        <div class="facciata">
          <h2 class="title">Registrati</h2>
          <img src="img/logo.png" />
        </div>
        
        <form method="POST" action="Controller/controllerRegistrazione.php">
          <div class="row row-space">
            <div class="col-2">
              <div class="input-group"><label class="label">Nome*</label> 
                <input class="input--style-4" name="nome" class="input-text" type="text" title="Solo lettere. Max 30 caratteri" required pattern="[A-Za-z\s]{1}[A-Za-z\s.']{0,29}">
              </div>
            </div>
            <div class="col-2">
              <div class="input-group"><label class="label">Cognome*</label> 
                <input class="input--style-4" name="cognome" class="input-text" type="text" required title="Solo lettere. Max 30 caratteri" required pattern="[A-Za-z]{1}[A-Za-z.']{0,29}">
              </div>
            </div>
          </div>
          
          <div class="row row-space">
            <div class="col-3">
              <div class="input-group">
                <label class="label">Genere*</label>
                <div class="p-t-10">
                  <label class="radio-container m-r-45">Donna 
                  <input checked="checked" name="genere" type="radio" value="Donna"/>
                  <span class="checkmark"></span>
                  </label> 
                  <label class="radio-container m-r-45">Uomo 
                  <input name="genere" type="radio" value="Uomo"/>
                  <span class="checkmark"></span>
                  </label> 
                  <label class="radio-container">Altro 
                  <input name="genere" type="radio" value="Altro"/>
                  <span class="checkmark"></span>
                  </label>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row row-space">
            <div class="col-2">
              <div class="input-group">
                <label class="label">Email*</label> 
                <input class="input--style-4" name="email" type="email" required title="Inserire un'email valida" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
              </div>
            </div>
            <div class="col-2">
              <div class="input-group">
                <label class="label">Cellulare</label> 
                <input class="input--style-4" name="cellulare" type="tel" title="Solo numeri (max 10). Deve rispettare il formato 1234567890" pattern="[0-9]{10}">
              </div>
            </div>
            
            <div class="col-2">
              <div class="input-group"><label class="label">Password*</label> 
                <input id="password" class="input--style-4" name="password" type="password" onkeyup="check()" minlength="6" title="Minimo 6 caratteri, tra cui 1 lettera, 1 maiuscola e 1 numero." required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
              </div>
            </div>
            <div class="col-2">
              <div class="input-group">
                <label class="label">Conferma password*</label> 
                <input id="re_password" class="input--style-4" name="re_password" type="password" onkeyup="check()" required> 
                <span id="message"></span>
              </div>
            </div>
          </div>
          
          <div class="p-t-15">
            <button class="btn btn--blue btn--radius-2" type="submit" onclick="return Validate()">
            Conferma
            </button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>	
    
<!-- footer -->
<section class="footer">
  <div class="mark">
    <h3>Team<span>Up</span></h3>
  </div>
  <div class="copyright">
    &copy; Copyright. All Rights Reserved
  </div>
</section>
<!-- end footer -->
    
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
</body>
</html>