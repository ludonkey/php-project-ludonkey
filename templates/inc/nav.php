<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class=" container">
        <a class="navbar-brand" href="/">[[ ShareCode ]]</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">

            </ul>
            <form class="form-inline my-2 my-md-0" action="/" id="search-form">
                <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search" value="<?= $_GET['search'] ?? ""; ?>">
            </form>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <a href="/logout" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="logout-btn">Logout</a>
                <a href="/new" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true" id="new-btn">+</a>
            <?php
            } else {
            ?>
                <a href="/login" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="login-btn">Log in</a>
                <a href="/register" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true" id="signup-btn">Sign up</a>
            <?php
            }
            ?>
        </div>
    </div>
</nav>