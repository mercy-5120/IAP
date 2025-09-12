<?php
class layouts {
    public function header($conf) {
        ?>
        <header style="background:#444; color:#fff; padding:10px; text-align:center;">
            <h1>Welcome to <?php echo $conf['site_name']; ?></h1>
        </header>
        <?php
    }

    public function nav($conf) {
        ?>
        <nav style="background:#222; padding:10px;">
            <a href="index.php" style="color:white; margin-right:15px;">Home</a>
            <a href="users.php" style="color:white; margin-right:15px;">Users</a>
            <a href="signup.php" style="color:white; margin-right:15px;">Sign Up</a>
            <a href="signin.php" style="color:white;">Login</a>
        </nav>
        <?php
    }

    public function banner($conf) {
        ?>
        <section style="background:#eee; padding:20px; text-align:center;">
            <h2><?php echo $conf['site_name']; ?> Community Portal</h2>
            <p>Join us and be part of the journey 🚀</p>
        </section>
        <?php
    }

    public function form_content($conf, $ObjForm) {
        ?>
        <section style="padding:20px; text-align:center;">
            <h2>Sign Up</h2>
            <form method="post" action="register.php" style="display:inline-block; text-align:left;">
                <label for="name">Name:</label><br>
                <input type="text" name="name" required><br><br>

                <label for="email">Email:</label><br>
                <input type="email" name="email" required><br><br>

                <label for="password">Password:</label><br>
                <input type="password" name="password" required><br><br>

                <button type="submit">Register</button>
            </form>
        </section>
        <?php
    }

    public function footer($conf) {
        ?>
        <footer style="background:#444; color:#fff; text-align:center; padding:10px;">
            <p>Copyright &copy; <?php echo date("Y"); ?> <?php echo $conf['site_name']; ?> - All Rights Reserved</p>
        </footer>
        <?php
    }
}