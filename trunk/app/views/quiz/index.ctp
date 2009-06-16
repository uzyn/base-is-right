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

<div id="quiz" style="display: none;">
	<div id="product">
		<div id="image">
			<img src="/img/product-sample.jpg" />
		</div>
		<h3 id="title">Reebok Detroit Lions Orbital Sideline Long Sleeve T-Shirt</h3>
		<p id="description">Show your team loyalty in cooler weather with the Reebok® NFL® Orbital 2 long-sleeve t-shirt. Constructed from a soft, lightweight cotton/polyester blend, ....</p>
	
		<div class="clear"></div>
	</div>


	<div id="guess">
		<h3 id="howmuch">How much?</h3>
		<?php 
		echo $form->create('Product', array('url' => $this->here)); 
		echo $form->input('Product.price', array('label' => 'USD', 'div' => ''));
		echo $form->submit("Submit"); ?>
	</div>

	<div id="results">
		<div id="right" class="result" style="display: none;">All the base are belong to you</div>
		<div id="toolow" class="result" style="display: none;">No way it is that cheap!</div>
		<div id="toohigh" class="result" style="display: none;">I could've got it much cheaply.</div>	
	</div>
</div>

<div id="loading" style="display: none;">
	Loading...
</div>
<div id="footer">
	<a href="http://code.google.com/p/base-is-right/">Project Home</a>
</div>
