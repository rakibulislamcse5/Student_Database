/*
Template Name: HUD - Responsive Bootstrap 5 Admin Template
Version: 1.4.0
Author: Sean Ngu
Website: http://www.seantheme.com/hud/
*/

var handleInitHighlightJs = function() {
	$('.hljs-container pre code').each(function(i, block) {
		hljs.highlightBlock(block);
	});
};


/* Controller
------------------------------------------------ */
$(document).ready(function() {
	handleInitHighlightJs();
});