<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin login</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Muli'>
<style>
    body{
  background: black;
  font-family: 'Muli', sans-serif;
  
}
h1{
  color: #fff;
  padding-bottom: 2rem;
  font-weight: bold;
}
a{
  color: #333;
}
a:hover{
  color: #E8D426;
  text-decoration: none;
}
.form-control:focus {

    color: #000;
    background-color: #fff;
    border:2px solid #E8D426;
    outline: 0;
    box-shadow: none;

}

.btn{
  background: #0b0542;
  border: #0b0542;
}
.btn:hover {
  background:#0b0542;
  border: #0b0542;
}
</style>

</head>

<body>
<!-- partial:index.partial.html -->
<div class="pt-5">
  <h1 class="text-center">Admin Login</h1>
  
<div class="container">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <div class="card card-body">
                                                    
                            <form  action="login1.php"  method="POST" >
                                <div class="form-group required">
                                    <label for="name">Username</label>
                                    <input type="text" class="form-control text-lowercase" id="name"  name="name">
                                </div>                    
                                <div class="form-group required">
                                    <label class="d-flex flex-row align-items-center" for="password">Password </label>
                                        
                                    <input type="password" class="form-control"  id="password" name="password">
                                </div>
                                
                                  
                                    <div class="form-group pt-1">
                                        <button class="btn btn-primary btn-block" name="login">Log In</button>
                                    </div>
                              
                               
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
</div>
<!-- partial -->
  
</body>
</html>
