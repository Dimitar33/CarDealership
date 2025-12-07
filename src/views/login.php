<?php require_once __DIR__ . "/../../public/templates/header.php"; ?>
<div class="registration-form">
    <form method="post" action="/CarDealership/public/index.php?controller=user&action=login">
        <div class="form-icon">
            <span><i class="icon icon-user"></i></span>
        </div>
        <?php if (isset($userNotFound)): ?>
            <p style="color:red; text-align: center;">Wrong email or password!</p>
        <?php endif; ?>
        <div class="form-group">
            <input type="email" class="form-control item" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control item" name="password" id="password" placeholder="Password"
                minlength="3" required>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" value="Submit" class="btn btn-block create-account">Sign In</button>
        </div>
    </form>
    <div class="social-media">
        <h5>Sign in with social media</h5>
        <div class="social-icons">
            <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
            <a href="#"><i class="icon-social-google" title="Google"></i></a>
            <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
        </div>
    </div>
</div>