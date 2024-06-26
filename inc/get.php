<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <header>
        <h1>Get FREE Updates</h1>
        <p>Join us for FREE to get email updates!</p>
    </header>
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Full Name" value="<?php echo $inputs['name'] ?? '' ?>" class="<?php echo isset($errors['name']) ? 'error' : ''  ?>">
        <small><?php echo $errors['name'] ?? '' ?></small>
    </div>
    <div>
        <label for="name">Email:</label>
        <input type="text" name="email" id="email" placeholder="Email Address" value="<?php echo $inputs['email'] ?? '' ?>" class="<?php echo isset($errors['email']) ? 'error' : '' ?>">
        <small><?php echo $errors['email'] ?? '' ?></small>
    </div>

    <div>Please choose your preferred method of contact:</div>
    <?php foreach ($contacts as $key => $value) : ?>
        <div>
            <input type="radio" name="contact" id="contact_<?php echo $key ?>" value="<?php echo $key ?>" />
            <label for="contact_<?php echo $key ?>"><?php echo $value ?></label>
        </div>
    <?php endforeach ?>
    <div>
        <small class="error"><?php echo $errors['contact'] ?? '' ?></small>
    </div>
    <input type="hidden" name="token" value="<?= $_SESSION['token'] ?? '' ?>">
    <button type="submit">Subscribe</button>
</form>