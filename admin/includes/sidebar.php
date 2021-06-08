 <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">
              
            
            <button class="open-button" onclick="openForm()">Login/Register</button>               
            <div class="form-popup" id="myForm">
             <form action="includes/login.php" method="post">
                <h1>Login</h1>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                    <button type="submit" class="btn">Login</button>
                <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
              </form>
            </div>            
              <!-- Login 
                <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                    
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter username">
                     </div>
                       
                       
                     <div class="input-group">
                        <input name="password" type="text" class="form-control" placeholder="Enter password">
                         <span class="input-group-btn">
                         <button class="btn btn-primary" name="login" type="submit">Submit</button>
                      </span>
                    </div>
                    
                   </form> 
                </div>
                    
                </div>-->
