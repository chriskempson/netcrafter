<?php include $_SERVER['DOCUMENT_ROOT'] . '/../netcrafter.php' ?>

<title>Netcrafter</title>

<?php partial('header') ?>

<h1>Welcome to the World Wide Web</h1>
<p>You are surfing the information highway!</p>

<p>This is <a href="https://github.com/chriskempson/netcrafter">hyperlink</a> to the project page.</p>

<p>Here is some <strong>bold</strong> text and some <em>italic</em> for your enjoyment.<p>

<p>This page's title is: <code><?= meta('title') ?><code></p>

<p><a href="https://github.com/chriskempson/netcrafter"><img src="/made-with-netcrafter.gif"></a></p>

<?php partial('footer') ?>
