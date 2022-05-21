<!DOCTYPE html>
<html>
<head>
	<title>ERROR 404</title>
</head>
<style type="text/css">
	*{
		margin: 0 auto;
	}
	.error {
	  min-height: 100vh;
	}

	.error {
	  font-family: "Whitney SSm A", "Whitney SSm B", "Helvetica Neue", Helvetica, Arial, Sans-Serif;
	  background: #252121;
	  
	  color: #fff;
	  -moz-font-smoothing: antialiased;
	  -webkit-font-smoothing: antialiased;
	}
	h1{
	  font-size:150px;
	  padding-top: 10%;
	}
	a{
	  cursor: pointer;
	  color: #fff;
	}
	.error-container {
	  text-align: center;
	  height: 100%;
	  padding: 10%;
	}

	@media screen and (max-width:575px) {
	  h1{
	    font-size:100px;
	    padding-top: 10%;
	  }
	}
</style>
<body>
	<div class="error h-100">
	    <div class="error-container">
	        <h1>401</h1>
	        <h4 data-text="Opps! Page not found">
	            ¡Vaya! No tiene permisos para acceder a esta página
	         </h4>
	        <p class="return">Lo sentimos, la página que estás buscando es restringida. Si crees que algo está mal, reporta un problema. </p>
	        <a href="<?php echo BASE_URL?>login">Retornar al Inicio</a>
	      </div>
	</div>
</body>
</html>