<h1>✔️ Installation</h1>
<h3>Configuration ⚙️</h3>
<p>Create .env file from .env.dist example</p>

<code>cp .env.test .env</code>

<h3>Database 💾</h3>
<p>Set your database settings to .env file</p>

<code>DB_CONNECTION=sqlite</code>

<h3>Install 💻</h3>
<code>composer install</code>/
<code>npm i</code>

<h3>Run migrations 📄</h3>
<code>php artisan migrations:migrate</code>/
<code>php artisan db:seed</code>
<p>Or</p>
<code>php artisan migrations:migrate --seed</code>

😃 All done!
