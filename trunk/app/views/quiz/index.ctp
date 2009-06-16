<h1>The Base is Right</h1>

<div id="search">
<h2>
	Enter a term:
</h2>
	<?php 
	echo $form->create('Quiz', array('url' => $this->here)); 
	echo $form->input('Quiz.search', array('label' => '', 'div' => ''));
	echo $form->submit("I'm feeling basey"); ?>
</div>

<div id="product">
	<div id="image">
		<img src="base_media.jpg" />
	</div>
	<h3 id="title">Reebok Detroit Lions Orbital Sideline Long Sleeve T-Shirt</h3>
	<p id="description">Show your team loyalty in cooler weather with the Reebok® NFL® Orbital 2 long-sleeve t-shirt. Constructed from a soft, lightweight cotton/polyester blend, ....</p>
</div>

<div class="clear"></div>
<div id="footer">
	<a href="http://code.google.com/p/base-is-right/">Project Home</a>
</div>
