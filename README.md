# yii2-highlight-search
<p>An alternative to ctrl+f, this adds functionality to your website with an additional callbacks.
This jquery highlight plugin created by <a href="http://johannburkard.de/blog/programming/javascript/highlight-javascript-text-higlighting-jquery-plugin.html">Johnn Burkhard.</a> When making a search will use jQuery animate() to scroll the element with the desired class. Next and prev buttons will scroll the element up and down to the other matches.</p>

<p>Here is an example on how to call the widget:</p>
```PHP
<?= mataman\highlightsearch\Widget::widget([
          'name' => 'search',
          'settings' => [],
])?>
```
