 @include('partials.header');

 <body>
     <div class="container">
         <!-- Navigation Buttons -->
         <div class="tabs">
             <button id="showLogin">Login</button>
             <button id="showRegister">Register</button>
         </div>

         <!-- Login Form -->
         <div id="loginForm" class="form-container active">
             <h2>Login</h2>
             @if(session('login_error'))
             <p style="color:red;">{{ session('login_error') }}</p>
             @endif
             <form method="POST" action="{{ route('login') }}">
                 @csrf
                 <input type="email" name="email" placeholder="Email" required>
                 <input type="password" name="password" placeholder="Password" required>
                 <button type="submit" class="login-submit-btn">Login</button>
             </form>
         </div>

         <!-- Registration Form -->
         <div id="registerForm" class="form-container">
             <h2>Register</h2>
             @if(session('register_error'))
             <p style="color:red;">{{ session('register_error') }}</p>
             @endif
             @if(session('register_success'))
             <p style="color:green;">{{ session('register_success') }}</p>
             @endif
             <form method="POST" action="{{ route('register') }}">
                 @csrf
                 <input type="text" name="fullname" placeholder="Full Name" required>
                 <input type="email" name="email" placeholder="Email" required>
                 <input type="password" name="password" placeholder="Password" required>
                 <select name="role" required>
                     <option value="teacher">Teacher</option>
                     <option value="student">Student</option>
                 </select>
                 <input type="text" name="class" placeholder="Class (Required for Students)">
                 <button type="submit" class="login-submit-btn">Register</button>
             </form>
         </div>
     </div>
     @include('partials.footer');