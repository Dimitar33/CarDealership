<?php require_once __DIR__ . "/../../public/templates/header.php"; ?>
<div class="registration-form">
        <form method="post" action="/CarDealership/public/index.php?controller=user&action=register">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="username" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="confirm-password" name="confirm-password" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="phone-number" name="phone" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" value="Submit" class="btn btn-block create-account">Create Account</button>
            </div>
        </form>
        <div class="social-media">
            <h5>Sign up with social media</h5>
            <div class="social-icons">
                <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
                <a href="#"><i class="icon-social-google" title="Google"></i></a>
                <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
            </div>
        </div>
    </div>

