<div align="center"> 
 <a href="https://github.com/dmarsal90/test/repo-size"><img alt="repo-size" src="https://img.shields.io/github/repo-size/dmarsal90/test?color=yellowgreen"></a>
 <a href="https://github.com/dmarsal90/test/blob/master/LICENSE"><img alt="GitHub license" src="https://img.shields.io/github/license/dmarsal90/test?color=red"></a>
 <a href="https://github.com/dmarsal90/test/"><img alt="visitors" src="https://shields-io-visitor-counter.herokuapp.com/badge?page=dmarsal90.test?color=blue"></a>
 
 </div>

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
