<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Enter your name" />
    </div>

    <div>
        <label for="name">Email:</label>
        <input type="email" name="email" placeholder="Enter your email" />
    </div>

    <div>
        <button type="submit">Subscribe</button>
    </div>
</form>