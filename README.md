# Stripe 3D Secure Card Payment PHP Script 
This is Stripe PHP library to accept card payments for php based web applications.
<h3>Requirements</h3>
PHP 5.6.0 and later.<br>
<h3>Composer</h3>
<p>You can install the bindings via <a href="http://getcomposer.org/" rel="nofollow">Composer</a>. Run the following command:</p>
<div class="highlight highlight-source-shell"><pre>composer require stripe/stripe-php</pre></div>
<p>To use the bindings, use Composer's <a href="https://getcomposer.org/doc/01-basic-usage.md#autoloading" rel="nofollow">autoload</a>:</p>
<div class="highlight highlight-text-html-php"><pre><span class="pl-s1"><span class="pl-k">require_once</span>(<span class="pl-s"><span class="pl-pds">'</span>vendor/autoload.php<span class="pl-pds">'</span></span>);</span></pre></div>
<h2><a id="user-content-manual-installation" class="anchor" aria-hidden="true" href="#manual-installation"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Manual Installation</h2>
<p>If you do not wish to use Composer, you can download the <a href="https://github.com/stripe/stripe-php/releases">latest release</a>. Then, to use the bindings, include the <code>init.php</code> file.</p>
<div class="highlight highlight-text-html-php"><pre><span class="pl-s1"><span class="pl-k">require_once</span>(<span class="pl-s"><span class="pl-pds">'</span>/path/to/stripe-php/init.php<span class="pl-pds">'</span></span>);</span></pre></div>
<h2><a id="user-content-dependencies" class="anchor" aria-hidden="true" href="#dependencies"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Dependencies</h2>
<p>The bindings require the following extensions in order to work properly:</p>
<ul>
<li><a href="https://secure.php.net/manual/en/book.curl.php" rel="nofollow"><code>curl</code></a>, although you can use your own non-cURL client if you prefer</li>
<li><a href="https://secure.php.net/manual/en/book.json.php" rel="nofollow"><code>json</code></a></li>
<li><a href="https://secure.php.net/manual/en/book.mbstring.php" rel="nofollow"><code>mbstring</code></a> (Multibyte String)</li>
</ul>
<p>If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.</p>
<h2><a id="user-content-getting-started" class="anchor" aria-hidden="true" href="#getting-started"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Getting Started</h2>
<p>Replace apikyes @ js/index.js and pay.php with your stripe api keys</p>
